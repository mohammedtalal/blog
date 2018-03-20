<?php

namespace App\Http\Controllers;

use App\Notifications\NotifyNewArticle;
use App\Post;
use App\Repositories\PostsRepositories;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ProfileController extends Controller
{
    // show all authUser Posts
    public function index() {
    	$ownPosts =  Post::latest()->where('user_id',auth()->user()->id)->get();
    	return view('profile.index',compact('ownPosts'));
    }

    // Function to publish new post
    public function store() {
        // publish new post 
    	auth()->user()->publish(
            new Post(request(['title','body']))
        );
        // get las post inserted by authenticated user to pass post data with notification email 
        $post = auth()->user()->lastPostInserted();
        auth()->user()->notifyUsers($post);

    	return back()->with('success','your post has now been published');
    }

    // edit my own posts
    public function editPost($id) {
        $post = Post::find($id);
        return view('profile.editPost',compact('post'));
    }

    // update editable post 
    public function updatePost($id){
        $post = Post::find($id);
        $post->update(request()->all());
        return redirect('/profile/{{$post->id}}')->with('success','Your post updated successfully');
    }

    // delete any post
    public function destroy($id) {
        Post::destroy($id);
        return back()->with('danger','Post deleted successfully');
    }
}
