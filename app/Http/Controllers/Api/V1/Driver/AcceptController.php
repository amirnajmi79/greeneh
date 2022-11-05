<?php

namespace App\Http\Controllers\Api\V1\Driver;

use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\Accept\StoreRequest;
use App\Services\Driver\AcceptOrderService;
use Illuminate\Http\Request;

class AcceptController extends Controller
{
    public AcceptOrderService $acceptOrderService;

    public function __construct(AcceptOrderService $acceptOrderService)
    {
        $this->acceptOrderService = $acceptOrderService;
    }
    public function store(StoreRequest $request){
        return $this->acceptOrderService->store($request);
    }
}
