<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;


class FrontendController  extends Controller
{

    public function index(){

        return view('front-end.index')
            ->with('categories',Category::take(15)->get())
            ->with('tags',Tag::take(10)->get())
            ->with('posts',Post::orderBy('created_at','desc')->paginate(5));
    }

    public function single($slug){

        $post = Post::where('slug',$slug)->first();

        $previous_id = Post::where('id','<',$post->id)->max('id');
        $next_id = Post::where('id','>',$post->id)->min('id');

        $previous = Post::find($previous_id);
        $next = Post::find($next_id);


        return view('front-end.single',compact('post',$post))
             ->with('previous',$previous)
             ->with('next',$next);
    }

    public function category($slug){

        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts;
        return view('front-end.category')
            ->with('category',$category)
            ->with('tags',Tag::take(10)->get())
            ->with('posts',$posts)
            ->with('categories',Category::take(10)->get())
            ->with('tags',Tag::all());
    }

    public function tag($slug){

        $tag = Tag::where('slug',$slug)->first();
        $posts = $tag->posts;
        return view('front-end.tag')
            ->with('tag',$tag)
            ->with('posts',$posts)
            ->with('categories',Category::take(10)->get())
            ->with('tags',Tag::take(10)->get());

    }

    public function search(){

        $posts = Post::where('title','LIKE','%'.request('query').'%')->get();
        return view('front-end.search')
            ->with('posts',$posts)
            ->with('query',request('query'));
    }
}
