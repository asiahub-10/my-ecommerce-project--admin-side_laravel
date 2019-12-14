<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageOrder extends Model
{
    public static function updateOrderStatus($request)
    {
        $order      = Order::find($request->order_id);
        $orderItems = OrderDetail::where('order_id', $order->id)->get();
        foreach ($orderItems as $orderItem)
        {
            $product = Product::find($orderItem->product_id);
            if ($order->order_status == 'Pending' && $request->order_status == 'Cancelled')
            {
                $product->product_quantity      =   $product->product_quantity + $orderItem->product_quantity;
                $product->update();
            }
            elseif ($order->order_status == 'Cancelled' && $request->order_status == 'Pending')
            {
                $product->product_quantity      =   $product->product_quantity - $orderItem->product_quantity;
                $product->update();
            }
        }
        $order->order_status    = $request->order_status;
        $order->update();
    }

    public static function updateCustomerInfo($request)
    {
        $customer = Customer::find($request->customer_id);
        $customer->mobile        = $request->customer_mobile;
        $customer->address       = $request->customer_address;
        $customer->update();
    }

    public static function updateShippingInfo($request)
    {
        $shipping = Shipping::find($request->shipping_id);
        $shipping->name          = $request->name;
        $shipping->mobile        = $request->mobile;
        $shipping->address       = $request->address;
        $shipping->update();
    }

    public static function updatePaymentStatus($request)
    {
        $payment = Payment::find($request->payment_id);
        $payment->payment_status = $request->payment_status;
        $payment->update();
    }

    public static function deleteShippingInfo($request)
    {
        $shipping = Shipping::where('id', Order::find($request->order_id)->shipping_id)->first();
        $shipping->delete();
    }

    public static function deletePaymentInfo($request)
    {
        $payment = Payment::where('order_id', $request->order_id)->first();
        $payment->delete();
    }

    public static function deleteOrderDetailInfo($request)
    {
        $orderItems = OrderDetail::where('order_id', $request->order_id)->get();
        $order      = Order::find($request->order_id);
        foreach ($orderItems as $orderItem)
        {
            $product = Product::find($orderItem->product_id);
            if ($order->order_status == 'Pending')
            {
                $product->product_quantity = $product->product_quantity + $orderItem->product_quantity;
                $product->update();
            }
            $orderItem->delete();
        }
    }

    public static function deleteOrderInfo($request)
    {
        $order = Order::find($request->order_id);
        $order->delete();
    }



}






