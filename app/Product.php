<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class Product extends Model
{
    public $fillable = ['category_id', 'brand_id', 'product_name', 'product_price', 'product_quantity', 'product_short_description', 'product_long_description', 'product_image', 'publication_status'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }






}
