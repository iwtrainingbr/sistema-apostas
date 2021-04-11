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
        $data = [];

        foreach ($this->repository->findAll() as $category) {
            $data[] = [
                'id' => $category->getId(),
                'name' => $category->getName(),
                'description' => $category->getDescription(),
            ];
        }

        echo json_encode($data);
    }

    public function postAction(): void
    {
        $request = json_decode(
            file_get_contents('php://input'), true
        );

        $category = new Category();
        $category->setName($request['name']);
        $category->setDescription($request['description']);

        $this->entityManager->persist($category);
        $this->entityManager->flush();

        $request['id'] = $category->getId();

        echo json_encode($request);
    }

    public function putAction(): void
    {
        $id = $_GET['id'];

        $request = json_decode(
            file_get_contents('php://input'), true
        );

        $category = $this->repository->find($id);
        $category->setName($request['name']);
        $category->setDescription($request['description']);

        $this->entityManager->persist($category);
        $this->entityManager->flush();

        echo json_encode($request);
    }

    public function deleteAction(): void
    {
        $id = $_GET['id'];

        $category = $this->repository->find($id);

        $request = json_decode(
            file_get_contents('php://input'), true
        );

        $this->entityManager->remove($category);
        $this->entityManager->flush();
    }
}