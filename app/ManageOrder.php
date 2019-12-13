<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageOrder extends Model
{
    public static function updateOrderStatus($request)
    {
        $order = Order::find($request->order_id);
        $order->order_status    = $request->order_status;
        $order->update();

        if ($order->order_status == 'Canceled'){

        }
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


}






