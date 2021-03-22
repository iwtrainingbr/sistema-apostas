<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\Adapter\Connection;

include dirname(__DIR__).'/vendor/autoload.php';
include dirname(__DIR__).'/config/database.php';

$entityManager = Connection::getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);