@include('inc-front.header')


<section class="main">
    <div class="container-fluid container-main">
        <div class="col-lg-8 col-lg-push-2 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1 colom-main">
            <article class="full-post">
                <a href="{{ url('/') }}">
                    <p class="info-pagination label label-danger">
                        <span style="font-size: 20px">< </span>  Back</p>
                </a>
                <p class="info-pagination label label-info"> <span style="font-size: 20px"></span>{{ $post->title }}</p>
                <img src="{{  $post->image_path }}" alt="{{$post->slug}}">

                {!!  $post->content !!}
            </article>
        </div>
    </div>
</section>
<section class="pagination-section">
    <div class="container container-pagination">
        @if($next)
        <a href="{{ route('show.post',$next->slug) }}" class="next-page">newest post</a>
        @endif

        @if($previous)
        <a href="{{ route('show.post',$previous->slug) }}" class="older-page">older post</a>
        @endif

    </div>
    </a>
</section>
@include('inc-front.footer')
