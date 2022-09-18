<?php


namespace App\Services\Admin;


use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Services\BaseService;

class ProductService extends BaseService
{

    public function storeProduct(StoreRequest $request)
    {
        $product = Product::create($request->all());

        return $this->successResponse($product);
    }

    public function showProduct(Product $product)
    {
        return $this->successResponse($product);
    }

    public function getAll()
    {
        $products = Product::all();

        return $this->successResponse($products);
    }

    public function updateProduct(Product $product,UpdateRequest $request)
    {
        $update =  $product->update($request->all());
        if ($update)
            return $this->successResponse(message:'updated success');

        return $this->errorResponse(error:'update not successfully');
    }

    public function deleteProduct(Product $product)
    {
        $deleted = $product->delete();

        if ($deleted)
            return $this->successResponse(message: 'deleted success');

        return $this->errorResponse(error:'delete not successfully');
    }
}
