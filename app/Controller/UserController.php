<?php

declare(strict_types=1);

namespace App\Controller;

class UserController extends AbstractController

{
    public function listAction(): void
    {
        $this->render('user/list');
    }

    public function addAction(): void
    {
        $this->render('user/add');
    }

    public function editAction(): void
    {
        $this->render('user/edit');
    }

    public function removeAction(): void
    {
    }
}