<?php

namespace App\Http\Resources;

use App\Model\Post;
use App\Model\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $post = Post::findOrFail($this->post_id);
        $user = User::findOrFail($post->user_id);
        return [
            'username' => $user->username,
            'email' => $user->email,
            'body' => $this->body,
            'href' => [
                'link' => route('comments.show', [$this->post_id, $this->id]),
                'user' => route('users.show', $post->user_id),
                'posts' => route('posts.index', $post->user_id)

            ]
        ];
    }
}
