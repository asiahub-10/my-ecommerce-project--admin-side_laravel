<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected  $fillable =['order_id', 'payment_type', 'payment_status'];

    public static function savePaymentInfo($request)
    {
        $orderId = Order::where('customer_id', $request->customerId)
                        ->where('order_total', $request->total)
                        ->orderBy('id', 'DESC')
                        ->select('id')
                        ->first();

        $payment = new Payment();
        $payment->order_id          =   $orderId->id;
        $payment->payment_type      =   $request->payment;
        if ($request->payment == 'Cash')
        {
            $payment->payment_status    =   'Pending';
        } else
        {
            $payment->payment_status    =   'Paid';
        }
        $payment->save();
    }


}
