<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function home()
    {
        return view('theme.home');
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

    public function login()
    {
        return view('theme.login');
    }

    public function register()
    {
        return view('theme.register');
    }
}
