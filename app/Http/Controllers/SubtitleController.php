<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subtitle;

class SubtitleController extends Controller
{
    //
    public function store(Request $request) 
    {

        $validated = $request->validate([
            'title' => ['required'],
            'subtitle_url' => ['required'],
            'subtitleable_id' => ['required'],
            'subtitleable_type' => ['required']
        ]);

        Subtitle::create($validated);

        return redirect()
                    ->back()
                    ->withSuccess('Subtitle created successfully.');

    }

}
