<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionAndAnswer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class QuestionAndAnswerController extends Controller
{
    //
    public function index() {

        $questions = QuestionAndAnswer::with('user:id,name,email')->get();

        return view('admin.questions.index', [ 'questions' => $questions ]);

    }

    public function store_question(Request $request)
    {

        $request->validate([
            'question' => ['required']
        ]);

        $question = QuestionAndAnswer::create([
            'course_id' => $request->course_id,
            'user_id' => Auth::id(),
            'question' => $request->question,
        ]);

        return ['data' => $question, 'user' => Auth::user()->name];

    }

    public function edit($id) {

        $question = QuestionAndAnswer::with('user:id,name,profile_img_url')->findOrFail($id);

        return view('admin.questions.edit', [ 'question' => $question ]);


    }
 
    public function update(Request $request, $id) {

        $validated = $request->validate([
            'question' => ['required'],
            'answer' => ['required']
        ]);

        QuestionAndAnswer::where('id', $id)->update($validated);

        return redirect()->route('admin.questions.index')
                        ->withSuccess('Question updated successfully.');

    }

}
