<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    public function show(User $user)
    {
        return new UserResource($user);
    }
}
