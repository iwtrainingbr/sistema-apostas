<?php

declare(strict_types=1);

namespace App\Controller;

class BidController extends AbstractController

{
    public function listAction(): void
    {
        $this->render('bid/list');
    }

    public function addAction(): void
    {
        $this->render('bid/add');
    }

    public function editAction(): void
    {
        $this->render('bid/edit');
    }

    public function removeAction(): void
    {
    }
}