<?php

namespace App;

use App\Comment;
use Carbon\Carbon;


class Post extends Model
{

    protected $fillable = [
        'user_id',
        'title',
        'body'
    ];

    // function to search for a post 
    public function scopeSearch($query,$searchBtn) {
        return $query->where('title','like','%' .$searchBtn. '%')
                    ->orwhere('body','like','%' .$searchBtn. '%');
    }

	// Each Post has many comments
    public function comments() {
    	return $this->hasMany(Comment::class);
    }

    // post belongsTo User 
    public function user(){
        return $this->belongsTo(User::class);
    }

    // add comment to a post
    public function addComment($body){
        $user_id = $this->user->id;
    	$this->comments()->create(compact('body','user_id'));
    }


    
    public function scopeFilter($query, $filters) {

        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives() {
        return static::selectRaw('year(created_at) year,monthname(created_at) month, count(*) published')
                ->groupBy('year','month')
                ->orderByRaw('min(created_at) desc')
                ->get()
                ->toArray(); 
    }

    public function tags() {
        // any post may have many tags
        // any tag may be applied to many posts
        // so it will be , Many To Many RelationShip
        return $this->belongsToMany(Tag::class);
    }
}
