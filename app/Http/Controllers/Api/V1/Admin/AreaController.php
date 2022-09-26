<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Area\StoreRequest;
use App\Http\Requests\Admin\Area\UpdateRequest;
use App\Models\Area;
use App\Services\Admin\AreaService;
use Illuminate\Http\Request;

class AreaController extends BaseController
{
    public $areaService;
    public function __construct(AreaService $areaService)
    {
        $this->areaService = $areaService;
    }


    public function store(StoreRequest $request)
    {
        return $this->areaService->storeArea($request);
    }

    public function update(UpdateRequest $request,Area $area)
    {
        return $this->areaService->updateArea($request,$area);
    }

    public function index()
    {
        return $this->areaService->getAllArea();
    }

    public function show(Area $area)
    {
        return $this->areaService->showArea($area);
    }

    public function destroy(Area $area)
    {
        return $this->areaService->delete($area);
    }
}
