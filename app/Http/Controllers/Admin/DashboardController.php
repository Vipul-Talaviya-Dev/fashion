<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\OrderProduct;
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
}
