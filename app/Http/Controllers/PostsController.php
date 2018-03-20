<?php

namespace App\Http\Controllers;

use App\Notifications\NotifyNewArticle;
use App\Post;
use App\Repositories\PostsRepositories;
use App\User;
use App\checkUserAuth;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Testing\session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class PostsController extends Controller
{

    // show all posts
    public function index (PostsRepositories $allPosts) {

        $posts = $allPosts->all();
        $searchResults = request('searchRequ');     
        $archives = Post::archives();
    	return view('posts.index',compact('posts','archives','searchResults'));
    }

    // show form  to create a new post
    public function create () {
        if(auth()->check()) {
            return view('posts.create');
        }
        return redirect('/login');
    }

    // to store Post into DB
    public function store () {
        auth()->user()->publish(
            new Post(request(['title','body']))
        );
        session()->flash('success','your post has now been published.');
    	return redirect('/');
    }

    // to show specific post
    public function show (Post $post) {
        if(auth()->check()) {
            return view('posts.show',compact('post'));
        }
        return redirect('/login');
    }
}
