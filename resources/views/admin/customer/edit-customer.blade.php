@extends('admin.master')

@section('title')
    Update Customer Info
@endsection

@section('body')
    <div class="container">
        @if(Session::has('message'))
            <div class="card-body text-center pb-0">
                <i class="fas fa-2x fa-check text-info p-2 success"></i>
                <h4 class="text-info font-weight-bold">{{ Session::get('message') }}</h4>
            </div>
        @endif

        <div class="card my-5 col-lg-9 col-md-11 mx-auto px-0">
            <div class="card-header bg-gradient-info">
                <h3 class="text-center text-light font-weight-bold font-italic">Edit Customer Info</h3>
            </div>
            <div class="card-body col-sm-12">
                {{ Form::open(['route'=>'update-customer-details', 'method'=>'post', 'class'=>'form-horizontal']) }}

                <div class="form-group row">
                    <label for="" class="col-md-3">Customer First Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') != null ? old('first_name') : $customer->first_name }}"/>
                        <input type="hidden" class="form-control" name="customer_id" value="{{ $customer->id }}"/>
                        <span class="text-danger">{{ $errors->has('first_name') ? $errors->first('first_name') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-3">Customer Last Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') != null ? old('last_name') : $customer->last_name }}"/>
                        <span class="text-danger">{{ $errors->has('last_name') ? $errors->first('last_name') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-3">Email Address</label>
                    <div class="col-md-9">
                        <input type="email" onkeyup="customerEmailCkeck(this.value, {{ $customer->id }});" class="form-control" name="email"  value="{{ old('email') != null ? old('email') : $customer->email }}"/>
                        <span id="emailError" class="text-danger"></span>
                        <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                    </div>
                </div>

                <div class="from-group row">
                    <label for="" class="col-md-3">Phone Number</label>
                    <div class="col-md-9">
                        <input type="number" class="form-control" name="mobile" value="{{ old('mobile') != null ? old('mobile') : $customer->mobile }}"/>
                        <span class="text-danger">{{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</span>
                    </div>
                </div>

                <div class="from-group row my-3">
                    <label for="" class="col-md-3">Address</label>
                    <div class="col-md-9">
                        <textarea name="address" class="form-control" rows="3">{{ old('address') != null ? old('address') : $customer->address }}</textarea>
                        <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3">Activation Status</label>
                    <div class="col-md-9">
                        @if(old('activation_status')==null)
                        <label class="mr-3"><input type="radio" name="activation_status" class="mr-1" value="1" {{ $customer->activation_status == 1 ? 'checked' : '' }}/>Activate</label>
                        <label><input type="radio" name="activation_status" class="mr-1" value="0" {{ $customer->activation_status == 0  ? 'checked' : '' }}/>Deactivate</label>
                        @else
                            <label class="mr-3"><input type="radio" name="activation_status" class="mr-1" value="1" {{ old('activation_status') == 1 ? 'checked' : '' }}/>Activate</label>
                            <label><input type="radio" name="activation_status" class="mr-1" value="0" {{ old('activation_status') == 0  ? 'checked' : '' }}/>Deactivate</label>
                        @endif
                        <br/>
                        <span class="text-danger">{{ $errors->has('activation_status') ? $errors->first('activation_status') : ' ' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3"></label>
                    <div class="col-md-9">
                        <input id="customerUpdateBtn" type="submit" name="btn" class="btn btn-outline-info font-weight-bold btn-block form-control" value="Update Customer Info"/>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <script>
        function customerEmailCkeck(email, id) {
            $.ajax({
                url:        'http://localhost/my-project/public/customer-email-check/'+email+'/'+id,
                method:     'GET',
                data:       {email:email, id:id},
                dataType:   'JSON',
                success:    function (data) {
                    document.getElementById('emailError').innerHTML = data;
                    if (data == 'Email Available') {
                        document.getElementById('customerUpdateBtn').disabled = false
                        document.getElementById('emailError').hidden = true;
                    } else {
                        document.getElementById('customerUpdateBtn').disabled = true
                        document.getElementById('emailError').hidden = false;
                    }
                }
            });
        }

    </script>
@endsection










