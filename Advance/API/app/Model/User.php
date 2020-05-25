<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Post;

class User extends Model
{
    protected $fillable = ["name", "username", "email"];
    //users has many posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
   
}
