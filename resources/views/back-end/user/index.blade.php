@extends('inc-back.layout')

@section('title')
    all users
@endsection

@section('breadcamp')
    all users
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="c-table-responsive@wide">
                <table class="c-table">
                    <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">Image</th>
                        <th class="c-table__cell c-table__cell--head">Name</th>
                        <th class="c-table__cell c-table__cell--head">Role</th>
                        <th class="c-table__cell c-table__cell--head">Action</th>
                        <th class="c-table__cell c-table__cell--head">Delete</th>
                    </tr>
                    </thead>
                    @if((count($users)>0))
                        @foreach($users as $user)
                            <tbody>
                            <tr class="c-table__row">
                                <td class="c-table__cell">
                                    <div class="o-media">
                                        <div class="o-media__img u-mr-xsmall">
                                            <div class="c-avatar c-avatar--small">
                                                <img class="c-avatar__img" src="{{ $user->profile->avatar }}" alt="Jessica Alba" width="50px" height="50px">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="c-table__cell">{{ $user->name }} </td>
                                <td class="c-table__cell">
                                    @if($user->admin)
                                        admin
                                    @else
                                        author
                                    @endif
                                </td>
                                <td class="c-table__cell">
                                    @if($user->admin == true)

                                        <a class="c-badge c-badge--small c-badge--danger" href="{{ route('remove_permision',[$user->id]) }}">remove permision</a>

                                    @else
                                        <a class="c-badge c-badge--small c-badge--success" href="{{ route('make_admin',$user->id) }}">make admin</a>
                                    @endif
                                </td>
                                <td class="c-table__cell">
                                    <form action="{{ route('users.destroy',[$user->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="c-btn c-btn--danger u-mb-xsmall" type="submit">Remove</button>
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
{{--                {{ $users->links() }}--}}
            </div>
        </div>
    </div>
@endsection
