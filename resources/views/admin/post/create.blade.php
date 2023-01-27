@extends('layouts.app')
@section('page-title','sezione-create')
@section('content')
    <div class="text-center">
        <h1>crea un post</h1>
    </div>

    <form class="container" action="{{route('admin.posts.store')}}" method="POST">
        @csrf

        <label>
            inserisci un titolo
        </label>
        <input class="form-control" type="text" name="title">
        @error('title')
            <div class="alert alert-danger">
                <p>è obbligatorio compilare questo campo</p>
            </div>
        @enderror
        <label class="my-3">
            inserisci una descrizione
        </label>
        <textarea class="form-control" name="body"></textarea>
        @error('body')
        <div class="alert alert-danger">
            <p>è obbligatorio compilare questo campo</p>
        </div>
    @enderror
        <button class="btn btn-success my-3"type="submit">Crea</button>
    </form>
@endsection
