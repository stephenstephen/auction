<?php

namespace App\Infrastructure\Http\Controllers;

use App\Application\Users\UseCases\LoginUser;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function login(Request $request, LoginUser $loginUser): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        try {
            $result = $loginUser->execute($credentials['email'], $credentials['password']);
            return response()->json($result);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Identifiants invalides.',
                'errors' => $e->errors(),
            ], 422);
        }
    }

    public function me(Request $request): JsonResponse
    {
        return response()->json($request->user());
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Déconnexion réussie']);
    }
}
