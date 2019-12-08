<!--<p><span>Hey ,</span>-->
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
            height: auto;
            margin: auto;
        }
        .container{
            width: 95%;
            height: auto;
            margin: auto;
        }
        .row:after{
            content: '';
            clear: both;
            display: block;
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

<section style="width: 80%; margin: auto; background-color: #f8f9fa;" >
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
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr>
                        <td>Order Date:</td>
{{--                        <td>{{ $order->created_at->toDateString() }}</td>--}}
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td>Order Total:</td>
                        {{--<td>&#2547; {{ number_format($order->order_total) }}</td>--}}
                        {{--<td>&#2547; {{ number_format((float)$order->order_total, 2, '.', '') }}</td>--}}
                        <td>&#2547; {{ number_format($order->order_total, 2) }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-container">
                <div class="col">
                    <h3 style="text-transform: uppercase; font-weight: normal; color:#6e707e; margin-top: 0; margin-bottom: 10px;">Billing Address:</h3>
                    <table>
                        <tbody>
                        <tr>
                            <td>Name:</td>
                            <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Mobile No:</td>
                            <td>{{ $customer->mobile }}</td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>{{ $customer->address }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <h3 style="text-transform: uppercase; font-weight: normal; color:#6e707e; margin-top: 0; margin-bottom: 10px;">Shipping To:</h3>
                    <table class="table table-borderless mb-0">
                        <tbody>
                        <tr>
                            <td>Name:</td>
                            <td>{{ $shipping->name }}</td>
                        </tr>
                        <tr>
                            <td>Mobile No:</td>
                            <td>{{ $shipping->mobile }}</td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>{{ $shipping->address }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-color">Item Summary:</h3>
                <table width="100%">
                    <tr >
                        <th style="border-bottom: 3px solid #ced4da; padding-bottom: 8px; color:#6e707e;">SL No.</th>
                        {{--<th style="border-bottom: 3px solid #ced4da; padding-bottom: 8px; color:#6e707e;">Item Image</th>--}}
                        <th style="border-bottom: 3px solid #ced4da; padding-bottom: 8px; color:#6e707e;">Item Detail</th>
                        <th style="border-bottom: 3px solid #ced4da; padding-bottom: 8px; color:#6e707e;" class="text-right">Total (BDT)</th>
                    </tr>
                    @php($i = 1)
                    @php($subTotal = 0)
                    @foreach($items as $item)
                        <tr>
                            <td style="border-bottom: 1px solid #ced4da; padding: 8px 5px; text-align: center;" >{{ $i++ }}</td>
                            {{--<td style="border-bottom: 1px solid #ced4da; padding: 8px 5px; " >--}}
                                {{--<img src="{{ asset($item->product->product_image) }}" alt="Product Image"/>--}}
                            {{--</td>--}}
                            <td style="border-bottom: 1px solid #ced4da; padding: 8px 5px; " >
                                <p style="font-size: medium; margin: 0">{{ $item->product_name }}</p>
                                <p style="margin: 0;"><i>Price: </i>&#2547; {{ number_format($item->product_price, 2) }}</p>
                                <p style="margin: 0;"><i>Quantity: </i>{{ $item->product_quantity }}</p>
                            </td>
                            <td style="border-bottom: 1px solid #ced4da; padding: 8px 5px; text-align: right; " >&#2547; {{ number_format($total = $item->product_price*$item->product_quantity, 2) }}</td>
                        </tr>
                        <?php $subTotal = $subTotal + $total ?>
                    @endforeach
                    <tr>
                        <td></td>
                        <td style="border-bottom: 1px solid #ced4da; padding: 8px 5px;  text-align: right;">Subtotal (2 items):</td>
                        <td style="border-bottom: 1px solid #ced4da; padding: 8px 5px;  text-align: right;">&#2547; {{ number_format($subTotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="border-bottom: 1px solid #ced4da; padding: 8px 5px;  text-align: right;">Tax:</td>
                        <td style="border-bottom: 1px solid #ced4da; padding: 8px 5px;  text-align: right;">&#2547; {{ number_format($tax = $subTotal*.15, 2) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="border-bottom: 1px solid #ced4da; padding: 8px 5px; font-weight: bold; text-align: right;">Order Total:</td>
                        <td style="border-bottom: 1px solid #ced4da; padding: 8px 5px; font-weight: bold; text-align: right;"><span style="border-bottom: 6px #6e707e double;">&#2547; {{ number_format($subTotal+$tax, 2) }}</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="container-fluid bg" style="height: 10px; margin-top: 30px;"></div>
    <div class="container">
        <div class="row">
            <div class="col-container">
                <div class="col" style="border: 0 !important;">
                    <h3 style="text-transform: uppercase; text-align: center;" class="text-color"><u>Contact Us</u></h3>
                    <div style="text-align: center; font-size: larger; color:#6e707e;">
                        <p>Baily Road, Dhaka.</p>
                        <p>asia_fashion@gmail.com</p>
                        <p>+8801312345678</p>
                    </div>
                </div>
                <div class="col" style="border: 0 !important;">
                    <h3 style="text-transform: uppercase; text-align: center;" class="text-color"><u>Follow Us</u></h3>
                    <div class="row" style="margin-bottom: 20px;">
                        <div style="text-align: center;">
                            <a href="#"><img src="https://image.flaticon.com/icons/png/512/124/124010.png" style="height: 30px; width: 30px; border-radius: 5px;" alt="facebook_icon"/></a>
                            <a href="#"><img src="https://www.imediaethics.org/wp-content/uploads/2018/05/twitter.jpg" style="height: 30px; width: 30px; border-radius: 5px;" alt="twitter_icon"/></a>
                            <a href="#"><img src="https://www.freepnglogos.com/uploads/instagram-logos-png-images-free-download-2.png" style="height: 30px; width: 30px; border-radius: 5px;" alt="instagram_icon"/></a>
                            <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/LinkedIn_logo_initials.png/600px-LinkedIn_logo_initials.png" style="height: 30px; width: 30px; border-radius: 5px;" alt="linked_icon"/></a>
                            <a href="#"><img src="https://www.freepnglogos.com/uploads/google-plus-png-logo/google-logo-png-symbol-5.png" style="height: 30px; width: 30px; border-radius: 5px;" alt="google_plus_icon"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg">
        <div class="row" style="padding: 1px 0; text-align: center; color: white;">
            <p>&copy; 2019 <b style="color: #FFC107;">ASIA<span style="color: #6e707e;">FASHION</span></b>. All rights reserved | Design by <i><b>Asia Rahman</b></i></p>
        </div>
    </div>
</section>
</body>
</html>