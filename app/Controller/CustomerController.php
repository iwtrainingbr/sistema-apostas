<?php

declare(strict_types=1);

namespace App\Controller;

class CustomerController extends AbstractController
{
    public function listAction(): void
    {
        $this->render('customer/list');
    }
}