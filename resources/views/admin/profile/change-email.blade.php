@extends('admin.master')

@section('title')
    Change Email
@endsection

@section('body')
    <section>
        <div class="container my-5">
            <div class="row">
                <div class="card card-body col-lg-6 col-md-10 mx-auto">
                    <h2 class="text-info text-center font-weight-bold mb-3">Change Email</h2>
                    <div class="form-group row">
                        <label class="col-md-3">Old Email Address</label>
                        <div class="col-md-9">
                            <input type="text" readonly class="form-control" value="{{ Auth::user()->email }}"/>
                            <span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : '' }}</span>
                        </div>
                    </div>
                    <hr/>
                    <h5 class="text-dark">Please use an unique email address bellow:</h5>
                    {{ Form::open(['route'=>'update-email', 'method'=>'POST']) }}
                    <div class="form-group row">
                        <label class="col-md-3">New Email Address</label>
                        <div class="col-md-9">
                            <input type="text" name="email" class="form-control" value="{{ old('email') ? old('email') : '' }}" />
                            <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}" />
                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                        </div>
                    </div>
                    <div class=" text-center">
                        <input type="submit" class="btn btn-outline-info text-uppercase mx-2 my-1" value="save change" />
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