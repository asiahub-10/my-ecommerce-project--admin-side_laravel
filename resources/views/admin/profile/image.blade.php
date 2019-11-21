@extends('admin.master')

@section('title')
    Profile Picture
@endsection()

@section('body')

    <div class="container m-0 p-0 profile-bg">
        <div class="row">
            <div class="col-sm-12 p-0">
                <div class="card card-body p-4 m-0 bg-transparent border-0">
                    <h2 class="text-center mb-4 text-info text-uppercase font-weight-bold">Change Profile Picture</h2>
                    <div class="card-body p-0 mx-auto">
                        @if(Auth::user()->image == null)
                            <img src="{{ asset('/') }}user-images/bg_user.jpg" alt="Profile Picture" class="card-img-top" style="border-radius: 20px; height: 200px; width: 200px;"/>
                        @else
                            <img src="{{ asset('/') }}{{ Auth::user()->image }}" alt="Profile Picture" class="card-img-top" style="border-radius: 20px; height: 200px; width: 200px;"/>
                        @endif
                    </div>

                    {{ Form::open(['route'=>'profile-picture', 'method'=>'post', 'enctype'=>'multipart/form-data']) }}
                        <div class="card card-body bg-transparent border-0">
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <div class="text-center my-4">
                                        <label class="text-info mr-4 font-weight-bold">Upload New Image:</label>
                                        <input type="file" name="image" class="bg-gradient-info text-white" accept="image/*"/>
                                    </div>
                                    <button type="submit" class="btn btn-outline-info">Save Change</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
@endsection()