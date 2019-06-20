@extends('post.default')

@section('content')
<div class="container">
	<br>
	
	<form action="{{ route('posts.store')}}" method="post">
	@csrf
		
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" value="{{ old('title') }}">

  </div>
  <div class="form-group">
    <label for="content">Content</label>
	<textarea class="form-control" id="content" rows="12"> {{ old('content') }}</textarea>
  </div>

  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>

@endsection