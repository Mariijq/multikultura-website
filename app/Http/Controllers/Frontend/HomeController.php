<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class HomeController extends Controller
{
    public function news()
    {
        $news = News::latest()->take(3)->get();
        return view('frontend.home', compact('news'));
    }
}
