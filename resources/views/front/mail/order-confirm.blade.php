<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{ asset('/') }}admin/css/all.css" />
    <link rel="stylesheet" href="{{ asset('/') }}admin/css/bootstrap.css" />
</head>

<body>
<style>
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
</style>
<section>
    <div class="container-fluid bg">
        <div class="row text-center">
            <div class="mx-auto mb-5 mt-4">
                <a href="" class="text-muted mb-1 d-block navbar-brand" style="font-size: 50px; text-shadow: 2px 2px 4px #d6d8db; font-weight: 500;">
                    <span class="text-warning" style="font-size: 50px; text-shadow: 2px 2px 4px #6e707e;">Asis</span>Fashion
                </a>
                <img src="{{ asset('/') }}admin/img/order.png" alt="Order Confirm Image" />
                <h2 style="color:cornsilk;">Thank you for your purchase.</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="my-5 text-muted font-weight-bold text-justify font-italic">
            <h5><p class="mb-2">Hey Shorna,</p>
                We have received your <b>order no: 5</b> and we are working on it now. Your order will be on its way soon. We will contact you when we will ship it. Thanks for shopping with <strong><span class="text-warning">Asia</span>Fashion</strong>, we really appreciate it.
            </h5>
        </div>
        <div class="row mb-4">
            <div class="col-sm-6 card">
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
            <div class="col-sm-6 card">
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
    <div class="container mb-3">
        <div class="row">
            <div class="col-sm-6">
                <h5 class="text-color text-uppercase">Order Summary:</h5>
                <table class="table table-borderless mb-0">
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