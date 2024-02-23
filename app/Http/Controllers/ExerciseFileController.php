<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExerciseFile;
use App\Models\Lesson;

class ExerciseFileController extends Controller
{
    //
    public function index() 
    {

        $exercise_files = ExerciseFile::with('lesson:id,title')->get();

        return view('admin.exercise-files.index', 
                    ['exercise_files' => $exercise_files]
                );

    }

    public function create()
    {

        $lessons = Lesson::all();

        return view('admin.exercise-files.create', [
                    'lessons' => $lessons
                ]);

    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'lesson_id' => ['required'],
            'title' => ['required'],
            'file_url' => ['required'],
        ]);

        ExerciseFile::create($validated);

        return redirect()
                ->route('admin.exercise-files.index')
                ->withSuccess('Exercise file created successfully.');

    }

    public function edit($id) {

        return abort(404);

    }

    public function update(Request $request, $id) {

        return abort(404);

    }

    public function destroy($id) {

        ExerciseFile::find($id)->delete();

        return redirect()->route('admin.exercise-files.index')
                            ->withSuccess('Exercise file deleted successfully.');

    }
}
