<?php

declare(strict_types=1);

namespace App\Security;

use App\Exception\NotExistsUserLoggedException;
use App\Exception\UserNotIsAdminException;

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
            throw new NotExistsUserLoggedException();
        }

        return $_SESSION[self::SESSION_NAME];
    }

    public static function checkIsAdmin(): bool
    {
        $user = self::getUserLogged();

        if (!isset($user)) {
            throw new UserNotIsAdminException();
        }

        return true;
    }
}
