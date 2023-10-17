<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{


    public function viewUser() {


        $user = auth()->User();

        return response([
            'user'=> new UserResource($user),
            'user_image' => $image,
        ]);

    }

    public function allUsers() {
        $users = User::all();

        return response([
            'users' => UserResource::collection($user)
        ]);
    }

}
