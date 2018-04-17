<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $category = Category::latest()->paginate(5);
        return view('back-end.category.category',compact('category',$category));
    }


    public function store()
    {
        $this->validate(request(),['category'=>'required|min:4|unique:categories']);
        Category::create(request(['category']));
        $notification = ['message'=>'New category had been add','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Category $category)
    {
        $this->validate(request(),['category'=>'required|min:4']);
        $category->category = request('category');
        $category->save();
        $notification = ['message'=>'category has been updated','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }


    public function destroy($id)
    {
        Category::destroy($id);
        $notification = ['message'=>'category has been Deleted','alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }
}
