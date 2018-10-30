<?php

namespace App\Http\Controllers\Admin;

use Cloudder;
use App\Models\Order;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
	public function index(Request $request)
	{
		$orders = Order::with(['user'])->latest();

		return view('admin.order.index', [
			'orders' => $orders->paginate(10)
		]);
	}

	public function orderDetail(Request $request, $id)
	{
		if(!$order = Order::with(['orderProducts.product', 'user'])->find($id)) {
			return redirect()->back()->with('error', 'Invalid Selected Id');
		}

		return view('admin.order.deatil', [
			'order' => $order
		]);
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
}
