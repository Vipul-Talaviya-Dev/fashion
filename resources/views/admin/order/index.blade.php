@extends('admin.layouts.main')
@section('title', 'Orders')
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Orders</li>
        </ul>
    </div>
</div>
@endsection

@section('css')
<style>
.form-control::-webkit-input-placeholder {
    color: #fff;
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
                    <h1 class="panel-title">Order List</h1>
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
                                        <th>Total (Rs.)</th>
                                        <th>Discount (Rs.)</th>
                                        <th>Cart Amount (Rs.)</th>
                                        <th>Payment Reference</th>
                                        <th>Payment Status</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Invoice</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key => $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->total }}</td>
                                        <td>{{ $order->discount }}</td>
                                        <td>{{ $order->cart_amount }}</td>
                                        <td>{{ $order->payment_reference ?: 'N/A' }}</td>
                                        <td>{{ $order->payment_status }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        @if($order->status == 1)
                                        <td><span class="label label-success">Success</span></td>
                                        @else
                                        <td><span class="label label-default">Checkout</span></td>
                                        @endif
                                        <td class="text-center"><a href="{{ route('admin.invoice', ['id' => $order->id]) }}" title="Get Invoice" target="_blank"><i class="fa fa-print"></i></a>
                                        </td>
                                        <td class="text-center"><a href="{{ route('admin.orderDetail', ['id' => $order->id]) }}"><i class="icon-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pull-right">
                            {!! $orders->appends([
                                'search' => request('search')
                                ])->render() 
                            !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection