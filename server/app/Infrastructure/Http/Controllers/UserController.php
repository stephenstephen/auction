<?php

namespace App\Infrastructure\Http\Controllers;

use App\Application\Users\UseCases\RegisterUser;
use App\Application\Users\UseCases\GetUserById;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function store(Request $request, RegisterUser $registerUser): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = $registerUser->execute($validated);
        return response()->json($user, 201);
    }

    public function show(string $id, GetUserById $getUser): JsonResponse
    {
        $user = $getUser->execute($id);
        return $user
            ? response()->json($user)
            : response()->json(['message' => 'User not found'], 404);
    }
}
