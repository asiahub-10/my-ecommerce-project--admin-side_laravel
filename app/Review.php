<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable =['product_id', 'customer_id', 'review'];

    public static function saveCustomerReview($request)
    {
        $review = new Review();
        $review->product_id    = $request->productId;
        $review->customer_id    = $request->customerId;
        $review->review         = $request->review;
        $review->save();
    }

//    public function customer()
//    {
//        return $this->belongsTo('App\Customer');
//    }

}
