<?php

declare(strict_types=1);

use App\Entity\User;
use App\Adapter\Connection;
use App\Security\UserPassword;

include dirname(__DIR__).'/vendor/autoload.php';
include dirname(__DIR__).'/config/database.php';

$entityManager = Connection::getEntityManager();

$user = new User(
    'Administrador Padrão',
    'admin@admin.com',
    UserPassword::encrypt('12345678')
);
$user->setImage('https://avatars.githubusercontent.com/u/37630861?v=4');
$user->setCpf('12312312312');
$user->setAdmin(true);

$entityManager->persist($user);
$entityManager->flush();

echo PHP_EOL.'#####################################'.PHP_EOL;
echo '### USUÁRIO PADRÃO CRIADO! '.PHP_EOL;
echo "### Usuário/Email: {$user->getEmail()}".PHP_EOL;
echo "### Senha: 12345678".PHP_EOL;
echo '#####################################'.PHP_EOL;
echo '### IMPORTANTE: Altere a senha depois do primeiro login'.PHP_EOL;
echo '#####################################'.PHP_EOL;
