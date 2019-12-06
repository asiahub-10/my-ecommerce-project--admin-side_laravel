<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    {{--<link rel="stylesheet" href="{{ asset('/') }}admin/css/all.css" />--}}
    {{--<link rel="stylesheet" href="{{ asset('/') }}admin/css/bootstrap.css" />--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
        }
        .container-fluid {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }
        .navbar-brand {
            display: inline-block;
            padding-top: 0.3125rem;
            padding-bottom: 0.3125rem;
            margin-right: 1rem;
            font-size: 1.25rem;
            line-height: inherit;
            white-space: nowrap;
        }
        .bg {
            /*background-color: #fe7a59;*/
            background-color: #f69177;
        }
        table td {
            padding: 0 !important;
        }
        .text-color {
            color:#fe7a59;
        }
        .text-center {
            text-align: center !important;
        }
        .fashion {
            font-size: 50px;
            text-shadow: 2px 2px 4px #d6d8db;
            font-weight: 500;
        }
        .asia {
            font-size: 50px;
            text-shadow: 2px 2px 4px #6e707e;
        }
        .text-warning {
            color: #ffc107 !important;
        }
        .text-muted {
            color: #6c757d !important;
        }
        .text-uppercase {
            text-transform: uppercase !important;
        }
        .table {
            border-collapse: collapse !important;
        }
        .table-borderless th,
        .table-borderless td,
        .table-borderless thead th,
        .table-borderless tbody + tbody {
            border: 0;
        }
        .text-right {
            text-align: right !important;
        }
        .font-weight-bold {
            font-weight: 700 !important;
        }
        .font-italic {
            font-style: italic !important;
        }
        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }
        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;
        }
        .mx-auto {
            margin-right: auto !important;
        }
        .mb-0 {
            margin-bottom: 0 !important;
        }
        .mx-1 {
            margin-right: 0.25rem !important;
        }
        .mb-1 {
            margin-bottom: 0.25rem !important;
        }
        .mx-1 {
            margin-left: 0.25rem !important;
        }
        .mr-2 {
            margin-right: 0.5rem !important;
        }
        .mb-3 {
            margin-bottom: 1rem !important;
        }
        .mt-4 {
            margin-top: 1.5rem !important;
        }
        .mb-4 {
            margin-bottom: 1.5rem !important;
        }
        .mt-5 {
            margin-top: 3rem !important;
        }
        .mb-5 {
            margin-bottom: 3rem !important;
        }
        .py-1 {
            padding-top: 0.25rem !important;
        }
        .py-1 {
            padding-bottom: 0.25rem !important;
        }
        .py-2 {
            padding-top: 0.5rem !important;
        }
        .pr-2 {
            padding-right: 0.5rem !important;
        }
        .py-2 {
            padding-bottom: 0.5rem !important;
        }
        .pl-2 {
            padding-left: 0.5rem !important;
        }
        .pt-3,
        .py-3 {
            padding-top: 1rem !important;
        }
        .py-3 {
            padding-bottom: 1rem !important;
        }
        .col-sm-6,
        .col-sm-12 {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }
        @media (min-width: 576px) {
            .col-sm-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%;
            }
            .col-sm-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
    <script src="https://kit.fontawesome.com/51e0a43b12.js" crossorigin="anonymous"></script>
</head>

<body>

