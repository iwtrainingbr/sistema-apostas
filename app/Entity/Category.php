<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping\{
    Entity,
    Column,
    Id,
    GeneratedValue
};

/**
 * @Entity()
 */
class Category
{
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(length=30)
     */
    private string $name;

    /**
     * @Column()
     */
    private string $description;

    /**
     * @Column(nullable=true)
     */
    private ?string $image;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}