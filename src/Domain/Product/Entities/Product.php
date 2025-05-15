<?php

namespace App\Domain\Product\Entities;

class Product
{
    public function __construct(
        public string $name,
        public ?string $description,
        public float $price
    ) {}
}
