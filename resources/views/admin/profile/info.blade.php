@extends('admin.master')

@section('title')
    Profile Info
@endsection()

@section('body')

    <style>

    </style>
    <div class="container mt-3">
        <div class="row">
            <div class="col-xl-6 col-lg-8 col-sm-10 mx-auto p-0">
                <div class="card card-body p-4 m-0 bg-transparent border-0 text-center">
                    <h2 class="text-center mb-4 text-info text-uppercase font-weight-bold">Update Profile Info</h2>
                    {{ Form::open(['route'=>'update-profile-info', 'method'=>'post']) }}
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-striped">
                            <tbody>
                            <tr>
                                <th class="text-capitalize py-3 text-info text-center">name</th>
                                <td><input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control bg-transparent border-0 shadow-none pt-2"/></td>
                            </tr>
                            <tr>
                                <th class="text-capitalize py-3 text-info text-center">designation</th>
                                <td><input type="text" name="designation" value="{{ Auth::user()->designation }}" class="form-control bg-transparent border-0 shadow-none pt-2"/></td>
                            </tr>
                            {{--<tr>--}}
                                {{--<th class="text-capitalize py-3 text-info text-center">email</th>--}}
                                {{--<td><input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control bg-transparent border-0 shadow-none pt-2"/></td>--}}
                            {{--</tr>--}}
                            <tr>
                                <th class="text-capitalize py-3 text-info text-center">phone no.</th>
                                <td><input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control bg-transparent border-0 shadow-none pt-2"/></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-outline-info mt-4">Save update info</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection()