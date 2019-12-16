@extends('admin.master')

@section('title')
    Manage User
@endsection

@section('body')

    <div class="container">
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
                        <th>User Name</th>
                        <th>Designation</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($users as $user)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->designation }}</th>
                            <th>{{ $user->created_at->format('d/m/y') }}</th>
                            <th class="">
                                <a href="{{ route('view-user-details', ['id'=>$user->id]) }}" class="btn btn-info" title="View Profile"><i class="fas fa-search-plus"></i></a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="bg-gradient-info text-light">
                    <tr>
                        <th>SL No.</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection