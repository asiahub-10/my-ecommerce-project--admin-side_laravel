<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends Controller
{
    public function index() {
        return view('admin.product.add-product');
    }

    protected function productInfoValidation($request) {
        $this->validate($request, [
            'category_id'                   =>  'required|integer',
            'brand_id'                      =>  'required|integer',
            'product_name'                  =>  'required|min:2|max:120|regex:/(^([a-zA-Z01-9 -]+)(\d+)?$)/u',
            'product_price'                 =>  'required|regex:/^(\d+(,\d{1,2})?)?$/',
            'product_quantity'              =>  'required|digits_between:1,5',
            'product_short_description'     =>  'required|min:2|max:200|regex:/(^([a-zA-Z01-9,.; -]+)(\d+)?$)/u',
            'product_long_description'      =>  'required|min:10|max:1200',
            'publication_status'            =>  'required',
        ]);
    }

    protected function productImageUploadValidation($request) {
        $this->validate($request, [
            'product_image'                 =>  'required|max:1024',
        ]);
    }

    protected function uploadProductImage($request) {
        $productImage = $request->file('product_image');
        $fileType = $productImage->getClientOriginalExtension();
        $imageName = $request->product_name.'_'.uniqid().'.'.$fileType;
        $directory = 'product-images/';
        $imageUrl = $directory.$imageName;
        Image::make($productImage)->resize(300, 300)->save($imageUrl);
        return $imageUrl;
    }

    protected function saveProductBasicInfo($request, $imageUrl) {
        $product = new Product();
        $product->category_id               =  $request->category_id;
        $product->brand_id                  =  $request->brand_id;
        $product->product_name              =  $request->product_name;
        $product->product_price             =  $request->product_price;
        $product->product_quantity          =  $request->product_quantity;
        $product->product_short_description =  $request->product_short_description;
        $product->product_long_description  =  $request->product_long_description;
        $product->product_image             =  $imageUrl;
        $product->publication_status        =  $request->publication_status;
        $product->save();
    }


    public function saveProduct(Request $request) {
        $this->productInfoValidation($request);
        $this->productImageUploadValidation($request);
        $imageUrl = $this->uploadProductImage($request);
        $this->saveProductBasicInfo($request, $imageUrl);
        return redirect('/add-product')->with('message', 'Product info saved successfully');
    }

    public function manageProduct() {
        $products = DB::table('products')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->join('brands', 'products.brand_id', '=', 'brands.id')
                        ->select('products.*', 'categories.category_name', 'brands.brand_name')
                        ->orderBy('id', 'desc')
                        ->get();
        return view('admin.product.manage-product', [
            'products'  =>  $products
        ]);
    }

    public function viewProduct($id)
    {
        return view('admin.product.view-product', [
            'product'   =>  Product::find($id)
        ]);
    }

    public function editProduct($id) {
        $product = Product::find($id);
        return view('admin.product.edit-product', [
            'product'  =>  $product
        ]);
    }

    protected function productImageUpdateValidation($request) {
        $this->validate($request, [
            'product_image'                 =>  'nullable|max:1024',
        ]);
    }

    protected function updateProductBasicInfo($product, $request, $imageUrl=null) {
        $product->category_id               =  $request->category_id;
        $product->brand_id                  =  $request->brand_id;
        $product->product_name              =  $request->product_name;
        $product->product_price             =  $request->product_price;
        $product->product_quantity          =  $request->product_quantity;
        $product->product_short_description =  $request->product_short_description;
        $product->product_long_description  =  $request->product_long_description;
        if ($imageUrl) {
            $product->product_image         =  $imageUrl;
        }
        $product->publication_status        =  $request->publication_status;
        $product->save();
    }

    public function updateProduct(Request $request) {
        $product = Product::find($request->id);
        $this->productInfoValidation($request);
        $this->productImageUpdateValidation($request);
        $productImage = $request->file('product_image');
        if ($productImage) {
            unlink($product->product_image);
            $imageUrl = $this->uploadProductImage($request);
            $this->updateProductBasicInfo($product, $request, $imageUrl);
        } else {
            $this->updateProductBasicInfo($product, $request);
        }
        return redirect('/manage-product')->with('message', 'Product info updated successfully');
    }

    public function publishProduct(Request $request) {
        $product = Product::find($request->id);
        $product->publication_status = 1;
        $product->save();
        return redirect('/manage-product')->with('message', 'Product published successfully');
    }

    public function unpublishProduct(Request $request) {
            $product = Product::find($request->id);
            $product->publication_status = 0;
            $product->save();
            return redirect('/manage-product')->with('message', 'Product unpublished successfully');
    }

    public function deleteProduct(Request $request) {
            $product = Product::find($request->id);
            unlink($product->product_image);
            $product->delete();
            return redirect('/manage-product')->with('message', 'Product delete successfully');
    }







}














