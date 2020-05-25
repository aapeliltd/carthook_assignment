<?php

namespace App\Repositories\Posts;

interface PostRepositoryInterface
{


    public function userPosts($user_id);
    public function find($id);
    public function searchPostByTitle($title);
}
