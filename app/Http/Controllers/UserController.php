<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'password' => $request->validated('password'),
        ]);

        if ($request->validated('role')) {
            $role = Role::where('name', $request->role)->first();
            $user->roles()->attach($role->id);
        }

        return new UserResource($user);
    }

    public function login(LoginUserRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!($user && Hash::check($request->password, $user->password))) {
            return Response::json([
                'code' => 0,
                'message' => 'Invalid credentials',
            ], 401);
        }
        $token = $user->createToken('mentorShip access token');

        return Response::json([
            'code' => 1,
            'token' => $token->plainTextToken,
            'user' => $user,
        ], 201);
    }
}
