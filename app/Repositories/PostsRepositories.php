<?php

namespace App\Repositories;
use App\Post;

class PostsRepositories {

	public function all() {
		/*
		*to return all Posts with
		*filter method -> found inside Post model to filter month & year
		*/

		$key = request()->searchRequ;
		return Post::latest()
			->filter(request(['month','year']))
			->search($key)
			->simplePaginate(5);
	}

	public function findPost() {
		$key = request()->searchRequ;
		return Post::latest()
				->search($key);
	}
}