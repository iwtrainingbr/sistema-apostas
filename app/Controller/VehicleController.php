<?php

declare(strict_types=1);

namespace App\Controller;

class VehicleController extends AbstractController
{
    public function listAction(): void
    {
        $this->render('vehicle/list');
    }

    public function addAction(): void
    {
        $this->render('vehicle/add');
    }

    public function removeAction(): void
    {

    }

    public function editAction(): void
    {

    }
}