<?php

namespace App\Services\Shopkeeper;

use App\Http\Requests\Shopkeeper\Order\StoreRequest;
use App\Models\Order;
use App\Models\Product;
use App\Services\BaseService;

class OrderService extends BaseService
{
    public function storeOrder(StoreRequest $request)
    {
        $products = Product::whereIn('id', $request->get('productIds'))->get();
        $totalPrice = array_sum($products->pluck('price')->toArray());

        $order = Order::create([
            'user_id' => $request->user()->id,
            'total_price' =>$totalPrice,
        ]);

        $order->products()->attach($products);

        return $this->successResponse($order->with('products')->first(),'store order');

    }
}
