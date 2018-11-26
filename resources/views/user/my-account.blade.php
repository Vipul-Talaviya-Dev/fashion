@extends('user.layouts.main')

@section('title', 'My Account')

@section('content')
<hr>
<div class="col-md-12 col-sm-12 col-xs-12" style="background-color: #f3f3f3;">
	<div class="col-md-3 col-xs-12">
		<div class="usermenu-Container">
			<div class="usermenu-Head"><h2>My Account </h2></div>
			<a href="javascript:void(0);" class="default-text">
				<div class="usermenu-Panel">
					<div class="usermenu-PanelTitle"><i class="mdi-action-account-circle"></i> Profile</div>
					<div class="usermenu-PanelContent"></div>
				</div>
			</a>
			<a href="{{ route('user.myAccount') }}" class="default-text">
				<div class="usermenu-Panel">
					<div class="usermenu-PanelTitle"><i class="mdi-action-assignment"></i> Orders</div>
					<div class="usermenu-PanelContent"></div>
				</div>
			</a>
			<a href="{{ route('user.logout') }}" class="default-text">
				<div class="usermenu-Panel">
					<div class="usermenu-PanelTitle"><i class="mdi-action-assignment"></i> Logout</div>
					<div class="usermenu-PanelContent"></div>
				</div>
			</a>
		</div>
		<p><br></p>
	</div>
	<div class="col-md-9 col-xs-12">
		@if(count($orders) == 0)
		<div class="fsn-box pck-box-shadow text-center" >
			<h3>Hey, There are no any Order history available 
				<a href="{{ route('user.index') }}"><b class="red">Order Now!</b></a>
			</h3> 
		</div>
		@endif
		@foreach($orders as $order)
		<div class="shopping-order-box">
			<div class="row">
				<div class="col-md-3">
					<span class="timetitle btimes"><a href="{{ \Cloudder::secureShow($order->product->thumb_image) }}"><img class="track-img-thumb" src="{{ \Cloudder::secureShow($order->product->thumb_image) }}" alt="{{ $order->product->name }}" width="72" height="72"></a></span>
				</div>
				<div class="col-md-3">
					<!-- <span class="timetitle atimes"><a href="/product/"></a></span><p><br></p> -->
					<?php
					$variation = $order->product->variations()->find($order->variation_id);
					?>
					<span class="bus-order-location">Size : {{ $variation->size->name }}</span><p><br></p><a href="javascript:void(0);" target="_blank" class="btn btn-cart btn-xs black-text">GET INVOICE<div class="ripple-wrapper"></div></a>
				</div>
				<div class="col-md-3 text-center">
					<span class="timetitle atimes">{{ 'FHN'.date('Ymd', strtotime($order->created_at)).$order->order_id }}</span><br>
					<span class="font-size-10 green">Placed On {{ date('d M, Y', strtotime($order->created_at)) }}</span>
				</div>
				<div class="col-md-3 text-center">
					<span class="timetitle atimes">Rs. {{ $order->price }}</span><br>
					<span class="bus-order-location">Qty : {{ $order->qty }} </span>
				</div>
			</div>
			<p><br></p>
			@if(false)
			<span class="line-divider-dashed1"></span>
			<span>7-Day Easy Returns Policy period has ended. You cannot return / replace your product now.</span>
			@endif
		</div>
		@endforeach
		<p><br></p>
	</div>
</div>
@endsection
