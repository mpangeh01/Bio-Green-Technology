<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Farm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    //

    public function register(RegisterRequest $request)
    {
        // Validate the request
        $request->validated();

        // Create user data array
        $userData = [
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ];

        // Create the user
        $user = User::create($userData);

        // Create the farm and associate it with the user
        $farmData = [
            'name' => $request->farm,
            'address' => $request->address,
            'region' => $request->region,
            'user_id' => $user->id,
        ];

        $farm = Farm::create($farmData);

        // Create the token
        $token = $user->createToken('Abaleya')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
        ], 200);
    }

}
