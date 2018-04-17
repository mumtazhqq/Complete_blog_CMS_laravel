@extends('inc-back.layout')

@section('title')
    Trashed posts
@endsection

@section('breadcamp')
    Trashed posts
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
                        <th class="c-table__cell c-table__cell--head">Restore</th>
                        <th class="c-table__cell c-table__cell--head">Delete</th>
                    </tr>
                    </thead>

                    @if(count($posts)>0)
                    <tbody>
                    @foreach($posts as $post)
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
                                <a class="c-btn c-btn--danger u-mb-xsmall" href="{{ route('deleteforever',[$post->id]) }}">Delete</a>
                            </td>
                            <td class="c-table__cell">
                                <a class="c-btn c-btn--success u-mb-xsmall" href="{{ route('restore',[$post->id]) }}">Restore</a>
                            </td>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                        @else
                        <tbody>
                        <td class="c-table__cell"> No Trashed posts </td>
                        </tbody>
                        @endif
                </table>
            </div>
        </div>
    </div>
@endsection
