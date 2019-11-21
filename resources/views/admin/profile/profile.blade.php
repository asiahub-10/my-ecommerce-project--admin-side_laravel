@extends('admin.master')

@section('title')
    Profile
@endsection()

@section('body')
    <style>
        .profile-bg {
            background-image: url('{{ asset('/') }}admin/img/bg_profile.jpg'); background-size: cover;
        }
        .profile-data {
            border-top: 15px double white; border-bottom: 15px double white; border-radius: 0; background-color: rgba(31, 111, 178, .3);
        }
        .edit {

        }
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

    <div class="container-fluid m-0 pb-5 profile-bg">
        <div class="row">
            <div class="col-sm-12 p-0">
                <div class="card card-body p-4 m-0 bg-transparent border-0">
                    <h2 class="text-center mb-4 text-white text-uppercase font-weight-bold" style="text-shadow: 2px 2px 4px #000000;">Admin Profile</h2>
                    <div class="card-body p-0 mx-auto">
                        @if(Auth::user()->image == null)
                            <img src="{{ asset('/') }}user-images/bg_user.jpg" alt="Profile Picture" class="card-img-top" style="border-radius: 20px; height: 200px; width: 200px;"/>
                        @else
                            <img src="{{ asset('/') }}{{ Auth::user()->image }}" alt="Profile Picture" class="card-img-top" style="border-radius: 20px; height: 200px; width: 200px;"/>
                        @endif
                        <div class="card card-body bg-transparent border-0 m-0 p-0">
                            <a href="{{ route('change-profile-image') }}" title="Edit Image"><i class="fas fa-user-edit text-center image-edit bg-gradient-info"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pb-5 pt-3">
            <div class="col-md-8 mx-auto">
                <div class="card text-center text-white border-left-0 border-right-0 profile-data">
                    <div class="card-body">
                        <h3>{{ Auth::user()->name }}</h3>
                        <h5>{{ Auth::user()->designation }}</h5>
                        <hr class="bg-white"/>
                        <p><i class="far fa-envelope mr-2"></i>{{ Auth::user()->email }}</p>
                        <p><i class="fas fa-mobile-alt mr-2"></i>{{ Auth::user()->phone }}</p>
                    </div>
                    <div class="card-footer text-center pb-0 text-dark"  style="border-radius: 0;">
                        <p><i class="far fa-calendar-alt mr-2"></i>Admin from {{ Auth::user()->created_at }}</p>
                    </div>
                </div>
                <div class="card card-body bg-transparent border-0 m-0 p-0">
                    <a href="{{ route('change-profile-info') }}" title="Edit Profile Info"><i class="fas fa-edit text-center image-edit bg-gradient-info" style="margin-top: -6px; padding: 14px;"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection()