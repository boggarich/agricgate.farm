<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    //
    public function store(Request $request) 
    {

        $request->validate([
            'comment_id' => ['required'],
            'reply' => ['required']
        ]);

        $comment = Comment::findOrFail($request->comment_id);

        $reply = Reply::create([

            'user_id' => Auth::id(),
            'comment_id' => $request->comment_id,
            'reply' => $request->reply

        ]);

        return ['data' => $reply, 'user' => Auth::user()->name];
    }
}
