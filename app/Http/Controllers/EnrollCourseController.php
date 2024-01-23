<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\EnrollCourse;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class EnrollCourseController extends Controller
{
    //
    public function store(Request $request): RedirectResponse
    {

        $course = Course::findOrFail($request->course_id);

        $enroll_course = EnrollCourse::firstOrCreate(
                        ['course_id' => $request->course_id, 'user_id' => Auth::id()],
                        ['user_id' => Auth::id()]
                    );

        return back();

    }
}
