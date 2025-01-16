<?php

namespace App\Models;

class Product {
    private int $id;
    private string $name;
    private string $description;
    private float $price;
    private bool $checked;

    public function __construct(int $id, string $name, string $description, float $price, bool $checked) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->checked = $checked;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function isChecked(): bool {
        return $this->checked;
    }

    public function setChecked(bool $checked): void {
        $this->checked = $checked;
    }
}