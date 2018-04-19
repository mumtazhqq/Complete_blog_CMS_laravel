<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{


    public function show_profile()
    {
        return view('back-end.user.profile')->with('user',Auth::user());
    }

    public function update_profile(userRequest $request){

        $user = Auth::user();

        if ($request->hasFile('imagepath')) {
            $image = $request->imagepath;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/avatars/', $image_new_name);
            $user->profile->avatar = '/uploads/avatars/' . $image_new_name;
            $user->profile->save();
        }

        $user->name = $request->name;
        $user->email= $request->email;
        $user->profile->github_url =$request->github;
        $user->profile->twitter_url =$request->twitter;
        $user->profile->description =$request->description;

        $current_password = $user->password;

        if(\Hash::check($request->current_password, $current_password))
        {
            if ($request->has('password')){
                $user->password = bcrypt($request->password);
                $user->save();
            }
        }
        else
        {
            $notification = ['message'=>'Please enter your current password','alert-type'=>'error'];
            return redirect()->back()->with($notification);
        }
        $user->save();
        $user->profile->save();

        $notification = ['message'=>'your profile has been updated','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }

}
