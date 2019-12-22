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
                    {{ Form::open(['route'=>'remove-user', 'method'=>'POST']) }}
                    <div class="form-group row">
                        <label class="col-sm-5">Enter your password</label>
                        <div class="col-sm-7">
                            <input type="password" name="password" class="form-control"/>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                            @if(Session::has('error'))
                                <span class="text-danger ">{{ Session::get('error') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class=" text-center">
                        <input type="submit" class="btn btn-outline-danger text-uppercase mx-2 my-1" value="delete account" />
                        <a href="{{ route('setting') }}" class="btn btn-outline-dark text-uppercase mx-2 my-1">cancel</a>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection