<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ProjectsDataTable;
use App\Models\Projects;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProjectsDataTable $dataTable)
    {
        return $dataTable->render('admin.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
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

                'status' => 'required|in:Ongoing,Finished',

                'date' => 'nullable|date',

                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            $project = new Projects();

            $project->title = [
                'en' => $request->title_en,
                'mk' => $request->title_mk,
                'al' => $request->title_al,
            ];

            $project->short_description = [
                'en' => $request->short_description_en,
                'mk' => $request->short_description_mk,
                'al' => $request->short_description_al,
            ];

            $project->detailed_description = [
                'en' => $request->detailed_description_en,
                'mk' => $request->detailed_description_mk,
                'al' => $request->detailed_description_al,
            ];

            $project->status = $request->status;

            $project->date = $request->date;

            // Save image if uploaded
            if ($request->hasFile('image')) {

                $imagePath = $request
                    ->file('image')
                    ->store('projects', 'public');

                $project->image = $imagePath;
            }

            $project->save();

            return redirect()
                ->route('admin.projects.index')
                ->with('success', 'Project created successfully!');

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    'error' => 'An error occurred while creating the project: ' . $e->getMessage()
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Projects::findOrFail($id);

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Projects::findOrFail($id);

        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $project = Projects::findOrFail($id);

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

                'status' => 'required|in:Ongoing,Finished',

                'date' => 'nullable|date',

                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            $project->title = [
                'en' => $request->title_en,
                'mk' => $request->title_mk,
                'al' => $request->title_al,
            ];

            $project->short_description = [
                'en' => $request->short_description_en,
                'mk' => $request->short_description_mk,
                'al' => $request->short_description_al,
            ];

            $project->detailed_description = [
                'en' => $request->detailed_description_en,
                'mk' => $request->detailed_description_mk,
                'al' => $request->detailed_description_al,
            ];

            $project->status = $request->status;

            $project->date = $request->date;

            // Update image if uploaded
            if ($request->hasFile('image')) {

                // Delete old image
                if (
                    $project->image &&
                    Storage::disk('public')->exists($project->image)
                ) {
                    Storage::disk('public')->delete($project->image);
                }

                // Store new image
                $imagePath = $request
                    ->file('image')
                    ->store('projects', 'public');

                $project->image = $imagePath;
            }

            $project->save();

            return redirect()
                ->route('admin.projects.index')
                ->with('success', 'Project updated successfully!');

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    'error' => 'An error occurred while updating the project: ' . $e->getMessage()
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $project = Projects::findOrFail($id);

            // Delete image if exists
            if (
                $project->image &&
                Storage::disk('public')->exists($project->image)
            ) {
                Storage::disk('public')->delete($project->image);
            }

            $project->delete();

            return redirect()
                ->route('admin.projects.index')
                ->with('success', 'Project deleted successfully!');

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with('error', 'Failed to delete project. Please try again.');
        }
    }
}