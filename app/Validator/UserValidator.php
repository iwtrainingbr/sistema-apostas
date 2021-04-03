<?php

declare(strict_types=1);

namespace App\Validator;

class UserValidator
{
    public static function validateCreateUser(): bool
    {
        if (strlen($_POST['password']) < 8) {
            throw new \Exception('Senha Inválida, precisa de no minimo 8 digitos');
        }

        if (strlen($_POST['cpf']) < 11) {
            throw new \Exception('CPF está inválido, precisa de 11 digitos');
        }

        //faz quantas validaćões precisar

        return true;
    }
}