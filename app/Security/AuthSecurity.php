<?php

declare(strict_types=1);

namespace App\Security;

class AuthSecurity
{
    public const SESSION_NAME = 'apostas_do_poder';

    public static function userIsLogged(): bool
    {
        return isset($_SESSION[self::SESSION_NAME]);
    }

    public static function getUserLogged(): array
    {
        if (!self::userIsLogged()) {
            throw new \Exception('Não existe usuário logado');
        }

        return $_SESSION[self::SESSION_NAME];
    }
}