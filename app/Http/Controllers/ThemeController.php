<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function home()
    {
        $blogs = Blog::paginate(4);
        return view('theme.home', compact('blogs'));
    }

    public function categories()
    {
        return view('theme.categories');
    }

    public function contact()
    {
        return view('theme.contact');
    }

    public function blog()
    {
        return view('theme.blog');
    }
}
