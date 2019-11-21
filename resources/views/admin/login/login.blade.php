@extends('admin.layouts.form')

@section('body')
    <style>
        html { margin: 0; height: 100%;}
    </style>
    <section class="bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h1 class="my-5 pt-5 font-weight-bold" style="color: #0b698b; letter-spacing: 3px;">Admin Login</h1>
                    <div class="col-lg-5 col-sm-9 mx-auto">
                        <div class="card card-body login-card">
                            {{ Form::open(['route'=>'home', 'method'=>'POST']) }}

                            {{--<form method="POST" action="{{ route('login') }}">--}}
                                {{--@csrf--}}
                                <div class="input-group my-3">
                                    <div class="input-group-prepend">
                                        <span for="email" class="input-group-text bg-transparent border-left-0 border-top-0 border-bottom-0 login-icon-border"><i class="far fa-envelope"></i></span>
                                    </div>
                                    <input type="email" name="email" id="email" onkeyup="emailCkeck(this.value);" class="form-control bg-transparent border-0 shadow-none font-weight-normal" required autocomplete="email" placeholder="Email Address"/>
                                    <span><i class="fas fa-1x fa-check text-success"  id="emailMatched" style="display: none; padding-top: 12px;"></i></span>
                                </div>
                                <div id="res"></div>
                                <hr/>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span for="password" class="input-group-text bg-transparent border-left-0 border-top-0 border-bottom-0 login-icon-border"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="password" id="password" onkeyup="passwordCkeck(this.value);" class="form-control bg-transparent border-0 shadow-none font-weight-normal" required autocomplete="current-password" placeholder="Password"/>
                                    <span><i class="fas fa-1x fa-check text-success"  id="passwordMatched" style="display: none; padding-top: 12px;"></i></span>
                                </div>
                                <div id="res1"></div>
                                <hr/>
                                <div class="form-group">
                                    <input  type="submit" id="loginBtn" class="btn button shadow-none submit-btn" value="login"/>
                                </div>
                            {{ Form::close() }}
                            {{--</form>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function emailCkeck(email) {
            // alert(email);
            $.ajax({
                url:        'http://localhost/my-project/public/check-login-email/'+email,
                method:     'GET',
                data:       {email:email},
                dataType:   'JSON',
                success:    function (data){
                    if (data == 'Please use valid email for login') {
                        document.getElementById('res').innerHTML = data;
                        document.getElementById('emailMatched').style.display = 'none';
                        document.getElementById('loginBtn').disabled = true;
                    } else {
                        document.getElementById('res').innerHTML = ' ';
                        document.getElementById('emailMatched').style.display = 'block';
                        document.getElementById('loginBtn').disabled = false;
                    }
                }
            });
        }
        function passwordCkeck(password) {
            $.ajax({
                url:        'http://localhost/my-project/public/check-login-password/'+password,
                method:     'GET',
                data:       {password:password},
                dataType:   'JSON',
                success:    function (data){
                    if (data == 'Please use valid password for login') {
                        document.getElementById('res1').innerHTML = data;
                        document.getElementById('passwordMatched').style.display = 'none';
                        document.getElementById('loginBtn').disabled = true;
                    } else {
                        document.getElementById('res1').innerHTML = ' ';
                        document.getElementById('passwordMatched').style.display = 'block';
                        document.getElementById('loginBtn').disabled = false;
                    }
                }
            });
        }
    </script>
@endsection