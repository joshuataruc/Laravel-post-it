<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function likedBy(User $user){
        return $this->likes->contains('user_id',$user->id);
    }

    // public function ownedBy(User $user)
    // {
    //     // we are accessing the user model and getting the id of the user and checking if the id of the user matches the user_id of the post
    //we changed this function for policy check it out delete method
    //     return $user->id === $this->user_id;
    // }
}
