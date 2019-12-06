<!--<p><span>Hey {{ $first_name }} {{ $last_name }},</span>-->
    <!--<br/>-->
    <!--<span>We have received your <b>order no: 5</b> and we are working on it now. Your order will be on its way soon. We will contact you when we will ship it. Thanks for shopping with <strong><span class="text-warning">Asia</span>Fashion</strong>, we really appreciate it.</span>-->
<!--</p>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        *{ box-sizing: border-box}
        body{
            margin: 0;
            padding: 0;
        }
        .col-sm-6{ width: 50%; }
        .col-sm-12{ width: 100%; }

        [class*=col-sm-]{
            float: left;
            /*border: 1px solid red;*/
        }
        .container-fluid {
            width: 100%;
        }
        .container{
            width: 80%;
            height: auto;
            margin: auto;
        }
        .row:after{
            content: '';
            clear: both;
            display: block;
        }
        .shipping {
            border-left: 1px solid rgba(0, 0, 0, 0.125);
        }
        .bg {
            background-color: #f69177;
        }
        a:-webkit-any-link {
            color: #6c757d;
            cursor: pointer;
            text-decoration: none;
        }
        .text-color {
            color:#fe7a59;
        }
        .col-container {
            display: table;
            width: 100%;
        }
        .col {
            display: table-cell;
            padding: 20px;
            border: 1px solid rgba(0, 0, 0, 0.125);
        }
        @media screen and (max-width: 576px){
            [class*=col-sm-]{
                width: 100%;
            }
            .col {
                display: block;
                width: 100%;
            }
        }
    </style>
</head>

<body>

<section>
    <div class="container-fluid bg" style="padding-top: 50px; padding-bottom: 20px;">
        <div class="row" style="text-align: center">
            <div class="mx-auto mb-5 mt-4">
                <a href="" class="text-muted mb-1 navbar-brand ">
                    <span class="text-warning asia" style="font-size: 50px;
            text-shadow: 2px 2px 4px #6e707e; color: #ffc107">Asis</span><span style="font-size: 50px;
            text-shadow: 2px 2px 4px #d6d8db;
            font-weight: 500;">Fashion</span>
                </a>
                <br/>
                <a href="#"><img src="https://www.tropicalnorthqueensland.org.au/jp/wp-content/uploads/sites/2/icons8-full-shopping-basket-100.png" alt="Order Confirm Image"/></a>
                <p style="color:cornsilk; font-size: xx-large; font-weight: bold; margin-top: 0;">Thank you for your purchase.</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="mt-5 mb-4 text-muted font-weight-bold text-justify font-italic" style="margin: 30px 0; font-size: 20px; font-weight: bold; color: #6c757d; text-align: justify; line-height: 30px;">

        </div>
        <div class="row" style="padding-bottom: 20px;">
            <div class="col-sm-6">
                <h3 class="text-color" style="margin-top: 0; margin-bottom: 10px;">Order Summary:</h3>
                <table>
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
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-container">
                <div class="col">
                    <h3 style="text-transform: uppercase; font-weight: normal; color:#6e707e; margin-top: 0;">Billing Address:</h3>
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
                        <tr>
                            <td>Address:</td>
                            <td>Tk. 1000</td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>Tk. 1000</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <h3 style="text-transform: uppercase; font-weight: normal; color:#6e707e; margin-top: 0;">Shipping To:</h3>
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