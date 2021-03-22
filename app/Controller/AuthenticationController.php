<?php

declare(strict_types=1);

namespace App\Controller;

class AuthenticationController extends AbstractController
{
    public function loginAction(): void
    {
        $this->render('authentication/login');
    }

    public function logoutAction(): void
    {
        $this->render('authentication/logout');
    }

}