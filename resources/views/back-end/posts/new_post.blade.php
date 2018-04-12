@extends('inc-back.layout')


@section('title')
    New Post
@endsection


@section('breadcamp')
    New post
@endsection

@section('content')

    <div class="uk-container">
            <form class="uk-form-horizontal uk-margin-large">

                <div class="uk-margin">
                    <label class="uk-form-label" for="form-horizontal-text">Title </label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-horizontal-text" type="text" placeholder="Some text...">
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="form-horizontal-text">Content </label>
                    <div class="uk-form-controls">
                        <textarea name="" id="" cols="30" rows="10" class="uk-textarea" id="form-horizontal-text"></textarea>
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-form-controls">
                        <a class="c-btn c-btn--info" href="#!">post</a>
                    </div>
                </div>

            </form>

    </div>

@endsection