<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $token = $request->user()->createToken('API');
        return response()->json([
            'token' => $token->plainTextToken,
        ]);
    }

    public function me()
    {
        return auth()->user();
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'massage' => 'all tokens revoked'
        ]);
    }
}
