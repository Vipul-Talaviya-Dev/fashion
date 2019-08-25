<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Order;
use App\Models\User;
use App\Models\Contact;
use App\Models\Product;
use App\Models\AppContent;
use App\Models\OrderProduct;
use App\Models\Variation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function barcodeLayout1()
    {
        return view('admin.dashbord.barcode', [
            'products' => Variation::with(['product', 'size', 'color'])->limit(30)->get(),
        ]);
    }

    public function barcodeLayout2()
    {
        return view('admin.dashbord.barcode-2', [
            'products' => Variation::with(['product', 'size', 'color'])->limit(30)->get(),
        ]);
    }

    public function index()
    {
        return view('admin.dashbord.index', [
            'user' => User::count(),
            'newOrder' => Order::where('status', 1)->count(),
            'sellProductQty' => OrderProduct::sum('qty'),
            'returnOrders' => OrderProduct::where('status', 7)->count(),
            'totalProductQty' => Variation::sum('qty'),
        ]);
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

    public function resetPassword()
    {
        return view('admin.reset_password');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'oldPassword' => 'required',
            'password' => 'required|min:6|same:confirmPassword',
            'confirmPassword' => 'required',
        ]);
        $loginAdmin = \Session::get('admin');
        $admin = Admin::find($loginAdmin->id);

        if (!\Hash::check($request->get('oldPassword'), $admin->password)) {
            return redirect()->back()->with(['error' => 'Old password is incorrect']);
        }
        
        $admin->password = bcrypt($request->get('password'));
        $admin->save();

        \Session::forget('admin');

        return redirect(route('admin.login'))->with(['success' => 'Password has been reset successfully! ']);
    }
}
