<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function edit(User $user){
        if(auth()->id() == $user->id){
            return view('/edit-profile',['user'=>$user]);
        }
        else{
            return abort(404);
        }
    }
    
        public function update(User $user){

            request()->validate([
                'profile_picture'=>'required|image|max:2048'
            ]);

            if(request()->has('profile_picture')){
                $destination = $user->profile_picture;
                if(File::exists(public_path($destination))){
                    unlink(public_path($destination));
                }
                $userUploadedImage = request()->file('profile_picture');
                $extension = $userUploadedImage->getClientOriginalExtension();
                $imageName = time().'.'.$extension;
                $path = public_path('/images/profile_pictures/');
                $userUploadedImage->move($path,$imageName);

                $user->profile_picture = '/images/profile_pictures/'.$imageName;
                $user->update();
                return redirect('personal-information/'.$user->id)->with('success','Profile Picture Updated Successfully');
            }           
        }
}
