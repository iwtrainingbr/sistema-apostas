<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping\{
    Entity,
    Column,
    Id,
    GeneratedValue
};

#[Entity]
class Category
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    private int $id;

    #[Column]
    private string $name;

    #[Column]
    private string $description;
}