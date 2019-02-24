<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use App\Models\AppContent;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        return view('admin.dashbord.index');
    }

    public function contacts()
    {
        return view('admin.dashbord.contacts', [
        	'contacts' => Contact::latest()->paginate(15) 
        ]);
    }

    public function appContent()
    {
        return view('admin.dashbord.app-content', [
            'content' => AppContent::find(1) 
        ]);
    }

    public function appContentUpdate(Request $request)
    {
        $this->validate($request, [
            'support_email' => 'required|email',
            'support_mobile' => 'required|numeric|digits:10',
            'address' => 'required',
            'fb_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'google_link' => 'nullable|url',
            'delivery_charge' => 'nullable|numeric|min:0',
            'offer_text' => 'nullable',
        ]);
        $content = AppContent::find(1);
        $content->support_email = $request->get('support_email');
        $content->support_mobile = $request->get('support_mobile');
        $content->address = $request->get('address');
        $content->fb_link = $request->get('fb_link');
        $content->instagram_link = $request->get('instagram_link');
        $content->twitter_link = $request->get('twitter_link');
        $content->google_link = $request->get('google_link');
        $content->delivery_charge = $request->get('delivery_charge');
        $content->offer_text = $request->get('offer_text');
        $content->save();

        return redirect()->back()->with(['success' => 'Updated Successfully..']);
    }
}
