<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();

        return view('admin.contact', compact('contact'));
    }

    public function update(Request $request)
    {
        // 1. Валидација на податоците
        $validated = $request->validate([
            'address_en' => ['required', 'string', 'max:255'],
            'address_mk' => ['required', 'string', 'max:255'],
            'address_al' => ['required', 'string', 'max:255'],

            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],

            'facebook' => ['nullable', 'url', 'max:255'],
            'instagram' => ['nullable', 'url', 'max:255'],
            'linkedin' => ['nullable', 'url', 'max:255'],

            'google_maps_link' => ['nullable', 'string', 'max:5000'],
        ]);

        // 2. Обработка на Google Maps iframe или URL
        $mapInput = trim($validated['google_maps_link'] ?? '');
        $mapUrl = null;

        if ($mapInput !== '') {

            // Ако е внесен цел iframe код, извлечи го src.
            if (
                preg_match(
                    '/<iframe\b[^>]*\bsrc\s*=\s*["\']([^"\']+)["\']/i',
                    $mapInput,
                    $matches
                )
            ) {
                $mapUrl = html_entity_decode(
                    $matches[1],
                    ENT_QUOTES | ENT_HTML5,
                    'UTF-8'
                );
            } else {
                // Ако е внесен само URL.
                $mapUrl = $mapInput;
            }

            // Провери дали URL-то е валиден Google Maps embed URL.
            $parsedUrl = parse_url($mapUrl);

            $validMapUrl =
                is_array($parsedUrl) &&
                strtolower($parsedUrl['scheme'] ?? '') === 'https' &&
                in_array(
                    strtolower($parsedUrl['host'] ?? ''),
                    ['www.google.com', 'google.com'],
                    true
                ) &&
                str_starts_with(
                    $parsedUrl['path'] ?? '',
                    '/maps/embed'
                );

            if (!$validMapUrl) {
                return back()
                    ->withErrors([
                        'google_maps_link' =>
                            'Внеси валиден Google Maps embed URL или цел iframe код.',
                    ])
                    ->withInput();
            }
        }

        // 3. Пронајди го записот или креирај нов.
        $contact = Contact::first();

        if (!$contact) {
            $contact = new Contact();
        }

        // 4. Адреси на трите јазици.
        $contact->address = [
            'en' => $validated['address_en'],
            'mk' => $validated['address_mk'],
            'al' => $validated['address_al'],
        ];

        // 5. Контакт информации.
        $contact->email = $validated['email'] ?? null;
        $contact->phone = $validated['phone'] ?? null;

        // 6. Социјални мрежи.
        $contact->facebook = $validated['facebook'] ?? null;
        $contact->instagram = $validated['instagram'] ?? null;
        $contact->linkedin = $validated['linkedin'] ?? null;

        // 7. Зачувај го само URL-то од iframe.
        $contact->google_maps_link = $mapUrl;

        // 8. Зачувај во базата.
        $contact->save();

        return redirect()
            ->route('admin.contact')
            ->with('success', 'Contact information saved successfully.');
    }
}
