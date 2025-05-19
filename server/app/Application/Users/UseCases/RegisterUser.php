<?php

namespace App\Application\Users\UseCases;

use App\Domains\User\Repositories\UserRepositoryInterface;
use App\Domains\User\Entities\User;

class RegisterUser
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {}

    public function execute(array $data): User
    {
        return $this->userRepository->create($data);
    }
}
