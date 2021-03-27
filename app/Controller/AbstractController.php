<?php

declare(strict_types=1);

namespace App\Controller;

abstract class AbstractController
{
    public function render(string $viewName, array $data = []): void
    {
        extract($data);

        include "../views/{$viewName}.phtml";
    }

    public static function navbar(): void
    {
        include "../views/_partials/navbar.phtml";
    }
}


//if (isset($_SESSION['user_logged'])) {
//include_once "../src/View/template/navbar.phtml";
//}
//include_once "../app/View/{$viewName}.phtml";
//}

//
//

