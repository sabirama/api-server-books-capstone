<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Models\ImageMedia;

class UserController extends Controller
{


    public function viewUser() {

        $image = ImageMedia::whereIn('type',['user_image'])->whereIn('associated_id', [$this->id])->get();
        $user = auth()->User();

        return response([
            'user'=> new UserResource($user),
            'user_image' => $image,
        ]);

    }

}
