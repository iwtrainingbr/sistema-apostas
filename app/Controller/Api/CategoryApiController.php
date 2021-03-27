<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Adapter\Connection;
use App\Entity\Category;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

class CategoryApiController
{
    private EntityManager $entityManager;
    private ObjectRepository $repository;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager->getRepository(Category::class);
    }

    public function getAction(): void
    {
        header('Content-Type: application/json');

        echo json_encode(
            $this->repository->findAll()
        );
    }
}