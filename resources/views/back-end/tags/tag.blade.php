@extends('inc-back.layout')

@section('title')
     tags
@endsection

@section('breadcamp')
     tags
@endsection


@section('content')
    @include('includes.messages')
    <div class="container">
        <div class="row">
            {{-- category --}}
            <div class="col-lg-6 col-sm-12 col-md-4">
                <div class="row u-mb-medium">
                    <div class="col-12">

                            @include('includes.errors')

                        <form action="{{ route('tags.store') }}" method="POST" >
                            @csrf

                            <div class="c-card">
                                <div class="row u-mb-medium">

                                    <div class="col-lg-12 u-mb-xsmall">
                                        <div class="c-field">
                                            <label class="c-field__label" for="input1">tag </label>
                                            <input class="c-input" type="text" id="input1" placeholder="Enter Category Name" name="tag">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 u-mb-xsmall">
                                        <button class="c-btn c-btn--info u-mb-xsmall" type="submit">add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-sm-12 col-md-8 ">
                <div class="c-table-responsive@wide">
                    <table class="c-table">
                        <thead class="c-table__head">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head">Tag</th>
                            <th class="c-table__cell c-table__cell--head">Update</th>
                            <th class="c-table__cell c-table__cell--head">Delete</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($tags as $tag)
                            <tr class="c-table__row">
                                <form action="{{ route('tags.update',$tag->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <td class="c-table__cell">
                                        <input class="c-input" type="text" id="input1" value="{{ $tag->tag }}" name="tag">
                                    </td>
                                    <td class="c-table__cell">
                                        <button type="submit" class="c-btn c-btn--warning u-mb-xsmall"><span uk-icon="icon: refresh"></span></button>
                                    </td>
                                </form>
                                <td class="c-table__cell">
                                    <form action="{{ route('tags.destroy',$tag->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you Sure to Delete ?')" type="submit" class="c-btn c-btn--danger u-mb-xsmall"><span uk-icon="icon: close"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $tags->links() }}
                </div>
            </div>

        </div>
    </div>

@endsection
