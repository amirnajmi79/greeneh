<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\DriverService;
use App\Http\Requests\Admin\Driver\StoreRequest;
use App\Http\Requests\Admin\Driver\UpdateRequest;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{

    public DriverService $driverService;

    public function __construct(DriverService $driverService)
    {
        $this->driverService = $driverService;
    }

    public function index()
    {
        return $this->driverService->getAllDriver();
    }

    public function show(Driver $driver)
    {
        return $this->driverService->showDriver($driver);
    }

    public function store(StoreRequest $request)
    {
        return $this->driverService->storeDriver($request);
    }

    public function update(Driver $driver, UpdateRequest $request)
    {
        return $this->driverService->updateDriver($driver, $request);
    }

    public function destroy(Driver $driver)
    {
        return $this->driverService->deleteDriver($driver);
    }
}
