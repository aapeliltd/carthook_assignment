<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Comment;
use Faker\Generator as Faker;
use App\Model\Post;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => function () {
            return Post::all()->random();
        },
        'body' => $faker->paragraph
    ];
});
