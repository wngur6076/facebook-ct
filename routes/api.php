<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostsController;

Route::middleware('auth:api')->group(function () {
    Route::apiResources([
        '/posts' => PostController::class,
        '/users' => UserController::class,
        '/user/{user}/posts' => UserPostsController::class,
    ]);
});
