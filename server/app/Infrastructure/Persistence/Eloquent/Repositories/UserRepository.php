<?php

namespace App\Infrastructure\Persistence\Eloquent\Repositories;

use App\Domains\User\Entities\User;
use App\Domains\User\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\Models\User as UserModel;

class UserRepository implements UserRepositoryInterface
{
    public function findById(string $id): ?User
    {
        $userModel = UserModel::find($id);
        return $userModel ? $this->mapToUser($userModel) : null;
    }

    public function findByEmail(string $email): ?User
    {
        $userModel = UserModel::where('email', $email)->first();
        return $userModel ? $this->mapToUser($userModel) : null;
    }

    public function create(array $data): User
    {
        $data['password'] = bcrypt($data['password']);
        $userModel = UserModel::create($data);
        return $this->mapToUser($userModel);
    }

    private function mapToUser(UserModel $userModel): User
    {
        return new User(
            id: $userModel->id,
            name: $userModel->name,
            email: $userModel->email,
            password: $userModel->password
        );
    }
}
