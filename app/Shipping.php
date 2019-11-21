<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['name', 'mobile', 'address'];

//    public static function saveShippingInfo($request) {
//        $shipping = new Shipping();
//        $shipping->name     = $request->first_name.' '.$request->last_name;
//        $shipping->mobile   = $request->mobile;
//        $shipping->address  = $request->address;
//        $shipping->save();
//    }
//
    public static function saveShippingInfo($request) {
        $shipping = new Shipping();
        $shipping->name     = $request->shipping['name'];
        $shipping->mobile   = $request->shipping['mobile'];
        $shipping->address  = $request->shipping['address'];
        $shipping->save();
    }

}
