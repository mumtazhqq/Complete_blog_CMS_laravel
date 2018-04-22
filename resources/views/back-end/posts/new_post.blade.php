@extends('inc-back.layout')


@section('title')
    New Post
@endsection


@section('breadcamp')
    New post
@endsection


@section('content')

   <div class="container">
       <div class="row">
           <div class="col-12">
               <div class="row u-mb-medium">
                   <div class="col-12">
                       @include('includes.errors')
                       <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                           @csrf
                       <div class="c-card">
                           <div class="row u-mb-medium">
                               <div class="col-lg-8 u-mb-xsmall">
                                   <label for="">Title : </label>
                                   <br><br>
                                   <div class="c-field">
                                       <input class="c-input" type="text" id="input1" placeholder="Enter post title" name="title" value="{{ old('title') }}">
                                   </div>
                               </div>
                               <div class="col-lg-4 u-mb-xsmall">
                                   <label for="">Category : </label>
                                   <br><br>
                                   <div class="c-select">
                                       <select class="c-select__input" name="id_category">
                                           @foreach($categories as $category)
                                               <option value="{{ $category->id }}">{{ $category->category }}</option>
                                               @endforeach
                                       </select>
                                   </div>
                               </div>
                           </div>
                                    <div class="row">
                                    <div class="col-3">
                                        <div class="c-field">
                                            <label for="">Image : </label>
                                            <input type="file" name="imagepath" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                            <label for="">Tags : </label>

                                        @foreach($tags as $tag)
                                            <label><input class="uk-checkbox" type="checkbox" name="tag[]" value="{{ $tag->id }}"> {{ $tag->tag }} </label>
                                                @endforeach
                                        </div>
                                    </div>
                                    </div><br>
                           <div class="row">
                               <div class="c-field">
                                   <div class="col-lg-12 u-mb-xsmall">
                                       <label for="">Content : </label>
                                       <textarea name="content" id="summernote" cols="50" rows="50" class="uk-textarea">{{ old('content') }}</textarea>
                                   </div>
                                   <div class="col-lg-12 u-mb-xsmall">
                                       <label for="">excerpt : </label>
                                       <textarea name="excerpt" id="" cols="10" rows="5" class="uk-textarea"></textarea>
                                   </div>
                                   <div class="c-field">
                                       <div class="col-lg-12 u-mb-xsmall">
                                       <button class="c-btn c-btn--secondary u-mb-xsmall" type="submit">post</button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>

@endsection


