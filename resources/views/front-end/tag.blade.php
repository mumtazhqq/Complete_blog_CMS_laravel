@include('inc-front.header')
<body>
<div  class="cover-single">
    <div class="logo-single-page">
        <a href="#" class="link-home">
            <span class="title_start">{{$tag->tag}}</span>
        </a>
    </div>
    @foreach($categories as $category)
        <a href="{{ route('category.page',$category->slug) }}"><span class="label label-info">{{ $category->category }}</span></a>
    @endforeach
    <br>
    @foreach($tags as $tag)
        <a href="{{ route('tag.page',$tag->slug) }}"><span class="label label-danger">{{ $tag->tag }}</span></a>
    @endforeach
</div>

<section class="main">
    <div class="container container-main">
        <br>
        <br>
        <br>
        @foreach($posts as $post)
            <div class="col-lg-8 col-lg-push-2 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1 colom-main">
                <img src="{{  $post->image_path }}" alt="{{$post->slug}}">
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


    </div>

</section>


@include('inc-front.footer')