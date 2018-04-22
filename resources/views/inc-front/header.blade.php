<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>moktar @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('css/uikit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/neat.min.css?v=1.0') }}">
</head>

<body>


<div class="circle">
    <div class="ring">
        <a href="{{ route('index_front') }}" class="menuItem fa fa-home fa-2x"></a>
        <a href="#" class="menuItem fa fa-user fa-2x"></a>
        <a href="#" class="menuItem fa fa-search fa-2x " data-toggle="modal" data-target="#myModal"></a>
        <a href="{{ route('login') }}" class="menuItem fa fa-lock fa-2x"></a>
        <a href="{{ route('register_new_user') }}" class="menuItem fa fa-user-plus fa-2x"></a>
    </div>
    <a href="#" class="center fa fa-th fa-2x"></a>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Search For : </h4>
            </div>
            <form action="{{ route('search') }}" method="GET">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="type something ex: php , laravel ..." name="query">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" >Search</button>
            </div>
            </form>
        </div>
    </div>
</div>