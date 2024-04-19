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

    public function categories($id)
    {
        $blogs = Blog::where("category_id", $id)->paginate(8);
        $category_name = Category::find($id)->name;
        return view('theme.categories', compact('blogs', 'category_name'));
    }

    public function contact()
    {
        return view('theme.contact');
    }
}
