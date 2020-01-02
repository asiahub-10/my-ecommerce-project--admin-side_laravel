<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {
        return view('admin.category.add-category');
    }

    protected function checkCategoryData($request) {
        $this->validate($request, [
            'category_name'         =>  'required|min:2|regex:/(^([a-zA-Z -]+)(\d+)?$)/u',
            'category_description'  =>  'required|min:2|max:120|regex:/(^([a-zA-Z;,. -]+)(\d+)?$)/u',
            'publication_status'    =>  'required'
        ]);
    }

    public function saveCategory(Request $request) {
        $this->checkCategoryData($request);
        Category::saveCategoryInfo($request);
        return redirect('/add-category')->with('message', 'Category info saved successfully');
    }

    public function manageCategory() {
//        $categories = Category::all();
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        return view('admin.category.manage-category', [
            'categories'    =>  $categories
        ]);
    }

    public function editCategory($id) {
        $category = Category::find($id);
        return view('admin.category.edit-category', [
            'category'      =>  $category
        ]);
    }

    public function updateCategory(Request $request) {
        $this->checkCategoryData($request);
        Category::updateCategoryInfo($request);
        return redirect('/manage-category')->with('message', 'Category info updated successfully');
    }

    public function publishCategory(Request $request) {
        $category = Category::find($request->id);
        $category->publication_status = 1;
        $category->save();
        return redirect('/manage-category')->with('message', 'Category published successfully');
    }

     public function unpublishCategory(Request $request) {
         $category = Category::find($request->id);
         $category->publication_status = 0;
         $category->save();
         return redirect('/manage-category')->with('message', 'Category unpublished successfully');
     }

     public function deleteCategory(Request $request) {
         $category = Category::find($request->id);
         $category->delete();
         return redirect('/manage-category')->with('message', 'Category deleted Successfully');
     }







}






