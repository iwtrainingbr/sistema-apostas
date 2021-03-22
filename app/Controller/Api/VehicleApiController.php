<?php

declare(strict_types=1);

namespace App\Controller\Api;

class VehicleApiController
{
    public function getAction(): void
    {
        header('Content-Type: application/json');

        echo json_encode([
            [
                'make' => 'Chevrolet',
                'model' => 'Celta',
            ],
            [
                'make' => 'VolksWagen',
                'model' => 'Gol',
            ],
            [
                'make' => 'Fiat',
                'model' => 'Palio',
            ],
        ]);
    }
}