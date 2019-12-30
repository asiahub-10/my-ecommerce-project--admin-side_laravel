<?php

namespace App\Http\Controllers;

use App\Customer;
use App\ManageOrder;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Product;
use App\Shipping;
use PDF;
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
        $order = Order::where('id', $id)->first();

        if ($order->order_status == 'Cancelled')
        {
            return redirect('/manage-order')->with('errorMessage', 'This order has been cancelled. So the invoice for this order is not available.');
        }
        else
        {
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

    public function invoiceDownload($id)
    {
        $order = Order::where('id', $id)->first();

        if ($order->order_status == 'Cancelled')
        {
            return redirect('/manage-order')->with('errorMessage', 'This order has been cancelled. So the invoice for this order is not available.');
        }
        else
        {
            $customer   =   Customer::where('id', $order->customer_id)->first();
            $shipping   =   Shipping::where('id', $order->shipping_id)->first();
            $payment    =   Payment::where('order_id', $id)->first();
            $products   =   OrderDetail::where('order_id', $id)->get();

            $data = [
                'order'     =>  $order,
                'customer'  =>  $customer,
                'shipping'  =>  $shipping,
                'payment'   =>  $payment,
                'products'  =>  $products
            ];

            $pdf = PDF::loadView('admin.order.invoice-pdf', $data);
//        return $pdf->download('invoice-1.pdf');
            return $pdf->stream('invoice'.'_'.$id.'.pdf');
        }
    }

    public function editOrder($id)
    {
        $order      =   Order::where('id', $id)->first();
        $customer   =   Customer::where('id', $order->customer_id)->first();
        $shipping   =   Shipping::where('id', $order->shipping_id)->first();
        $payment    =   Payment::where('order_id', $id)->first();
        $products   =   OrderDetail::where('order_id', $id)->get();

        return view('admin.order.edit-order', [
            'order'     =>  $order,
            'customer'  =>  $customer,
            'shipping'  =>  $shipping,
            'payment'   =>  $payment,
            'products'  =>  $products
        ]);
    }

    public function updateOrder(Request $request)
    {
        ManageOrder::updateCustomerInfo($request);
        ManageOrder::updateShippingInfo($request);
        ManageOrder::updatePaymentStatus($request);
        $payment = Payment::find($request->payment_id);
        if ($payment->payment_status == 'Paid' && $request->order_status == 'Cancelled')
        {
            return redirect('/manage-order')->with('errorMessage', 'As the payment of this order has been made already, this order cannot be cancelled.');
        }
        elseif ($payment->payment_status == 'Pending' && $request->order_status == 'Delivered')
        {
            return redirect('/manage-order')->with('errorMessage', 'Delivery cannot be made while the payment is pending.');
        }
        else
        {
            ManageOrder::updateOrderStatus($request);
            return redirect('/manage-order')->with('message', 'Order details information updated successfully.');
        }
    }

    public function deleteOrder(Request $request)
    {
        $payment    = Payment::where('order_id', $request->order_id)->first();
        if ($payment->payment_status == 'Paid')
        {
            return redirect('/manage-order')->with('errorMessage', 'As the payment of this order has been made already, this order data cannot be deleted.');
        }
        else
        {
            ManageOrder::deleteShippingInfo($request);
            ManageOrder::deletePaymentInfo($request);
            ManageOrder::deleteOrderDetailInfo($request);
            ManageOrder::deleteOrderInfo($request);
            return redirect('/manage-order')->with('message', 'Order data has been deleted successfully.');
        }
    }

}












