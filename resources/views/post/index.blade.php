@extends('post.default')

@section('content')

	<div class="container">
	<h1 class="text-primary text-center my-3">All posts</h1>
	
	@auth
	<a class="btn btn-primary" href="{{ route('posts.create')}}" role="button">Create</a>
	@endauth
	<a class="btn btn-primary" href="{{ route('home')}}" role="button">Home</a>
	
	
	
	
	@php
	$i = ($posts->currentPage() - 1) * $posts->perPage() + 1;
	@endphp
	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
	@foreach($posts as $post)
    <tr>
      <th scope="row">{{ $i ++ }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ Str::limit ($post->content , 30)}}</td>
      <td>
	  <div class="btn-group" role="group" aria-label="Basic example">
  <button><a href="{{ route('posts.show', $post)}}"> <i class="fas fa-eye"> </i> </a></button>
  @auth
  <button><a href="{{ route('posts.edit',$post->id) }}"> <i class="fas fa-edit"> </i> </a> </button>
  <form action="{{ route('posts.destroy',$post)}}" method="post">
	@csrf
	@method('DELETE')
	<button> <i class="fas fa-trash"> </i></button>
  </form>
  @endauth
</div>
	  </td>
    </tr>
	@endforeach
  </tbody>
</table>

{{ $posts->links()}}
</div>

@endsection