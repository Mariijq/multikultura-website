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
        $contact = Contact::first();

        if (!$contact) {
            $contact = new Contact();
        }

        $validated = $request->validate([
            'address_en' => 'required|string|max:255',
            'address_mk' => 'required|string|max:255',
            'address_al' => 'required|string|max:255',

            'phone' => 'nullable|string|max:20',

            'email_al' => 'required|email|max:255',

            'subject_en' => 'nullable|string|max:255',
            'subject_mk' => 'nullable|string|max:255',
            'subject_al' => 'nullable|string|max:255',

            'message_en' => 'nullable|string',
            'message_mk' => 'nullable|string',
            'message_al' => 'nullable|string',

            'google_maps_link' => 'nullable|url',
        ]);

        $contact->address = [
            'en' => $validated['address_en'],
            'mk' => $validated['address_mk'],
            'al' => $validated['address_al'],
        ];

        $contact->phone = $validated['phone'] ?? null;

        $contact->email = [
            'al' => $validated['email_al'],
        ];

        $contact->subject = [
            'en' => $validated['subject_en'] ?? null,
            'mk' => $validated['subject_mk'] ?? null,
            'al' => $validated['subject_al'] ?? null,
        ];

        $contact->message = [
            'en' => $validated['message_en'] ?? null,
            'mk' => $validated['message_mk'] ?? null,
            'al' => $validated['message_al'] ?? null,
        ];

        $contact->google_maps_link = $validated['google_maps_link'] ?? null;

        $contact->save();

        return redirect()
            ->route('admin.contact')
            ->with('success', 'Contact information saved successfully.');
    }
}
