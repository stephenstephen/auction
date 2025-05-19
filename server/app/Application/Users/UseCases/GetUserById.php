<?php

namespace App\Application\Users\UseCases;

use App\Domains\User\Repositories\UserRepositoryInterface;
use App\Domains\User\Entities\User;

class GetUserById
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {}

    public function execute(string $id): ?User
    {
        return $this->userRepository->findById($id);
    }
}
