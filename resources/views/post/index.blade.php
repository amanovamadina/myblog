@extends('post.default')

@section('content')

	
		<h1 class="text-primary text-center my-3">All posts</h1>
	@php
	$i = ($posts->currentPage() - 1) * $posts->perPage() + 1;
	@endphp

	<div class="container">
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
  <button><a href="{{ route('posts.show', [$post])}}"> <i class="fas fa-eye"> </i> </a></button>
  <button><a href="{{ route('posts.edit',[$post]) }}"> <i class="fas fa-edit"> </i> </a> </button>
  <form action="{{ route('posts.destroy',[$post])}}" method="post">
	@csrf
	@method('DELETE')
  </form>
  <button> <i class="fas fa-trash"> </i></button>
</div>
	  </td>
    </tr>
	@endforeach
  </tbody>
</table>

{{ $posts->links()}}
</div>

@endsection