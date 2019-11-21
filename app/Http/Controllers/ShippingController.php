<?php

namespace App\Http\Controllers;

use App\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
//    public function shippingInfo(Request $request) {
//        Shipping::saveShippingInfo($request);
//        $shippingId = Shipping::where('name', $request->first_name.' '.$request->last_name)
//            ->where('mobile', $request->mobile)
//            ->where('address', $request->address)
//            ->orderBy('id','desc')
//            ->select('id')->first();
//        return response()->json(['status'=>'success', 'shippingId'=>$shippingId], 200);
//    }
//
//    public function editedShippingInfo(Request $request) {
//        Shipping::saveEditedShippingInfo($request);
//        $shippingId = Shipping::where('name', $request->name)
//            ->where('mobile', $request->mobile)
//            ->where('address', $request->address)
//            ->orderBy('id','desc')
//            ->select('id')->first();
//        return response()->json(['status'=>'success', 'shippingId'=>$shippingId], 200);
//    }

}
