<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;

class CourseController extends Controller
{
    //
    public function index() {

        $courses = Course::with('category:id,title')
                        ->select('id', 'category_id', 'title', 'description')
                        ->get();

        return view('admin.courses.index')
                    ->with(['courses' => $courses]);

    }

    public function create() {

        $categories = Category::all();

        return view('admin.courses.create', ['categories' => $categories]);

    }

    public function store(Request $request) {

        $validated = $request->validate([
            'category_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'about' => ['required'],
            'what_will_you_learn' => ['required'],
            'video_url' => ['nullable'],
            'featured_img_url' => ['nullable']
        ]);

        Course::create($validated);

        return redirect()
                ->route('admin.courses.index')
                ->withSuccess('Course created successfully.');

    }

    public function edit($id) {

        $course = Course::findOrFail($id);
        $categories = Category::all();

        return view('admin.courses.edit', 
                    ['categories' => $categories, 'course' => $course]
                );

    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'category_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'about' => ['required'],
            'what_will_you_learn' => ['required'],
            'video_url' => ['nullable'],
            'featured_img_url' => ['nullable']
        ]);

        Course::where('id', $id)->update($validated);

        return redirect()->route('admin.courses.index')
                        ->withSuccess('Course updated successfully.');

    }

    public function destroy($id) {

        Course::find($id)->delete();

        return redirect()->route('admin.courses.index')
                            ->withSuccess('Course deleted successfully.');

    }

}
