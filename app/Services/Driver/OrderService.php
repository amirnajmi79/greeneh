<?php

namespace App\Services\Driver;

use App\Services\BaseService;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderService extends BaseService
{

    public function index(){
        $orders = Order::where('driver_id', '=',  null)
            ->get();

        return $this->successResponse($orders, 'index');
    }

    public function show(Order $order)
    {
        return $this->successResponse($order->with('products')->get(), 'show');
    }

}
