<?php

namespace App\Services\Driver;

use App\Http\Requests\Driver\Accept\StoreRequest;
use App\Services\BaseService;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AcceptOrderService extends BaseService
{

    public function store(StoreRequest $request)
    {
        $order = Order::where('id', $request->get('orderId'))
            ->update(['driver_id'=>Auth::id()]);

        return $this->successResponse($order, 'accep order');
    }

}
