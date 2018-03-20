@extends('layouts.master')

@section('content')

	<div class="col-sm-8 blog-main">
		<h1>{{ $post->title }}</h1>

		@if(count($post->tags))
	        <ul>
	          <li>
	          	@foreach($post->tags as $tag)
	            <a href="/posts/tags/{{ $tag->name }}">             
	                {{ $tag->name }}             
	            </a>
	            @endforeach
	          </li>
	        </ul>
	    @endif

		{{ $post->body }}

	
		<hr>
		<!-- Show all comments for post -->
		<div class="comments">
			<ul class="list-group">
				@foreach($post->comments as $comment)
				<li class="list-group-item">
					<strong class="capitaliz">{{ $post->user->name }}</strong> <br/>
					<strong>{{ $comment->created_at->diffForHumans() }}: </strong>
					{{ $comment->body }}
				</li >
			@endforeach
			</ul>
		</div>

		
		<!-- Add comments -->
		<div class="card">
			<div class="card-body">
				<form method="POST" action="/posts/{{ $post->id }}/comments">
					{{ csrf_field() }}
					<div class="form-group">
						<textarea name="body" placeholder="Your comment here." class="form-control"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Add Comment</button>
					</div>
				</form>
				@include('layouts.errors')
			</div>
		</div>

	</div>

@endsection('content')