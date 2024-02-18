@extends('layout')

@section('title')
    <title>card info</title>
@stop

@section('content')
    <h1>{{ $card->title }}</h1>

    <ul>
        @foreach($card->Note as $note)
            <li>{{ $note->body }}</li>
        @endforeach
    </ul>
@stop
