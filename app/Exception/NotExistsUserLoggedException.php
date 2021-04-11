<?php

declare(strict_types=1);

namespace App\Exception;

class NotExistsUserLoggedException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Não existe usuário logado');
    }
}