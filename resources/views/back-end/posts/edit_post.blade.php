@extends('inc-back.layout')


@section('title')
    edit Post
@endsection


@section('breadcamp')
    edit post
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row u-mb-medium">
                    <div class="col-12">
                        @include('includes.errors')
                        <form action="{{ route('post.update',[$post->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="c-card">
                                <div class="row u-mb-medium">
                                    <div class="col-lg-8 u-mb-xsmall">
                                        <div class="c-field">
                                            <input class="c-input" type="text" id="input1" placeholder="Enter post title" name="title" value="{{ $post->title }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 u-mb-xsmall">
                                        <div class="c-select">
                                            <select class="c-select__input" name="id_category">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if($post->category->id == $category->id)
                                                            selected
                                                            @endif
                                                    >{{ $category->category }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <div class="c-field">
                                            <label for="">Image : </label>
                                            <input type="file" name="imagepath" value="{{ $post->image_path }}" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                            <label for="">Tags : </label>
                                        @foreach($tags as $tag)
                                        <label><input
                                                @foreach($post->tags as $t)
                                                        @if($tag->id == $t->id)
                                                        checked
                                                         @endif
                                                 @endforeach
                                                class="uk-checkbox" type="checkbox" name="tag[]" value="{{ $tag->id }}"> {{ $tag->tag }} </label>
                                        @endforeach
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="c-field">
                                        <div class="col-lg-12 u-mb-xsmall">
                                            <textarea name="content" id="summernote" cols="30" rows="10" class="uk-textarea">{{ $post->content }}</textarea>
                                        </div>
                                        <div class="c-field">
                                            <div class="col-lg-12 u-mb-xsmall">
                                                <button class="c-btn c-btn--secondary u-mb-xsmall" type="submit">update</button>
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