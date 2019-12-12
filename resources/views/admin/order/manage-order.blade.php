@extends('admin.master')

@section('title')
    Manage Order
@endsection

@section('body')
    <style>
        #zero_config_length,  #zero_config_info{
            text-align: left !important;
        }
        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #288d9c;
            border-color: #288d9c;
            box-shadow: none;
        }
        div.dataTables_wrapper div.dataTables_filter input {
            box-shadow: none;
        }
        .paginate_button {
            box-shadow: none;
        }
    </style>
    <div class="card-body">
        <div class="mt-3 mb-4">
            <div class="table-responsive text-center">
                <table id="zero_config" class="table table-striped table-bordered table-light table-hover">
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
                            <td>&#2547; {{ number_format($order->order_total, 2) }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->order_status }}</td>
                            <td>{{ $order->payment->payment_type }}</td>
                            <td>{{ $order->payment->payment_status }}</td>
                            <td class="custom-control-inline">
                                <a class="btn btn-sm rounded mr-1 btn-success" title="View Order Details" href="{{ route('view-order-detail', ['id'=>$order->id]) }}"><i class="fas fa-search-plus"></i></a>
                                <a class="btn btn-sm rounded mr-1 btn-primary" title="View Order Invoice" href="{{ route('view-order-invoice', ['id'=>$order->id]) }}"><i class="fas fa-file-invoice"></i></a>
                                <a class="btn btn-sm rounded mr-1 btn-info" title="Download Order Invoice" href="{{ route('download-order-invoice', ['id'=>$order->id]) }}"><i class="fas fa-download"></i></a>
                                <a class="btn btn-sm rounded mr-1 btn-warning" title="Edit Order" href="{{ route('edit-order-detail', ['id'=>$order->id]) }}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm rounded btn-danger" title="Delete Order" href=""><i class="fas fa-trash-alt"></i></a>
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