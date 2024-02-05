<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Topic;

class LessonController extends Controller
{
    //
    public function index() {

        $lessons = Lesson::with('topic:id,title')->get();

        return view('admin.lessons.index', ['lessons' => $lessons] );

    }

    public function create() {

        $topics = Topic::all();

        return view('admin.lessons.create', ['topics' => $topics] );

    }

    public function store(Request $request) {

        $validated = $request->validate([
            'topic_id' => ['required'],
            'title' => ['required'],
            'about' => ['required'],
            'video_url' => ['nullable'],
            'featured_img_url' => ['nullable']
        ]);

        Lesson::create($validated);

        return redirect()
                ->route('admin.lessons.index')
                ->withSuccess('Lesson created successfully.');

    }

    public function edit($id) {

        $lesson = Lesson::findOrFail($id);
        $topics = Topic::all();

        return view('admin.lessons.edit', 
                    ['topics' => $topics, 'lesson' => $lesson]
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

        return redirect()->route('admin.lessons.index')
                        ->withSuccess('Lesson updated successfully.');

    }

    public function destroy($id) {

        Lesson::find($id)->delete();

        return redirect()->route('admin.lessons.index')
                            ->withSuccess('Lesson deleted successfully.');

    }

}
