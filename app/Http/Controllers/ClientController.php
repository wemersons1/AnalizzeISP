<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\IndexClientRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(IndexClientRequest $request) {
        $clients = User::myClients();

        if($request->name) {
            $clients = $clients->where('name', 'LIKE', '%'.$request->name.'%');
        }

        if($request->cpf) {
            $clients = $clients->where('cpf', 'LIKE', '%'.$request->cpf.'%');
        }

        if($request->email) {
            $clients = $clients->where('email', 'LIKE', '%'.$request->email.'%');
        }

        if($request->birthday_on_month) {
            $clients = $clients->where('birth_date', 'LIKE', '%'.$request->birthday_on_month.'%');
        }

        return $clients->paginate();
    }
}
