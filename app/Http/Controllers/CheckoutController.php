<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CheckoutController extends Controller
{
    public function getCustomerId(Request $request) {
        Customer::saveCustomerInfo($request);
        $customerId = Customer::where('email', $request->email)->select('id')->first();
        return response()->json(['status'=>'success', 'customer'=>$customerId], 200);
    }

    public function customerById($id) {
        $customerDetail = Customer::where('id', $id)->first();
        return response()->json(['customerDetail' => $customerDetail], 200);
    }

//    public function getId($email) {
//        $customer = Customer::where('email', $email)->select('id')->first();
//        return response()->json(['customer' => $customer], 200);
//    }

    public function getReturningCustomerId($email, $password) {
        $customer = Customer::where('email', $email)->first();
        if ($customer) {
            if (password_verify($password, $customer->password)) {
                return response()->json(['status'=>'Success', 'customer'=>$customer], 200);
            } else {
                return response()->json(['status'=>'Password error', 'message'=>'Password does not matched.'], 401);
            }
        } else {
            return response()->json(['status'=>'Error', 'message'=>'Please use valid email and password.'], 401);
        }
    }

}
