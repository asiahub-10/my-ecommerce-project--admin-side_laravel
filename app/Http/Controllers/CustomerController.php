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
            return response()->json(['status'=>'error', 'message'=>'This email exists. Please try another.'], 401);
        } else {
            Customer::saveCustomerInfo($request);
            Customer::customerRegisterMail($request);
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
            if ($customer->activation_status == 1)
            {
                if (password_verify($request->password, $customer->password)) {
                    return response()->json(['status'=>'success', 'customer'=>$customer], 200);
                } else {
                    return response()->json(['status'=>'error', 'message'=>'Password does not matched. Please use valid password.'], 401);
                }
            }
            else
            {
                return response()->json(['status'=>'error', 'message'=>'Sorry this account has been deactivated for some reason. Try with another account to login. You can also re-register using an unique email address.'], 401);
            }

        } else {
            return response()->json(['status'=>'error', 'message'=>'Email does not matched. Please use valid email address.'], 401);
        }

    }

    public function customerLogout($id) {
        $customer = Customer::where('id', $id)->first();
        if($customer) {
            return response()->json(['status'=>'success', 'message'=>'You are logout'], 200);
        } else {
            return response()->json(['status'=>'error', 'message'=>'You are not login'], 401);
        }
    }

    public function manageCustomer()
    {
        return view('admin.customer.manage-customer', [
            'customers'     => Customer::all()
        ]);
    }

    public function editCustomer($id)
    {
        return view('admin.customer.edit-customer', [
            'customer'     => Customer::find($id)
        ]);
    }

    public function updateCustomer(Request $request)
    {
        Customer::validateCustomerInfo($request);
        Customer::saveUpdatedInfo($request);
        return redirect('/manage-customer')->with('message', 'Customer info has been undated successfully.');
    }

    public function checkEmail($email, $id)
    {
        $email = Customer::where('email', $email)->first();
//        $emailId = Customer::where('email', $email)->where('id', $id)->first();
        if ($email && $email->id != $id)
        {
            return json_encode('This email address exists. Please use an unique email address.');
        }
        else
        {
            return json_encode('Email Available');
        }
    }

    public function deactivateCustomer(Request $request)
    {
        Customer::deactivateCustomer($request);
        return redirect('/manage-customer')->with('message', 'Account has been deactivated successfully');
    }

    public function activateCustomer(Request $request)
    {
        Customer::activateCustomer($request);
        return redirect('/manage-customer')->with('message', 'Account has been activated successfully');
    }

    public function deleteCustomer(Request $request)
    {
        Customer::deleteCustomer($request);
        return redirect('/manage-customer')->with('message', 'Account has been deleted successfully');
    }











}
