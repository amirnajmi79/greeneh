<?php

namespace App\Http\Controllers\Api\V1\Shopkeeper;

use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shopkeeper\Order\StoreRequest;
use App\Services\Shopkeeper\OrderService;

class OrderController extends BaseController
{
    public OrderService $orderService;
    public function __construct(OrderService $orderService)
    {
        return $this->orderService = $orderService;
    }

    public function store(StoreRequest $request)
    {
        return $this->orderService->storeOrder($request);
    }
}
