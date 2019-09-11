@extends('admin.layouts.main')

@section('title')
Dashboard panel
@endsection

@section('css')
<style>
.card {
    border: 1px solid #d7e1ef;
    -webkit-border-radius: 0.15rem;
    -moz-border-radius: 0.15rem;
    border-radius: 0.15rem;
    margin-bottom: 1rem;
    box-shadow: none;
    background: #ffffff;
}
.card-body {
    padding: 1rem;
    position: relative;
    flex: 1 1 auto;
}
.stats-widget .stats-widget-body ul {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-flow: row wrap;
    justify-content: space-around;
    margin-right: -0px;
    margin-left: -0px;
    list-style: none;
}
.stats-widget-header i {
    font-size: 2.5rem;
    color: #a7b4c5;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
        border-radius: 100px;
}
.stats-widget .stats-widget-header {
    margin-top: 20px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}
.stats-widget .stats-widget-body h6.title {
    margin: 0;
    font-size: 18px;
    line-height: 180%;
    color: #a7b4c5;
    text-align: right;
}
.stats-widget .stats-widget-body h4.total {
    margin: 0;
    text-align: right;
    font-size: 2rem;
}
.progress.sm {
    height: 5px;
}
</style>
@endsection

@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<?php
$admin  = \Session::get('admin');
?>
<div class="" style="height: 80vh;">
@if($admin->role == 1)
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="stats-widget">
                        <div class="stats-widget-body">
                            <!-- Row start -->
                            <ul class="row no-gutters mb-3">
                                <li class="">
                                    <div class="stats-widget-header">
                                        <i class="fa fa-home"></i>
                                    </div>
                                </li>
                                <li class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                    <h6 class="title">Visitors</h6>
                                    <h4 class="total" title="Count">{{ ($counter = \App\Models\Counter::find(1)) ? $counter->visitor : 0 }}</h4>
                                </li>
                            </ul>
                            <!-- Row end -->
                            <div class="progress sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="stats-widget">
                        <div class="stats-widget-body">
                            <!-- Row start -->
                            <ul class="row no-gutters mb-3">
                                <li class="">
                                    <div class="stats-widget-header">
                                        <i class="fa fa-home"></i>
                                    </div>
                                </li>
                                <li class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                    <h6 class="title">New Order</h6>
                                    <h4 class="total" title="Count">{{ $newOrder }}</h4>
                                </li>
                            </ul>
                            <!-- Row end -->
                            <div class="progress sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="stats-widget">
                        <div class="stats-widget-body">
                            <!-- Row start -->
                            <ul class="row no-gutters mb-3">
                                <li class="">
                                    <div class="stats-widget-header">
                                        <i class="fa fa-home"></i>
                                    </div>
                                </li>
                                <li class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                    <h6 class="title">Sell QTY</h6>
                                    <h4 class="total" title="Count">{{ $sellProductQty }}</h4>
                                </li>
                            </ul>
                            <!-- Row end -->
                            <div class="progress sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="stats-widget">
                        <div class="stats-widget-body">
                            <!-- Row start -->
                            <ul class="row no-gutters mb-3">
                                <li class="">
                                    <div class="stats-widget-header">
                                        <i class="fa fa-home"></i>
                                    </div>
                                </li>
                                <li class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                    <h6 class="title">Total QTY</h6>
                                    <h4 class="total" title="Count">{{ $totalProductQty }}</h4>
                                </li>
                            </ul>
                            <!-- Row end -->
                            <div class="progress sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="stats-widget">
                        <div class="stats-widget-body">
                            <!-- Row start -->
                            <ul class="row no-gutters mb-3">
                                <li class="">
                                    <div class="stats-widget-header">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </li>
                                <li class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                    <h6 class="title">Total Users</h6>
                                    <h4 class="total" title="Count">{{ $user }}</h4>
                                </li>
                            </ul>
                            <!-- Row end -->
                            <div class="progress sm">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
            <a href="{{ route('admin.returnOrders') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="stats-widget">
                            <div class="stats-widget-body">
                                <!-- Row start -->
                                <ul class="row no-gutters mb-3">
                                    <li class="">
                                        <div class="stats-widget-header">
                                            <i class="icon-basket"></i>
                                        </div>
                                    </li>
                                    <li class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                        <h6 class="title">Return Orders</h6>
                                        <h4 class="total" title="Count">{{ $returnOrders }}</h4>
                                    </li>
                                </ul>
                                <!-- Row end -->
                                <div class="progress sm">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @if(false)
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
            <a href="{{ route('admin.barcodeLayout1') }}" target="_blank">
                <div class="card">
                    <div class="card-body">
                        <div class="stats-widget">
                            <div class="stats-widget-body">
                                <!-- Row start -->
                                <ul class="row no-gutters mb-3">
                                    <li class="">
                                        <div class="stats-widget-header">
                                            <i class="icon-basket"></i>
                                        </div>
                                    </li>
                                    <li class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                        <h6 class="title">Barcode Layout 1</h6>
                                        <h4 class="total" title="Count">1</h4>
                                    </li>
                                </ul>
                                <!-- Row end -->
                                <div class="progress sm">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endif
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
            <a href="{{ route('admin.barcodeLayout2') }}" target="_blank">
                <div class="card">
                    <div class="card-body">
                        <div class="stats-widget">
                            <div class="stats-widget-body">
                                <!-- Row start -->
                                <ul class="row no-gutters mb-3">
                                    <li class="">
                                        <div class="stats-widget-header">
                                            <i class="icon-basket"></i>
                                        </div>
                                    </li>
                                    <li class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                        <h6 class="title">Barcode Layout 2</h6>
                                        <h4 class="total" title="Count">2</h4>
                                    </li>
                                </ul>
                                <!-- Row end -->
                                <div class="progress sm">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endif
</div>

@endsection