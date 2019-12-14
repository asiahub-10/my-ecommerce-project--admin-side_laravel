@extends('admin.master')

@section('title')
    Order Detail
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-9 mx-auto">
                {{ Form::open(['route'=>'update-order-detail', 'method'=>'POST']) }}
                <div class="card-body bg-white">
                    <h4 style="font-size: large;" class="mb-3 bg-gradient-info text-light text-uppercase py-3 text-center">Order Information</h4>
                    <div class="form-group row">
                        <label class="col-md-3">Order No</label>
                        <div class="col-md-9">
                            <input type="number" readonly name="order_id" class="form-control" value="{{ $order->id }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Order Total</label>
                        <div class="col-md-9">
                            <input type="number" readonly class="form-control" value="{{ $order->order_total }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Order Status</label>
                        <div class="col-md-9">
                            <select name="order_status" class="custom-select">
                                <option value="Pending" {{ value('Pending') == $order->order_status ? 'selected' : '' }}>Pending</option>
                                <option value="Delivered" {{ value('Delivered') == $order->order_status ? 'selected' : '' }}>Delivered</option>
                                <option value="Cancelled" {{ value('Cancelled') == $order->order_status ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                    </div>
                    <h4 style="font-size: large;" class="mb-3 bg-gradient-info text-light text-uppercase py-3 text-center">customer and billing information</h4>
                    <div class="form-group row">
                        <label class="col-md-3">Customer Name</label>
                        <div class="col-md-9">
                            <input type="text" readonly class="form-control" value="{{ $customer->first_name }} {{ $customer->last_name }}"/>
                            <input type="hidden" name="customer_id" class="form-control" value="{{ $customer->id }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Phone Number</label>
                        <div class="col-md-9">
                            <input type="number" name="customer_mobile" class="form-control" value="{{ $customer->mobile }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Email Address</label>
                        <div class="col-md-9">
                            <input type="email" readonly class="form-control" value="{{ $customer->email }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Mailing Address</label>
                        <div class="col-md-9">
                            <input type="text" name="customer_address" class="form-control" value="{{ $customer->address }}"/>
                        </div>
                    </div>
                    <h4 style="font-size: large;" class="mb-3 bg-gradient-info text-light text-uppercase py-3 text-center">shipping information</h4>
                    <div class="form-group row">
                        <label class="col-md-3">Name</label>
                        <div class="col-md-9">
                            <input type="text" name="name" class="form-control" value="{{ $shipping->name }}"/>
                            <input type="hidden" name="shipping_id" class="form-control" value="{{ $shipping->id }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Phone Number</label>
                        <div class="col-md-9">
                            <input type="number" name="mobile" class="form-control" value="{{ $shipping->mobile }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Shipping Address</label>
                        <div class="col-md-9">
                            <input type="text" name="address" class="form-control" value="{{ $shipping->address }}"/>
                        </div>
                    </div>
                    <h4 style="font-size: large;" class="mb-3 bg-gradient-info text-light text-uppercase py-3 text-center">payment information</h4>
                    <div class="form-group row">
                        <label class="col-md-3">Payment Type</label>
                        <div class="col-md-9">
                            <input type="text" readonly class="form-control" value="{{ $payment->payment_type }}"/>
                            <input type="hidden" name="payment_id" class="form-control" value="{{ $payment->id }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Payment Status</label>
                        <div class="col-md-9">
                            <select name="payment_status" class="custom-select">
                                <option value="Pending" {{ value('Pending') == $payment->payment_status ? 'selected' : '' }}>Pending</option>
                                <option value="Paid" {{ value('Paid') == $payment->payment_status ? 'selected' : '' }}>Paid</option>
                            </select>
                        </div>
                    </div>

                    <h4 style="font-size: large;" class="mb-0 bg-gradient-info text-light text-uppercase py-3 text-center">product information</h4>

                    <div class="table-responsive text-center">
                        <table class="table table-bordered">
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
                                    <td>{{ $product->product_id }}</td>
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
                <div class="text-center mb-5 mt-4">
                    <input type="submit" class="btn btn-outline-info btn-lg px-5" value="Save Changes"/>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection