<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
           
            return response()->json([
                "message" => "Usuário ou senha inválido"
            ], 400);
        }
     
        $token = $user->createToken($request->email)->plainTextToken;
        return response()->json([
            "token" => $token,
            "user" => $user
        ]);
    }
}
