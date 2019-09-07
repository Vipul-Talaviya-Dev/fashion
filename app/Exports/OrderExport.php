<?php 

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderExport implements FromView
{
    public function view(): View
    {
        return view('admin.order.export', [
            'orders' => Order::with(['user'])->get()
        ]);
    }
}