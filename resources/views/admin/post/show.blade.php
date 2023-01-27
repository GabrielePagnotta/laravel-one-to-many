@extends('layouts.app')
@section('page-title','sezione-show')
@section('content')
<div class="text-center">

    <h3>Titolo</h3>
    <h1>{{$show->title}}</h1>

    <h3>descrizione</h3>
    <h1>{{$show->body}}</h1>
</div>
@endsection
