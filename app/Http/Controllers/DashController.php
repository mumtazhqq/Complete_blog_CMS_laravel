<?php

namespace App\Http\Controllers;

use App\Post;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcome;

class DashController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

    public function get_register(){
        return view('back-end.register');
    }

    public function post_register(){

     $this->validate(request(),
         [
             'name'=>'required|unique:users',
             'email'=>'bail|required|email|unique:users',
             'password'=>'required|confirmed|min:6'
         ]);

        $user = User::create(
            [
                'name'=>request('name'),
                'email'=>request('email'),
                'password'=>Hash::make(request('password'))
        ]);

        Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'https://st3.depositphotos.com/7157796/17738/v/1600/depositphotos_177389638-stock-illustration-captain-america-vector-illustration.jpg'
        ]);

      auth()->login($user);

    return redirect()->route('home')->with('messageRNU','Welcome To Dashboard '.auth()->user()->name)
    ->with(Mail::to($user)->send(new Welcome($user)));

    }

    public function get_login(){
        return view('back-end.login');
    }

    public function post_login(){
        if (! auth()->attempt(request(['email','password']))){
            return back()->withErrors(['message'=>'please check your credantials and try again']);
        }
        session()->flash('w_back','Welcome back '.auth()->user()->name);
        return redirect()->route('home');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }


}
