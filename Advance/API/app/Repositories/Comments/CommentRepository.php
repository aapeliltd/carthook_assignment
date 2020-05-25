<?php

namespace App\Repositories\Comments;

use App\Model\Comment;
use App\Model\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CommentRepository implements CommentRepositoryInterface
{

    public $response;


    function comments($post_id)
    {
        return Cache::remember('posts', $minutes = '60', function () use ($post_id) {
            // if there none in cache, get them from database
            $comments =  Post::find($post_id)->comments()->orderby('id', 'DESC')->limit(50)->get();
            if (count($comments) <= 0) {
                // that is, there is nothing in cache and in database, therefore fetch from open API
                $url = env('BASE_URL') . "/posts/{$post_id}/comments";
                $this->response = Http::get($url);
                if ($this->response->successful()) {
                    //save data to database
                    $data = $this->response->json();
                    foreach ($data as $item) {
                        $this->createComment($item);
                    }
                } else {
                }

                // return the users after created in database
                return Post::find($post_id)->comments()->orderby('id', 'DESC')->limit(50)->get();
            } else {
                return $comments;
            }
        });
    }

    public function find($post_id, $comment_id)
    {
        return Cache::remember("comments.{$comment_id}", $minutes = '60', function () use ($post_id, $comment_id) {
            $comment =  Comment::findOrFail($comment_id);
            if ($comment == null) {
                // no user in database, get it from open api.
                $url = env('BASE_URL') . "/posts/{$post_id}/comments/{$comment_id}";
                $data = $this->response = Http::get($url);
                if ($this->response->successful()) {
                    $this->createComment($data);
                }
            } else {
                return $comment;
            }
        });
    }

    protected function createComment($data)
    {
        Comment::create([
            'body' => $data['body'],
            'post_id' => $data['postId']
        ]);
    }
}
