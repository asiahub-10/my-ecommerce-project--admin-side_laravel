<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function addOffer()
    {
        return view('admin.offer.add-offer');
    }

    public function saveOffer(Request $request)
    {
        Offer::validateBasicOfferInfo($request);
        Offer::validateOfferImage($request);
        $imageUrl = Offer::uploadOfferImage($request);
        Offer::saveOfferBasicInfo($request, $imageUrl);
        return redirect('/add-offer')->with('message', 'Offer info has been saved successfully.');
    }

    public function manageOffer()
    {
        return view('admin.offer.manage-offer', [
            'offers'    => Offer::all()
        ]);
    }

    public function editOffer($id)
    {
        return view('admin.offer.edit-offer', [
            'offer'    => Offer::find($id)
        ]);
    }

    public function updateOffer(Request $request)
    {
        Offer::validateBasicOfferInfo($request);
        if ($request->file('offer_image'))
        {
            Offer::validateOfferImage($request);
            $imageUrl = Offer::uploadOfferImage($request);
            Offer::updateOfferInfo($request, $imageUrl);
        }
        else
        {
            Offer::updateOfferInfo($request);

        }
        return redirect('/manage-offer')->with('message', 'Offer info has been updated successfully.');
    }

    public function publishOffer(Request $request)
    {
        Offer::publishOffer($request);
        return redirect('/manage-offer')->with('message', 'Offer has been published successfully.');
    }

    public function unpublishOffer(Request $request)
    {
        Offer::unpublishOffer($request);
        return redirect('/manage-offer')->with('message', 'Offer has been unpublished successfully.');
    }

    public function deleteOffer(Request $request)
    {
        Offer::deleteOfferInfo($request);
        return redirect('/manage-offer')->with('message', 'Offer has been deleted successfully.');
    }



}














