<?php

declare(strict_types=1);

namespace App\Exception;

use Throwable;

class UserNotIsAdminException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Usuário precisa estar logado com perfil de administrador');
    }
}