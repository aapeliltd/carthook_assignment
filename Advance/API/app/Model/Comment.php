<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ["post_id", "body"];

    //comment belong to a post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
   
}
