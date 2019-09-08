<?php

namespace App\Http\Controllers\Admin;

use DB;
use PDF;
use Mail;
use Cloudder;
use App\Models\Order;
use App\Models\User;
use App\Models\Address;
use App\Helper\Helper;
use App\Helper\Sms;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Exports\OrderExport;
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

		if($request->get('payment_mode')) {
			$orders = $orders->where('payment_mode', $request->get('payment_mode'));
		}

		if($request->get('payment_status')) {
			$orders = $orders->where('payment_status', $request->get('payment_status'));
		}

		if(($request->get('startDate') != "") && ($request->get('endDate') != "")) {
			$orders = $orders->where(DB::raw("DATE(created_at)"), '>=', date('Y-m-d', strtotime($request->get('startDate'))))->where(DB::raw("DATE(created_at)"), '<=', date('Y-m-d', strtotime($request->get('endDate'))));
		}

		if($request->get('search')) {
			$id = substr($request->get('search'), 12);
			$orders = $orders->where('id', $id);
		}

		if($request->get('excel')) {
			// $getOrders = $orders->get();
			return Excel::download(new OrderExport, date('Y-m-d-H-i').'-orders.xlsx');
		}

		return view('admin.order.index', [
			'orders' => $orders->paginate(8)
		]);
	}

	public function orderDetail(Request $request, $id)
	{
		if(!$order = Order::with(['orderProducts.variation', 'user'])->find($id)) {
			return redirect()->back()->with('error', 'Invalid Selected Id');
		}

		return view('admin.order.deatil', [
			'order' => $order
		]);
	}

	public function statusChange(Request $request, $id)
	{
		if(!$order = Order::with(['orderProducts.variation', 'user'])->find($id)) {
			return redirect()->back()->with('error', 'Invalid Selected Id');
		}
		
		$order->status = $request->get('status');
		if($order->payment_mode == 1 && $request->get('status') == 6) {
			$order->payment_status = 2;	
		}
		
		$order->save();
		
		foreach ($order->orderProducts as $key => $orderProduct) {
			$orderProduct->status = $request->get('status');
			$orderProduct->save();

			/*if($orderProduct->variation->qty > 0) {
				# variavtion
				$orderProduct->variation->qty = $orderProduct->variation->qty - $orderProduct->qty;
	            $orderProduct->variation->save();
			}*/
		}
		$user = $order->user;
		
		#sms 
		$message = Helper::orderMessages($request->get('status'), $order->orderId());
		Sms::send($user->mobile, $message);

		# send mail
		Mail::send('user.email.order-status-change', [
            'order' => $order,
            'user' => $user,
        ], function ($message) use ($user) {
            $message->from('support@shroud.in', 'Support')
                ->subject('Shroud Order Status')
                ->to($user->email, $user->name);
        });

		return redirect()->back()->with('success', 'Successfully change order status');
	}

	public function invoice(Request $request, $id)
	{
		if(!$order = Order::with(['orderProducts.product', 'user'])->find($id)) {
			return redirect()->back()->with('error', 'Invalid Selected Id');
		}

		$address = Address::where('user_id', $order->user->id)->first();

		$pdf = PDF::loadView('admin.order.invoice2', [
			'order' => $order,
			'address' => $address,
			'user' => $order->user
		]);
        return $pdf->stream();
		/*return view('admin.order.invoice2', [
			'order' => $order,
			'address' => $address,
			'user' => $order->user
		]);*/
	}

	public function users(Request $request)
	{
		$users = User::latest();

		return view('admin.user.index', [
			'users' => $users->paginate(10)
		]);
	}

	public function returnOrders()
	{
		$orders = OrderProduct::with(['order', 'product.variations', 'user'])->latest()->where('status', 7);

		return view('admin.order.order-return', [
			'orders' => $orders->paginate(15)
		]);
	}

	public function returnOrderStatusChange(Request $request, $id)
	{
		if(!$order = OrderProduct::find($id)) {
			return redirect()->back()->with('error', 'Invalid Selected Id');
		}

		if($request->get('status')) {
			$order->status = $request->get('status');
			$order->save();
		}
		
		return redirect()->back()->with('success', 'Successfully change order status');
	}
}
