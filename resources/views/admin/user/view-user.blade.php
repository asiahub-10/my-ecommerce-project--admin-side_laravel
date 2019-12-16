@extends('admin.master')

@section('title')
    View User Profile
@endsection()

@section('body')
    <style>
        .image-edit {
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            position: absolute;
            border: white solid 3px;
            border-radius: 50%;
            color: white;
            padding: 12px;

        }
    </style>

    <div class="container my-4">
        <div class="row">
            <div class="mx-auto col-xl-6 col-lg-8 col-md-11 text-center bg-white px-0">
                <div class="card-header bg-gradient-info">
                    <h4 class="text-light text-center">User Profile</h4>
                </div>
                <div class="card-body p-0 mx-auto my-3">
                    @if($user->image == null)
                        <img src="{{ asset('/') }}user-images/bg_user.jpg" alt="Profile Picture" class="" style="border-radius: 50%; height: 120px; width: 120px; border: 8px double #d6d8db;"/>
                    @else
                        <img src="{{ asset($user->image) }}" alt="Profile Picture" class="card-img-top" style="border-radius: 50%; height: 120px; width: 120px; border: 8px double #d6d8db;"/>
                    @endif
                </div>
                <h5 class="text-info">{{ $user->name }}</h5>
                <p class="text-info">{{ $user->designation }}</p>
                <hr/>
                <div class="card-group">
                    <div class="card border-0">
                        <h6 class="font-weight-bold font-italic">Email Address</h6>
                        <i class="far fa-envelope text-info mb-2"></i>
                        <p class="mb-0">{{ $user->email }}</p>
                    </div>
                    <div class="card border-0">
                        <h6 class="font-weight-bold font-italic">Phone Number</h6>
                        <i class="fas fa-mobile-alt text-info mb-2"></i>
                        <p class="mb-0">{{ $user->phone }}</p>
                    </div>
                    <div class="card border-0">
                        <h6 class="font-weight-bold font-italic">Joined On</h6>
                        <i class="far fa-calendar-alt text-info mb-2"></i>
                        <p class="mb-0">{{ $user->created_at->format('d/m/y') }} ({{ $user->created_at->format('h:i a') }})</p>
                    </div>
                </div>
                <hr/>
            </div>
        </div>
    </div>
@endsection()