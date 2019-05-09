@extends('admin.layouts.main')
@section('title', 'Return Orders')
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Return Orders</li>
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
                    <h1 class="panel-title">Return Order List</h1>
                </div>
                <hr/>
                <div class="container-fluid">
                    <div class="">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sub Order Id</th>
                                        <th>User Name</th>
                                        <th>Item Detail</th>
                                        <th>Quality</th>
                                        <th>Price</th>
                                        <th>Order Date</th>
                                        <th>Change Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key => $orderProduct)
                                    <?php
                                        $variation = $orderProduct->product->variations()->find($orderProduct->variation_id);
                                        $images = explode(',', $variation->images);
                                    ?>
                                    <tr>
                                        <td>{{ $orderProduct->orderProductId() }}</td>
                                        <td>{{ $orderProduct->user->name }}<br>({{ $orderProduct->user->mobile }})</td>
                                        <td><img src="{{ \Cloudder::secureShow($images[0]) }}" data-imagezoom="true" style="width: 50px;" class="img-responsive" alt="{{ $orderProduct->product->name }}"></td>
                                        <td>{{ $orderProduct->qty }}</td>
                                        <td>{{ $orderProduct->price }}</td>
                                        <td>{{ $orderProduct->created_at }}</td>
                                        <td>
                                            <form method="get" action="{{ route('admin.returnOrderStatusChange', ['id' => $orderProduct->id]) }}">
                                                <div class="form-group">
                                                    <label>Order Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="">-- Select Status --</option>
                                                        @foreach(\App\Helper\Helper::orderStatus() as $key => $status)
                                                            <option value="{{ $key }}" {{ ($orderProduct->status == $key) ? 'selected' : '' }}>{{ $status }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-info" type="submit" >Search</button>
                                                </div>
                                            </form>
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