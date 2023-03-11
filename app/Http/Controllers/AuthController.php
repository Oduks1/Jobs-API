<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    $accessToken = Auth::user()->createToken('authToken')->accessToken;

    return response()->json(['access_token' => $accessToken], 200);
}

public function logout(Request $request)
{
    $request->user()->token()->revoke();

    return response()->json([
        'message' => 'Successfully logged out'
    ]);
}

}
