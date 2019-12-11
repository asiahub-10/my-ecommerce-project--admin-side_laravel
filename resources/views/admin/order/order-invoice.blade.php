@extends('admin.master')

@section('title')
    Order Invoice
@endsection

@section('body')
    <div class="container my-4">
        <div class="card-body border bg-white">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col">
                            <h1 href="" class="text-muted mb-0 navbar-brand ">
                    <span class="text-warning asia" style="font-size: 50px;
            text-shadow: 2px 2px 4px #6e707e; color: #ffc107">Asis</span><span style="font-size: 50px;
            text-shadow: 2px 2px 4px #6e707e;
            font-weight: 500;">Fashion</span>
                            </h1>
                            <p class="mb-0">Baily Road, Dhaka.</p>
                            <p class="mb-0">asia_fashion@gmail.com</p>
                            <p class="mb-0">+8801312345678</p>
                        </div>
                        <div class="col">
                            <div style="background-color: #fdf3d8;">
                                <hr/>
                                <h2 class="text-center text-uppercase text-orange">Invoice</h2>
                                <hr/>
                            </div>

                            <table>
                                <tr>
                                    <td>Invoice No:</td>
                                    <td class="pl-5 pt-1">{{ sprintf("%05d", 1) }}</td>
                                </tr>
                                <tr>
                                    <td>Order ID:</td>
                                    <td class="pl-5 pt-1">{{ sprintf("%05d", $order->id) }}</td>
                                </tr>
                                <tr>
                                    <td>Order Date:</td>
                                    <td class="pl-5 pt-1">{{ $order->created_at->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Order Total:</td>
                                    <td class="pl-5 pt-1">&#2547; {{ number_format($order->order_total, 2) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div style="background-color: whitesmoke;">
                        <hr>
                        <div class="row px-3">
                            <div class="col">
                                <div class="font-weight-bold">Billing Details</div>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>Name:</td>
                                        <td class="pl-3">{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td class="pl-3">{{ $customer->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td class="pl-3">{{ $customer->address }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col"></div>
                            <div class="col">
                                <div class="font-weight-bold">Shipping Address</div>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>Name:</td>
                                        <td class="pl-3">{{ $shipping->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td class="pl-3">{{ $shipping->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td class="pl-3">{{ $shipping->address }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="text-center"><strong>Order summary</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <td><strong>Item Name</strong></td>
                                        <td class="text-center"><strong>Item Price</strong></td>
                                        <td class="text-center"><strong>Item Quantity</strong></td>
                                        <td class="text-right"><strong>Total</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Samsung Galaxy S5</td>
                                        <td class="text-center">$900</td>
                                        <td class="text-center">1</td>
                                        <td class="text-right">$900</td>
                                    </tr>
                                    <tr>
                                        <td>Samsung Galaxy S5 Extra Battery</td>
                                        <td class="text-center">$30.00</td>
                                        <td class="text-center">1</td>
                                        <td class="text-right">$30.00</td>
                                    </tr>
                                    <tr>
                                        <td>Screen protector</td>
                                        <td class="text-center">$7</td>
                                        <td class="text-center">4</td>
                                        <td class="text-right">$28</td>
                                    </tr>
                                    <tr>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow text-center"><strong>Subtotal</strong></td>
                                        <td class="highrow text-right">$958.00</td>
                                    </tr>
                                    <tr>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-center"><strong>Shipping</strong></td>
                                        <td class="emptyrow text-right">$20</td>
                                    </tr>
                                    <tr>
                                        <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-center"><strong>Total</strong></td>
                                        <td class="emptyrow text-right">$978.00</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .height {
            min-height: 200px;
        }

        .icon {
            font-size: 47px;
            color: #5CB85C;
        }

        .iconbig {
            font-size: 77px;
            color: #5CB85C;
        }

        .table > tbody > tr > .emptyrow {
            border-top: none;
        }

        .table > thead > tr > .emptyrow {
            border-bottom: none;
        }

        .table > tbody > tr > .highrow {
            border-top: 3px solid;
        }
    </style>
@endsection

