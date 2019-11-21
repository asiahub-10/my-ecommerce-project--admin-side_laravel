<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable =['order_id', 'product_id', 'product_name', 'product_price', 'product_quantity'];

    public static function saveOrderDetail($request)
    {
        $orderId = Order::orderBy('id', 'DESC')->first();
        $productItems = $request->productItems;
        foreach ($productItems as $productItem)
        {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id          = $orderId->id;
            $orderDetail->product_id        = $productItem['id'];
            $orderDetail->product_name      = $productItem['product_name'];
            $orderDetail->product_price     = $productItem['product_price'];
            $orderDetail->product_quantity  = $productItem['quantity'];
            $orderDetail->save();
        }
    }
}
