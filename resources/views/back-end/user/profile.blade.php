@extends('inc-back.layout')

@section('title')
    My profile
@endsection

@section('breadcamp')
    My profile
@endsection


@section('content')

<div class="row">
<div class="col-12">
<nav class="c-tabs">
<div class="c-tabs__list nav nav-tabs" id="myTab" role="tablist">
<a class="c-tabs__link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
<span class="c-tabs__link-icon">
<i class="feather icon-settings"></i>
</span>Account Settings
</a>
@include('includes.errors')
</div>
<div class="c-tabs__content tab-content" id="nav-tabContent">
<div class="c-tabs__pane active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
<form action="{{ route('update_profile') }}" method="post">
@csrf
@method('patch')
<div class="row">
<div class="col-xl-4">
<div class="c-field u-mb-medium">
<label class="c-field__label" for="user-name">Name</label>
<input class="c-input" type="text" id="user-name" name="name" value="{{ $user->name }}">
</div>

<div class="c-field u-mb-medium">
<label class="c-field__label" for="user-email">Email Address</label>
<input class="c-input" type="text" id="user-email" name="email" value="{{ $user->email }}">
</div>
<div class="c-field u-mb-medium">
<label class="c-field__label" for="user-phone">New password</label>
<input class="c-input" type="password" id="user-phone" name="password">
</div>
</div>
<div class="col-xl-4">
<div class="c-field u-mb-medium">
<label class="c-field__label" for="user-name">github</label>
<input class="c-input" type="text" id="user-name" name="github" value="{{ $user->profile->github_url }}">
</div>
<div class="c-field u-mb-medium">
<label class="c-field__label" for="user-name">twitter</label>
<input class="c-input" type="text" id="user-name" name="twitter" value="{{ $user->profile->twitter_url }}">
</div>

<div class="c-field u-mb-medium">
<label class="c-field__label" for="user-name">Confirm password</label>
<input class="c-input" type="password" id="user-name" name="confirmation_password">
</div>
</div>
<div class="col-xl-4">
<div class="c-card u-text-center">
<div class="c-avatar u-inline-flex">
<img class="c-avatar__img" src="{{ $user->profile->avatar }}" alt="{{ $user->name }}">
</div>
<h5>{{ $user->name }}</h5>
<p class="u-pb-small u-mb-small u-border-bottom">
    <textarea class="uk-textarea" name="description" id="" cols="20" rows="5">{{ $user->profile->description }}</textarea>
</p>
<p class="u-h4">
<a class="u-mr-xsmall" href="{{ $user->profile->github_url }}" target="_blank">
<i class="feather icon-twitter"></i>
</a>
<a class="u-mr-xsmall" href="{{ $user->profile->twitter_url }}" target="_blank">
<i class="feather icon-github"></i>
</a>
</p>
</div>

</div>
</div>


<div class="row">
<div class="col-12 col-sm-7 col-xl-2 u-mr-auto u-mb-xsmall">
<button class="c-btn c-btn--info c-btn--fullwidth" type="submit">Save Settings</button>
</div>
</div>

</form>

</div>
</div>
</nav>
</div>
</div>

</div>

@endsection
