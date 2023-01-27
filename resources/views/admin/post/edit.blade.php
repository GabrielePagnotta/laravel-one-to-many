@extends('layouts.app')
@section('page-title','sezione-edit')
@section('content')
<div class="text-center">
        <h1>crea un post</h1>
    </div>

    <form class="container" action="{{route('admin.posts.update',$data->id)}}" method="POST">
        @csrf
            @method('PUT')
        <label>
            inserisci un titolo
        </label>
        <input class="form-control" value="{{$data->title}}" type="text" name="title">
        @error('title')
            <div class="alert alert-danger">
                <p>è obbligatorio compilare questo campo</p>
            </div>
        @enderror
        <label class="my-3">
            inserisci una descrizione
        </label>
        <textarea class="form-control" name="body">{{$data->body}}</textarea>
        @error('body')
        <div class="alert alert-danger">
            <p>è obbligatorio compilare questo campo</p>
        </div>
    @enderror
        <button class="btn btn-success my-3"type="submit">Modifica</button>
    </form>
@endsection
