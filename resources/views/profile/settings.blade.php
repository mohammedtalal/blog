@extends('layouts.master')

@section('content')
	<div class="col-sm-8 blog-main">
		<form action="#" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
			</div>
			<div class="form-group">
				<label for="bio">Bio:</label>
				<input type="text" class="form-control" name="bio" value="{{ $user->bio }}" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" name="password" required>
			</div>
			<div class="form-group">
				<label for="password_confirmation">Password Confirmation:</label>
				<input type="password" class="form-control" name="password_confirmation" required>
			</div>
			<div class="form-group">
				<label for="avatar">Profile Picture:</label>
				<img src="{{asset('images/avatars/'.auth()->user()->avatar)}}" alt=""><br>
				<input type="file" class="form-control" id="avatar" name="avatar" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button> 
			</div>
		</form>
	</div>
@endsection