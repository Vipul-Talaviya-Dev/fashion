@extends('admin.layouts.main')
@section('title', 'Order Detail')
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Order Detail</li>
        </ul>
    </div>
</div>
@endsection

@section('css')
<style type="text/css">
.form-control::-webkit-input-placeholder {
    color: #fff;
}
.order-totals {
    border: 0;
    background: transparent;
    width: 340px;
    text-transform: capitalize;
    float: right;
    font-size: 17px;
    color: #666666;
}
#order-totals-table {
    width: 100%;
    margin: 7px 0;
}
.order-totals tfoot td {
    background-color: #f2f2f2;
    padding: 10px;
}
.order-totals tbody td {
    padding: 10px 10px;
}
</style>
@endsection

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Main charts -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Traffic sources -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h1 class="panel-title">Order Detail</h1>
                </div>
                <hr/>
                <div class="container-fluid">
                    <div class="content">
                        <div class="panel panel-flat">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>User Name</th>
                                        <th>Item Detail</th>
                                        <th>Quality</th>
                                        <th>Price</th>
                                        <th>Order Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderProducts as $key => $orderProduct)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->name }}<br>({{ $order->user->mobile }})</td>
                                        <td><img src="{{ \Cloudder::secureShow($orderProduct->product->thumb_image) }}" data-imagezoom="true" style="width: 50px;" class="img-responsive" alt="{{ $orderProduct->product->name }}"></td>
                                        <td>{{ $orderProduct->qty }}</td>
                                        <td>{{ $orderProduct->price }}</td>
                                        <td>{{ $order->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row pull-right">    
                            <div class="order-totals">
                                <table id="order-totals-table">
                                    <tbody>
                                        <tr>
                                            <td colspan="4">Subtotal</td>
                                            <td> Rs.<span >{{ $order->total }}</span></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4"><strong>Grand Total</strong></td>
                                            <td><strong> Rs. <span>{{ $order->cart_amount }}</span></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection