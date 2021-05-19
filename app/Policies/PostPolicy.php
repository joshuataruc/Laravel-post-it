<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Post $post){
        // we are accessing the user model and getting the id of the user and checking if the id of the user matches the user_id of the post
        //check the authserviceprovider under the auth providers folder
        return $user->id === $post->user_id;
    }
}
