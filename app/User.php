<?php

namespace App;

use App\Notifications\NotifyNewArticle;
use App\Post;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // any User hasMany posts
    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function publish(Post $post){
        $this->posts()->save($post);
    }

    // get last post inserted by authenticated user
    public function lastPostInserted() {
        return Post::latest()->where('user_id',auth()->user()->id)->with('user')->first();
    }

    // notify all users with first 500 user and secon 500 user , and so on
    public static function notifyUsers($data) {
        self::chunk(200, function ($users) use ($data) {
          foreach ($users as $user) {
            $user->notify(new NotifyNewArticle($data));
          }
        });
    }

}
