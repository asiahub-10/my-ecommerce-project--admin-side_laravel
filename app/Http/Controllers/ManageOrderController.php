<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageOrderController extends Controller
{
    public function manageOrder()
    {
        return view('admin.order.manage-order');
    }
}
