<?php

namespace App\Domain\Product\Services;

use App\Domain\Product\Entities\Product;
use App\Domain\Product\Repositories\ProductRepositoryInterface;

class ProductService
{
    public function __construct(private ProductRepositoryInterface $repository) {}

    public function list(): array {
        return $this->repository->all();
    }

    public function get(int $id): ?Product {
        return $this->repository->find($id);
    }

    public function create(Product $product): Product {
        return $this->repository->create($product);
    }

    public function update(int $id, Product $product): Product {
        return $this->repository->update($id, $product);
    }

    public function delete(int $id): void {
        $this->repository->delete($id);
    }
}
