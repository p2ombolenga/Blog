<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(){
        return view('signin');    
    }

    public function store(Request $request){
        request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

    if(auth()->attempt($request->only('email','password'),$request->remember)){
        session()->regenerate();
        return redirect('/');
    }
    else{
        return back()->with('status','Invalid login information');
    }
}
}