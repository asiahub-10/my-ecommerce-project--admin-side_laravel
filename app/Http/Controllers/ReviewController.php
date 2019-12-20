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

    public function manageReview()
    {
        return view('admin.review.manage-review', [
            'reviews'   => Review::all()
        ]);
    }

    public function editReview($id)
    {
        return view('admin.review.edit-review', [
            'reviews'   => Review::find($id)
        ]);
    }

    public function unpublishReview(Request $request)
    {
        Review::unpublishCustomerReview($request);
        return redirect('/manage-customer-review')->with('message', 'Review has been unpublished successfully');
    }

    public function publishReview(Request $request)
    {
        Review::publishCustomerReview($request);
        return redirect('/manage-customer-review')->with('message', 'Review has been published successfully');
    }

    public function deleteReview(Request $request)
    {
        Review::deleteCustomerReview($request);
        return redirect('/manage-customer-review')->with('message', 'Review has been deleted successfully');
    }





}













