<?php

namespace App\Http\Controllers;

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

     auth()->login($user);

     Mail::to($user)->send(new Welcome($user));

    return redirect('/dash')->with('messageRNU','Welcome To Dashboard !!! ');

    }

    public function get_login(){
        return view('back-end.login');
    }

    public function post_login(){
        if (! auth()->attempt(request(['email','password']))){
            return back()->withErrors(['message'=>'please check your credantials and try again']);
        }
        session()->flash('w_back','Welcome back');
        return redirect('/dash');
    }

    public function logout(){
        auth()->logout();
        return Redirect('/dash');
    }








}
