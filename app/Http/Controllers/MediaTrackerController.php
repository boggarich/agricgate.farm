<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaTracker;

class MediaTrackerController extends Controller
{
    //
     //
     public function store(Request $request) 
     {
 
         $validated = $request->validate([
             'media_tracker_url' => ['required'],
             'media_trackerable_id' => ['required'],
             'media_trackerable_type' => ['required']
         ]);
 
         MediaTracker::updateOrCreate(

            ['media_trackerable_id' => $validated['media_trackerable_id']],
            $validated

        );
 
         return redirect()
                     ->back()
                     ->withSuccess('Media Tracker created successfully.');
 
     }
}
