<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class BestSaleController extends Controller
{
    public function getBestSale()
    {
        return Product::where('publication_status', 1)->where('product_quantity', '>=', 1)->orderBy('product_sales_quantity', 'DESC')->select('id')->take(6)->get();
    }
}
