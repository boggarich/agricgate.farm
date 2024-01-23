<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionAndAnswer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class QuestionAndAnswerController extends Controller
{
    //
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
}
