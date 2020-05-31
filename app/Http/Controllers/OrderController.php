<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Http\Requests\StoreOrder;

class OrderController extends Controller
{
    public function store(StoreOrder $request)
    {
        $order = new Order();
        $order->name = $request->get('name');
        $order->address = $request->get('address');
        $order->phone = $request->get('phone');
        $order->email = $request->get('email');
        $order->totalPrice = $request->get('totalPrice');
        $order->deliveryPrice = $request->get('deliveryPrice');

        $order->save();
        
        foreach ($request->get('orderItems') as $reqOrderItem) {
            $orderItem = new OrderItem();
            $orderItem->name = $reqOrderItem['name'];
            $orderItem->price = $reqOrderItem['price'];
            $orderItem->quantity = $reqOrderItem['quantity'];
            $orderItem->orderId = $order->id;
            $orderItem->save();
        }
    }
}
