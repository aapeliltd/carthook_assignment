<?php

namespace App\Repositories\Posts;

use App\Model\Post;
use App\Model\User;
use App\Traits\Miscellaneous;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
//use App\Traits\Miscellaneous;

class PostRepository implements PostRepositoryInterface
{

    use Miscellaneous;

    public $response;


    function userPosts($user_id)
    {
        return Cache::remember('posts', $minutes = '60', function () use ($user_id) {
            // if there none in cache, get them from database
            $posts =  Post::where('user_id', $user_id)->orderby('id', 'DESC')->limit(50)->get();
            // $posts =  User::find($user_id)->posts()->ordeby("id", "DESC")->get();
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

                // return the users after successfully created in database
                return Post::where('user_id', $user_id)->orderby('id', 'DESC')->limit(50)->get();
            } else {
                return $posts;
            }
        });
    }

    public function searchPostByTitle($title)
    {
        if (Cache::has("posts.{$title}")) {
            $posts = Cache::pull("posts.{$title}");
            return $posts;
        } else {
            $post =  Post::whereRaw("MATCH (title) AGAINST (? IN BOOLEAN MODE)", $this->fullTextWildcards($title))->get();
            Cache::put("posts.{$title}", $post, $seconds = '360');
            return $post;
        }
    }

    public function find($id)
    {
        return Cache::remember("posts.{$id}", $minutes = '60', function () use ($id) {
            $post =  Post::findOrFail($id);
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
