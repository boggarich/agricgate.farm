<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterUser;

class NewsletterUserController extends Controller
{
    //
    public function store(Request $request)
    {

        $validated = $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.NewsletterUser::class],
        ]);

        NewsletterUser::create($validated);

        return back()->withSuccess('You have successfully signed up to our newsletter.');

    }
}
