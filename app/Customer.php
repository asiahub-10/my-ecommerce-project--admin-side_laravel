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

    public static function validateCustomerInfo($request)
    {
        $request->validate([
            'first_name'            => 'required|min:2|max:20|regex:/(^([a-zA-Z. -]+)(\d+)?$)/u',
            'last_name'             => 'required|min:2|max:20|regex:/(^([a-zA-Z. -]+)(\d+)?$)/u',
            'email'                 => 'required|email',
            'mobile'                => 'required|regex:/\+?(88)?0?1[3456789][0-9]{8}\b/',
            'address'               => 'required|min:5|max:150|regex:/(^([\/a-zA-Z01-9. -]+)(\d+)?$)/u',
            'activation_status'     => 'required'
        ],
        [
            'first_name.regex'      => 'First name cannot contains special characters or number except dot(.) and dash(-).',
            'last_name.regex'       => 'Last name cannot contains special characters or number except dot(.) and dash(-).',
            'mobile.regex'          => 'Please use Valid Bangladeshi mobile number.',
        ]);
    }

    public static function saveUpdatedInfo($request)
    {
        $customer = Customer::find($request->customer_id);
        $customer->first_name           = $request->first_name;
        $customer->last_name            = $request->last_name;
        $customer->email                = $request->email;
        $customer->mobile               = $request->mobile;
        $customer->address              = $request->address;
        $customer->activation_status    = $request->activation_status;
        $customer->update();
    }

    public static function deactivateCustomer($request)
    {
        $customer = Customer::find($request->id);
        $customer->activation_status = 0;
        $customer->update();
    }

    public static function activateCustomer($request)
    {
        $customer = Customer::find($request->id);
        $customer->activation_status = 1;
        $customer->update();
    }

    public static function deleteCustomer($request)
    {
        $customer = Customer::find($request->id);
        $customer->delete();
    }






}







