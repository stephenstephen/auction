<?php

namespace App\Domains\User\Repositories;

use App\Domains\User\Entities\User;

interface UserRepositoryInterface
{
    public function findById(string $id): ?User;
    public function findByEmail(string $email): ?User;
    public function create(array $data): User;
}
