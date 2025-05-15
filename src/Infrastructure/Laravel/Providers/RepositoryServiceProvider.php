<?php

namespace App\Infrastructure\Laravel\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Product\Repositories\ProductRepositoryInterface;
use App\Infrastructure\Laravel\Repositories\EloquentProductRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void {
        $this->app->bind(ProductRepositoryInterface::class, EloquentProductRepository::class);
    }
}
