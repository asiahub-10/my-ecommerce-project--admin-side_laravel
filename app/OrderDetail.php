<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable =['order_id', 'product_id', 'product_name', 'product_price', 'product_quantity'];

    public function products()
    {
        return $this->hasMany('App\Product', 'id', 'product_id');
    }

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

            $product = Product::find($orderDetail->product_id);
            $product->product_quantity      = $product->product_quantity - $orderDetail->product_quantity;
            $product->update();
        }
    }
}
