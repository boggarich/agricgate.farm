<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Course;

class TopicController extends Controller
{
    //
    public function index() {

        $topics = Topic::with('course:id,title')->get();

        return view('admin.topics.index', ['topics' => $topics]);

    }

    public function create() {

        $courses = Course::all();

        return view('admin.topics.create', ['courses' => $courses]);

    }

    public function store(Request $request) {

        $validated = $request->validate([
            'course_id' => ['required'],
            'title' => ['required'],
        ]);

        Topic::create($validated);

        return redirect()
                ->route('admin.topics.index')
                ->withSuccess('Topic created successfully.');
    }

    public function edit($id) {

        $topic = Topic::findOrFail($id);
        $courses = Course::all();

        return view('admin.topics.edit', 
                    ['courses' => $courses, 'topic' => $topic]
                );

    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'course_id' => ['required'],
            'title' => ['required'],
        ]);

        Topic::where('id', $id)->update($validated);

        return redirect()->route('admin.topics.index')
                        ->withSuccess('Topic updated successfully.');

    }

    public function destroy($id) {

        Topic::find($id)->delete();

        return redirect()->route('admin.topics.index')
                            ->withSuccess('Topic deleted successfully.');

    }

}
