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
</style>
@endsection
@section('content')
<hr>
<div class="col-md-12 col-sm-12 col-xs-12">
	<form action="{{ route('user.shippingDetail') }}" method="post">
		{{ csrf_field() }}
		<div class="col-md-8 col-sm-6 col-xs-12 order-boxos">
			<div class="">
				<div class="panel-heading">Your Address Details</div>
				<div class="panel-body">
					@if(count($addresses) > 0)
					<div class="col-md-6">
						<div class="notification-area">
							<div class="info-box">
								<p>
									<b class="black-text">vipul talaviya</b><br><br>
									Behind New Bus-Stand,Opp.Hora Floor mill,visavadar-362130no<br>
									visavadar - 362130,<br>Gujarat<br>
									Phone: <span class="black-text">9998363518</span><br>
								</p>
							</div>
							<div class="add-box-footer">
								<label>
									<input type="radio" name="addressOption" id="selectAddress" value="319">
									Select <b class="black-text">Home</b> Address
								</label>
								<span class="pull-right">
									<a href="javascript:void(0)" class="dlt-thrush delete_address" data-add="319"><i class="fa fa-trash-o"></i> Delete </a>
								</span>
							</div>
						</div>
					</div>
					@else
					<div class="form-group col-md-4 {{ $errors->has('name') ? 'has-error' : ''  }}">
						<label>Name :</label>
						<input type="text" name="name" class="form-control" autocomplete="off" value="{{ old('name') }}" required>
						@foreach($errors->get('name') as $error)
						<span style="color: red;">{{$error}}</span>
						@endforeach
					</div>
					<div class="form-group col-md-4 {{ $errors->has('mobile') ? 'has-error' : ''  }}">
						<label>Mobile :</label>
						<input type="number" name="mobile" class="form-control" value="{{ old('mobile') }}" autocomplete="off" required>
						@foreach($errors->get('mobile') as $error)
						<span style="color: red;">{{$error}}</span>
						@endforeach
					</div>
					<div class="form-group col-md-4 {{ $errors->has('pincode') ? 'has-error' : ''  }}">
						<label>pinCode :</label>
						<input type="number" name="pincode" class="form-control" autocomplete="off" value="{{ old('pincode') }}" required>
						@foreach($errors->get('pincode') as $error)
						<span style="color: red;">{{$error}}</span>
						@endforeach
					</div>
					<div class="form-group col-md-4 {{ $errors->has('city') ? 'has-error' : ''  }}">
						<label>City :</label>
						<input type="text" name="city" class="form-control" autocomplete="off" value="{{ old('city') }}" required>
						@foreach($errors->get('city') as $error)
						<span style="color: red;">{{$error}}</span>
						@endforeach
					</div>
					<div class="form-group col-md-4 {{ $errors->has('state') ? 'has-error' : ''  }}">
						<label>State :</label>
						<input type="text" name="state" class="form-control" autocomplete="off" value="{{ old('state') }}" required>
						@foreach($errors->get('state') as $error)
						<span style="color: red;">{{$error}}</span>
						@endforeach
					</div>
					<div class="form-group col-md-4 {{ $errors->has('address') ? 'has-error' : ''  }}">
						<label>Address :</label>
						<textarea name="address" class="form-control" rows="5" placeholder="Enter Address (Plot no. / House No. , Street, Society, Area, Etc)" autocomplete="off" required>{{ old('address') }}</textarea>
						@foreach($errors->get('address') as $error)
						<span style="color: red;">{{$error}}</span>
						@endforeach
					</div>
					@if(false)
					<div class="form-group col-md-4 {{ $errors->has('country') ? 'has-error' : ''  }}">
						<label>Country :</label>
						<input type="text" name="country" class="form-control" autocomplete="off" value="{{ old('country') }}" required>
						@foreach($errors->get('country') as $error)
						<span style="color: red;">{{$error}}</span>
						@endforeach
					</div>
					@endif
					@endif
					<!-- <div class="col-md-12 col-sm-12 col-xs-12">
						<button type="submit" class="btn btn-default">Submit</button>
					</div> -->
				</div>
				<p><br></p>
				<button style="margin-left: 47px;" type="button" class="btn btn-success addAdddress"><i class="fa fa-plus"></i> Add New Address<div class="ripple-wrapper"></div></button>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
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
								<td class="text-left">Total shipping Charges</td>
								<td class="text-right green">Rs. 0</td>
							</tr>
							<tr>
								<td class="text-left">Total Amount</td>
								<td class="text-right"><strong>Rs. {{ $finalAmount }}</strong></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="form-group spacet-20">
					<input type="submit" class="btn btn-block btn-danger" name="Payment" value="Order Place">
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
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					Modal Header
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</h4>
			</div>
			<div class="modal-body">
				<p>Some text in the modal.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	$(document).ready(function() {
		$('body').on('click', '.addAdddress', function() {
			$('#myModal').modal();
		});
	});
</script>
@endsection
