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
use App\Models\CompleteLesson;

class SaveCourseProgress
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $video_duration = $request->query('plvd');
        $current_lesson_progress = $request->query('plp');

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

            if($request->query('prev-lesson')) {

                $prev_lesson = Course::find($request->course_id)
                    ->lessons()
                    ->where(function (Builder $query) use($request) {

                            return $query->find($request->query('prev-lesson'));

                    })
                    ->exists();

                if($prev_lesson) {

                    $prev_lesson_complete_status = CompleteLesson::where('user_id', Auth::id())
                                                        ->where('course_id', $request->course_id)
                                                        ->where('lesson_id', $request->query('prev-lesson'))
                                                        ->exists();

                    if(!$prev_lesson_complete_status) {


                        if( $video_duration > $current_lesson_progress ) {

                            return back()->with('status', 'Please finish this lesson by watching all the video.');

                        }

                        $prev_lesson_progress = CourseProgress::where('user_id', Auth::id())
                                            ->where('course_id', $request->course_id)
                                            ->where('lesson_id', $request->query('prev-lesson'))
                                            ->delete();

                        $prev_lesson_complete = CompleteLesson::updateOrCreate(
                            [
                                'user_id' => Auth::id(), 
                                'course_id' => $request->course_id,
                                'lesson_id' => $request->query('prev-lesson')
                            ],
                            ['lesson_id' => $request->query('prev-lesson')]
                        );


                    }

                }
                

            }

            $lesson_complete_status = CompleteLesson::where('user_id', Auth::id())
                                            ->where('course_id', $request->course_id)
                                            ->where('lesson_id', $request->lesson_id)
                                            ->exists();

            $active_lesson_query = CourseProgress::where('user_id', Auth::id())
                                        ->where('course_id', $request->course_id);

            if($active_lesson_query->exists()) {

                $active_lesson = $active_lesson_query->get();
                $active_lesson_id = $active_lesson[0]->lesson_id;

                $active_lesson_complete_exists = CompleteLesson::where('user_id', Auth::id())  
                                                ->where('course_id', $request->course_id)
                                                ->where('lesson_id', $active_lesson_id)
                                                ->exists();

                if(!$lesson_complete_status)
                {
                    
                    if(!$active_lesson_complete_exists) {

                        if($active_lesson_id != $request->lesson_id) {
                            
                            abort(404);

                        }

                    }
                }

            }

            if(!$lesson_complete_status) {

                $course_progress = CourseProgress::updateOrCreate(
                    ['user_id' => Auth::id(), 'course_id' => $request->course_id],
                    ['course_id' => $course->id, 'lesson_id' => $request->lesson_id],
                );

            }

        }

        else {

            abort(404);

        }

        return $next($request);

    }
}
