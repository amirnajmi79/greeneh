<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
use App\Services\Admin\ProductService;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function store(StoreRequest $request)
    {
        return $this->productService->storeProduct($request);
    }

    public function show(Product $product)
    {
        return $this->productService->showProduct($product);
    }

    public function index()
    {
        return $this->productService->getAll();
    }

    public function update(Product $product,UpdateRequest $request)
    {
        return $this->productService->updateProduct($product,$request);
    }

    public function destroy(Product $product)
    {
        return $this->productService->deleteProduct($product);
    }
}
