<?php

namespace App\Application\Users\UseCases;

use App\Domains\User\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginUser
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {}

    public function execute(string $email, string $password)
    {
        $user = $this->userRepository->findByEmail($email);

        if (! $user || ! Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Les identifiants sont invalides.'],
            ]);
        }

        // Récupérer le modèle Eloquent pour créer le token
        $userModel = UserModel::find($user->id);
        $token = $userModel->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
