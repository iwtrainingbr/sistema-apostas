<?php

declare(strict_types=1);

namespace App\Controller;

use App\Adapter\Connection;
use App\Entity\User;
use App\Security\AuthSecurity;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

class AuthenticationController extends AbstractController
{
    private EntityManager $entityManager;
    private ObjectRepository $userRepository;

    public function __construct()
    {
        $this->entityManager = Connection::getEntityManager();
        $this->userRepository = $this->entityManager->getRepository(User::class);
    }

    public function loginAction(): void
    {
        if (!$_POST) {
            $this->render('authentication/login');
            return;
        }

        $user = $this->userRepository->findOneBy([
            'email' => $_POST['email'],
        ]);

        if (!$user) {
            die('Usuário não encontrado');
        }

        if (!password_verify($_POST['password'], $user->getPassword())) {
            die('Senha incorreta');
        }

        $_SESSION[AuthSecurity::SESSION_NAME] = [
            'name' => $user->getName(),
            'id' => $user->getId(),
        ];

        $user->setLastAccess(new \DateTime());
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        header('location: /dashboard');
    }

    public function logoutAction(): void
    {
        session_destroy();

        header('location: /');
    }
}