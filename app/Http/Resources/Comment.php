<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'comments',
                'comment_id' => $this->id,
                'attributes' => [
                    'commented_by' => [
                        'data' => [
                            'attributes' => [
                                'name' => $this->user->name,
                                'user_id' => $this->user->id,
                            ]
                        ]
                    ],
                    'body' => $this->body,
                    'commented_at' => $this->created_at->diffForHumans(),
                ]
            ],
            'links' => [
                'self' => url('/posts/'.$this->post_id),
            ]
        ];
    }
}
