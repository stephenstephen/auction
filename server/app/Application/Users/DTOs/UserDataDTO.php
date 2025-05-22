<?php

namespace App\Application\Users\DTOs;

class UserDataDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}
}
