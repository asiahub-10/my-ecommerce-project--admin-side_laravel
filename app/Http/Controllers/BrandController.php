<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index() {
        return view('admin.brand.add-brand');
    }

    protected function checkBrandData($request) {
        $this->validate($request, [
            'brand_name'            =>  'required|min:2|regex:/(^([a-zA-Z -]+)(\d+)?$)/u',
            'brand_description'     =>  'required|min:2|max:120|regex:/(^([a-zA-Z,. -]+)(\d+)?$)/u',
            'publication_status'    =>  'required'
        ]);
    }

    public function saveBrand(Request $request) {
        $this->checkBrandData($request);
        Brand::saveBrandInfo($request);
        return redirect('/add-brand')->with('message', 'Brand info saved successfully');
    }

    public function manageBrand() {
        $brands = DB::table('brands')->orderBy('id', 'desc')->get();
        return view('admin.brand.manage-brand', [
            'brands'    =>  $brands
        ]);
    }

    public function editBrand($id) {
        $brand = Brand::find($id);
        return view('admin.brand.edit-brand', [
            'brand'      =>  $brand
        ]);
    }

    public function updateBrand(Request $request) {
        $this->checkBrandData($request);
        Brand::updateBrandInfo($request);
        return redirect('/manage-brand')->with('message', 'Brand info updated successfully');
    }

    public function publishBrand(Request $request) {
        $brand = Brand::find($request->id);
        $brand->publication_status = 1;
        $brand->save();
        return redirect('/manage-brand')->with('message', 'Brand published successfully');
    }

    public function unpublishBrand(Request $request) {
        $brand = Brand::find($request->id);
        $brand->publication_status = 0;
        $brand->save();
        return redirect('/manage-brand')->with('message', 'Brand unpublished successfully');
    }

    public function deleteBrand(Request $request) {
        $brand = Brand::find($request->id);
        $brand->delete();
        return redirect('/manage-brand')->with('message', 'Brand deleted Successfully');
    }


















}
