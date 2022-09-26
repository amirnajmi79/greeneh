<?php


namespace App\Services\Admin;


use App\Http\Requests\Admin\Area\StoreRequest;
use App\Http\Requests\Admin\Area\UpdateRequest;
use App\Models\Area;
use App\Services\BaseService;

class AreaService extends BaseService
{
    public function storeArea(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $area = Area::create($request->all());

        return $this->successResponse($area, 'created success');
    }

    public function updateArea(UpdateRequest $request,Area $area): \Illuminate\Http\JsonResponse
    {
        $area = $area->update($request->all());

        return $this->successResponse($area, 'updated success');
    }

    public function getAllArea()
    {
        $areas = Area::all();

        return $this->successResponse($areas, 'index');
    }

    public function showArea(Area $area)
    {
        return $this->successResponse($area , 'show');
    }

    public function delete(Area $area)
    {
        $deleted = $area->delete();

        if ($deleted)
            return $this->successResponse(message: 'deleted success');

        return $this->errorResponse(error:'delete not successfully');
    }

}
