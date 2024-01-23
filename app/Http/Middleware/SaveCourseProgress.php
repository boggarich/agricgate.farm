<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\CourseProgress;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Database\Eloquent\Builder;

class SaveCourseProgress
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $course = Course::findOrFail($request->course_id);

        if($request->lesson_id) {
            
            $lesson = Course::find($request->course_id)
                            ->lessons()
                            ->where(function (Builder $query) use($request) {

                                    return $query->find($request->lesson_id);

                            })
                            ->exists();

            if(!$lesson) {

                abort(404);

            }


        }

        $course_progress = CourseProgress::updateOrCreate(
                                ['user_id' => Auth::id(), 'course_id' => $request->course_id],
                                ['course_id' => $course->id, 'lesson_id' => $request->lesson_id],
                            );


        return $next($request);

    }
}
