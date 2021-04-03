<?php

declare(strict_types=1);

namespace App\Controller;

class DashboardController extends AbstractController

{
    public function dashboardAction(): void
    {
        $this->render('dashboard/dashboard');
    }
}