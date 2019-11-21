<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;


class Slider extends Model
{
    protected $fillable = ['slider_title', 'slider_image', 'slider_description', 'publication_status'];

    public static function uploadSliderImage($request) {
        $sliderImage = $request->file('slider_image');
        $fileType = $sliderImage->getClientOriginalExtension();
        $imageName = $request->slider_title.'_'.uniqid().'.'.$fileType;
        $directory = 'slider-images/';
        $imageUrl = $directory.$imageName;
        Image::make($sliderImage)->resize(1900, 1000)->save($imageUrl);
        return $imageUrl;
    }

    public static function saveSliderBasicInfo($request, $imageUrl) {
        $slider = new Slider();
        $slider->slider_title           =   $request->slider_title;
        $slider->slider_image           =   $imageUrl;
        $slider->slider_description     =   $request->slider_description;
        $slider->publication_status     =   $request->publication_status;
        $slider->save();
    }

    public static function updateSliderBasicInfo($slider, $request, $imageUrl=null) {
        $slider->slider_title           =   $request->slider_title;
        if ($imageUrl) {
            $slider->slider_image       =   $imageUrl;
        }
        $slider->slider_description     =   $request->slider_description;
        $slider->publication_status     =   $request->publication_status;
        $slider->save();
    }





}
