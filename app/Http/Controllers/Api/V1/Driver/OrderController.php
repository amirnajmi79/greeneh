<?php

namespace App\Http\Controllers\Api\V1\Driver;

use App\Http\Controllers\Api\V1\BaseController;
use App\Models\Order;
use App\Services\Driver\OrderService;

class OrderController extends BaseController
{
    public $orderService;

    public function  __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        return $this->orderService->index();
    }

    public function show(Order $order)
    {
        return $this->orderService->show($order);
    }

}
