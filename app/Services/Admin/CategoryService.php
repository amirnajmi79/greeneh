<?php


namespace App\Services\Admin;

use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
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

    public function delete(Category $category)
    {
        $deleted = $category->delete();

        if($deleted)
            return $this->successResponse(null, 'delete success.');
        return $this->errorREssponse(null, 'not deleted.');
    }

}

