<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function customerReviewSave(Request $request)
    {
        $review = new Review();
        $review->customer = $request->customerId;
        $review->product = $request->productId;
        $review->review = $request->review;
        return $review;
    }
}
