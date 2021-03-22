<?php

declare(strict_types=1);

namespace App\Entity;

//use Doctrine\ORM\Mapping\Table;
//use Doctrine\ORM\Mapping\Column;
//use Doctrine\ORM\Mapping\Id;
//use Doctrine\ORM\Mapping\GeneratedValue;

use Doctrine\ORM\Mapping\{
    Entity,
    Column,
    Id,
    GeneratedValue
};

/**
 * @Entity()
 */
class User
{
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(length=60)
     */
    private string $name;

    /**
     * @Column(unique=true)
     */
    private string $email;

    /**
     * @Column()
     */
    private string $password;
}