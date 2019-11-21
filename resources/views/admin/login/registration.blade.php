@extends('admin.layouts.form')

@section('body')

    <section class="bg pb-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="my-4 font-weight-bold" style="color: #0b698b; letter-spacing: 3px;">Admin Registration</h2>
                    <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                        <div class="card card-body login-card">
                            {{ Form::open(['route'=>'register', 'method'=>'POST']) }}
                            <div class="form-group my-3 row">
                                <label for="name" class="col-sm-3 bg-transparent border-left-0 border-top-0 border-bottom-0 font-weight-bold mt-1 py-1 pr-2" style="color: #1a80a6; border-right: 3px solid #1a80a6;">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" id="name" class=" form-control bg-transparent border-0 shadow-none" required placeholder="Full name....."/>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group my-3 row">
                                <label for="designation" class="col-sm-3 bg-transparent border-left-0 border-top-0 border-bottom-0 font-weight-bold mt-1 py-1 pr-2" style="color: #1a80a6; border-right: 3px solid #1a80a6;">Designation</label>
                                <div class="col-sm-9">
                                    <input type="text" name="designation" id="designation" class=" form-control bg-transparent border-0 shadow-none" required  placeholder="Designation....."/>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group my-3 row">
                                <label for="email" class="col-sm-3 bg-transparent border-left-0 border-top-0 border-bottom-0 font-weight-bold mt-1 py-1 pr-2" style="color: #1a80a6; border-right: 3px solid #1a80a6;">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" id="email" class=" form-control bg-transparent border-0 shadow-none" required  placeholder="Email address....."/>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group my-3 row">
                                <label for="phone" class="col-sm-3 bg-transparent border-left-0 border-top-0 border-bottom-0 font-weight-bold mt-1 py-1 pr-2" style="color: #1a80a6; border-right: 3px solid #1a80a6;">Phone No.</label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" id="phone" class=" form-control bg-transparent border-0 shadow-none" required placeholder="Phone number....."/>
                                </div>
                            </div>
                            <hr/>
                            {{--<div class="form-group my-3 row">--}}
                                {{--<label for="image" class="col-sm-3 bg-transparent border-left-0 border-top-0 border-bottom-0 font-weight-bold mt-1 py-1 pr-2" style="color: #1a80a6; border-right: 3px solid #1a80a6;">Image</label>--}}
                                {{--<div class="col-sm-9">--}}
                                    {{--<input type="file" name="image" id="image" onkeyup="emailCkeck(this.value);" class="float-left mt-1 bg-transparent border-0 shadow-none" style="margin-left: 12px;" accept="image/*" autocomplete="email" placeholder="Image"/>--}}
                                    {{--<span><i class="fas fa-1x fa-check text-success"  id="emailMatched" style="display: none; padding-top: 12px;"></i></span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div id="res"></div>--}}
                            {{--<hr/>--}}
                            <div class="form-group my-3 row">
                                <label for="password" class="col-sm-3 bg-transparent border-left-0 border-top-0 border-bottom-0 font-weight-bold mt-1 py-1 pr-2" style="color: #1a80a6; border-right: 3px solid #1a80a6;">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" id="password" class=" form-control bg-transparent border-0 shadow-none" required placeholder="Password....."/>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group my-3 row">
                                <label for="confirmPassword" class="col-sm-3 bg-transparent border-left-0 border-top-0 border-bottom-0 font-weight-bold mt-1 py-1 pr-2" style="color: #1a80a6; border-right: 3px solid #1a80a6;">Comfirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password_confirmation" id="confirmPassword" class=" form-control bg-transparent border-0 shadow-none" required  placeholder="Comfirm Password....."/>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <input  type="submit" id="loginBtn" class="btn shadow-none submit-btn" value="Register"/>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // function emailCkeck(email) {
        //     // alert(email);
        //     $.ajax({
        //         url:        'http://localhost/my-project/public/check-login-email/'+email,
        //         method:     'GET',
        //         data:       {email:email},
        //         dataType:   'JSON',
        //         success:    function (data){
        //             if (data == 'Please use valid email for login') {
        //                 document.getElementById('res').innerHTML = data;
        //                 document.getElementById('emailMatched').style.display = 'none';
        //                 document.getElementById('loginBtn').disabled = true;
        //             } else {
        //                 document.getElementById('res').innerHTML = ' ';
        //                 document.getElementById('emailMatched').style.display = 'block';
        //                 document.getElementById('loginBtn').disabled = false;
        //             }
        //         }
        //     });
        // }
        // function passwordCkeck(password) {
        //     $.ajax({
        //         url:        'http://localhost/my-project/public/check-login-password/'+password,
        //         method:     'GET',
        //         data:       {password:password},
        //         dataType:   'JSON',
        //         success:    function (data){
        //             if (data == 'Please use valid password for login') {
        //                 document.getElementById('res1').innerHTML = data;
        //                 document.getElementById('passwordMatched').style.display = 'none';
        //                 document.getElementById('loginBtn').disabled = true;
        //             } else {
        //                 document.getElementById('res1').innerHTML = ' ';
        //                 document.getElementById('passwordMatched').style.display = 'block';
        //                 document.getElementById('loginBtn').disabled = false;
        //             }
        //         }
        //     });
        // }
    </script>
@endsection