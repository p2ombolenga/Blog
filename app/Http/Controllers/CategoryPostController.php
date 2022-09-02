<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CategoryPostController extends Controller
{
    public function index(Category $category){
        return view('category_posts',['posts'=>$category->posts]);
    }
}
