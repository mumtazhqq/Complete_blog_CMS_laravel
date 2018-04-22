<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Middleware\admin;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin','auth']);
    }

    public function index()
    {
        $users = User::all();
        return view('back-end.user.index')->with('users',$users);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $user = User::findOrfail($id);
        if (auth()->user()->id === $user->id){
            $notification = ['message'=>'you cannot remove your account stupid','alert-type'=>'error'];
            return redirect()->back()->with($notification);
        }
        else{
            $user->delete();
            $notification = ['message'=>'user has been deleted','alert-type'=>'success'];
            return redirect()->back()->with('notification',$notification);
        }

    }

    public function remove_permision($id){

        $user = User::find($id);
        if ($user->id == auth()->user()->id){
            $notification = ['message'=>'you cannot remove permission for your self stupid','alert-type'=>'error'];
            return redirect()->back()->with($notification);
        }
        else {
            $user->admin = 0;
            $user->save();
            $notification = ['message' => 'permission has been deactivated', 'alert-type' => 'success'];
            return redirect()->back()->with($notification);
        }

    }

    public function make_admin($id){
        $user = User::find($id);
        $user->admin = 1;
        $user->save();
        $notification = ['message'=>'permission has been activated','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }


}
