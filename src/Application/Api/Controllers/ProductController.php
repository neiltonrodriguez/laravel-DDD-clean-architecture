<?php

namespace App\Application\Api\Controllers;

use App\Domain\Product\Entities\Product;
use App\Domain\Product\Services\ProductService;
use Illuminate\Http\Request;

class ProductController
{
    public function __construct(private ProductService $service) {}

    public function index() {
        return response()->json($this->service->list());
    }

    public function show(int $id) {
        return response()->json($this->service->get($id));
    }

    public function store(Request $request) {
        $product = new Product($request->name, $request->description, $request->price);
        return response()->json($this->service->create($product));
    }

    public function update(Request $request, int $id) {
        $product = new Product($id, $request->name, $request->description, $request->price);
        return response()->json($this->service->update($id, $product));
    }

    public function destroy(int $id) {
        $this->service->delete($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
