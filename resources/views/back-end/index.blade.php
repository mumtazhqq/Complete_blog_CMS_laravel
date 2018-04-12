@extends('inc-back.layout')

@section('title')
    Home
    @endsection


@section('content')


    @if(Session::has('messageRNU'))
        <div id="welcome_message" class="uk-alert-success u-text-center " uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <h4>{{ Session::get('messageRNU') }}</h4>
        </div>
    @endif


    @if(Session::has('w_back'))
        <div id="welcome_message" class="uk-alert-primary u-text-center " uk-alert>
            <h4> {{ Session::get('w_back') }} (: </h4>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-10">


        </div>
    </div>







@endsection



