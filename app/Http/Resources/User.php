<?php

namespace App\Http\Resources;

use App\Http\Resources\Friend as FriendResource;
use App\Models\Friend;
use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'users',
                'user_id' => $this->id,
                'attributes' => [
                    'name' => $this->name,
                    'friendship' => new FriendResource(Friend::friendship($this->id)),
                ]
            ],
            'links' => [
                'self' => url('/users/'.$this->id),
            ]
        ];
    }
}
