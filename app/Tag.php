<?php

namespace App;

use App\Post;

class Tag extends Model
{
	protected $fillable = [
		'name'
	];

    public function posts(){
    	return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName() {
    	return 'name';
    }
}
