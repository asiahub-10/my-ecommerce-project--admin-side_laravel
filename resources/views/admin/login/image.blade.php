@extends('admin.layouts.form')

@section('body')
    <style>
        html { margin: 0; height: 100%;}
    </style>
    <section class="bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="my-5 pt-2 font-weight-bold" style="color: #0b698b; letter-spacing: 3px;">Profile Picture Upload</h2>
                    <div class="col-lg-5 col-sm-9 mx-auto">
                        <div class="card card-body login-card pt-3">
                            <div class="card-body mx-auto">
                                <img src="{{ asset('/') }}user-images/bg_user.jpg" alt="Profile Picture" class="card-img-top" style="border-radius: 20px; height: 120px; width: 120px; border: 5px solid #17a2b8;"/>
                            </div>
                            {{ Form::open(['route'=>'profile-picture-upload', 'method'=>'post', 'enctype'=>'multipart/form-data']) }}
                            <div class="card card-body bg-transparent border-0 pt-0">
                                <div class="text-center">
                                    <div class="text-center mb-4">
                                        <label class="text-info font-weight-bold">Upload Image</label>
                                        <input type="file" name="image" class="bg-info text-light mt-2" accept="image/*"/>
                                    </div>
                                    <button type="submit" class="btn btn-outline-info">Save Change</button>
                                </div>
                            </div>
                            {{ Form::close() }}

                            {{ Form::open(['route'=>'registration-complete', 'method'=>'post']) }}
                            <button type="submit" class="btn btn-secondary text-white border-0 font-weight-bold text-uppercase mb-2">Skip</button>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection