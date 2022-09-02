<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index(){
        $category = Category::latest()->get();
        return view('category',['categories'=>$category]);
    }


    public function store(Request $request){
        $attributes = request()->validate([
            'name'=>'required|string|unique:categories,name',
            'slug'=>'required|unique:categories,slug'
        ]);

        $category = new Category();
        
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        return back();
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect('/add-category')->with('success','Category Has been deleted successfully');
    }

    public function edit(Category $category){
        return view('update_category',['category'=> $category]);
    }
    
    public function update(Category $category, Request $request){
        $atributes = request()->validate([
            'name'=>'required',
            'slug'=>'required'
        ]);

        $category->name = $request->name;
        $category->slug = $request->slug;

        $category->update();
        return redirect('/add-category')->with('success','Category Info Updated successfully');
    }
}
