<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseProgress;
use Illuminate\Support\Facades\Auth;

class CourseProgressController extends Controller
{
    //
    public function start_learning(Request $request) {

        $course_progress = CourseProgress::updateOrCreate(
                                ['user_id' => Auth::id(), 'course_id' => $request->course_id],
                                ['course_id' => $request->course_id, 'lesson_id' => $request->lesson_id],
                            );

        
        return redirect()->route('lesson-page', 
                            [
                                'course_id' => $request->course_id,
                                'lesson_id' => $request->lesson_id
                            ]
                        );
    }

}
