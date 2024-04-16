<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $req)
    {
        $validation = $req->validate([
            'name' => ['required', 'min:2', 'max:25', 'string'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'min:7', 'max:35', 'string'],
        ]);

        Contact::create($validation);

        return back()->with('contact-status', 'Your contact has been sent successfully');
    }
}
