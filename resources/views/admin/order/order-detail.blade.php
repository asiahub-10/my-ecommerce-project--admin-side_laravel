@extends('admin.master')

@section('title')
    Order Detail
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-gradient-info text-light text-uppercase">
                            <tr>
                                <th colspan="2"><h4 style="font-size: large;" class="mb-0 text-center">Order Information</h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">Order No</td>
                                <td>{{ sprintf('%05d', $order->id) }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Order Total</td>
                                <td>&#2547; {{ number_format($order->id, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Order Status</td>
                                <td>{{ $order->order_status }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Order Date</td>
                                <td>{{ $order->created_at->format('d/m/y') }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Order Time</td>
                                <td>{{ $order->created_at->format('h:i A') }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-gradient-info text-light text-uppercase">
                            <tr>
                                <th colspan="2"><h4 style="font-size: large;" class="mb-0 text-center">customer and billing information</h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">Customer Name</td>
                                <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Phone Number</td>
                                <td>{{ $customer->mobile }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Email Address</td>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Mailing Address</td>
                                <td>{{ $customer->address }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-gradient-info text-light text-uppercase">
                            <tr>
                                <th colspan="2"><h4 style="font-size: large;" class="mb-0 text-center">shipping information</h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">Name</td>
                                <td>{{ $shipping->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Phone Number</td>
                                <td>{{ $shipping->mobile }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Shipping Address</td>
                                <td>{{ $shipping->address }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-gradient-info text-light text-uppercase">
                            <tr>
                                <th colspan="2"><h4 style="font-size: large;" class="mb-0 text-center">payment information</h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">Payment Type</td>
                                <td>{{ $payment->payment_type }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Payment Status</td>
                                <td>{{ $payment->payment_status }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive text-center">
                        <table class="table table-bordered">
                            <thead class="bg-gradient-info text-light text-uppercase">
                            <tr>
                                <th colspan="6"><h4 style="font-size: large;" class="mb-0 text-center">Product information</h4></th>
                            </tr>
                            </thead>
                            <thead class="bg-gray-200">
                            <tr>
                                <th class="font-weight-bold">SL No.</th>
                                <th class="font-weight-bold">Product ID</th>
                                <th class="font-weight-bold">Product Name</th>
                                <th class="font-weight-bold">Product Price (per item)</th>
                                <th class="font-weight-bold">Product Quantity</th>
                                <th class="font-weight-bold">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>&#2547; {{ number_format($product->product_price, 2) }}</td>
                                <td>{{ $product->product_quantity }}</td>
                                <td>&#2547; {{ number_format($product->product_price * $product->product_quantity, 2) }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection