<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'body' => $this->body,
            'href' => [
                'link' => route('posts.show', [$this->user_id, $this->id]),
                'user' => route('users.show', $this->user_id),
                'comments' => route('comments.index', $this->id)
            ]
        ];
    }
}
