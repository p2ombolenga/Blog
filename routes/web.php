<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentReplyController;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('/create-post', function () {
    return view('create-post');
})->middleware(['auth']);
Route::post('/create-post',[PostController::class,'store'])->middleware('auth');

Route::get('/',[PostController::class,'index']);
Route::get('/manage_posts',[AdminPostController::class,'index'])->middleware('auth');
Route::get('/manage_posts/{post:slug}',[AdminPostController::class,'destroy'])->middleware('auth');
Route::get('/editpost/{post:slug}',[AdminPostController::class,'edit'])->middleware('auth');
Route::post('/editpost/{post:slug}',[AdminPostController::class,'update'])->middleware('auth');

Route::get('posts/{post:slug}', function(Post $post){
    return view('post',['post'=> $post]);
    });
// posts within specific category
Route::get('/categories/{category:slug}',[CategoryPostController::class,'index']);

Route::get('/add-category',[CategoryController::class,'index'])->middleware('is_Admin');
Route::post('/add-category',[CategoryController::class,'store'])->middleware('is_Admin');
Route::get('/add-category/{category:slug}',[CategoryController::class,'destroy'])->middleware('is_Admin');
Route::get('/update_category/{category:slug}',[CategoryController::class,'edit'])->middleware('is_Admin');
Route::post('/update_category/{category:slug}',[CategoryController::class,'update'])->middleware('is_Admin');


Route::get('/personal-information/{user:id}',[UserController::class,'index']);
Route::get('/edit-personal-info/{user:id}',[UserController::class,'edit'])->middleware('auth');
Route::post('/edit-personal-info/{user:id}',[UserController::class,'update'])->middleware('auth');
Route::get('/edit-profile/{user:id}',[ProfileController::class,'edit'])->middleware('auth');
Route::post('/edit-profile/{user:id}',[ProfileController::class,'update'])->middleware('auth');

//register a user and log him or her in
Route::get('register.create',[RegisterController::class,'index'])->middleware('guest');
Route::post('register.create',[RegisterController::class,'store'])->middleware('guest');

//login a user in 
Route::get('signin',[SessionController::class,'index'])->middleware('guest');
Route::post('signin',[SessionController::class,'store'])->middleware('guest');

//record a comment
Route::post('/post/{post:slug}/comment',[CommentController::class,'store']);
//delete a comment
Route::get('/post/comment/{comment:id}',[CommentController::class,'destroy'])->middleware('auth');

// comment reply
Route::get('/post/comment/reply/{comment:id}',[CommentReplyController::class,'index'])->middleware('auth');
Route::post('/post/comment/reply/{comment:id}',[CommentReplyController::class,'store'])->middleware('auth');
Route::get('/delete/reply/{reply:id}',[CommentReplyController::class,'destroy'])->middleware('auth');


Route::get('heroicons', function(){
    return view('heroicons');
});


require __DIR__.'/auth.php';
