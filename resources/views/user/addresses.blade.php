@extends('user.layouts.main')

@section('title', 'My Addresses')

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
	<div class="col-md-9 col-sm-9 col-xs-12 margin-top-10">
		<div class="addresses-box">
			<div class="panel-body">
				@foreach($addresses as $address)
					<div class="col-md-6">
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
							<div class="add-box-footer" style="padding: 14px 18px 26px 2px;">
								<span class="pull-left">
									<a href="javascript:void(0)" class="dlt-thrush update_address" data-id="{{ $address->id }}"><i class="fa fa-edit"></i> Update </a>
								</span>

								<span class="pull-right">
									<a href="{{ route('user.addressDelete', ['id' => $address->id]) }}" class="dlt-thrush delete_address" data-add="{{ $address->id }}"><i class="fa fa-trash-o"></i> Delete </a>
								</span>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<p><br></p>
			<button style="margin-left: 47px;" type="button" class="btn btn-success addAdddress"><i class="fa fa-plus"></i> Add New Address<div class="ripple-wrapper"></div></button>
			<p><br></p>
		</div>
	</div>
</div>
<p><br></p>
<!-- Address -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content" style="width: 50%;margin-left: 30%;">
			<div class="modal-header">
				<h4 class="modal-title">
					<span id="addressHeader"></span>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="form-group">
						<label>Name :</label>
						<input type="text" name="name" class="form-control name" autocomplete="off" value="{{ old('name') }}" required>
					</div>
					<div class="form-group">
						<label>Mobile :</label>
						<input type="text" name="mobile" class="form-control mobile" onkeydown="return max_length(this,event,10)" onkeypress="return isNumberKey(event)" value="{{ old('mobile') }}" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label>Address :</label>
						<input type="text" name="address" class="form-control address" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label>Address 1:</label>
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
						<input type="hidden" name="id" value="0">
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
<script type="text/javascript">
	$(document).ready(function() {
		$('body').on('click', '.addAdddress', function() {
			$('#addressHeader').html("Add New Address");
			$('#myModal').modal();
		});
	});
</script>
@endsection
