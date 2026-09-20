<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

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

        $about->save();

        return redirect()
            ->route('admin.about')
            ->with('success', 'About Us content saved successfully.');
    }
}