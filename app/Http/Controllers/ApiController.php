<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function allPublishedCategory() {
        $categories = Category::where('publication_status', 1)->where('product_quantity', '>=', 1 )->get();
        return $categories;
    }

     public function allPublishedBrand() {
        $brands = Brand::where('publication_status', 1)->where('product_quantity', '>=', 1 )->get();
        return $brands;
        }

    public function allPublishedProduct() {
        return Product::where('publication_status', 1)->where('product_quantity', '>=', 1 )->orderBy('id', 'desc')->take(4)->get();
    }

    public function allPublishedProductId() {
//        $productId = Product::where('publication_status', 1)->orderBy('id', 'desc')->take(4)->select('id')->get();
        $productId = Product::where('publication_status', 1)->where('product_quantity', '>=', 1 )->orderBy('id', 'desc')->take(4)->get();
        return $productId;

    }

    public function productByCategoryId($id) {
        return Product::where('category_id', $id)
            ->where('publication_status', 1)
            ->where('product_quantity', '>=', 1 )
            ->orderBy('id', 'desc')
            ->select('id')
            ->get();
    }

    public function categoryById($id) {
        $category = DB::table('products')
            ->where('category_id', $id)
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('categories.category_name')
            ->first();
        return json_encode($category);
    }

     public function brandById($id) {
            $brand = DB::table('products')
                ->where('brand_id', $id)
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->select('brands.brand_name')
                ->first();
            return json_encode($brand);
        }

    public function productByBrandId($id) {
        return Product::where('brand_id', $id)->where('publication_status', 1)->where('product_quantity', '>=', 1 )->orderBy('id', 'desc')->get();
    }

    public function productById($id) {
        return Product::find($id);
    }

    public function allProduct() {
        return Product::where('publication_status', 1)->where('product_quantity', '>=', 1 )->orderBy('id', 'desc')->get();

    }



}
