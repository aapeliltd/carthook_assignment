<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('/users', 'UserController');

Route::group(['prefix' => 'users'], function() {
    Route::apiResource('/{user}/posts', 'PostController');
});

