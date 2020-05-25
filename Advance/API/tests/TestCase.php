<?php

namespace Tests;

use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function create(string $model, array $attributes = [])
    {

        $user = factory("App\\Model\\$model")->create($attributes);

        return new UserResource($user);
    }
    public function createPost(string $model, array $attributes = [])
    {

        $post = factory("App\\Model\\$model")->create($attributes);

        return new PostResource($post);
    }

    public function createComment(string $model, array $attributes = [])
    {

        $comment = factory("App\\Model\\$model")->create($attributes);

        return $comment;
    }


}
