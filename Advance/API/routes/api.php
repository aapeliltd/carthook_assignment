<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('Api')->group(function () {

    Route::apiResource('/users', 'UserController')->only(['index', 'show']);

    Route::group(['prefix' => 'users'], function () {
        Route::apiResource('/{user}/posts', 'PostController')->only(['index', 'show']);
    });

    Route::group(['prefix' => 'posts'], function () {
        Route::apiResource('/{post}/comments', 'CommentController')->only(['index', 'show']);
    });

    //we will be querying users a lot by email, not just ID
    // example: http://localhost:8000/api/users/email/Sincere@april.biz
    Route::get('/users/email/{email}', 'UserController@getUserByEmail')->name('users.email');

    // search posts by titles (so if a title of a post contains a specific string)
    //example http://localhost:8000/api/posts/search?title=james
    Route::get('/posts/search', 'PostController@getPostByTitle')->name('post.title');
});
