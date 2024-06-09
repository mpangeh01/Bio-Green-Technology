<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->validated();

        // Determine if the provided credential is an email or phone number
        $loginField = filter_var($request->email_or_phone, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        // Fetch the user by the determined field
        $user = User::where($loginField, $request->email_or_phone)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
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
