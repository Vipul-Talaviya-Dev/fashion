@extends('user.layouts.main')

@section('title', 'My Account')

@section('css')
<style type="text/css">
.modal-title {
	padding-left: 0; 
}
.modal-header {
	min-height: 16.42857143px;
	padding: 15px;
	border-bottom: 1px solid #e5e5e5;
}
.modal button.close {
	width: auto; 
	margin-top: -12px;
}
</style>
@endsection

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
			$variation = $order->variation;
			$images = explode(',', $variation->images);
			$startTime = \Carbon\Carbon::parse($order->updated_at);
			$finishTime = \Carbon\Carbon::now();
			$returnTime = $finishTime->diffInHours($startTime);

		?>
		<div class="shopping-order-box">
			<div class="row">
				<div class="col-md-3">
					<span class="timetitle btimes"><a href="javascript:void(0);"><img class="track-img-thumb" src="{{ \Cloudder::secureShow($images[0]) }}" alt="{{ $order->product->name }}" width="72" height="72"></a></span>
				</div>
				<div class="col-md-3">
					<!-- <span class="timetitle atimes"><a href="/product/"></a></span><p><br></p> -->
					<span class="bus-order-location">Size : {{ $variation->size->name }}</span> &nbsp;
					<span class="btn colorSelected" style="background: {{ $variation->color->code }};padding: 9px 9px;" title="Color"></span>
					<p><br></p>

					@if(($returnTime < 24) && ($order->status == 6))
						<a href="javascript:void(0);" class="btn btn-cart btn-xs black-text orderReturn" data-id="{{ $order->orderProductId() }}">Order Return<div class="ripple-wrapper"></div></a>
					@endif
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

<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<form action="{{ route('user.orderReturn') }}" method="post" id="form">
			{{ csrf_field() }}
			<div class="modal-content" style="width: 50%;margin-left: 30%;">
			<div class="modal-header">
				<h4 class="modal-title">
					Order Return
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="form-group">
						<label>Reason :</label>
						<select class="form-control" name="reason" required>
							<option value="">-- Select Reason --</option>
							<option value="1">Damage</option>
							<option value="2">Other Resion</option>
						</select>
						<input type="hidden" name="orderId" class="orderId">
					</div>
					<div class="form-group">
						<label>Message :</label>
						<textarea class="form-control" name="message" rows="10" cols="8" required></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="Submit" class="btn btn-default">Submit</button>
			</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	 	$('body').on('click', '.orderReturn', function() {
	 		$(".orderId").val($(this).attr('data-id'));
			$('#myModal').modal();

			$("#form").validate({
		      	rules: {
		 			orderId: 'required',
		         	reason: 'required',
		         	message: 'required',
		      	}
		  	});
		});
   });
</script>
@endsection