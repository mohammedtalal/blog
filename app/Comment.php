<?php

namespace App;


class Comment extends Model
{
	protected $fillable = [
		'user_id',
		'post_id',
		'body'
	];

	// any comment belongsTO any Post
    public function post(){
    	return $this->belongsTo(Post::class);
    }

    // comment belongsTo User 
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
