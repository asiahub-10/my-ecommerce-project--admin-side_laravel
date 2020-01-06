<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        .text-uppercase {text-transform: uppercase;}
        .text-center {text-align: center;}
        .text-right {text-align: right; }
        .text-orange{color:#fb8c00!important;}
        .font-weight-bold {font-weight: bold;}
        .item-th {
            border-top: 2px #adb5bd solid;
            border-bottom: 2px #adb5bd solid;
            padding: 17px 0;
        }
        .item-td {
            border-bottom: 1px #dddde2 solid;
            padding: 5px 0;
        }
        .item-total {
            padding: 12px 0;
        }
    </style>
</head>

<body style="color:#4e555b;">
    <table width="100%">
        <tr>
           <th width="50%">
               <img src="{{ asset('/') }}admin/img/asia_fashion.png" alt="logo" style="height: 35px; width: 220px; margin-bottom: 10px;"/>
               <p style="margin-bottom: 1px; margin-top: 0;">Baily Road, Dhaka.</p>
               <p style="margin-bottom: 1px; margin-top: 0;">asia_fashion@gmail.com</p>
               <p style="margin-bottom: 1px; margin-top: 0;">+8801312345678</p>
           </th>
           <th width="50%">
               <h2 class="text-center text-uppercase text-orange" style="padding: 15px 0; background-color: #fdf3d8; border-top: #dddde2 1px solid; border-bottom: #dddde2 1px solid;">Invoice</h2>
               <table >
                   <tr>
                       <td>Invoice No</td>
                       <td style="padding-left: 20px;">: {{ $order->id }}</td>
                   </tr>
                   <tr>
                       <td>Order ID</td>
                       <td style="padding-left: 20px;">: {{ sprintf("%05d", $order->id) }}</td>
                   </tr>
                   <tr>
                       <td>Order Date</td>
                       <td style="padding-left: 20px;">: {{ $order->created_at->format('d/m/Y') }}</td>
                   </tr>
                   <tr>
                       <td>Order Total</td>
                       <td style="padding-left: 20px;">: Tk. {{ number_format($order->order_total, 2) }}</td>
                   </tr>
               </table>
           </th>
        </tr>
    </table>
    <table width="100%" style="margin: 15px 0; background-color: whitesmoke; padding: 15px 8px; border-top: #dddde2 1px solid; border-bottom: #dddde2 1px solid;">
        <tr>
            <td width="35%">
                <table>
                    <tbody>
                    <tr>
                        <td colspan="2" class="font-weight-bold">Billing Details</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td style="padding-left: 10px;">: {{ $customer->first_name }} {{ $customer->last_name }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td style="padding-left: 10px;">: {{ $customer->mobile }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td style="padding-left: 10px;">: {{ $customer->address }}</td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="30%"></td>
            <td width="35%">
                <table>
                    <tbody>
                    <tr>
                        <td colspan="2" class="font-weight-bold">Shipping Address</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td style="padding-left: 10px;">: {{ $shipping->name }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td style="padding-left: 10px;">: {{ $shipping->mobile }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td style="padding-left: 10px;">: {{ $shipping->address }}</td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <table width="100%" style="margin: 28px 0;">
        <tr >
            <th class="item-th text-center">SL No.</th>
            <th class="item-th w-50">Item Description</th>
            <th class="item-th text-center">Item Price</th>
            <th class="item-th text-center">Item Quantity</th>
            <th class="item-th text-right" style="padding-right: 10px;">Total</th>
        </tr>
        @php($i=1)
        @php($subtotal=0)
        @foreach($products as $product)
            <tr>
                <td class="text-center item-td">{{ $i++ }}</td>
                <td class="w-50 item-td">
                    <b style="margin-bottom: 0;">{{ $product->product_name }}</b>
                    <p style="margin-top: 1px; margin-bottom: 0;" >{{ $product->product->product_short_description }}</p>
                </td>
                <td class="text-center item-td">TK. {{ number_format($product->product_price, 2) }}</td>
                <td class="text-center item-td">{{ $product->product_quantity }}</td>
                <td class="text-right item-td" style="padding-right: 10px;">TK. {{ number_format($total = $product->product_price * $product->product_quantity, 2) }}</td>
            </tr>
            @php($subtotal = $total + $subtotal)
        @endforeach
        <tr>
            <td class="highrow"></td>
            <td class="highrow"></td>
            <td class="highrow"></td>
            <td class="highrow item-total" style="padding-left: 10px;"><strong>Subtotal:</strong></td>
            <td class="highrow text-right item-total" style="padding-right: 10px;">TK. {{ number_format($subtotal, 2) }}</td>
        </tr>
        <tr>
            <td class="emptyrow"></td>
            <td class="emptyrow"></td>
            <td class="emptyrow"></td>
            <td class="emptyrow item-total" style="padding-left: 10px;"><strong>Tax (15% VAT):</strong></td>
            <td class="emptyrow text-right item-total" style="padding-right: 10px;">TK. {{ number_format($tax = $subtotal * .15, 2) }}</td>
        </tr>
        <tr>
            <td class="emptyrow">
            </td>
            <td class="emptyrow"></td>
            <td class="emptyrow"></td>
            <td class="emptyrow item-total" style="padding-left: 10px; background-color: whitesmoke; border-bottom: 1px #dddde2 solid; border-top: 1px #dddde2 solid;"><strong>Order Total:</strong></td>
            <td class="emptyrow item-total text-right" style="padding: 8px 10px; background-color: whitesmoke; border-bottom: 1px #dddde2 solid; border-top: 1px #dddde2 solid;">
                <div style="border-bottom: 6px #adb5bd double; padding-bottom: 2px; display: inline-block; float: right;">TK. {{ number_format($orderTotal = $subtotal + $tax, 2) }}</div>
            </td>
        </tr>
    </table>
    <table>
        <tbody>
        <tr>
            <td colspan="2">
                <h4 style="margin-bottom: 5px; margin-top: 0;" class="font-weight-bold text-uppercase">Payment Summary</h4>
            </td>
        </tr>
        <tr>
            <td>Payment Method</td>
            <td class="pl-3">:
                @if($payment->payment_type == 'Cash')
                    Cash on delivery
                @elseif($payment->payment_type == 'Card')
                    Card
                @elseif($payment->payment_type == 'Mobile-banking')
                    Mobile-banking
                @elseif($payment->payment_type == 'Net-banking')
                    Net-banking
                @endif
            </td>
        </tr>
        <tr class="mb-3">
            <td>Payment Due</td>
            <td class="pl-3">: Tk. {{ $payment->payment_status == 'Pending' ? number_format($orderTotal, 2) : number_format(0, 2) }}</td>
        </tr>
        </tbody>
    </table>

    <footer style="bottom: 80px !important; position:fixed; text-align: center;">
        <hr/>
        <p class="text-uppercase font-weight-bold text-orange" style="margin-bottom: 0; margin-top: 0;">terms & conditions</p>
        <span class="">In case of cash on delivery, you have to make full payment on cash at the time of delivery.</span>
        <hr/>
    </footer>
</body>

</html>
