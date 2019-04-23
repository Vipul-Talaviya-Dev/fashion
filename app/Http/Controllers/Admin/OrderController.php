<?php

namespace App\Http\Controllers\Admin;

use DB;
use Cloudder;
use App\Models\Order;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
	public function index(Request $request)
	{
		$orders = Order::with(['user', 'address'])->latest();

		if($request->get('status')) {
			$orders = $orders->where('status', $request->get('status'));
		}

		if(($request->get('startDate') != "") && ($request->get('endDate') != "")) {
			$orders = $orders->where(DB::raw("DATE(created_at)"), '>=', $request->get('startDate'))->where(DB::raw("DATE(created_at)"), '<=', $request->get('endDate'));
		}

		if($request->get('excel')) {
			// $getOrders = $orders->get();
			return Excel::download($orders->get(), 'orders.xlsx');
		}

		return view('admin.order.index', [
			'orders' => $orders->paginate(15)
		]);
	}

	public function orderDetail(Request $request, $id)
	{
		if(!$order = Order::with(['orderProducts.product.variations', 'user'])->find($id)) {
			return redirect()->back()->with('error', 'Invalid Selected Id');
		}

		return view('admin.order.deatil', [
			'order' => $order
		]);
	}

	public function statusChange(Request $request, $id)
	{
		if(!$order = Order::find($id)) {
			return redirect()->back()->with('error', 'Invalid Selected Id');
		}

		$order->status = $request->get('status');
		$order->save();
		
		foreach ($order->orderProducts as $key => $orderProduct) {
			$orderProduct->status = $request->get('status');
			$orderProduct->save();	
		}
		return redirect()->back()->with('success', 'Successfully change order status');
	}

	public function invoice(Request $request, $id)
	{
		if(!$order = Order::with(['orderProducts.product', 'user'])->find($id)) {
			return redirect()->back()->with('error', 'Invalid Selected Id');
		}

		$address = Address::where('user_id', $order->user->id)->first();
		return view('admin.order.invoice', [
			'order' => $order,
			'address' => $address,
			'user' => $order->user
		]);
	}

	public function users(Request $request)
	{
		$users = User::latest();

		return view('admin.user.index', [
			'users' => $users->paginate(10)
		]);
	}

}
