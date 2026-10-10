<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\AboutUs;
use App\Models\Projects;
use App\Models\Publications;
use App\Models\Contact;
use App\Models\Partner;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::latest()->take(3)->get();

        $about = AboutUs::first();

        $projects = Projects::latest()->take(8)->get();

        return view('frontend.home', compact('news', 'about', 'projects'));
    }
    public function projects()
    {
        $projects = Projects::latest('date')->paginate(8);

        return view('frontend.all-projects', compact('projects'));
    }
    public function publications()
    {
        $publications = Publications::latest('date')->paginate(8);

        return view('frontend.all-publications', compact('publications'));
    }
    public function news()
    {
        $news = News::latest('date')->paginate(8);

        return view('frontend.all-news', compact('news'));
    }

    public function contact()
    {
        $contact = Contact::first();
        return view('frontend.contact', compact('contact'));
    }
    
    public function about()
    {
        $about = AboutUs::first();

        return view('frontend.about-us', compact('about'));
    }

    public function partners()
    {
        $partners = Partner::latest()->paginate(8);

        return view('frontend.all-partners', compact('partners'));

    }

}
