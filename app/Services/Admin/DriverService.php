<?php


namespace App\Services\Admin;

use App\Http\Requests\Admin\Driver\StoreRequest;
use App\Http\Requests\Admin\Driver\UpdateRequest;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;
use App\Services\BaseService;

class DriverService extends BaseService
{

    public function storeDriver(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $data['phone'] = $request->get('phone');
        $data['last_name'] = $request->get('lastName');
        $data['first_name'] = $request->get('firstName');
        $data['password'] = Hash::make($request->get('paasword'));

        $driver = Driver::create($data);

        return $this->successResponse($driver, 'created success');
    }

    public function updateDriver(UpdateRequest $request,Driver $driver): \Illuminate\Http\JsonResponse
    {
        $driver = $driver->update($request->all());

        return $this->successResponse($driver, 'updated success');
    }

    public function getAllDriver()
    {
        $categories = Driver::all();

        return $this->successResponse($categories, 'index');
    }

    public function showDriver(Driver $driver)
    {
        return $this->successResponse($driver, 'show');
    }

    public function delete(Driver $driver)
    {
        $deleted = $driver->delete();

        if($deleted)
            return $this->successResponse(null, 'delete success.');
        return $this->errorREssponse(null, 'not deleted.');
    } 

}
