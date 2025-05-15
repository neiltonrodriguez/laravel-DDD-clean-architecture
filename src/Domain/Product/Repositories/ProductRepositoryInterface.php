<?php

namespace App\Domain\Product\Repositories;

use App\Domain\Product\Entities\Product;

interface ProductRepositoryInterface
{
    public function all(): array;
    public function find(int $id): ?Product;
    public function create(Product $product): Product;
    public function update(int $id, Product $product): Product;
    public function delete(int $id): void;
}
