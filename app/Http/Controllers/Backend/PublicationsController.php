<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\PublicationsDataTable;
use App\Models\Publications;
use Illuminate\Support\Facades\Storage;

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
            'title_en' => 'nullable|string|max:255',
            'title_mk' => 'nullable|string|max:255',
            'title_al' => 'nullable|string|max:255',

            'short_description_en' => 'nullable|string',
            'short_description_mk' => 'nullable|string',
            'short_description_al' => 'nullable|string',

            'detailed_description_en' => 'nullable|string',
            'detailed_description_mk' => 'nullable|string',
            'detailed_description_al' => 'nullable|string',

            'date' => 'nullable|date',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',

            'file' => 'nullable|file|mimes:pdf,doc,docx,txt|max:51200',
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

        /*
        |--------------------------------------------------------------------------
        | Save manually uploaded image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $imagePath = $request
                ->file('image')
                ->store('publications', 'public');

            $publication->image = $imagePath;
        }

        /*
        |--------------------------------------------------------------------------
        | Save publication file
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            // Save uploaded file
            $filePath = $file->store('publications', 'public');

            $publication->file = $filePath;

            /*
            |--------------------------------------------------------------------------
            | Generate cover from first page of PDF
            |--------------------------------------------------------------------------
            */

            if (strtolower($file->getClientOriginalExtension()) === 'pdf') {

                $pdfFullPath = Storage::disk('public')->path($filePath);

                $coverPath = $this->generatePdfCover($pdfFullPath);

                /*
                |--------------------------------------------------------------------------
                | Use generated cover only if user did not upload an image
                |--------------------------------------------------------------------------
                */

                if (!$request->hasFile('image')) {
                    $publication->image = $coverPath;
                }
            }
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
                'title_en' => 'nullable|string|max:255',
                'title_mk' => 'nullable|string|max:255',
                'title_al' => 'nullable|string|max:255',

                'short_description_en' => 'nullable|string',
                'short_description_mk' => 'nullable|string',
                'short_description_al' => 'nullable|string',

                'detailed_description_en' => 'nullable|string',
                'detailed_description_mk' => 'nullable|string',
                'detailed_description_al' => 'nullable|string',

                'date' => 'nullable|date',

                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',

                'file' => 'nullable|file|mimes:pdf,doc,docx,txt|max:51200', // 10MB max
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

    private function generatePdfCover(string $pdfPath): ?string
    {
        $gsPath = 'C:\\Program Files\\gs\\gs10.08.0\\bin\\gswin64c.exe';

        if (!file_exists($gsPath)) {
            throw new \Exception('Ghostscript was not found: ' . $gsPath);
        }

        if (!file_exists($pdfPath)) {
            throw new \Exception('PDF file was not found: ' . $pdfPath);
        }

        $directory = dirname($pdfPath);

        $fileName = pathinfo($pdfPath, PATHINFO_FILENAME);

        $coverFileName = $fileName . '_cover.jpg';
        $coverPath = $directory . DIRECTORY_SEPARATOR . $coverFileName;

        $command = sprintf(
            '"%s" -dSAFER -dBATCH -dNOPAUSE -sDEVICE=jpeg -r150 -dFirstPage=1 -dLastPage=1 -sOutputFile="%s" "%s"',
            $gsPath,
            $coverPath,
            $pdfPath
        );

        exec($command, $output, $returnCode);

        if ($returnCode !== 0 || !file_exists($coverPath)) {
            throw new \Exception(
                'Failed to generate PDF cover. Ghostscript exit code: ' . $returnCode
            );
        }

        return str_replace(
            storage_path('app/public') . DIRECTORY_SEPARATOR,
            '',
            $coverPath
        );
    }
}
