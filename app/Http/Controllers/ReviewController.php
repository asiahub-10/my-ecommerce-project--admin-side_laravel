<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function customerReviewSave(Request $request)
    {
        Review::saveCustomerReview($request);
        return response()->json(['status'=>'success', 'message'=>'Thank you for your comment.'], 200);
    }

    public function getCustomerReview($id)
    {
//        $reviews = Review::where('product_id', $id)->get();
        $reviews = DB::table('reviews')
            ->where('product_id', $id)
            ->where('publication_status', '=', 1)
            ->join('customers', 'customers.id', '=', 'reviews.customer_id')
            ->select('reviews.*', 'customers.first_name', 'customers.last_name')
            ->get();
        return response()->json($reviews, 200);
    }


}
