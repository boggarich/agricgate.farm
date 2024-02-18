<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeaturedCourse;
use App\Models\Course;

class FeaturedCourseController extends Controller
{
    //
    public function destroy(Request $request, $course_id) {

        Course::findOrFail($course_id);
        
        FeaturedCourse::where('course_id', $course_id)->delete();

        return redirect()->route('admin.courses.index')
                    ->withSuccess('Course unfeatured successfully.');

    }

    public function store(Request $request) {

        Course::findOrFail($request->course_id);

        $validated = $request->validate([
            'course_id' => ['required'],
        ]);
        
        FeaturedCourse::firstOrCreate($validated);

        return redirect()->route('admin.courses.index')
                    ->withSuccess('Course featured successfully.');

    }

}
