<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){

        $attributes = request()->validate([
            'name'=>'required|unique:users,name',
            'email'=>'required|email|max:2083|unique:users,email',
            'password'=>'required|confirmed|min:8',
            'profile_picture'=>'required|image'
        ]);
        // easy password hashing method
        // $attributes['password'] = bcrypt($attributes['password']);
        if(request()->has('profile_picture')){
            $userUploadedImage = request()->file('profile_picture');
            $extension = $userUploadedImage->getClientOriginalExtension();
            $imageName = time().'.'.$extension;
            $path = public_path('/images/profile_pictures/');
            $userUploadedImage->move($path,$imageName);
            $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->profile_picture = '/images/profile_pictures/'.$imageName;
                $user->password = $request->password;
                $user->save();
                // Mail::to($user)->send(new Welcome($user));
            auth()->login($user);
            return redirect('/');
        }
    }
}
