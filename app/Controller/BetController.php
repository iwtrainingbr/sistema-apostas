<?php

declare(strict_types=1);

namespace App\Controller;

class BetController extends AbstractController

{
    public function listAction(): void
    {
        $this->render('bet/list');
    }

    public function addAction(): void
    {
        $this->render('bet/add');
    }

    public function editAction(): void
    {
        $this->render('bet/edit');
    }

    public function removeAction(): void
    {
    }
}