<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Topic;
use App\Models\Locale;
use App\Models\Video;

class LessonController extends Controller
{
    //
    public function index() {

        $lessons = Lesson::with('topic:id,title')->get();

        return view('admin.lessons.index', ['lessons' => $lessons] );

    }

    public function create() {

        $topics = Topic::all();
        $locales = Locale::all();

        return view('admin.lessons.create', 
                    [
                        'topics' => $topics,
                        'locales' => $locales
                    ] 
        );

    }

    public function store(Request $request) {

        $validated = $request->validate([
            'topic_id' => ['required'],
            'title' => ['required'],
            'about' => ['required'],
            'video_url' => ['nullable'],
            'featured_img_url' => ['nullable']
        ]);

        $lesson = Lesson::create($validated);

        if ($request->filled('video_urls')) {
            
            foreach($request->video_urls as $video_url) 
            {
                if(!( explode("::", $video_url)[1] == '' )) {

                    Video::create([
                        'locale' => explode('::', $video_url)[0],
                        'videoable_id' => $lesson->id,
                        'videoable_type' => 'App\Models\Lesson',
                        'video_url' => explode('::', $video_url)[1]
                    ]);

                }

            }

        }

        return redirect()
                ->route('admin.lessons.index')
                ->withSuccess('Lesson created successfully.');

    }

    public function edit($id) {

        $lesson = Lesson::with('videos:id,videoable_id,video_url,locale')->findOrFail($id);
        $topics = Topic::all();
        $locales = Locale::all();

        return view('admin.lessons.edit', 
                    [
                        'topics' => $topics, 
                        'lesson' => $lesson,
                        'locales' => $locales
                    ]
                );

    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'topic_id' => ['required'],
            'title' => ['required'],
            'about' => ['required'],
            'video_url' => ['nullable'],
            'featured_img_url' => ['nullable']
        ]);

        Lesson::where('id', $id)->update($validated);

        if ($request->filled('video_urls')) {
            
            foreach($request->video_urls as $video_url) 
            {

                if(!( explode("::", $video_url)[1] == '' )) {

                    Video::updateOrCreate(
                                [
                                    'videoable_id' => $id, 
                                    'locale' => explode('::', $video_url)[0],
                                    'videoable_type' => 'App\Models\Lesson'
                                ],
                                [
                                    'video_url' => explode('::', $video_url)[1]
                                ]
                            );

                }

            }

        }

        return redirect()->route('admin.lessons.index')
                        ->withSuccess('Lesson updated successfully.');

    }

    public function destroy($id) {

        Lesson::find($id)->delete();

        return redirect()->route('admin.lessons.index')
                            ->withSuccess('Lesson deleted successfully.');

    }

}
