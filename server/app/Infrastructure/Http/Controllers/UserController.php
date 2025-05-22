<?php

namespace App\Infrastructure\Http\Controllers;

use App\Application\Users\UseCases\RegisterUser;
use App\Application\Users\UseCases\GetUserById;
use App\Application\Users\DTOs\UserDataDTO;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function store(Request $request, RegisterUser $registerUser): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $userData = new UserDataDTO(
            name: $validated['name'],
            email: $validated['email'],
            password: $validated['password']
        );

        $user = $registerUser->execute($userData);
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
