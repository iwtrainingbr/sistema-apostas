<?php

declare(strict_types=1);

namespace App\Controller;

class CategoryController extends AbstractController

{
    public function listAction(): void
    {
        $this->render('category/list');
    }

    public function addAction(): void
    {
        $this->render('category/add');
    }

    public function editAction(): void
    {
        $this->render('category/edit');
    }

    public function removeAction(): void
    {
    }
}