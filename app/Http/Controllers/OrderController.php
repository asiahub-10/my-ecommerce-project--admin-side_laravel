<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function confirmOrder(Request $request) {
        Shipping::saveShippingInfo($request);
        Order::customerOrder($request);
        OrderDetail::saveOrderDetail($request);
        Payment::savePaymentInfo($request);
        Order::orderMail($request);
        return response()->json(['status'=>'success', 'message'=>'Thank you for your order.'], 200);
    }
}
