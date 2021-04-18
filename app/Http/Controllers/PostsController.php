<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Friend;
use Intervention\Image\Facades\Image;
use App\Http\Resources\PostCollection;
use App\Http\Resources\Post as PostResource;

class PostsController extends Controller
{
    public function index()
    {
        $friends = Friend::friendships();

        if ($friends->isEmpty()) {
            return new PostCollection(request()->user()->posts);
        }

        return new PostCollection(
            Post::whereIn('user_id', [$friends->pluck('user_id'), $friends->pluck('friend_id')])
                ->get()
        );
    }

    public function store()
    {
        $data = request()->validate([
            'body' => '',
            'image' => '',
            'width' => '',
            'height' => '',
        ]);

        if (isset($data['image'])) {
            $image = $data['image']->store('post-images', 'public');

            Image::make($data['image'])
                ->fit($data['width'], $data['height'])
                ->save(storage_path('app/public/post-images/'.$data['image']->hashName()));
        }

        $post = request()->user()->posts()->create([
            'body' => $data['body'],
            'image' => $image ?? null,
        ]);

        return new PostResource($post);
    }
}
