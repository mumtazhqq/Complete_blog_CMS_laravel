<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
  
    public function index()
    {

    }

   
    public function create()
    {
        $tags = Tag::latest()->paginate(5);
        return view('back-end.tags.tag',compact('tags',$tags));
    }

   
    public function store(Tag $tag)
    {
        $this->validate(request(),['tag'=>'required|min:1|unique:tags']);
        $tag->tag = request('tag');
        $tag->slug = str_slug(request('tag'),'-');
        $tag->save();
        $notification = ['message'=>'New tag had been add','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }

   
    public function show(Tag $tag)
    {
        //
    }

    
    public function edit(Tag $tag)
    {
        //
    }

  
    public function update(Tag $tag)
    {
        $this->validate(request(),['tag'=>'required|min:1']);
        $tag->tag = request('tag');
        $tag->slug = str_slug(request('tag'),'-');
        $tag->save();
        $notification = ['message'=>'Tag has been updated','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }

   
    public function destroy($id)
    {
        Tag::destroy($id);
        $notification = ['message'=>'Tag has been Deleted','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }
}
