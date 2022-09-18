<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;

class AreaController extends BaseController
{
    public $areaService;
    public function __construct(CategoryService $areaService)
    {
        $this->areaService = $areaService;
    }


    public function store(StoreRequest $request)
    {
        return $this->areaService->storeArea($request);
    }

    public function update(UpdateRequest $request,Category $category)
    {
        return $this->areaService->updateArea($request,$category);
    }

    public function index()
    {
        return $this->areaService->getAllArea();
    }

    public function show(category $category)
    {
        return $this->areaService->showArea($category);
    }

}
