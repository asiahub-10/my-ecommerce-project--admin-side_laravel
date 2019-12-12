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
                                    <td>Invoice No</td>
                                    <td class="pl-5 pt-1">: {{  $order->id }}</td>
                                </tr>
                                <tr>
                                    <td>Order ID</td>
                                    <td class="pl-5 pt-1">: {{ sprintf("%05d", $order->id) }}</td>
                                </tr>
                                <tr>
                                    <td>Order Date</td>
                                    <td class="pl-5 pt-1">: {{ $order->created_at->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Order Total</td>
                                    <td class="pl-5 pt-1">: &#x9f3; {{ number_format($order->order_total, 2) }}</td>
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
                                        <td>Name</td>
                                        <td class="pl-3">: {{ $customer->first_name }} {{ $customer->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td class="pl-3">: {{ $customer->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td class="pl-3">: {{ $customer->address }}</td>
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
                                        <td>Name</td>
                                        <td class="pl-3">: {{ $shipping->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td class="pl-3">: {{ $shipping->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td class="pl-3">: {{ $shipping->address }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row pt-3 pb-0">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr style="font-size: medium;">
                                        <td class="text-center"><strong>SL No.</strong></td>
                                        <td><strong>Item Description</strong></td>
                                        <td class="text-center"><strong>Item Price</strong></td>
                                        <td class="text-center"><strong>Item Quantity</strong></td>
                                        <td class="text-right"><strong>Total</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @php($subtotal=0)
                                    @foreach($products as $product)
                                        <tr>
                                            <td class="text-center">{{ $i++ }}</td>
                                            <td>
                                                <b>{{ $product->product_name }}</b>
                                                <p class="mb-0">{{ $product->product->product_short_description }}</p>
                                            </td>
                                            <td class="text-center">&#2547; {{ number_format($product->product_price, 2) }}</td>
                                            <td class="text-center">{{ $product->product_quantity }}</td>
                                            <td class="text-right">&#2547; {{ number_format($total = $product->product_price * $product->product_quantity, 2) }}</td>
                                        </tr>
                                        @php($subtotal = $total + $subtotal)
                                    @endforeach
                                    <tr>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow text-right"><strong>Subtotal:</strong></td>
                                        <td class="highrow text-right">&#2547; {{ number_format($subtotal, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-right"><strong>Tax (15% VAT):</strong></td>
                                        <td class="emptyrow text-right">&#2547; {{ number_format($tax = $subtotal * .15, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="emptyrow">
                                            {{--<i class="fa fa-barcode iconbig"></i>--}}
                                        </td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-right border-top border-bottom" style="background-color: whitesmoke;"><strong>Order Total:</strong></td>
                                        <td class="emptyrow text-right border-top border-bottom" style="background-color: whitesmoke;"><span style="border-bottom: 6px #adb5bd double; padding-bottom: 2px;">&#2547; {{ number_format($orderTotal = $subtotal + $tax, 2) }}</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="card ml-2 pl-1 my-0">--}}
                {{--<i class="fa fa-barcode iconbig"></i>--}}
            {{--</div>--}}
            <div class="row pt-0">
                <div class="card my-0">
                    <div class="card-body">
                        <h5 class="font-weight-bold text-uppercase">Payment Summary</h5>
                        <table>
                            <tbody>
                            <tr>
                                <td>Payment Method</td>
                                <td class="pl-3">:
                                @if($payment->payment_type == 'Cash')
                                        Cash on delivery
                                @elseif($payment->payment_type == 'Card')
                                        Card
                                @elseif($payment->payment_type == 'Mobile-banking')
                                    Mobile-banking
                                @elseif($payment->payment_type == 'Net-banking')
                                    Net-banking
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Payment Due</td>
                                <td class="pl-3">: &#2547; {{ $payment->payment_status == 'Pending' ? number_format($orderTotal, 2) : number_format(0, 2) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="card ml-2 pl-1 text-center">
                <p class="text-uppercase mb-0 font-weight-bold">terms & conditions</p>
                <span class="">In case of cash on delivery, you have to make full payment on cash at the time of delivery.</span>
            </div>
            <hr/>
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('download-order-invoice', ['id'=>$order->id]) }}" class="btn bg-gradient-info text-white px-5 " style="font-size: large;">Download Invoice PDF <span class="ml-2"><i class="fas fa-file-pdf"></i></span></a>
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
            color: #6e707e;
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

