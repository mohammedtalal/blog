@extends('layouts.master')

@section('content')

	<div class="col-sm-8 blog-main">
		<div class="card text-center">
		  <div class="card-header">
		    “Don’t ever stop writing. This is the way the world will find out who you are.”
		  </div>
		  <div class="card-body">
		   <form method="POST" action="/profile/posts">
			{{ csrf_field() }}
			  <div class="form-group">
			    <input type="text" class="PostTitle  form-control" id="title" name="title" placeholder="Title" required>
			  </div>
			  <div class="form-group">
			    <textarea class="PostBody form-control" name="body" id="body" rows="3" placeholder="Your text here" required></textarea>
			  </div>
			  <div class="form-group">
			  	<button type="submit" class="btn btn-block btn-primary">Publish</button>
			  </div>
				<!-- this div to show any errors in Form -->
				@include('layouts.errors')
			</form>
		  </div> 
		</div><!-- /.Post Form -->

		@foreach($ownPosts as $post)
		<div class="blog-post">
		  <h2 class="blog-post-title">
		    <a href="/posts/{{$post->id}}">
		      {{ $post->title }}
		    </a>
		  </h2>
		  <p class="blog-post-meta">
		  	{{ $post->user['name'] }} on
    		{{ $post->created_at->toFormattedDateString() }}
		  </p>

		  <p> {{ $post->body }}</p>
		    <div class="text-right">
			    <form action="/profile/posts/{{$post->id}}/delete" method="POST">
			    	{{ csrf_field() }}
			    	<button  class="deleteIcon" type="submit">
				      <i class=" material-icons">delete</i>
				    </button>
				    <input type="hidden" name="_method" value="DELETE" >
				    <a class="editIcon" href="/profile/posts/{{$post->id}}/edit">
				      <i class=" material-icons">mode_edit</i>
				    </a>
			    </form>
			  </div>
		</div><!-- /.blog-post -->	
		@endforeach
	</div>	

@endsection

