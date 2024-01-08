<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\IndexUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexUserRequest $request)
    {
        $users = User::myUsers()->with(['company', 'status']);

        if($request->name) {
            $users = $users->where('name', 'LIKE', '%'.$request->name.'%');
        }

        if($request->cpf) {
            $users = $users->where('cpf', 'LIKE', '%'.$request->cpf.'%');
        }

        if($request->email) {
            $users = $users->where('email', 'LIKE', '%'.$request->email.'%');
        }

        if($request->birthday_on_month) {
            $users = $users->where('birth_date', 'LIKE', '%'.$request->birthday_on_month.'%');
        }

        return $users->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::myUsers()->with(['company', 'status'])->find($id);

        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $validated = $request->validated();
        $user = User::myUsers()->find($id);

        $user->update($validated);

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::myUsers()->find($id);
        $user->delete();

        return response()->noContent();
    }
}
