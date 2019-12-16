@extends('admin.master')

@section('title')
    Manage Customer
@endsection

@section('body')

    <div class="container my-5">
        @if(Session::has('message'))
            <div class="card-body text-center pb-0 alert">
                <button type="button" class="close text-danger" data-dismiss="alert">x</button>
                <i class="fas fa-2x fa-check text-info p-2 success"></i>
                <h4 class="text-info font-weight-bold ">{{ Session::get('message') }}</h4>
            </div>
        @endif


        <div class="my-3 col-sm-12 mx-auto px-0">
            <div class="table-responsive text-center">
                <table id="zero_config" class="table table-striped table-bordered table-light table-hover">
                    <thead class="bg-gradient-info text-light">
                    <tr>
                        <th>SL No.</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone No.</th>
                        <th>Address</th>
                        <th>Activation Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($customers as $customer)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <th>{{ $customer->first_name }} {{ $customer->last_name }}</th>
                            <th>{{ $customer->email }}</th>
                            <th>{{ $customer->mobile }}</th>
                            <th>{{ $customer->address }}</th>
                            <th class="{{ $customer->activation_status == 1 ? 'text-success' : 'text-warning' }}">{{ $customer->activation_status == 1 ? 'Activate' : 'Deactivate' }}</th>
                            <th class="custom-control-inline text-center">
                                <a href="{{ route('edit-customer-details', ['id'=>$customer->id]) }}" class="btn btn-info" title="Edit"><i class="fas fa-user-edit"></i></a>
                                @if($customer->activation_status == 1)
                                <a href="#" onclick="
                                event.preventDefault();
                                var check = confirm('Are you sure to deactivate this customer account?');
                                if (check)
                                    {
                                        document.getElementById('customerDeactivateForm{{ $customer->id }}').submit();
                                    }
                                " class="btn btn-warning mx-1" title="Deactivate"><i class="fas fa-user-times"></i></a>
                                    <form id="customerDeactivateForm{{ $customer->id }}" action="{{ route('customer-deactivation') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $customer->id }}"/>
                                    </form>
                                @else
                                <a href="#" onclick="
                                event.preventDefault();
                                var check = confirm('Are you sure to activate this customer account?');
                                if (check)
                                    {
                                        document.getElementById('customerActivateForm{{ $customer->id }}').submit();
                                    }
                                " class="btn btn-success mx-1" title="Activate"><i class="fas fa-user-check"></i></a>
                                    <form id="customerActivateForm{{ $customer->id }}" action="{{ route('customer-activation') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $customer->id }}"/>
                                    </form>
                                @endif
                                <a href="#" onclick="
                                event.preventDefault();
                                var check = confirm('This will permanently destroy customer data.\nAre you sure to delete this customer account?');
                                if (check)
                                    {
                                        document.getElementById('customerDeleteForm{{ $customer->id }}').submit();
                                    }
                                " class="btn btn-danger" title="Delete"><i class="fas fa-user-alt-slash"></i></a>
                                    <form id="customerDeleteForm{{ $customer->id }}" action="{{ route('customer-data-delete') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $customer->id }}"/>
                                    </form>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="bg-gradient-info text-light">
                    <tr>
                        <th>SL No.</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone No.</th>
                        <th>Address</th>
                        <th>Activation Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection