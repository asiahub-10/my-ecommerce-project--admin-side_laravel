<p style="font-size: medium; text-align: justify;"><span>Hey {{ $customer->first_name }} {{ $customer->last_name }},</span>
    <br/>
    <span>Thanks for shopping with <strong><span style="color: #ffc107">Asia</span>Fashion</strong>, we really appreciate it. We have received your order no: <b>{{ sprintf("%05d", $order->id) }}</b> and we are working on it now. Your order will be on its way soon. We will contact you when we ship it. Details of your order is as follows:</span>
</p>
<br/>

@include('front.mail.email')