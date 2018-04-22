<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        return view('back-end.posts.all_posts')->with('posts',Post::latest()->paginate(5));
    }


    public function create()
    {
       $categories = Category::all();
       $tags = Tag::all();
        if (count($categories) == 0){
            $notification = ['message'=>'please add a category to add new post ','alert-type'=>'info'];
            return redirect()->back()->with($notification);
        }
        return view('back-end.posts.new_post',compact('categories',$categories))->with('tags',$tags);
    }


    public function store()
    {
        $this->validate(request(),
        [
            'title'=>'required|unique:posts',
            'id_category'=>'required',
            'content'=>'required',
            'imagepath'=>'required|image|max:1999',

        ]);

        $post = new Post();
        $post->title = request('title');
        $post->category_id = request('id_category');
        $post->content = request('content');
        $image = request('imagepath');
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/posts/',$image_new_name);
        $post->image_path = '/uploads/posts/'.$image_new_name;
        $post->slug = str_slug(request('title'),'-');
        $post->excerpt = request('excerpt');
        $post->user_id = auth()->user()->id;
        $post->save();

        $post->tags()->attach(request('tag'));

        $notification = ['message'=>'new post has been add','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }


    public function show(Post $post)
    {

    }

    public function edit(Post $post)
    {
        return view('back-end.posts.edit_post',compact('post',$post))
            ->with('categories',Category::all())
            ->with('tags',Tag::all());
    }

    public function update(Post $post)
    {
        $this->validate(request(),
            [
                'title'=>'required',
                'id_category'=>'required',
                'content'=>'required',
                'imagepath'=>'required|image|max:1999',
            ]);

        $post->title = request('title');
        $post->category_id = request('id_category');
        $post->content = request('content');
        $image = request('imagepath');
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/posts/',$image_new_name);
        $post->image_path = '/uploads/posts/'.$image_new_name;
        $post->slug = str_slug(request('title'),'-');
        $post->save();
        $post->tags()->sync(request('tag'));
        $notification = ['message'=>'post has been updated','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        $notification = ['message'=>'post has been deleted','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }
    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('back-end.posts.trash')->with('posts',$posts);
    }

    public function deleteforever($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        $notification = ['message'=>'post deleted for ever','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        $notification = ['message'=>'post has been restored','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }
}
