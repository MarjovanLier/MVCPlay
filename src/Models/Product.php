<?php

declare(strict_types=1);

namespace App\Models;

class Product
{
    public function __construct(private readonly int $id, private readonly string $name, private readonly string $description, private readonly float $price, private bool $checked)
    {
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getDescription(): string
    {
        return $this->description;
    }


    public function getPrice(): float
    {
        return $this->price;
    }


    public function isChecked(): bool
    {
        return $this->checked;
    }


    public function setChecked(bool $checked): void
    {
        $this->checked = $checked;
    }
}
