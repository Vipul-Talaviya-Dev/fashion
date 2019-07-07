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
    color: #000;
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
                                    <label>Search (Order Id)</label>
                                    <input type="text" name="search" class="form-control" placeholder="Order Number" autocomplete="off" value="{{ request('search') }}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Start Date</label>
                                    <input type="text" name="startDate" id="startDate" class="form-control" required="required" value="{{ request('startDate') }}" autocomplete="off" readonly placeholder="dd-mm-yyyy">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>End Date</label>
                                    <input type="text" name="endDate" id="endDate" class="form-control" required="required" value="{{ request('endDate') }}" autocomplete="off" readonly placeholder="dd-mm-yyyy">
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
                                    <label>Payment Mode</label>
                                    <select name="payment_mode" class="form-control">
                                        <option value="">-- Select Mode --</option>
                                        @foreach(\App\Helper\Helper::paymentMode() as $key => $mode)
                                            <option value="{{ $key }}" {{ (request('payment_mode') == $key) ? 'selected' : '' }}>{{ $mode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Payment Status</label>
                                    <select name="payment_status" class="form-control">
                                        <option value="">-- Select Status --</option>
                                            <option value="1" {{ (request('payment_status') == 1) ? 'selected' : '' }}>Yes</option>
                                            <option value="2" {{ (request('payment_status') == 2) ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <!-- <p>&nbsp;</p> -->
                                    <button class="btn btn-info" type="submit" style="margin-top: -5px;">Search</button> &nbsp;
                                    <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-warning" style="margin-top: -5px;"><i class="fa fa-refresh"></i></a>
                                </div>

                                <div class="form-group col-md-2">
                                    <!-- <p>&nbsp;</p> -->
                                    <button class="btn btn-info" type="submit" name="excel" value="1" style="margin-top: -5px;">Export</button>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Invoice</th>
                                        <th class="text-center">Actions</th>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key => $order)
                                    <tr>
                                        <td>{{ $order->orderId() }}</td>
                                        <td class="text-center"><a href="{{ route('admin.invoice', ['id' => $order->id]) }}" title="Get Invoice" target="_blank"><i class="fa fa-print"></i></a>
                                        </td>
                                        <td class="text-center"><a href="{{ route('admin.orderDetail', ['id' => $order->id]) }}"><i class="icon-eye"></i></a>
                                        </td>
                                        <td style="white-space: nowrap;">{{ App\Helper\Helper::dateFormat($order->created_at) }}</td>
                                        <td style="white-space: nowrap;">{{ $order->user->name }}</td>
                                        <td style="white-space: nowrap;">
                                            {{ $order->address->address or '-' }}, <br>{{ $order->address->address_1 or '-' }} <br>{{ $order->address->city or '-' }}, <br>{{ $order->address->state or '-' }} - {{ $order->address->pincode or '-' }}
                                        </td>
                                        <td>{{ $order->total }}</td>
                                        <td>{{ $order->discount }}</td>
                                        <td>{{ $order->discount_amount }}</td>
                                        <td>{{ $order->cart_amount }}</td>
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
    @section('js')
        <script type="text/javascript">
            $(document).ready(function() {
                $("#startDate").datepicker({
                    todayBtn: 1,
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                });
                $("#endDate").datepicker({
                    todayBtn: 1,
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                });
            });
        </script>    
    @endsection