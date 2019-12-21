@extends('admin.master')

@section('title')
    Change Password
@endsection

@section('body')
    <section>
        <div class="container my-5">
            <div class="row">
                <div class="card card-body col-lg-6 col-md-10 mx-auto">
                    <h2 class="text-info text-center font-weight-bold mb-3">Change Password</h2>
                    {{ Form::open(['route'=>'update-email', 'method'=>'POST']) }}
                    <div class="form-group row">
                        <label class="col-sm-5">Enter old password</label>
                        <div class="col-sm-7">
                            <input type="password" name="old_password" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Enter new password</label>
                        <div class="col-sm-7">
                            <input type="password" name="email" class="form-control" value="" />
                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Confirm new password</label>
                        <div class="col-sm-7">
                            <input type="password" name="email" class="form-control" value="" />
                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                        </div>
                    </div>
                    <div class=" text-center">
                        <input type="submit" class="btn btn-outline-info text-uppercase mx-2 my-1" value="reset password" />
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