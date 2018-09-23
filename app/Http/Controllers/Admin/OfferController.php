<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{

    public function index(Request $request)
    {
        return view('admin.offer.index',[
            'offers' => Offer::search($request->input('search'), ['amount'])->paginate(10)
        ]);
    }

    public function add()
    {
        return view('admin.offer.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'offerCode' => 'required|unique:offers,offer_code',
            'discount' => 'required|numeric',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|numeric',
        ]);

        if($request->discount > 99){
            return redirect(route('admin.offers'))->with('error', 'Discount should under 99%.');
        }

        $offer = Offer::create([
            'name' => $request->get('name'),
            'offer_code' => $request->get('offerCode'),
            'discount' => $request->get('discount'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'status' => $request->get('status')
        ]);

        return redirect(route('admin.offers'))->with('success', 'Offer has been inserted successfully.');
    }

    public function edit($id)
    {
        if (!$offer = Offer::find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }

        return view('admin.offer.update', ['offer' => $offer]);
    }

    public function update(Request $request, $id)
    {
        if (!$offer = Offer::find($id)) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again.');
        }
        $this->validate($request, [
            'name' => 'required',
            'offerCode' => 'required|unique:offers,offer_code,'.$id,
            'discount' => 'required|numeric',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|numeric',
        ]);

        $offer->name = $request->get('name');
        $offer->offer_code = $request->get('offerCode');
        $offer->discount = $request->get('discount');
        $offer->start_date = $request->get('start_date');
        $offer->end_date = $request->get('end_date');
        $offer->status = $request->get('status');
        $offer->save();

        return redirect(route('admin.offers'))->with('success', 'Offer has been updated successfully.');

    }

    public function delete(Request $request, $id)
    {
        Offer::find($id)->delete();
        return redirect(route('admin.offers'))->with('success', 'Offer has been removed successfully.');

    }
}