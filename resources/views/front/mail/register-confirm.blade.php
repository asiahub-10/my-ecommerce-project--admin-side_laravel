<div style="padding: 50px; background-color: #f8f9fa;">
    <p style="font-size: medium; text-align: justify;"><span>Hello {{ $customer->first_name }} {{ $customer->last_name }},</span>
        <br/>
        <span>Thank you for registering at <strong><span style="color: #ffc107">Asia</span>Fashion</strong>. With great pleasure, we are going to inform you that your account is activated. You can login using the following email and password:</span>
    </p>
<pre style="font-size: medium;">
<b>EMAIL:</b>       <span>{{ $customer->email }}</span>
<b>PASSWORD:</b>    <span>{{ $password }}</span>
</pre>
</div>
