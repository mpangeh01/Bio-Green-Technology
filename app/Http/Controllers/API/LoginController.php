<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function login(LoginRequest $request){

        $request->validated();

        $user = User::where('email', $request->email)->first();

        if(!$user|| !Hash::check($request->password, $user->password)){

            return response(
                [
                    'message' => 'Contact Support'
                ], 422
            );
        }

        // Update the fcm_token
        $user->update(['fcm_token' => $request->fcm_token]);

        $token = $user->createToken('Abaleya')->plainTextToken;
        $user->is_verified = (bool) $user->is_verified;

        return response([
            'user' => $user,
            'token' => $token
        ], 200);
    }

}
