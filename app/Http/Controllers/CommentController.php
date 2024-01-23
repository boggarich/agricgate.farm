<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;

class CommentController extends Controller
{
    //
    public function store(Request $request) 
    {

        $request->validate([
            'lesson_id' => ['required'],
            'comment' => ['required']
        ]);

        $lesson = Lesson::findOrFail($request->lesson_id);

        $comment = Comment::create([

            'user_id' => Auth::id(),
            'lesson_id' => $request->lesson_id,
            'comment' => $request->comment

        ]);

        return ['data' => $comment, 'user' => Auth::user()->name];
    }
}
