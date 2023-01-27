@extends('layouts.app')
@section('page-title','sezione-index')
@section('content')
<a class="h3" href="{{route('admin.posts.create')}}"><i class="fa-solid fa-plus"></i></a>
<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOME</th>
      <th scope="col">COGNOME</th>
      <th scope="col">EDIT</th>
      <th scope="col">SHOW</th>
      <th scope="col">DESTROY</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($data as $elem )

    <tr>
        <td>{{$elem->id}}</td>
      <td>{{$elem->title}}</td>
      <td>{{$elem->body}}</td>
      <td><a href="{{route('admin.posts.edit', $elem->id)}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
      <td><a href="{{route('admin.posts.show', $elem->id)}}"><i class="fa-solid fa-eye"></i></a></td>
      <td>
        <form action="{{route('admin.posts.destroy',$elem->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit"><i class="fa-solid fa-trash-can text-danger"></i></button>
        </form>

        </a></td>

    </tr>
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center my-5">

    {{$data->links()}}
</div>
@endsection
