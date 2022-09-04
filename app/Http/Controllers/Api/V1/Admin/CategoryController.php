<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    public function store(StoreRequest $request)
    {
        return $this->categoryService->storeCategory($request);
    }

    public function update(UpdateRequest $request,Category $category)
    {
        return $this->categoryService->updateCategory($request,$category);
    }

    public function index()
    {
        return $this->categoryService->getAllCategory();
    }

    public function show(category $category)
    {
        return $this->categoryService->showcategory($category);
    }

}
