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

        return $this->successResponse($orders, 'indx');
    }

    public function update(Order $order){
        $order->update([
            'driver_id' => Auth::id()
        ]);

        return $this->successResponse('updated');
    }
}
