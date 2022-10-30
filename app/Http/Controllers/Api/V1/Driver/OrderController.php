<?php

namespace App\Http\Controllers\Api\V1\Driver;

use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\Order\StoreRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends BaseController
{

    public $orderService;

    public function index()
    {
        return $this->orderService->index();
    }

    public function update(Order $order){

        return $this->orderService->update($order);
    }


}
