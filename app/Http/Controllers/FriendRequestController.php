<?php

namespace App\Http\Controllers;

use App\Http\Resources\Friend as FriendReource;
use App\Models\User;
use App\Models\Friend;

class FriendRequestController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'friend_id' => '',
        ]);

        User::find($data['friend_id'])
            ->friends()->attach(auth()->user());

        return new FriendReource(
            Friend::where('user_id', auth()->user()->id)
                ->where('friend_id', $data['friend_id'])
                ->first()
        );
    }
}
