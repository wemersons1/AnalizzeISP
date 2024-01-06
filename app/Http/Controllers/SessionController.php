<?php

namespace App\Http\Controllers;

use App\Http\Requests\Session\StoreSessionRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function store(StoreSessionRequest $request) 
    {     
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            
            return response()->json([
                "message" => "Usuário ou senha inválidos"
            ], 401);
        }
     
        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            "token" => $token,
            "user" => $user
        ]);
    }
}
