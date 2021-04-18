<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'posts',
                'post_id' => $this->id,
                'attributes' => [
                    'posted_by' => new UserResource($this->user),
                    'likes' => new LikeCollection($this->likes),
                    'comments' => new CommentCollection($this->comments),
                    'body' => $this->body,
                    'image' => !$this->image ?: Storage::disk('public')->url($this->image),
                    'posted_at' => $this->created_at->diffForHumans(),
                ]
            ],
            'links' => [
                'self' => url('/posts/'.$this->id),
            ]
        ];
    }
}
