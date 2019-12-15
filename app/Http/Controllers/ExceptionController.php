<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExceptionController extends Controller
{
    public function error404()
    {
        return view('admin.error.404');
    }

    public function error405()
    {
        return view('admin.error.405');
    }
}
