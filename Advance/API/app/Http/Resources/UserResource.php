<?php

namespace App\Http\Resources;

use App\Model\Comment;
use App\Model\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = User::find($this->id);
        return [
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'href' => [
                'link' => route('users.show', $this->id),
                'posts' => route('posts.index', $this->id)
            ]
        ];
    }
}
