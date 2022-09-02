<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Post $post, Request $request){
        request()->validate(['body'=>'required']);
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => $request->body
        ]);
        return back();
    }

    public function destroy(Comment $comment){
        if(Auth::check()){
            $comment->delete();
        }
        return back();
    }
}
