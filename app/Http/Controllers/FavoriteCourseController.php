<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoriteCourse;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class FavoriteCourseController extends Controller
{
    //
    public function store(Request $request) {

        $course = Course::findOrFail($request->course_id);

        $favorite_course = FavoriteCourse::firstOrCreate(
                    ['course_id' => $request->course_id],
                    ['user_id' => Auth::id()]
                );

        return [ 'data' => $favorite_course ];

    }

}
