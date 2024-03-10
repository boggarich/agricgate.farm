<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Topic;
use App\Models\Announcement;
use App\Models\QuestionAndAnswer;
use App\Models\Locale;
use App\Models\Video;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CourseController extends Controller
{
    //
    public function index() {

        $courses = Course::with('category:id,title')
                        ->with('featured:id,course_id')
                        ->select('id', 'category_id', 'title', 'description', 'published_at')
                        ->get();

        return view('admin.courses.index')
                    ->with(['courses' => $courses]);

    }

    public function show($course) {

        $course_id = $course;

        $course = Course::with('subtitles:subtitleable_id,title,subtitle_url')
                            ->with(['video' => function(Builder $query){

                                $query->where('locale', 'en')
                                        ->select('id', 'videoable_id', 'video_url');

                            }])
                            ->with('media_tracker:media_trackerable_id,media_tracker_url')
                            ->findOrFail($course);

        $topics = Topic::where('course_id', $course_id)
                        ->with('lessons:id,title,topic_id')
                        ->get();

        $announcements = Announcement::where('course_id', $course->id)->get();

        $questions = QuestionAndAnswer::with('user:id,name,profile_img_url')
                                        ->where('course_id', $course->id)
                                        ->select('question', 'answer', 'course_id', 'user_id', 'updated_at')
                                        ->get();

        return view('admin.courses.show')
                ->with('course', $course)
                ->with('topics', $topics)
                ->with('announcements', $announcements)
                ->with('question_and_answers', $questions);

    }

    public function unpublish(Request $request, $course_id) {

        Course::findOrFail($course_id);
        
        Course::where('id', $course_id)->update([
            'published_at' => NULL
        ]);

        if($request->query('page') == 'course_page') {

            return redirect()->route('admin.courses.show', ['course' => $course_id])
                        ->withSuccess('Course unpublished successfully.');

        }

        return redirect()->route('admin.courses.index')
                    ->withSuccess('Course unpublished successfully.');

    }

    public function publish(Request $request, $course_id) {

        Course::findOrFail($course_id);
        
        Course::where('id', $course_id)->update([
            'published_at' => Carbon::now()
        ]);

        if($request->query('page') == 'course_page') {

            return redirect()->route('admin.courses.show', ['course' => $course_id])
                        ->withSuccess('Course published successfully.');

        }

        return redirect()->route('admin.courses.index')
                    ->withSuccess('Course published successfully.');

    }

    public function create() {

        $categories = Category::all();
        $locales = Locale::all();

        return view('admin.courses.create', [
            'categories' => $categories,
            'locales' => $locales
        ]);

    }

    public function store(Request $request) {

        $validated_course_details = $request->validate([
            'category_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'about' => ['required'],
            'what_will_you_learn' => ['required'],
            'featured_img_url' => ['required'],
            'hours' => ['required'],
            'mins' => ['required'],
            'secs' => ['required'],
        ]);

        $course = Course::create($validated_course_details);

        if ($request->filled('video_urls')) {
            
            foreach($request->video_urls as $video_url) 
            {
                if(!( explode("::", $video_url)[1] == '' )) {

                    Video::create([
                        'locale' => explode('::', $video_url)[0],
                        'videoable_id' => $course->id,
                        'videoable_type' => 'App\Models\Course',
                        'video_url' => explode('::', $video_url)[1]
                    ]);

                }

            }

        }

        return redirect()
                ->route('admin.courses.index')
                ->withSuccess('Course created successfully.');

    }

    public function edit($id) {

        $course = Course::with('videos:id,videoable_id,video_url,locale')->findOrFail($id);
        $categories = Category::all();
        $locales = Locale::all();

        return view('admin.courses.edit', 
                    [
                        'categories' => $categories, 
                        'course' => $course,
                        'locales' => $locales
                    ]
                );

    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'category_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'about' => ['required'],
            'what_will_you_learn' => ['required'],
            'featured_img_url' => ['nullable'],
            'hours' => ['required'],
            'mins' => ['required'],
            'secs' => ['required'],
        ]);

        Course::where('id', $id)->update($validated);

        if ($request->filled('video_urls')) {
            
            foreach($request->video_urls as $video_url) 
            {

                if(!( explode("::", $video_url)[1] == '' )) {

                    Video::updateOrCreate(
                                [
                                    'videoable_id' => $id, 
                                    'locale' => explode('::', $video_url)[0],
                                    'videoable_type' => 'App\Models\Course'
                                ],
                                [
                                    'video_url' => explode('::', $video_url)[1]
                                ]
                            );

                }

            }

        }

        return redirect()->route('admin.courses.index')
                        ->withSuccess('Course updated successfully.');

    }

    public function destroy($id) {

        Course::find($id)->delete();

        return redirect()->route('admin.courses.index')
                            ->withSuccess('Course deleted successfully.');

    }

}
