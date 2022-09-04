<?php


namespace App\Services\Admin;

use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Category;
use App\Services\BaseService;

class CategoryService extends BaseService
{
    public function storeCategory(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $category = Category::create($request->all());

        return $this->successResponse($category, 'created success');
    }

    public function updateCategory(UpdateRequest $request,Category $category): \Illuminate\Http\JsonResponse
    {
        $category = $category->update($request->all());

        return $this->successResponse($category, 'updated success');
    }

    public function getAllCategory()
    {
        $categories = Category::all();

        return $this->successResponse($categories, 'index');
    }

    public function showCategory(Category $category)
    {
        return $this->successResponse($category, 'show');
    }
}

