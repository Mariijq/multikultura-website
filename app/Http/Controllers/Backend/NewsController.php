<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\NewsDataTable;
use Toastr;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NewsDataTable $dataTable)
    {
        return $dataTable->render('admin.news.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_mk' => 'required|string|max:255',
            'title_al' => 'required|string|max:255',
            'subtitle_en' => 'nullable|string|max:255',
            'subtitle_mk' => 'nullable|string|max:255',
            'subtitle_al' => 'nullable|string|max:255',
            'short_description_en' => 'nullable|string',
            'short_description_mk' => 'nullable|string',
            'short_description_al' => 'nullable|string',
            'detailed_description_en' => 'nullable|string',
            'detailed_description_mk' => 'nullable|string',
            'detailed_description_al' => 'nullable|string',
            'date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'link' => 'nullable|url',
            'video' => 'nullable|mimes:mp4,webm,ogg|max:10240',
        ]);

        $news = new News();

        $news->title = [
            'en' => $request->title_en,
            'mk' => $request->title_mk,
            'al' => $request->title_al,
        ];

        $news->subtitle = [
            'en' => $request->subtitle_en,
            'mk' => $request->subtitle_mk,
            'al' => $request->subtitle_al,
        ];

        $news->short_description = [
            'en' => $request->short_description_en,
            'mk' => $request->short_description_mk,
            'al' => $request->short_description_al,
        ];

        $news->detailed_description = [
            'en' => $request->detailed_description_en,
            'mk' => $request->detailed_description_mk,
            'al' => $request->detailed_description_al,
        ];

        //  Save the image if uploaded
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news/images', 'public');
            $news->image = $imagePath;
        }

        //  Save the video if uploaded
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('news/videos', 'public');
            $news->video = $videoPath;
        }

        $news->date = $request->date;
        $news->link = $request->link;

        $news->save();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'News created successfully!');
        } 

        catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => 'An error occurred while creating the news: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
        $news = News::findOrFail($id);

        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_mk' => 'required|string|max:255',
            'title_al' => 'required|string|max:255',
            'subtitle_en' => 'nullable|string|max:255',
            'subtitle_mk' => 'nullable|string|max:255',
            'subtitle_al' => 'nullable|string|max:255',
            'short_description_en' => 'nullable|string',
            'short_description_mk' => 'nullable|string',
            'short_description_al' => 'nullable|string',
            'detailed_description_en' => 'nullable|string',
            'detailed_description_mk' => 'nullable|string',
            'detailed_description_al' => 'nullable|string',
            'date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'link' => 'nullable|url',
            'video' => 'nullable|mimes:mp4,webm,ogg|max:10240',
        ]);

        $news->title = [
            'en' => $request->title_en,
            'mk' => $request->title_mk,
            'al' => $request->title_al,
        ];

        $news->subtitle = [
            'en' => $request->subtitle_en,
            'mk' => $request->subtitle_mk,
            'al' => $request->subtitle_al,
        ];

        $news->short_description = [
            'en' => $request->short_description_en,
            'mk' => $request->short_description_mk,
            'al' => $request->short_description_al,
        ];

        $news->detailed_description = [
            'en' => $request->detailed_description_en,
            'mk' => $request->detailed_description_mk,
            'al' => $request->detailed_description_al,
        ];

        // Update image if uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }

        // store new image
            $imagePath = $request->file('image')->store('news/images', 'public');
            $news->image = $imagePath;
        }
        // Update video if uploaded
        if ($request->hasFile('video')) {
            if ($news->video && Storage::disk('public')->exists($news->video)) {
                Storage::disk('public')->delete($news->video);
            }

            // store new video
            $videoPath = $request->file('video')->store('news/videos', 'public');
            $news->video = $videoPath;
        }
        $news->date = $request->date;
        $news->link = $request->link;

        $news->save();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'News updated successfully!');

        }
        catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => 'An error occurred while updating the news: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $news = News::findOrFail($id);

            // Delete image if exists
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }

            // Delete video if exists
            if ($news->video && Storage::disk('public')->exists($news->video)) {
                Storage::disk('public')->delete($news->video);
            }

            $news->delete();

            return redirect()
                ->route('admin.news.index')
                ->with('success', 'News deleted successfully!');
        } 
        catch (\Exception $e) {
            return redirect()
                ->back()
            ->with('error', 'Failed to delete news. Please try again.');
        }
    }
}
