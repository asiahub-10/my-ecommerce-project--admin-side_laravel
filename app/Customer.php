<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;

class Customer extends Model
{
    protected $fillable =['first_name', 'last_name', 'email', 'mobile', 'address', 'password'];

    public static function saveCustomerInfo($request) {
        $customer = new Customer();
        $customer->first_name   =   $request->first_name;
        $customer->last_name    =   $request->last_name;
        $customer->email        =   $request->email;
        $customer->mobile       =   $request->mobile;
        $customer->address      =   $request->address;
        $customer->password     =   bcrypt($request->password);
        $customer->save();
    }

    public static function customerRegisterMail($request)
    {
        $customer = Customer::where('email', $request->email)->first();
        if ($customer)
        {
            $data = [
                'customer'      =>  $customer,
                'password'      =>  $request->password
            ];
            Mail::send('front.mail.register-confirm', $data, function ($message) use($data)
            {
                $message->to($data['customer']->email);
                $message->subject('Registration Confirmation Mail');
            });
        }
    }

    public static function customerPlacedOrder($request) {
        Customer::find($request->customerId);
    }
}
