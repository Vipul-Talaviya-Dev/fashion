@extends('user.layouts.main')

@section('title', 'Order Shipping')

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
.row {
	margin: 0;
}
</style>
@endsection
@section('content')
<hr>
<div class="row">
	<form action="{{ route('user.shippingDetail') }}" method="post" id="form">
		{{ csrf_field() }}
		<div class="col-md-8 col-sm-6 col-xs-12 order-boxos">
			<div class="">
				<div class="panel-heading">Your Address Details</div>
				<div class="panel-body">
					@foreach($addresses as $address)
						<div class="col-md-6 col-xs-12 padding-left-0">
							<div class="notification-area">
								<div class="info-box">
									<p>
										<b class="black-text">{{ $address->name }}</b><br><br>
										{{ $address->address }}<br>
										{{ $address->address_1 }}<br>
										{{ $address->city }} - {{ $address->pincode }},<br>{{ $address->state }}, {{ $address->country }}<br>
										Phone: <span class="black-text">{{ $address->mobile }}</span><br>
									</p>
								</div>
								<div class="add-box-footer">
									<label>
										<input type="radio" name="addressOption" id="selectAddress" value="{{ $address->id }}">
										Select <b class="black-text">Your</b> Address
									</label>
									<!-- <span class="pull-right">
										<a href="javascript:void(0)" class="dlt-thrush delete_address" data-add="{{ $address->id }}"><i class="fa fa-trash-o"></i> Delete </a>
									</span> -->
								</div>
							</div>
						</div>
					@endforeach
					<!-- <div class="col-md-12 col-sm-12 col-xs-12">
						<button type="submit" class="btn btn-default">Submit</button>
					</div> -->
				</div>
				<p><br></p>
				<button type="button" class="btn btn-success addAdddress address-btn"><i class="fa fa-plus"></i> Add New Address<div class="ripple-wrapper"></div></button>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12 pck-box-shadow">
			<div class="">
				<h5 class="order-boxos-header">Order Summary</h5><hr>
				<div class="order-boxos-items">
					<?php
					$total = 0;
					$finalAmount = 0;
					?>
					@foreach(\Session::get('order')['product'] as $key => $data)
					<?php
					$key++;
					$product = \App\Models\Product::find($data['product_id']);
					$variation = $product->variations()->find($data['variation_id']);

					$total += ($variation->price * $data['qty']);
					$finalAmount = $total;
					$image = explode(',', $variation->images);
					?>
					<div class="order-boxos-item">
						<div class="order-boxos-item-image">
							<img src="{{ \Cloudder::secureShow($image[0]) }}" alt="{{ $product->name }}">
						</div>
						<div class="order-boxos-item-detail">
							<h5 style="line-height: 19px;">{{ $product->name }} <br>
								<span class="cart-variation"><span>Size : {{ $variation->size->name }}</span></span><br>
								<span class="cart-variation"><span>Color : {{ $variation->color->name }}</span></span>
							</h5>
							<div class="pull-left">Quantity : {{ $data['qty'] }}</div>
							<div class="pull-right">Rs. {{ ($variation->price * $data['qty']) }}</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="order-boxos-total">
					<table>
						<tbody>
							<tr>
								<td class="text-left">Subtotal Amount</td>
								<td class="text-right">Rs. {{ $total }}</td>
							</tr>
							<tr>
								<td class="text-left">Delivery Charge [+]</td>
								<td class="text-right green">Rs. {{ $deliverCharge }}</td>
							</tr>
							<tr style="border-top: 1px solid;">
								<td class="text-left">Total Amount</td>
								<td class="text-right"><strong>Rs. {{ $finalAmount+$deliverCharge }}</strong></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="form-group spacet-20">
					<input type="submit" class="btn btn-block btn-danger" name="Payment" value="Go To Payment ">
				</div>
			</div>
		</div>
	</form>
</div>
<div class="col-md-12 col-sm-12 col-xs-12"><p><br></p></div>
<hr>
<!-- Address -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content order-shipping-modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					Add Address
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="form-group">
						<label>Full Name :</label>
						<input type="text" name="name" class="form-control name" autocomplete="off" value="{{ old('name') }}" required>
					</div>
					<div class="form-group">
						<label>Mobile :</label>
						<input type="text" name="mobile" class="form-control mobile" onkeydown="return max_length(this,event,10)" onkeypress="return isNumberKey(event)" value="{{ old('mobile') }}" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label>Address 1:</label>
						<input type="text" name="address" class="form-control address" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label>Address 2:</label>
						<input type="text" name="address1" class="form-control address1" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label>pinCode :</label>
						<input type="text" name="pincode" onkeydown="return max_length(this,event,6)" onkeypress="return isNumberKey(event)" class="form-control pincode" autocomplete="off" value="{{ old('pincode') }}" required>
					</div>
					<div class="form-group">
						<label>City :</label>
						<input type="text" name="city" class="form-control city" autocomplete="off" value="{{ old('city') }}" required>
					</div>
					<div class="form-group">
						<label>State :</label>
						<input type="text" name="state" class="form-control state" autocomplete="off" value="{{ old('state') }}" required>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default createAddress">Submit</button>
			</div>
		</div>

	</div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#form").validate({
      	rules: {
         addressOption: 'required',
      	}
      });

		$('body').on('click', '.addAdddress', function() {
			$('#myModal').modal();
		});
	});
</script>
@endsection
