@extends('inc-back.layout')

@section('title')
    all posts
@endsection

@section('breadcamp')
    all posts
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="c-table-responsive@wide">
                <table class="c-table">
                    <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">Image</th>
                        <th class="c-table__cell c-table__cell--head">Title</th>
                        <th class="c-table__cell c-table__cell--head">Date</th>
                        <th class="c-table__cell c-table__cell--head">Edit</th>
                        <th class="c-table__cell c-table__cell--head">Delete</th>
                    </tr>
                    </thead>
                   @if((count($posts)>0))
                    @foreach($posts as $post)
                    <tbody>
                        <tr class="c-table__row">
                            <td class="c-table__cell">
                                <div class="o-media">
                                    <div class="o-media__img u-mr-xsmall">
                                        <div class="c-avatar c-avatar--small">
                                            <img class="c-avatar__img" src="{{ $post->image_path }}" alt="Jessica Alba" width="50px" height="50px">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="c-table__cell">{{ $post->title }} </td>
                            <td class="c-table__cell">{{ $post->created_at->diffForHumans() }}</td>
                            <td class="c-table__cell">
                                <a class="c-btn c-btn--warning u-mb-xsmall" href="{{ route('post.edit',[$post->id]) }}">Edit</a>
                            </td>
                            <td class="c-table__cell">
                                <form action="{{ route('post.destroy',[$post->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="c-btn c-btn--danger u-mb-xsmall" type="submit">Trash</button>
                                </form>
                            </td>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                    @else
                        <tbody>
                        <td class="c-table__cell"> {{trans('No posts yet')}} </td>
                        </tbody>
                    @endif
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
