<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostsController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\FriendRequestResponseController;

Route::middleware('auth:api')->group(function () {

    Route::get('auth-user', [AuthUserController::class, 'show']);

    Route::apiResources([
        '/posts' => PostsController::class,
        '/posts/{post}/like' => PostLikeController::class,
        '/posts/{post}/comment' => PostCommentController::class,
        '/users' => UsersController::class,
        '/users/{user}/posts' => UserPostsController::class,
        '/friend-request' => FriendRequestController::class,
        '/friend-request-response' => FriendRequestResponseController::class,
    ]);
});
