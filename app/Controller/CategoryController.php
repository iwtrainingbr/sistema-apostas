<?php

declare(strict_types=1);

namespace App\Controller;

use App\Adapter\Connection;
use App\Entity\Category;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

class CategoryController extends AbstractController
{
    private EntityManager $entityManager;
    private ObjectRepository $repository;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager->getRepository(Category::class);
    }

    public function listAction(): void
    {
        $categories = $this->repository->findAll();

        $this->render('category/list', [
            'categories' => $categories,
        ]);
    }

    public function addAction(): void
    {
        if (!$_POST) {
            $this->render('category/add');
            return;
        }

        $category = new Category();
        $category->setName($_POST['name']);
        $category->setDescription($_POST['description']);

        // INSERT INTO Category (name, description) VALUES ('nome', 'descricao');
        $this->entityManager->persist($category);
        $this->entityManager->flush();

        header('location: /categorias/listar');
    }

    public function editAction(): void
    {
        $this->render('category/edit');
    }

    public function removeAction(): void
    {
        $id = $_GET['id'];

        $category = $this->repository->find($id);

        $this->entityManager->remove($category);
        $this->entityManager->flush();

        header('location: /categorias/listar');
    }
}