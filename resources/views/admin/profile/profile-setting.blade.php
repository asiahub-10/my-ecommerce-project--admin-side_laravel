@extends('admin.master')

@section('title')
    Profile Settings
@endsection

@section('body')
    <section>
        <div class="container my-5">
            <div class="row">
                <div class="card card-body col-lg-6 col-md-10 mx-auto">
                    <h2 class="text-info text-center font-weight-bold mb-3">PROFILE SETTING</h2>
                    <div class="my-3">
                        @if(Session::has('message'))
                            <div class="card-body text-center pb-0 alert">
                                <button type="button" class="close text-danger" data-dismiss="alert">x</button>
                                <i class="fas fa-2x fa-check text-info p-2 success"></i>
                                <h4 class="text-info font-weight-bold ">{{ Session::get('message') }}</h4>
                            </div>
                        @endif
                    </div>
                    <table class="table">
                        <tr>
                            <th>Edit profile information</th>
                            <td class="text-right"><a href="{{ route('change-profile-info') }}" class="btn btn-outline-info btn-sm text-uppercase">Edit</a></td>
                        </tr>
                        <tr>
                            <th>Upload another profile picture</th>
                            <td class="text-right"><a href="{{ route('change-profile-image') }}" class="btn btn-outline-info btn-sm text-uppercase">upload</a></td>
                        </tr>
                        <tr>
                            <th>Change email address</th>
                            <td class="text-right"><a href="{{ route('change-email-address') }}" class="btn btn-outline-info btn-sm text-uppercase">change</a></td>
                        </tr>
                        <tr>
                            <th>Reset password</th>
                            <td class="text-right"><a href="{{ route('change-password') }}" class="btn btn-outline-info btn-sm text-uppercase">Reset</a></td>
                        </tr>
                        <tr>
                            <th>Delete account</th>
                            <td class="text-right"><a href="{{ route('delete-profile') }}" class="btn btn-outline-info btn-sm text-uppercase">delete</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection