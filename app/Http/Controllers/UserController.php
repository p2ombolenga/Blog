<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(User $user){
        return view('personal-info',['user'=>$user]);
    }

    public function edit(User $user){
        if(auth()->id() == $user->id){
            return view('edit-personal-info',['user'=>$user]);
        }
        return back()->with('status','Attempt to Update Other user\'s information');
    }
    public function update(User $user){

        $attributes = request()->validate([
            'name'=>['required', Rule::unique('users','name')->ignore($user)],
            'email'=>['required', Rule::unique('users','email')->ignore($user)],
        ]);
        $user->update($attributes);
        return redirect('personal-information/'.$user->id)->with('success','Your Personal Information Updated Successful');

    }
}
