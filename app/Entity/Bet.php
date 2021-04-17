<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping\{
    Entity,
    Id,
    Column,
    GeneratedValue,
    ManyToOne,
    JoinColumn
};

/**
 * @Entity()
 */
class Bet
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
    private string $title;

    /**
     * @Column()
     */
    private string $description;

    /**
     * @Column(nullable=true)
     */
    private ?string $photo;

    /**
     * @Column(type="decimal")
     */
    private float $fee;

    /**
     * @Column(type="decimal")
     */
    private float $value;

    /**
     * @ManyToOne(targetEntity="Category")
     * @JoinColumn(referencedColumnName="id", name="category_id")
     */
    private Category $category;

    /**
     * @Column(type="datetime")
     */
    private \DateTime $date;

    public function __construct(string $title, Category $category, \DateTime $date)
    {
        $this->title = $title;
        $this->category = $category;
        $this->date = $date;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }

    public function getFee(): float
    {
        return $this->fee;
    }

    public function setFee(float $fee): void
    {
        $this->fee = $fee;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}