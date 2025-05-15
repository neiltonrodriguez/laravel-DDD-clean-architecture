<?php

namespace App\Application\Website\Controllers;

use App\Domain\Product\Services\ProductService;
use Illuminate\Http\Request;
use App\Domain\Product\Entities\Product;
use App\Application\Website\Requests\ProductStoreRequest;

class ProductController
{
    private ProductService $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->list();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

     public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'description' => ['nullable', 'string'],
        ]);

        // Corrigido: transformar array em entidade
        $product = new Product(
            name: $validated['name'],
            price: $validated['price'],
            description: $validated['description'] ?? null
        );

        $this->productService->create($product);

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }
}
