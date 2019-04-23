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
					<span class="timetitle atimes">{{ $order->orderProductId() }}</span><br>
					<span class="font-size-10 green">Placed On {{ date('d M, Y', strtotime($order->created_at)) }}</span>
				</div>
				<div class="col-md-3 text-center">
					<span class="timetitle atimes">Rs. {{ $order->price }}</span><br>
					<span class="bus-order-location">Qty : {{ $order->qty }} </span>
				</div>
			</div>
			<div class="pull-right">
				@if($order->status == 1 || $order->status == 2)
                    <span class="label label-default"><b>{{ \App\Helper\Helper::orderStatus($order->status) }}</b></span>
                @elseif($order->status == 3 || $order->status == 6)
                    <span class="label label-success"><b>{{ \App\Helper\Helper::orderStatus($order->status) }}</b></span>
                @elseif($order->status == 4 || $order->status == 5 || $order->status == 7)
                    <span class="label label-info"><b>{{ \App\Helper\Helper::orderStatus($order->status) }}</b></span>
                @elseif($order->status == 8)
                    <span class="label label-danger"><b>{{ \App\Helper\Helper::orderStatus($order->status) }}</b></span>
                @endif
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
