<?php

namespace App\Infrastructure\Persistence\Eloquent\Repositories;

use App\Domains\User\Entities\User;
use App\Domains\User\Repositories\UserRepositoryInterface;
use App\Models\User as UserModel;

class UserRepository implements UserRepositoryInterface
{
    public function findById(string $id): ?User
    {
        return UserModel::find($id);
    }

    public function findByEmail(string $email): ?User
    {
        return UserModel::where('email', $email)->first();
    }

    public function create(array $data): User
    {
        $data['password'] = bcrypt($data['password']);
        return UserModel::create($data);
    }
}
