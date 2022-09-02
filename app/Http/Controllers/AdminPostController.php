<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
class AdminPostController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        return view('manage_posts',['posts'=>$posts]);
    }


    public function edit(Post $post){
        if(auth()->id() == $post->user_id){
            return view('/editpost',['posts'=>$post]);
        }
        else{
            return abort(404);
        }
    }

    public function update(Post $post, Request $request){
        request()->validate([
            'title'=>'required',
            'slug'=>'required',
            'excerpt'=>'required',
            'image'=>'image|max:2048',
            'body'=>'required',
            'category_id'=>['required',Rule::exists('categories','id')]
        ]);


        if(request()->has('image')){
            $destination = $post->image;
            if(File::exists(public_path($destination))){
                unlink(public_path($destination));
            }
            $postUploaded = request()->file('image');
            $postImageName = time().'.'.$postUploaded->getClientOriginalExtension();
            $postPath = public_path('/images/post/');
            $postUploaded->move($postPath,$postImageName);
            
            $postImage = '/images/post/'.$postImageName;
        }
        else{
            $postImage = $post->image;
        }
        $post = Post::find($post->id);
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->slug = $request->slug;
        $post->image = $postImage;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->update();
        return redirect('/manage_posts')->with('success','Post Updated Successfully');
    }
    public function destroy(Post $post){
        $destination = $post->image;
        if(File::exists(public_path($destination))){
            unlink(public_path($destination));
        }
        $post->delete();
        return back()->with('success','Post Deleted SUccessfully');
    }
}
