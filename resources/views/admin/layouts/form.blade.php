<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="{{ asset('/') }}admin/css/all.css"/>
        <link rel="stylesheet" href="{{ asset('/') }}admin/css/bootstrap.css"/>
        <style>
            {{--html {--}}
                {{--height: 100%;--}}
                {{--background-color: cyan;--}}
            {{--}--}}

            {{--body {--}}
                {{--height: 100%;--}}
                {{--background-image: url('http://i.imgur.com/9HMnxKs.png');--}}
                {{--background-repeat: repeat-y;--}}
                {{--background-size: 50% auto;--}}
            /*}*/
            body{
                height: 100%;
                margin: 0;
            }
            .bg {
                background: url("{{ asset('/') }}admin/img/login_bg.jpg");
                height: 100%;
                background-size: cover;
                background-repeat: no-repeat;
            }
            .login-icon-border {
                border-right: 3px solid #1a80a6;
                color: #1a80a6;
                font-size: x-large;
            }

            .submit-btn {
                background-color: #1a80a6;
                color: white;
                text-transform: uppercase;
            }
            .submit-btn:hover {
                background-color: #0b698b;
            }
            .login-card {
                border-radius: 20px;
                background-image: linear-gradient(to bottom right, snow, whitesmoke);
                box-shadow: #8E92AB 0 0 5px 0;
            }
        </style>
    </head>


    <body>

    @yield('body')

        <script src="{{ asset('/') }}admin/js/jquery-3.3.1.js"></script>
        <script src="{{ asset('/') }}admin/js/bootstrap.bundle.js"></script>
        <script src="{{ asset('/') }}admin/js/bootstrap.js"></script>
    </body>
</html>