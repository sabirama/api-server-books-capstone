<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{

    public function viewUser() {

        $user = auth()->User();
       return new UserResource($user);

    }

}
