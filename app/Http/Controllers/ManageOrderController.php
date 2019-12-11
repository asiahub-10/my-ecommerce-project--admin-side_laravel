<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Product;
use App\Shipping;
use Illuminate\Http\Request;

class ManageOrderController extends Controller
{
    public function manageOrder()
    {
        return view('admin.order.manage-order', ['orders' => Order::all()]);
    }

    public function orderDetail($id)
    {
        $order      =   Order::where('id', $id)->first();
        $customer   =   Customer::where('id', $order->customer_id)->first();
        $shipping   =   Shipping::where('id', $order->shipping_id)->first();
        $payment    =   Payment::where('order_id', $id)->first();
        $products   =   OrderDetail::where('order_id', $id)->get();

        return view('admin.order.order-detail', [
            'order'     =>  $order,
            'customer'  =>  $customer,
            'shipping'  =>  $shipping,
            'payment'   =>  $payment,
            'products'  =>  $products
        ]);
    }

    public function orderInvoice($id)
    {
        $order      =   Order::where('id', $id)->first();
        $customer   =   Customer::where('id', $order->customer_id)->first();
        $shipping   =   Shipping::where('id', $order->shipping_id)->first();
        $payment    =   Payment::where('order_id', $id)->first();
        $products   =   OrderDetail::where('order_id', $id)->get();

        return view('admin.order.order-invoice', [
            'order'     =>  $order,
            'customer'  =>  $customer,
            'shipping'  =>  $shipping,
            'payment'   =>  $payment,
            'products'  =>  $products
        ]);
    }

}












