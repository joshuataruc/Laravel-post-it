<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }
    public function store(Post $post, Request $req){
        // we are accessing the likedBy method in the post model and checking if the user has already pressed the like btn
         if($post->likedBy($req->user())){
             return response('null', 409);
         }

        // in the post model we have like class thats why we use the post->likes
        $post->likes()->create([
            // we are getting the user thru the post model with the relationship of hasmany
            'user_id' => $req->user()->id
        ]);
        return back();
    }


    public function destroy(Post $post, Request $req)
    {
        // dd($post);
        // we are going to the user into the users likes relationship searching for the post_id and we are using the delete method to delete that post
        $req->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
