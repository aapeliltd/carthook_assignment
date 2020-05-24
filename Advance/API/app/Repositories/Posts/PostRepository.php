<?php

namespace App\Repositories\Posts;

use App\Model\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PostRepository implements PostRepositoryInterface
{

    public $response;


    function userPosts($user_id)
    {
        return Cache::remember('posts', $minutes = '60', function () use ($user_id) {
            // if there none in cache, get them from database
            $posts =  Post::where('user_id', $user_id)->orderby('id', 'DESC')->limit(50)->get();
            if (count($posts) <= 0) {
                // that is, there is nothing in cache and in database, therefore fetch from open API
                $url = env('BASE_URL') . "/users/{$user_id}/posts";
                $this->response = Http::get($url);
                if ($this->response->successful()) {
                    //save data to database
                    $data = $this->response->json();
                    foreach ($data as $item) {
                        $this->createPost($item);
                    }
                } else {
                }

                // return the users after created in database
                return Post::where('user_id', $user_id)->orderby('id', 'DESC')->limit(50)->get();
            } else {
                return $posts;
            }
        });
    }

    public function show($id)
    {
        return Cache::remember("posts.{$id}", $minutes = '60', function () use ($id) {
            if (Cache::has('posts'))
                return Cache::has('posts')->find($id);
            $post =  Post::find($id);
            if ($post == null) {
                // no user in database, get it from open api.
                $url = env('BASE_URL') . '/posts/' . $id;
                $data = $this->response = Http::get($url);
                if ($this->response->successful()) {
                    $this->createPost($data);
                }
            } else {
                return $post;
            }
        });
    }

    protected function createPost($data)
    {
        Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => $data['userId']
        ]);
    }
}
