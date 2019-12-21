@extends('admin.master')

@section('title')
    Delete Account
@endsection

@section('body')
    <section>
        <div class="container my-5">
            <div class="row">
                <div class="card card-body col-lg-6 col-md-10 mx-auto">
                    <h2 class="text-info text-center font-weight-bold mt-3 mb-0">Delete Account</h2>
                    <hr/>
                    <div class="text-danger text-center bg-gray-100 p-3 rounded">
                        <h2 class="text-uppercase">warning</h2>
                        <i class="fas fa-2x fa-exclamation-triangle"></i>
                        <h5 class="mt-2">This will permanently remove your account that cannot be restored.</h5>
                    </div>
                    <hr/>
                    {{ Form::open(['route'=>'update-email', 'method'=>'POST']) }}
                    <div class="form-group row">
                        <label class="col-sm-5">Enter your password</label>
                        <div class="col-sm-7">
                            <input type="password" name="old_password" class="form-control"/>
                        </div>
                    </div>
                    <div class=" text-center">
                        <input type="submit" class="btn btn-outline-danger text-uppercase mx-2 my-1" value="delete account" />
                        <a href="{{ route('setting') }}" class="btn btn-outline-dark text-uppercase mx-2 my-1">cancel</a>
                    </div>
                    {{ Form::close() }}
                    <div class="my-2 text-center">
                        @if(Session::has('error'))
                            <h5 class="text-danger font-weight-bold ">{{ Session::get('error') }}</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection