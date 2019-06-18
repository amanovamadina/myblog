@extends('post.default')

@section('content')

	<div class="container">
	<br>
		<div class="card">
  <div class="card-header">
  {{ 'Post No ' . $post->id }}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <p class="card-text">{{ $post->content }}</p>
    <a href="{{ route('posts.index')}}" class="btn btn-primary"> All posts </a>
  </div>
</div>

	
	</div>

@endsection