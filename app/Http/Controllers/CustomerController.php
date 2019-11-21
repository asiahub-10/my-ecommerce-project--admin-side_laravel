<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    public function newRegister(Request $request) {
        $customerEmail = Customer::where('email', $request->email)->first();
        if ($customerEmail) {
            return response()->json(['status'=>'error', 'message'=>'This email exists'], 401);
        } else {
            Customer::saveCustomerInfo($request);
            return response()->json(['status'=>'success', 'message'=>'Successfully Registered'], 200);
        }

    }

    public function emailCheck($email) {
        $customer = Customer::where('email', $email)->first();
        if ($customer) {
            return response()->json(['This email already exists. Please use another email.'], 200);
        } else {
            return response()->json([''], 401);
        }
    }

    public function customerLogin(Request $request) {
        $customer = Customer::where('email', $request->email)->first();
        if ($customer) {
            if (password_verify($request->password, $customer->password)) {
                return response()->json(['status'=>'success', 'customer'=>$customer], 200);
            } else {
                return response()->json(['status'=>'Password error', 'message'=>'Password does not matched. Please use valid password.'], 401);
            }
        } else {
            return response()->json(['status'=>'error', 'message'=>'Please use valid email and password.'], 401);
        }

    }

    public function visitorEmailCheck($email) {
        $customer = Customer::where('email', $email)->first();
        if ($customer) {
            return response()->json(['']);
        } else {
            return response()->json(['Please use valid user email address.']);
        }
    }

    public function customerInfoById($id) {
        $customer = Customer::where('id', $id)->first();
        return $customer;
    }

    public function customerLogout($id) {
        $customer = Customer::where('id', $id)->first();
        if($customer) {
            return response()->json(['status'=>'success', 'message'=>'You are logout'], 200);
        } else {
            return response()->json(['status'=>'error', 'message'=>'You are not login'], 401);
        }
    }








}
