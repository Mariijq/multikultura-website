<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Projects;
use App\Models\Publications;

class SearchController extends Controller
{
        public function index(Request $request)
    {
        $query = trim($request->input('search', ''));

        $news = collect();
        $projects = collect();
        $publications = collect();

        if ($query !== '') {

            $locale = app()->getLocale();

            /*
            |--------------------------------------------------------------------------
            | News
            |--------------------------------------------------------------------------
            */

            $news = News::query()
                ->where("title->$locale", 'like', "%{$query}%")
                ->orWhere("short_description->$locale", 'like', "%{$query}%")
                ->orWhere("detailed_description->$locale", 'like', "%{$query}%")
                ->latest('date')
                ->get();


            /*
            |--------------------------------------------------------------------------
            | Projects
            |--------------------------------------------------------------------------
            */

            $projects = Projects::query()
                ->where("title->$locale", 'like', "%{$query}%")
                ->orWhere("short_description->$locale", 'like', "%{$query}%")
                ->orWhere("detailed_description->$locale", 'like', "%{$query}%")
                ->latest('date')
                ->get();


            /*
            |--------------------------------------------------------------------------
            | Publications
            |--------------------------------------------------------------------------
            */

            $publications = Publications::query()
                ->where("title->$locale", 'like', "%{$query}%")
                ->orWhere("short_description->$locale", 'like', "%{$query}%")
                ->orWhere("detailed_description->$locale", 'like', "%{$query}%")
                ->latest('date')
                ->get();
        }

        return view('frontend.search', compact(
            'query',
            'news',
            'projects',
            'publications'
        ));
    }
}
