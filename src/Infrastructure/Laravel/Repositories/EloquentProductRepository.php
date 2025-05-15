<?php

namespace App\Infrastructure\Laravel\Repositories;

use App\Domain\Product\Entities\Product as ProductEntity;
use App\Domain\Product\Repositories\ProductRepositoryInterface;
use App\Infrastructure\Laravel\Models\Product as ProductModel;

class EloquentProductRepository implements ProductRepositoryInterface
{
    public function all(): array {
        return ProductModel::all()->map(fn($p) => $this->toEntity($p))->all();
    }

    public function find(int $id): ?ProductEntity {
        $model = ProductModel::find($id);
        return $model ? $this->toEntity($model) : null;
    }

    public function create(ProductEntity $product): ProductEntity {
        $model = ProductModel::create([
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
        ]);
        return $this->toEntity($model);
    }

    public function update(int $id, ProductEntity $product): ProductEntity {
        $model = ProductModel::findOrFail($id);
        $model->update([
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
        ]);
        return $this->toEntity($model);
    }

    public function delete(int $id): void {
        ProductModel::destroy($id);
    }

    private function toEntity(ProductModel $model): ProductEntity {
        return new ProductEntity(
            name: $model->name,
            description: $model->description,
            price: $model->price,
        );
    }
}
