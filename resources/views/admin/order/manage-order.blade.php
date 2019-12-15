@extends('admin.master')

@section('title')
    Manage Order
@endsection

@section('body')
    <style>

    </style>
    <div class="">

        @if(Session::has('message'))
            <div class="card-body text-center pb-0 alert">
                <button type="button" class="close text-danger" data-dismiss="alert">x</button>
                <i class="fas fa-2x fa-check text-info p-2 success"></i>
                <h4 class="text-info font-weight-bold ">{{ Session::get('message') }}</h4>
            </div>
        @endif
        @if(Session::has('errorMessage'))
            <div class="card-body text-center pb-0 alert">
                <button type="button" class="close text-danger" data-dismiss="alert">x</button>
                <i class="fas fa-2x fa-exclamation-triangle text-warning p-3"></i>
                <h4 class="text-warning font-weight-bold ">{{ Session::get('errorMessage') }}</h4>
            </div>
        @endif


        <div class="mt-3 mb-4">
            <div class="table-responsive text-center">
                <table id="zero_config" class="table table-striped table-light table-hover">
                    <thead class="bg-gradient-info text-light">
                    <tr>
                        <th>Order Id</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ sprintf("%05d", $order->id) }}</td>
                            <td>{{ $order->customer->first_name }} {{ $order->customer->last_name }}</td>
                            <td>&#2547;{{ number_format($order->order_total, 2) }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                @if($order->order_status == 'Delivered')
                                    <p class="text-success">{{ $order->order_status }}</p>
                                @elseif($order->order_status == 'Pending')
                                    <p class="text-warning">{{ $order->order_status }}</p>
                                @elseif($order->order_status == 'Cancelled')
                                    <p class="text-danger">{{ $order->order_status }}</p>
                                @endif
                            </td>
                            <td>{{ $order->payment->payment_type }}</td>
                            <td class="{{ $order->payment->payment_status == 'Paid' ? 'text-success' : 'text-warning' }}">{{ $order->payment->payment_status }}</td>
                            <td class="custom-control-inline">
                                <a class="btn btn-sm rounded mr-1 btn-success" title="View Order Details" href="{{ route('view-order-detail', ['id'=>$order->id]) }}"><i class="fas fa-search-plus"></i></a>
                                <a class="btn btn-sm rounded mr-1 btn-primary" title="View Order Invoice" href="{{ route('view-order-invoice', ['id'=>$order->id]) }}"><i class="fas fa-file-invoice"></i></a>
                                <a class="btn btn-sm rounded mr-1 btn-info" title="Download Order Invoice" href="{{ route('download-order-invoice', ['id'=>$order->id]) }}"><i class="fas fa-download"></i></a>
                                <a class="btn btn-sm rounded mr-1 btn-warning" title="Edit Order" href="{{ route('edit-order-detail', ['id'=>$order->id]) }}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm rounded btn-danger" title="Delete Order" href="#" onclick="
                                    event.preventDefault();
                                    var check = confirm('This will permanently delete this order data.\nAre you sure to delete this???');
                                    if (check)
                                        {
                                            document.getElementById('deleteOrderForm{{ $order->id }}').submit();
                                        }
                                "><i class="fas fa-trash-alt"></i></a>
                                <form id="deleteOrderForm{{ $order->id }}" action="{{ route('delete-order-info') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="bg-gradient-info text-light">
                    <tr>
                        <th>Order Id</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection