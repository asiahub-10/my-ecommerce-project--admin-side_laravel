<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['brand_name', 'brand_description', 'publication_status'];

    public static function saveBrandInfo($request) {
        $brand = new Brand();
        $brand->brand_name          =   $request->brand_name;
        $brand->brand_description   =   $request->brand_description;
        $brand->publication_status  =   $request->publication_status;
        $brand->save();
    }

    public static function updateBrandInfo($request) {
        $brand = Brand::find($request->brand_id);
        $brand->brand_name          =   $request->brand_name;
        $brand->brand_description   =   $request->brand_description;
        $brand->publication_status  =   $request->publication_status;
        $brand->save();
    }


}
