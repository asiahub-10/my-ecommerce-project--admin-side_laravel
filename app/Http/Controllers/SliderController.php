<?php

namespace App\Http\Controllers;

use App\Slider;
use Image;
use Illuminate\Http\Request;
use DB;

class SliderController extends Controller
{
    public function index() {
        return view('admin.slider.add-slider');
    }

    protected function sliderBasicInfoValidation($request) {
        $this->validate($request, [
            'slider_title'          =>  'required|min:2|max:120|regex:/(^([a-zA-Z01-9 -]+)(\d+)?$)/u',
            'slider_description'    =>  'required|min:2|max:200|regex:/(^([a-zA-Z01-9,. -]+)(\d+)?$)/u',
            'publication_status'    =>  'required'
        ]);
    }

    protected function sliderImageUploadValidation($request) {
        $this->validate($request, [
            'slider_image'          =>  'required|max:1024',
        ]);
    }

    public function saveSlider(Request $request) {
        $this->sliderBasicInfoValidation($request);
        $this->sliderImageUploadValidation($request);
        $imageUrl = Slider::uploadSliderImage($request);
        Slider::saveSliderBasicInfo($request, $imageUrl);

        return redirect('/add-slider')->with('message', 'Slider info saved successfully');
    }

    public function manageSlider() {
//        $sliders = Slider::all();
        $sliders = DB::table('sliders')->orderBy('id', 'desc')->get();

        return view('admin.slider.manage-slider', [
            'sliders'   =>  $sliders
        ]);
    }

    public function editSlider($id) {
        $slider = Slider::find($id);
        return view('admin.slider.edit-slider', [
            'slider'   =>  $slider
        ]);
    }

    protected function sliderImageUpdateValidation($request) {
        $this->validate($request, [
            'slider_image'          =>  'nullable|max:1024',
        ]);
    }

    public function updateSlider(Request $request) {
        $slider = Slider::find($request->id);
        $this->sliderBasicInfoValidation($request);
        $this->sliderImageUpdateValidation($request);
        $sliderImage = $request->file('slider_image');
        if ($sliderImage) {
            unlink($slider->slider_image);
            $imageUrl = Slider::uploadSliderImage($request);
            Slider::updateSliderBasicInfo($slider, $request, $imageUrl);
        } else {
            Slider::updateSliderBasicInfo($slider, $request);
        }
        return redirect('/manage-slider')->with('message', 'Slider info updated successfully');
    }

    public function publishSlider(Request $request) {
        $slider = Slider::find($request->id);
        $slider->publication_status = 1;
        $slider->save();
        return redirect('/manage-slider')->with('message', 'Slider published successfully');
    }

    public function unpublishSlider(Request $request) {
        $slider = Slider::find($request->id);
        $slider->publication_status = 0;
        $slider->save();
        return redirect('/manage-slider')->with('message', 'Slider unpublished successfully');
    }

    public function deleteSlider(Request $request) {
        $slider = Slider::find($request->id);
        unlink($slider->slider_image);
        $slider->delete();
        return redirect('/manage-slider')->with('message', 'Slider delete successfully');
    }

    public function getSlider()
    {
        $slider = Slider::where('publication_status', 1)->get();
        return response()->json($slider, 200);
    }



}










