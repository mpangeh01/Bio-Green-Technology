<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    //

    public function register(RegisterRequest $request)
    {

        $request->validated();

        $userData = [

            'name' => $request->name,
            'phone'=> $request->phone,
            'email' => $request->email,
            'fcm_token' => $request->fcm_token,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($userData);

        $token = $user->createToken('Abaleya')->plainTextToken;

        return response([

            'user'=> $user,
            'token' => $token,
        ], 200);
    }
}
