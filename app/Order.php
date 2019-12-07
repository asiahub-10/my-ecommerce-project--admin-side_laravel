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

    public function customer() {
        return $this->belongsTo('App\Customer', 'id', 'customer_id');
    }

    public static function mailView() {
        $order = Order::orderBy('id', 'DESC')->first();
        return view('front.mail.order-confirm', [
            'order' =>  $order
        ]);
    }

    public static function orderMail($request) {
        $customer = Customer::find($request->customerId);
        $order = Order::where('customer_id', $request->customerId)->orderBy('id', 'DESC')->first();
        $data = [
          'customer'    =>  $customer,
          'order'       =>  $order
        ];

        Mail::send('front.mail.order-confirm', $data, function ($message) use($data) {
            $message->to($data['customer']->email);
            $message->subject('Order Confirmation Mail');
        });



//        $customer = Customer::find($request->customerId);
//        $data = $customer->toArray();
//
//        Mail::send('front.mail.order-confirm', $data, function ($message) use($data) {
//            $message->to($data['email']);
//            $message->subject('Order Confirmation Mail');
//        });
    }
}
