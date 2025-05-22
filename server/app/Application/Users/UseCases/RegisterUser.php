<?php

namespace App\Application\Users\UseCases;

use App\Domains\User\Repositories\UserRepositoryInterface;
use App\Domains\User\Entities\User;
use App\Application\Users\DTOs\UserDataDTO;

class RegisterUser
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {}

    public function execute(UserDataDTO $data): User
    {
        return $this->userRepository->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password,
        ]);
    }
}
