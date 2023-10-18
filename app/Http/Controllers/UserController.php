<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\ImageMedia;

class UserController extends Controller
{


    public function viewUser() {

        $user = auth()->User();
        $image = ImageMedia::whereIn("image_type",["user_image"])->whereIn("associated_id",[$user->id])->get()->first();
        return[
            'user'=> new UserResource($user),
            'user_image' => $image,
        ];

    }

    public function allUsers() {
        $users = User::all();

        return [
            'users' => UserResource::collection($user)
        ];
    }

}
