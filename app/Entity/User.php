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

    /**
     * @Column()
     */
    private string $image;

    /**
     * @Column(length=11, unique=true)
     */
    private string $cpf;

    /**
     * @Column(type="boolean")
     */
    private bool $admin;

    /**
     * @Column(type="datetime")
     */
    private \DateTime $createdAt;

    /**
     * @Column(type="datetime")
     */
    private \DateTime $updatedAt;

    /**
     * @Column(type="datetime", nullable=true)
     */
    private ?\DateTime $lastAccess;

    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->admin = false;
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

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

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function isAdmin(): bool
    {
        return $this->admin;
    }

    public function setAdmin(bool $admin): void
    {
        $this->admin = $admin;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getLastAccess(): ?\DateTime
    {
        return $this->lastAccess;
    }

    public function setLastAccess(\DateTime $lastAccess): void
    {
        $this->lastAccess = $lastAccess;
    }
}
