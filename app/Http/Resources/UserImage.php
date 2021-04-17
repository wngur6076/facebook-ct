<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class UserImage extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => [
                'type' => 'user-images',
                'user_image_id' => $this->id,
                'attributes' => [
                    'path' => Storage::disk('public')->url($this->path),
                    'width' => $this->width,
                    'height' => $this->height,
                    'location' => $this->location,
                ]
            ],
            'links' => [
                'self' => url('/users/'.$this->user_id),
            ]
        ];
    }
}
