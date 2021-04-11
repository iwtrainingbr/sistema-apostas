<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Adapter\Connection;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

class UserApiController
{
    private EntityManager $entityManager;
    private ObjectRepository $repository;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager->getRepository(User::class);
    }

    public function getAction(): void
    {
        $data = [];

        foreach ($this->repository->findAll() as $user) {
            $data[] = [
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
            ];
        }

        echo json_encode($data);
    }

}