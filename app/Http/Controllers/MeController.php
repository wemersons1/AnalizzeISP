<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeController extends Controller
{
    public function show() {
        $userLogged = Auth::user();
        
        return $userLogged;
    }
}
