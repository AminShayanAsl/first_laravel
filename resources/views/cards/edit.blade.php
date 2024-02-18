@extends('layout')

@section('title')
    <title>Edit card</title>
@stop

@section('content')
    <a href="http://127.0.0.1:8000/cards" class="btn btn-primary mt-2 mb-2">Back</a>
    <h3>Edit Card Title:</h3>
    <form method="POST" action="http://127.0.0.1:8000/updateCard/{{$card->id}}">
        @csrf
        {{ method_field('PATCH') }}
        <input type="text" name="title" value="{{$card->title}}" class="form-control mb-2">
        <select id="tags_select" name="tags[]" title="tags" class="select form-control mb-2" multiple>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        @can('edit_card', $card)
            <button type="submit" class="mt-2 mb-4 btn btn-primary">Edit</button>
        @endcan
    </form>

    @if($card->tags->count() > 0)
        <hr>
        <h4>Tags:</h4>
        <ul>
            @foreach($card->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection
