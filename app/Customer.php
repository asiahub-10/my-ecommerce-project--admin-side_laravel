<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public static function customerPlacedOrder($request) {
        Customer::find($request->customerId);
    }
}
