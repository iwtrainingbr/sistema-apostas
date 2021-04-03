<?php

declare(strict_types=1);

namespace App\Security;

abstract class UserPassword
{
    public static function encrypt(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2I);
    }
}
