@include('inc-front.header')
<body>
<div  class="cover-single">
    <div class="logo-single-page">
    </div>
    <h3 style="color: #fff">Search For : {{ $query }}</h3>
</div>

<section class="main">
    <div class="container-fluid container-main">
        <br>
        <br>
        <br>

        @if(count($posts)>0)
            @foreach($posts as $post)
                <div class="col-lg-8 col-lg-push-2 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1 colom-main">

                    <article class="post-item"><a href="{{ route('show.post',$post->slug) }}" class="link-title"><h1 class="post-title">{{ $post->title }}</h1></a>
                        <ul class="list-inline post-meta">
                            <li>By " {{ $post->user->name }} "</li>
                            <li>{{ $post->created_at->diffForHumans() }}</li>
                        </ul>
                        <p>{{ str_limit($post->excerpt,500,'...') }}</p>
                        <section class="section-meta"><a href="{{ $post->category->category }}" class="a-tag">{{ $post->category->category }}</a><a href="{{ route('show.post',$post->slug) }}" class="a-readmore">read more...</a></section>
                    </article>
                </div>
            @endforeach
        @else
            <h1 class="text-center" style="margin-bottom: 25px"> Sorry no result like : {{ $query }}</h1>
        @endif

    </div>

</section>


@include('inc-front.footer')