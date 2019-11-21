<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registered</title>
        <link rel="stylesheet" href="{{ asset('/') }}admin/css/all.css"/>
        <link rel="stylesheet" href="{{ asset('/') }}admin/css/bootstrap.css"/>
        <style>
            .success {
                border-radius: 50%;
                border: 7px solid #d6d8db;
            }
        </style>
    </head>
    <body>

        <div class="container-fluid">
            <div class="row bg-info mt-5 mb-3">
                <h3 class="text-info py-1 mx-auto text-light">Successfully Registered</h3>
            </div>
            <div class="row">
                <div class=" card-body text-center">
                    <i class="fas fa-4x fa-check text-info p-4 success"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="card-body text-center">
                        <h5 class="text-muted text-center">Congratulation! You've successfully registered. Your information is saved to our database.</h5>
                        <h5 class="text-muted text-center">Login with your new account.</h5>
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                <a href="{{ route('login') }}" class="mx-auto">
                    <button type="submit" class="btn btn-info text-capitalize">Go to login page</button>
                </a>
            </div>
        </div>


    </body>
</html>