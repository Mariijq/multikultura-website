<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\PublicationsDataTable;
use App\Models\Publications;
class PublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PublicationsDataTable $dataTable)
    {
        return $dataTable->render('admin.publications.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.publications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                'title_en' => 'required|string|max:255',
                'title_mk' => 'required|string|max:255',
                'title_al' => 'required|string|max:255',

                'short_description_en' => 'nullable|string',
                'short_description_mk' => 'nullable|string',
                'short_description_al' => 'nullable|string',

                'detailed_description_en' => 'nullable|string',
                'detailed_description_mk' => 'nullable|string',
                'detailed_description_al' => 'nullable|string',

                'date' => 'nullable|date',

                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                
                'file' => 'nullable|file|mimes:pdf,doc,docx,txt|max:10240', // 10MB max
            ]);

            $publication = new Publications();

            $publication->title = [
                'en' => $request->title_en,
                'mk' => $request->title_mk,
                'al' => $request->title_al,
            ];

            $publication->short_description = [
                'en' => $request->short_description_en,
                'mk' => $request->short_description_mk,
                'al' => $request->short_description_al,
            ];

            $publication->detailed_description = [
                'en' => $request->detailed_description_en,
                'mk' => $request->detailed_description_mk,
                'al' => $request->detailed_description_al,
            ];

            $publication->date = $request->date;

            // Save image if uploaded
            if ($request->hasFile('image')) {

                $imagePath = $request
                    ->file('image')
                    ->store('publications', 'public');

                $publication->image = $imagePath;
            }

            // Save file if uploaded
            if ($request->hasFile('file')) {

                $filePath = $request
                    ->file('file')
                    ->store('publications', 'public');

                $publication->file = $filePath;
            }

            $publication->save();

            return redirect()
                ->route('admin.publications.index')
                ->with('success', 'Publication created successfully!');

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    'error' => 'An error occurred while creating the publication: ' . $e->getMessage()
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publication = Publications::findOrFail($id);

        return view('admin.publications.show', compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publication = Publications::findOrFail($id);

        return view('admin.publications.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $publication = Publications::findOrFail($id);

            $validated = $request->validate([
                'title_en' => 'required|string|max:255',
                'title_mk' => 'required|string|max:255',
                'title_al' => 'required|string|max:255',

                'short_description_en' => 'nullable|string',
                'short_description_mk' => 'nullable|string',
                'short_description_al' => 'nullable|string',

                'detailed_description_en' => 'nullable|string',
                'detailed_description_mk' => 'nullable|string',
                'detailed_description_al' => 'nullable|string',

                'date' => 'nullable|date',

                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',

                'file' => 'nullable|file|mimes:pdf,doc,docx,txt|max:10240', // 10MB max
            ]);


            $publication->title = [
                'en' => $request->title_en,
                'mk' => $request->title_mk,
                'al' => $request->title_al,
            ];

            $publication->short_description = [
                'en' => $request->short_description_en,
                'mk' => $request->short_description_mk,
                'al' => $request->short_description_al,
            ];

            $publication->detailed_description = [
                'en' => $request->detailed_description_en,
                'mk' => $request->detailed_description_mk,
                'al' => $request->detailed_description_al,
            ];


            $publication->date = $request->date;

            // Update image if uploaded
            if ($request->hasFile('image')) {

                // Delete old image
                if (
                    $publication->image &&
                    Storage::disk('public')->exists($publication->image)
                ) {
                    Storage::disk('public')->delete($publication->image);
                }

                // Store new image
                $imagePath = $request
                    ->file('image')
                    ->store('publications', 'public');

                $publication->image = $imagePath;
            }

            // Update file if uploaded
            if ($request->hasFile('file')) {

                // Delete old file
                if (
                    $publication->file &&
                    Storage::disk('public')->exists($publication->file)
                ) {
                    Storage::disk('public')->delete($publication->file);
                }

                // Store new file
                $filePath = $request
                    ->file('file')
                    ->store('publications', 'public');

                $publication->file = $filePath;
            }

            $publication->save();

            return redirect()
                ->route('admin.publications.index')
                ->with('success', 'Publication updated successfully!');

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    'error' => 'An error occurred while updating the publication: ' . $e->getMessage()
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $publication = Publications::findOrFail($id);

            // Delete image if exists
            if (
                $publication->image &&
                Storage::disk('public')->exists($publication->image)
            ) {
                Storage::disk('public')->delete($publication->image);
            }

            $publication->delete();

            return redirect()
                ->route('admin.publications.index')
                ->with('success', 'Publication deleted successfully!');

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with('error', 'Failed to delete publication. Please try again.');
        }

    }
}
