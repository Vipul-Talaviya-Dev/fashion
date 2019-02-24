@extends('user.layouts.main')

@section('title', 'My Account')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12" style="background-color: #f3f3f3;">
	@include('user.profile-menu')
	<div class="col-md-9 col-xs-12 margin-top-10">
		@if(count($orders) == 0)
		<div class="fsn-box pck-box-shadow text-center" >
			<h3>Hey, There are no any Order history available 
				<a href="{{ route('user.index') }}"><b class="red">Order Now!</b></a>
			</h3> 
		</div>
		@endif
		@foreach($orders as $order)
		<?php
			$variation = $order->product->variations()->find($order->variation_id);
			$images = explode(',', $variation->images);
		?>
		<div class="shopping-order-box">
			<div class="row">
				<div class="col-md-3">
					<span class="timetitle btimes"><a href="javascript:void(0);"><img class="track-img-thumb" src="{{ \Cloudder::secureShow($images[0]) }}" alt="{{ $order->product->name }}" width="72" height="72"></a></span>
				</div>
				<div class="col-md-3">
					<!-- <span class="timetitle atimes"><a href="/product/"></a></span><p><br></p> -->
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
