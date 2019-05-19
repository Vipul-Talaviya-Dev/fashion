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
                    <div class="">
                        <div class="row">
                            <form method="get">
                                <div class="form-group col-md-2">
                                    <label>Start Date</label>
                                    <input type="date" name="startDate" class="form-control" placeholder="Start Date" autocomplete="off" value="{{ request('startDate') }}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>End Date</label>
                                    <input type="date" name="endDate" class="form-control" placeholder="End Date" autocomplete="off" value="{{ request('endDate') }}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Order Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">-- Select Status --</option>
                                        @foreach(\App\Helper\Helper::orderStatus() as $key => $status)
                                            <option value="{{ $key }}" {{ (request('status') == $key) ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <p>&nbsp;</p>
                                    <button class="btn btn-info" type="submit" style="margin-top: -5px;">Search</button>
                                </div>

                                <div class="form-group col-md-2">
                                    <p>&nbsp;</p>
                                    <button class="btn btn-info" type="submit" name="excel" value="1" style="margin-top: -5px;">Export</button>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Order Date</th>
                                        <th>User Name</th>
                                        <th>Address</th>
                                        <th>Total (Rs.)</th>
                                        <th>Discount (%)</th>
                                        <th>Discount Amount(RS.)</th>
                                        <th>Cart Amount (Rs.)</th>
                                        <th>Payment Mode</th>
                                        <th>Payment Status</th>
                                        <th>Status</th>
                                        <th>Invoice</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key => $order)
                                    <tr>
                                        <td>{{ $order->orderId() }}</td>
                                        <td style="white-space: nowrap;">{{ $order->created_at->toDateString() }}</td>
                                        <td style="white-space: nowrap;">{{ $order->user->name }}</td>
                                        <td style="white-space: nowrap;">{{ $order->address->address }}, <br>{{ $order->address->address_1 }} <br>{{ $order->address->city }}, <br>{{ $order->address->state }} - {{ $order->address->pincode }}</td>
                                        <td>{{ $order->total }}</td>
                                        <td>{{ $order->discount }}</td>
                                        <td>{{ $order->discount_amount }}</td>
                                        <td>{{ $order->cart_amount }}</td>
                                        <td>
                                            @if($order->payment_mode == 1)
                                                COD
                                            @else
                                                OnLine
                                            @endif    
                                        </td>
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
                                        <td class="text-center"><a href="{{ route('admin.invoice', ['id' => $order->id]) }}" title="Get Invoice" target="_blank"><i class="fa fa-print"></i></a>
                                        </td>
                                        <td class="text-center"><a href="{{ route('admin.orderDetail', ['id' => $order->id]) }}"><i class="icon-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="pull-right">
                            {!! $orders->appends($_GET)->render() 
                            !!}
                            <p><br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection