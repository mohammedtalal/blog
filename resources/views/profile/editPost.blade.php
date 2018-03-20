@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
	<h1>Publish a Post</h1>
		<hr>

		<form method="POST" action="/profile/posts/{{$post->id}}/edit">
			{{ csrf_field() }}
		  <div class="form-group">
		    <label for="title">Title</label>
		    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
		  </div>
		  <div class="form-group">
		    <label for="body">Body</label>
		    <textarea class="form-control" name="body" id="body" required>{{ $post->body }}</textarea>
		  </div>
		  <div class="form-groub">
		  	<button type="submit" class="btn btn-primary">Publish</button>
		  </div>		  

			@include('layouts.flashMessage')
			<!-- this div to show any errors in Form -->
			@include('layouts.errors')
		</form>
</div>
@endsection