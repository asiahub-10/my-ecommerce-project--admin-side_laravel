<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
use File;

class Offer extends Model
{
    protected $fillable =['offer_title', 'offer_image', 'offer_description', 'publication_status'];

    public static function validateBasicOfferInfo($request)
    {
        $request->validate([
            'offer_title'           =>  'required|min:2|max:120|regex:/(^([a-zA-Z01-9 -]+)(\d+)?$)/u',
            'offer_description'     =>  'required|min:2|max:1200',
            'publication_status'    =>  'required'
        ]);
    }

    public static function validateOfferImage($request)
    {
        $request->validate([
            'offer_image'           =>  'required|max:1024|image'
        ],
            [
                'offer_image'   =>  'Image file size must be maximum one kilobyte.'
            ]
        );
    }

    public static function uploadOfferImage($request){
        $offerImage = $request->file('offer_image');
        $imageType = $offerImage->getClientOriginalExtension();
        $offerTitle = str_slug($request->offer_title, "_");
        $imageName = $offerTitle.'_'.uniqid().'.'.$imageType;
        $directory = 'offer-images/';
        if (!File::isDirectory($directory))
        {
            File::makeDirectory($directory, true);
        }
        $imageUrl = $directory.$imageName;
        Image::make($offerImage)->resize(750, 500)->save($imageUrl);
        return $imageUrl;
    }

    public static function saveOfferBasicInfo($request, $imageUrl)
    {
        $offer = new Offer();
        $offer->offer_title             = $request->offer_title;
        $offer->offer_image             = $imageUrl;
        $offer->offer_description       = $request->offer_description;
        $offer->publication_status      = $request->publication_status;
        $offer->save();
    }

    public static function updateOfferInfo($request, $imageUrl = null)
    {
        $offer = Offer::find($request->id);
        $offer->offer_title             = $request->offer_title;
        if ($request->file('offer_image'))
        {
            unlink($offer->offer_image);
            $offer->offer_image         = $imageUrl;
        }
        $offer->offer_description       = $request->offer_description;
        $offer->publication_status      = $request->publication_status;
        $offer->save();
    }

    public static function publishOffer($request)
    {
        $offer = Offer::find($request->id);
        $offer->publication_status      = 1;
        $offer->save();
    }

    public static function unpublishOffer($request)
    {
        $offer = Offer::find($request->id);
        $offer->publication_status      = 0;
        $offer->save();
    }

    public static function deleteOfferInfo($request)
    {
        $offer = Offer::find($request->id);
        unlink($offer->offer_image);
        $offer->delete();
    }



}







