<?php

namespace App\Http\Controllers;

use App\Http\Requests\Me\UpdateMeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeController extends Controller
{
    public function show() {
        $userLogged = Auth::user();
        
        return $userLogged;
    }

    public function update(UpdateMeRequest $request) {
        $validated = $request->validated();
        $userLogged = Auth::user();
        $user = User::find($userLogged->id);
        $user->update($validated);

        return $user;
    }
}
