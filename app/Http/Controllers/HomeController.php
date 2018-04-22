<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-end.index')
            ->with('posts_number',Post::all()->count())
            ->with('trashed_posts',Post::onlyTrashed()->get()->count())
            ->with('users_number',User::all()->count())
            ->with('tags_number',Tag::all()->count())
            ->with('categories_number',Category::all()->count());

    }
    
}
