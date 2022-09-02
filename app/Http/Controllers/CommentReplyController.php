<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Http\Request;

class CommentReplyController extends Controller
{
    public function index(Comment $comment){
        return view('reply-comment',['comment' => $comment]);
    }

    public function store(Request $request){
        request()->validate(['body' => 'required|string']);
       
        $reply = new CommentReply();
        $reply->user_id = auth()->id();
        $reply->comment_id = $request->comment;
        $reply->body = $request->body;
        $reply->save();
        return redirect('/');
    }

    public function destroy(CommentReply $reply){
        $reply->delete();
        return redirect('/');
    }
}
