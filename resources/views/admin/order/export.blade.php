<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Total</th>
        <th>Discount</th>
        <th>Discount Amount</th>
        <th>Delivery Charge</th>
        <th>Cart Amount</th>
        <th>Payment Mode</th>
        <th>Payment Status</th>
        <th>Order Status</th>
        <th>Order Date</th>
    </tr>
    </thead>
    <tbody>
        @foreach($orders as $key => $order)
            <tr>
                <td>{{ $order->orderId() }}</td>
                <td style="white-space: nowrap;">{{ $order->user->name }}</td>
                <td style="white-space: nowrap;">{{ $order->user->email }}</td>
                <td style="white-space: nowrap;">
                    {{ $order->address->address or '-' }}, <br>{{ $order->address->address_1 or '-' }} <br>{{ $order->address->city or '-' }}, <br>{{ $order->address->state or '-' }} - {{ $order->address->pincode or '-' }}
                </td>
                <td>{{ (float) $order->total }}</td>
                <td>{{ (float) $order->discount }}</td>
                <td>{{ (float) $order->discount_amount }}</td>
                <td>{{ (float) $order->delivery_charge }}</td>
                <td>{{ (float) $order->cart_amount }}</td>
                <td>{{ \App\Helper\Helper::paymentMode($order->payment_mode) }}</td>
                <td>
                    @if($order->payment_status == 1)
                        <span class="label label-danger">No</span>
                    @else
                        <span class="label label-success">Yes</span>
                    @endif
                </td>
                @if($order->status == 1 || $order->status == 2)
                    <td><span class="label label-default">{{ \App\Helper\Helper::orderStatus($order->status) }}</span></td>
                @elseif($order->status == 3 || $order->status == 6)
                    <td><span class="label label-success">{{ \App\Helper\Helper::orderStatus($order->status) }}</span></td>
                @elseif($order->status == 4 || $order->status == 5 || $order->status == 7)
                    <td><span class="label label-info">{{ \App\Helper\Helper::orderStatus($order->status) }}</span></td>
                @elseif($order->status == 8)
                    <td><span class="label label-danger">{{ \App\Helper\Helper::orderStatus($order->status) }}</span></td>
                @endif
                <td style="white-space: nowrap;">{{ App\Helper\Helper::dateFormat($order->created_at) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>