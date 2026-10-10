<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\PartnersDataTable;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of partners.
     */
    public function index(PartnersDataTable $dataTable)
    {
        return $dataTable->render('admin.partners.index');
    }

    /**
     * Show the form for creating a new partner.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created partner.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name.mk' => ['required', 'string', 'max:255'],
            'name.en' => ['required', 'string', 'max:255'],
            'name.al' => ['required', 'string', 'max:255'],
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:10240',
            ],
        ]);

        $imagePath = $request->file('image')->store('partners', 'public');

        Partner::create([
            'name' => $validated['name'],
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner successfully created.');
    }

    /**
     * Display the specified partner.
     */
    public function show(string $id)
    {
        $partner = Partner::findOrFail($id);

        return view('admin.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified partner.
     */
    public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);

        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified partner.
     */
    public function update(Request $request, string $id)
    {
        $partner = Partner::findOrFail($id);

        $validated = $request->validate([
            'name.mk' => ['required', 'string', 'max:255'],
            'name.en' => ['required', 'string', 'max:255'],
            'name.al' => ['required', 'string', 'max:255'],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:10240',
            ],
        ]);

        $imagePath = $partner->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('partners', 'public');

            if ($partner->image) {
                Storage::disk('public')->delete($partner->image);
            }
        }

        $partner->update([
            'name' => $validated['name'],
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner successfully updated.');
    }

    /**
     * Remove the specified partner.
     */
    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);

        if ($partner->image) {
            Storage::disk('public')->delete($partner->image);
        }

        $partner->delete();

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner successfully deleted.');
    }
}
