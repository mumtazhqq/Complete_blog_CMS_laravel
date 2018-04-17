<?php

namespace App\Http\Controllers;

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

    public function update_profile(){
        $this->validate(request(),
            [
                'name'=>'required|',
                'email'=>'bail|required|email',
                'github'=>'required',
                'twitter'=>'required',
                'password'=>'confirmed',
                'imagepath'=>'image|max:1999',
                'description'=>'required|max:200'
            ]);

        $user = Auth::user();

        if (\request()->hasFile('imagepath')) {
            $image = request('imagepath');
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/avatars/', $image_new_name);
            $user->profile->avatar = '/uploads/avatars' . $image_new_name;
            $user->profile->avatar->save();
        }
        $user->name = \request('name');
        $user->email= \request('email');
        $user->profile->github_url =\request('github');
        $user->profile->twitter_url =\request('twitter');
        $user->profile->description =\request('description');

        if (\request()->has('password')){
            $user->password = bcrypt(\request('password'));
            $user->save();
        }
        $user->profile->save();
        $user->save();
        $notification = ['message'=>'post has been updated','alert-type'=>'error'];
        return redirect()->back()->with('notification',$notification);
    }

}
