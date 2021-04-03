<?php

declare(strict_types=1);

namespace App\Controller;

use App\Adapter\Connection;
use App\Entity\User;
use App\Security\AuthSecurity;
use App\Security\UserPassword;
use App\Validator\UserValidator;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

class UserController extends AbstractController
{
    private EntityManager $entityManager;
    private ObjectRepository $repository;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->repository = $this->entityManager->getRepository(User::class);
    }

    public function listAction(): void
    {
        if (!AuthSecurity::userIsLogged()) {
            header('location: /?error=Precisar estar logado');
            return;
        }

        $this->render('user/list', [
            'users' => $this->repository->findAll(),
        ]);
    }

    public function addAction(): void
    {
        if (!$_POST) {
            $this->render('user/add');
            return;
        }

        try {
            UserValidator::validateCreateUser();

            $newUser = new User(
                $_POST['name'],
                $_POST['email'],
                UserPassword::encrypt($_POST['password'])
            );
            $newUser->setCpf(
                str_replace(['.', '-'], '', $_POST['cpf']) //preg_replace('/\D/', '', $_POST['cpf'])
            );
            $newUser->setImage('---');

            $this->entityManager->persist($newUser);
            $this->entityManager->flush();

            header('location: /usuario/listar');
        } catch (\Exception $exception) {
            die($exception->getMessage());
        }
    }

    public function editAction(): void
    {
        $this->render('user/edit');
    }

    public function removeAction(): void
    {
    }
}