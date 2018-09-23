<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\FashhuntPoint;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Seller;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function index()
    {
        return view('admin.dashbord.index');
    }
}
