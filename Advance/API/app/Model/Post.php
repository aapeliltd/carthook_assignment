<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["title", "body", "user_id"];

    //Post belong to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
