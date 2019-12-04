<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;

class Order extends Model
{
    protected $fillable =['customer_id', 'shipping_id', 'order_total', 'order_status'];

    public static function customerOrder($request) {
        $customerId = Customer::find($request->customerId);
        $shippingId = Shipping::where('name', $request->shipping['name'])
                                ->where('mobile', $request->shipping['mobile'])
                                ->where('address', $request->shipping['address'])
                                ->orderBy('id', 'DESC')
                                ->first();

        $order = new Order();
        $order->customer_id     =   $customerId->id;
        $order->shipping_id     =   $shippingId->id;
        $order->order_total     =   $request->total;
        $order->save();

    }

    public static function orderMail($request) {
        $customer = Customer::find($request->customerId);
        $data = $customer->toArray();

        Mail::send('front.mail.order-confirm', $data, function ($message) use($data) {
            $message->to($data['email']);
            $message->subject('Order Confirmation Mail');
        });
    }
}
