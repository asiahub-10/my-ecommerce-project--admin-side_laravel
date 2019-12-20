<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Customer;
use App\Order;
use App\Payment;
use App\Product;
use App\Review;
use App\Slider;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('admin.home.home', [
            'category'              => Category::all(),
            'categoryPublish'       => Category::where('publication_status', 1)->get(),
            'categoryUnpublish'     => Category::where('publication_status', '!=', 1)->get(),
            'brand'                 => Brand::all(),
            'brandPublish'          => Brand::where('publication_status', 1)->get(),
            'brandUnpublish'        => Brand::where('publication_status', '!=', 1)->get(),
            'product'               => Product::all(),
            'productPublish'        => Product::where('publication_status', 1)->get(),
            'productUnpublish'      => Product::where('publication_status', '!=', 1)->get(),
            'productQtyHigh'        => Product::where('product_quantity', '>=', 6)->get(),
            'productQtyMedium'      => Product::where('product_quantity', '>=', 1)->where('product_quantity', '<=', 5)->get(),
            'productQtyLow'         => Product::where('product_quantity', '<=', 0)->get(),
            'slide'                 => Slider::all(),
            'slidePublish'          => Slider::where('publication_status', 1)->get(),
            'slideUnpublish'        => Slider::where('publication_status', '!=', 1)->get(),
            'user'                  => User::all(),
            'customer'              => Customer::all(),
            'customerActive'        => Customer::where('activation_status', 1)->get(),
            'customerDeactive'      => Customer::where('activation_status', '!=', 1)->get(),
            'order'                 => Order::all(),
            'orderPending'          => Order::where('order_status', 'Pending')->get(),
            'orderDelivered'        => Order::where('order_status', 'Delivered')->get(),
            'orderCancelled'        => Order::where('order_status', 'Cancelled')->get(),
            'paymentPending'        => Payment::where('payment_status', 'Pending')->get(),
            'paymentPaid'           => Payment::where('payment_status', 'Paid')->get(),
            'review'                => Review::all(),
            'reviewPublish'         => Review::where('publication_status', 1)->get(),
            'reviewUnpublish'       => Review::where('publication_status', '!=', 1)->get(),

        ]);
//        return view('home');
    }
}
