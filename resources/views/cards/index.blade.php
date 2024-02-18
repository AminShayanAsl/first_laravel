@extends('layout')

@section('title')
    <title>cards</title>
@stop

@section('content')
    <h1>All Cards</h1>

    @foreach($cards as $card)
        <table class="table">
            <tr>
                <td class="col-6">
                    <a href="http://127.0.0.1:8000/cards/{{ $card->id }}">{{ $card->title }}</a>
                </td>
                <td class="col-2 text-center">
                    <a href="#">{{ $card->user->username }}</a>
                </td>
                <td class="col-4 text-center">
                    <a class="btn btn-primary" href="editCard/{{ $card->id }}">Edit</a>
                </td>
            </tr>
        </table>
    @endforeach

    <form method="post" action="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/add-card' ?>">
        @csrf
        <div class="w-50 m-auto">
            <h3>Add new card</h3>
            <input type="text" name="title" class="form-control"><br>
            <select id="tags_select" name="tags[]" title="tags" class="select form-control mb-2" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="form-control btn btn-info mt-3 mb-4">submit</button>
        </div>
    </form>
@stop

