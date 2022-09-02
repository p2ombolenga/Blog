<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        // $posts = Post::latest()->filter();
       
        return view('posts',['posts'=> Post::latest()->filter(request(['search']))->get()]);
    }
    public function store(Request $request){


        $attributes = request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'image'=>'required|image',
            'slug'=>['required', Rule::unique('posts','slug')],
            'body'=>'required',
            'category_id'=>['required', Rule::exists('categories','id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['published_at'] = now();

        // DB::transaction(function() use($request){
            if(request()->has('image')){
                $postUploaded = request()->file('image');
                $postImageName = time().'.'.$postUploaded->getClientOriginalExtension();
                $postPath = public_path('/images/post/');
                $postUploaded->move($postPath,$postImageName);

                $post = new Post();
                $post->title = $request->title;
                $post->excerpt = $request->excerpt;
                $post->image = '/images/post/'.$postImageName;
                $post->slug = $request->slug;
                $post->body = $request->body;
                $post->user_id = auth()->user()->id;
                $post->category_id = $request->category_id;
                $post->save();
                return Redirect('/manage_posts');
            }
            // return true;
        // });
        
    //    Post::create($attributes);
    //     return redirect('manage_posts');
    }
}
