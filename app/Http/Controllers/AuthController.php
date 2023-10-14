<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     // create user data and log-in creds
     public function register(Request $request) {
        $fields = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|unique:users,email|email',
            'password' => 'required|string|confirmed',
            'gender' => 'required|string',
            'birthdate' => 'required|date',
        ]);

        $user = User::create([
            "username" => $fields["username"],
            "first_name" => $fields["first_name"],
            "last_name" => $fields["last_name"],
            "email" => $fields["email"],
            "password" => bcrypt($fields["password"]),
            "gender" => $fields["gender"],
            "birthdate" => $fields["birthdate"]
        ]);

        $token = $user->createToken("userAuth")->plainTextToken;

        return response([
            "user" => $user,
            "token" => $token
        ], 201);
    }


    //log-in function
          public function login(Request $request)  {
        $fields = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $fields['username'])->first();

        if ($user) {

            if(!Hash::check($fields['password'], $user->password)) {
                return response (["Wrong Password"],401);
            }

            $token = $user->createToken('userAuth')->plainTextToken;

            return response([
                'user' => $user,
                'token' => $token
        ], 201);
        }

        return response( "Username does not exist");

        }

      public function viewUser(Request $request, $id) {

        if($user = User::find($id)) {
            return response($user::get(['first_name','last_name','gender'])->first());
        }

        return response(['message' => 'User does not exist'],301);

    }

    public function logout(Request $request){
        auth()->User()->tokens()->delete();

          return response([
            'message'=>'logged out'
          ]);
    }
}
