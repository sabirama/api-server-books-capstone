<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{

    public function viewUser() {

        $user = auth()->User();

       return new UserResource($user);


    }
}
