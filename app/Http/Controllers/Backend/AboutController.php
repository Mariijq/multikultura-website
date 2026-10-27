<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();

        return view('admin.about', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutUs::first();

        if (!$about) {
            $about = new AboutUs();
        }

        $request->validate([
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        $about->who_we_are = [
            'en' => $request->input('who_we_are_en'),
            'mk' => $request->input('who_we_are_mk'),
            'al' => $request->input('who_we_are_al'),
        ];

        $about->what_we_offer = [
            'en' => $request->input('what_we_offer_en'),
            'mk' => $request->input('what_we_offer_mk'),
            'al' => $request->input('what_we_offer_al'),
        ];

        $about->vision = [
            'en' => $request->input('vision_en'),
            'mk' => $request->input('vision_mk'),
            'al' => $request->input('vision_al'),
        ];

        $about->mission = [
            'en' => $request->input('mission_en'),
            'mk' => $request->input('mission_mk'),
            'al' => $request->input('mission_al'),
        ];

        /*
        |--------------------------------------------------------------------------
        | Hero image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('hero_image')) {

            if ($about->hero_image) {
                Storage::disk('public')->delete($about->hero_image);
            }

            $about->hero_image = $request
                ->file('hero_image')
                ->store('about-us', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Remove hero image
        |--------------------------------------------------------------------------
        */

        if ($request->boolean('remove_hero_image')) {

            if ($about->hero_image) {
                Storage::disk('public')->delete($about->hero_image);
            }

            $about->hero_image = null;
        }

        $about->save();

        return redirect()
            ->route('admin.about')
            ->with('success', 'About Us content saved successfully.');
    }
}