<section>
    <div class="container-fluid bg">
        <div class="row text-center">
            <div class="mx-auto mb-5 mt-4">
                <a href="" class="text-muted mb-1 navbar-brand ">
                    <span class="text-warning asia" style="">Asis</span><span class="fashion">Fashion</span>
                </a>
                {{--<div class="img"></div>--}}
                {{--<img src="{{ asset('/') }}admin/img/order.png" alt="Order Confirm Image" />--}}
                <br/>
                <a href="#"><img src="https://www.tropicalnorthqueensland.org.au/jp/wp-content/uploads/sites/2/icons8-full-shopping-basket-100.png" alt="Order Confirm Image"/></a>
                <h2 style="color:cornsilk;">Thank you for your purchase.</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="mt-5 mb-4 text-muted font-weight-bold text-justify font-italic">
            <h5><span class="mb-0">Hey {{ $first_name }} {{ $last_name }},</span>
                <br/>
                We have received your <b>order no: 5</b> and we are working on it now. Your order will be on its way soon. We will contact you when we will ship it. Thanks for shopping with <strong><span class="text-warning">Asia</span>Fashion</strong>, we really appreciate it.
            </h5>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h5 class="text-color text-uppercase">Order Summary:</h5>
                <table class="table table-borderless mb-3">
                    <tbody>
                    <tr>
                        <td>Order Id:</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Order Date:</td>
                        <td>5/12/19</td>
                    </tr>
                    <tr>
                        <td>Order Total:</td>
                        <td>&#2547; 1000</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mb-4">
            <div class="card-group col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-uppercase">Billing Address:</h6>
                        <table class="table table-borderless mb-0">
                            <tbody>
                            <tr>
                                <td>Name:</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Mobile No:</td>
                                <td>5/12/19</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>Tk. 1000</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-uppercase">Shipping To:</h6>
                        <table class="table table-borderless mb-0">
                            <tbody>
                            <tr>
                                <td>Name:</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>Mobile No:</td>
                                <td>5/12/19</td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>Tk. 1000</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-3">
        <div class="row mt-4">
            <div class="col-sm-12">
                <h5 class="text-color text-uppercase mb-3">Item Summary:</h5>
                <table class="table">
                    <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Item Image</th>
                        <th>Item Detail</th>
                        <th class="text-right">Total (BDT)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="pl-2 py-2">fghgfh</td>
                        <td class="pl-2 py-2">ghj</td>
                        <td class="pl-2 py-2">fgjfj</td>
                        <td class="text-right py-2 pr-2">&#2547; f</td>
                    </tr>
                    <tr>
                        <td class="pl-2 py-2"></td>
                        <td class="pl-2 py-2"></td>
                        <td class="pl-2 py-2 text-right">Subtotal (2 items):</td>
                        <td class="text-right py-2 pr-2">&#2547; 100</td>
                    </tr>
                    <tr>
                        <td class="pl-2 py-2"></td>
                        <td class="pl-2 py-2"></td>
                        <td class="pl-2 py-2 text-right">Tax:</td>
                        <td class="text-right py-2 pr-2">&#2547; 100</td>
                    </tr>
                    <tr>
                        <td class="pl-2 py-2"></td>
                        <td class="pl-2 py-2"></td>
                        <td class="pl-2 py-2 text-right font-weight-bold">Order Total:</td>
                        <td class="text-right py-2 pr-2 font-weight-bold"><span style="border-bottom: 6px #6e707e double;">&#2547; 100</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container-fluid bg py-1"></div>
    <div class="container">
        <div class="row mt-4 mb-1">
            <div class="col-sm-6">
                <h6 class="text-uppercase text-center font-weight-bold text-color">Contact Us</h6>
                <ul class="list-unstyled text-left text-muted">
                    <li><i class="fas fa-store mr-2 py-2 text-color"></i> Baily Road, Dhaka.</li>
                    <li><i class="fas fa-envelope-open-text mr-2 py-2 text-color"></i> asia_fashion@gmail.com</li>
                    <li><i class="fas fa-phone mr-2 py-2 text-color"></i> +8801312345678</li>
                </ul>
            </div>
            <div class="col-sm-6">
                <h6 class="text-uppercase text-center font-weight-bold text-color">Follow Us</h6>
                <div class="row">
                    <div class="card-body text-center py-3">
                        <a href=""><i class="text-muted fab fa-2x mx-1 fa-facebook-square social-media-icon"></i></a>
                        <a href=""><i class="text-muted fab fa-2x mx-1 fa-twitter-square social-media-icon"></i></a>
                        <a href=""><i class="text-muted fab fa-2x mx-1 fa-instagram social-media-icon"></i></a>
                        <a href=""><i class="text-muted fab fa-2x mx-1 fa-linkedin social-media-icon"></i></a>
                        <a href=""><i class="text-muted fab fa-2x mx-1 fa-google-plus-square social-media-icon"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg">
        <div class="row pt-3">
            <p class="mx-auto text-light">&copy; 2019 <b>ASIA<span class="text-muted">FASHION</span></b>. All rights reserved | Design by <i><b>Asia Rahman</b></i></p>
        </div>
    </div>
</section>
</body>
</html>