<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeaturedCourse;
use App\Models\Category;
use App\Models\Course;
use App\Models\Topic;
use App\Models\Announcement;
use App\Models\QuestionAndAnswer;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\EnrollCourse;
use App\Models\FavoriteCourse;
use App\Models\Blog;

class ViewsController extends Controller
{
    //
    public function index() {

        $blogs = Blog::limit(5)->latest()->get();

        $featured_courses = FeaturedCourse::withWhereHas('course',

            function(Builder $query) {

                $query->select('id', 'title', 'description', 'featured_img_url')
                ->whereNotNull('published_at');

            }

        )->get();

        $categories = Category::all();


        return view('frontend.landing-page')
                ->with('blogs', $blogs)
                ->with('featured_courses', $featured_courses)
                ->with('categories', $categories);

    }

    public function blogs(Request $request) {

        $blogs = Blog::all();

        return view('frontend.blogs')->with('blogs', $blogs );

    }

    public function blog(Request $request) {

        $blog = Blog::findOrFail($request->blog_id);

        $recommended_blogs = Blog::whereNot('id', $request->blog_id)
                                    ->limit(8)
                                    ->inRandomOrder()
                                    ->get();

        return view('frontend.blog')
                    ->with('blog', $blog )
                    ->with('recommended_blogs', $recommended_blogs);

    }

    public function account() {

        $favorite_courses = FavoriteCourse::where('user_id', Auth::id())
                                ->select('id', 'course_id')
                                ->with(['course' => function(Builder $query) {

                                    $query->select('id','title', 'description', 'featured_img_url')
                                            ->withCount([
                                                'lessons',
                                                'complete_lessons' => function(Builder $query) {
                                                    
                                                    $query->where('user_id', Auth::id());

                                                }
                                            ])
                                            ->with(['course_progress' => function(Builder $query) {

                                                $query->where('user_id', Auth::id());
            
                                            }]);

                                }])->get();
                                

        $histories = EnrollCourse::where('user_id', Auth::id())
                        ->select('course_id')
                        ->with(['course' => function(Builder $query) {

                            $query->select('id','title', 'description', 'featured_img_url')
                                    ->withCount([
                                        'lessons',
                                        'complete_lessons' => function(Builder $query) {
                                            
                                            $query->where('user_id', Auth::id());

                                        }
                                    ]);

                        }])
                        ->with(['course_progress' => function(Builder $query) {

                            $query->where('user_id', Auth::id());

                        }])
                        ->get();

        // return $favorite_courses;

        return view('frontend.account')
                ->with('favorite_courses', $favorite_courses)
                ->with('histories', $histories);

    }

    public function explore(Request $request) {

        $course_categories = Category::select('id', 'title')->get();


        if($request->course_category_id) {

            $category = Category::findOrFail($request->course_category_id);

            $courses = Course::select('id', 'title', 'description', 'featured_img_url')
                                ->where('category_id', $request->course_category_id)
                                ->whereNotNull('published_at')
                                ->get();

        }

        else {

            $courses = Course::select('id', 'title', 'description', 'featured_img_url')
                                ->whereNotNull('published_at')
                                ->get();

        }

        return view('frontend.explore')
                    ->with('courses', $courses)
                    ->with('course_categories', $course_categories);

    }

