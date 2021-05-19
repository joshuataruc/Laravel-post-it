<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // latest is a short hand for order by asc, we are using eager loading with this statement using the syntax with([]) we are getting the user and likes method in the post model 
        $posts = Post::latest()->with(['user', 'likes'])->paginate(10);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $req){
        $this->validate($req, [
            'body' => 'required'
            ]);

           // we are creating a post through the user to go to the post relationship
            $req->user()->posts()->create([
                'body' => $req->body
            ]);
            return back();
    }

    public function destroy(Post $post){
        //we changed this method using the PostPolicy
        // if(!$post->ownedBy(auth()->user())){
        //     dd('no');
        // }

        //this method use PostPolicy delete method we are checking if the logged in user is the owner of the post
        $this->authorize('delete', $post);

        $post->delete();
        return back();
    }


}
