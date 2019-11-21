<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Session;

class AdminLoginController extends Controller
{
    public function checkLoginEmail($email) {
        $user = User::where('email', $email)->first();
        if ($user){
            Session::put('userID', $user->id);
            return json_encode('Email matched');
        } else {
            return json_encode('Please use valid email for login');
        }
    }

    public function checkLoginPassword($password) {
        $user = User::where('id', Session::get('userID'))->first();
        if ($user) {
            if (password_verify($password, $user->password)) {
                return json_encode('Password matched');
            } else {
                return json_encode('Please use valid password for login');
            }
        } else {
            return json_encode('Please use valid password for login');
        }
    }




}