    public function lesson(Request $request) {

        $progress_percent = '';
        $comments = '';
        $lesson = '';
        $lessons_count = '';
        $complete_lessons_count = '';

        $course = Course::findOrFail($request->course_id);
        
        $topics = Topic::with([

                                'lessons' => [
                                    'complete_status' => function(Builder $query) {

                                        $query->where('user_id', Auth::id())
                                            ->select('lesson_id', 'user_id');

                                    }
                                ]

                            ])
                            ->where('course_id', $request->course_id)
                            ->select('id', 'title', 'course_id')
                            ->withCount('lessons')
                            ->withCount(['complete_lessons' => function(Builder $query) {

                                $query->where('user_id', Auth::id());

                            }])
                            ->get();

        $lessons_count = Course::withCount('lessons')
                            ->find($request->course_id)
                            ->lessons_count; 
                            
        $complete_lessons_count = Course::withCount([

                                            'complete_lessons' => function(Builder $query) {

                                                $query->where('user_id', Auth::id());

                                            }

                                    ])
                                    ->find($request->course_id)
                                    ->complete_lessons_count;

        if($lessons_count) {

            $progress_percent = round(( $complete_lessons_count / $lessons_count ) * 100);

        }

        else {

            $progress_percent = 0;

        }
        
        if($request->lesson_id) {

            $lesson = Lesson::findOrFail($request->lesson_id);

            $comments = Course::find($request->course_id)
                            ->lessons()
                            ->with([

                                'comments' => [
                                    'user:id,name,profile_img_url',
                                    'replies.user:id,name'
                                ]
                                
                            ])
                            ->find($request->lesson_id);

            if($comments) {

                $comments = $comments->comments;

            }
            else {
                $comments = [];
            };

            $lesson = Course::find( $request->course_id )
                            ->lessons()
                            ->with('exercise_files')
                            ->with([
                                'media_tracker:media_trackerable_id,media_tracker_url',
                                'subtitles:subtitleable_id,title,subtitle_url',
                                'complete_status' => function(Builder $query) {

                                    $query->where('user_id', Auth::id())->select('lesson_id', 'user_id');

                                }
                            
                            ])
                            ->with([

                                'active_status' => function(Builder $query) {

                                    $query->where('user_id', Auth::id())->select('lesson_id');

                                }

                            ])
                            
                            ->find( $request->lesson_id );

        }

        // return $lesson;

        return view('frontend.lesson')
                ->with('comments', $comments)
                ->with('course_id', $course->id)
                ->with('progress_percent', $progress_percent)
                ->with('complete_lessons_count', $complete_lessons_count)
                ->with('lessons_count', $lessons_count)
                ->with('course_title', $course->title)
                ->with('active_lesson', $lesson)
                ->with('topics', $topics);

    }

    public function course(Request $request) {

        $course_id = $request->course_id;

        $course = Course::with('subtitles:subtitleable_id,title,subtitle_url')
                            ->with('media_tracker:media_trackerable_id,media_tracker_url')
                            ->whereNotNull('published_at')
                            ->findOrFail($course_id);

        $lessons_count = Course::withCount('lessons')
                                    ->find($request->course_id)
                                    ->lessons_count;

        $complete_lessons_count = Course::withCount([
                                        'complete_lessons' => function(Builder $query) {

                                            $query->where('user_id', Auth::id());

                                        }
                                    ])
                                    ->find($request->course_id)
                                    ->complete_lessons_count;

        $topics = Topic::where('course_id', $course_id)
                        ->with('lessons:id,title,topic_id')
                        ->get();

        $recommended_courses = Course::select('id', 'title', 'description', 'featured_img_url')
                                        ->where('category_id', $course->category_id)
                                        ->whereNot('id', $course_id)
                                        ->whereNotNull('published_at')
                                        ->inRandomOrder()
                                        ->limit(5)
                                        ->get();

        $announcements = Announcement::where('course_id', $course->id)->get();

        $questions = QuestionAndAnswer::with('user:id,name,profile_img_url')
                                        ->where('course_id', $course->id)
                                        ->select('question', 'answer', 'course_id', 'user_id', 'updated_at')
                                        ->get();

        // return $course;

        return view('frontend.course')
                ->with('lessons_count', $lessons_count)
                ->with('complete_lessons_count', $complete_lessons_count)
                ->with('course', $course)
                ->with('topics', $topics)
                ->with('recommended_courses', $recommended_courses)
                ->with('announcements', $announcements)
                ->with('question_and_answers', $questions);

    }
    
}
