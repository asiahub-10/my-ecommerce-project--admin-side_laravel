<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'category_description', 'publication_status'];


    public static function saveCategoryInfo($request) {
        $category = new Category();
        $category->category_name        =   $request->category_name;
        $category->category_description =   $request->category_description;
        $category->publication_status   =   $request->publication_status;
        $category->save();
    }

    public static function updateCategoryInfo($request) {
        $category = Category::find($request->category_id);
        $category->category_name        =   $request->category_name;
        $category->category_description =   $request->category_description;
        $category->publication_status   =   $request->publication_status;
        $category->save();
    }
}
