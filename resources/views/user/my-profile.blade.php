@extends('user.layouts.main')

@section('title', 'My Profile')

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
.btn-success, .btn-danger {
    background-color: #d0a65e;
    border-color: #d0a65e;
}
.btn-success:hover, .btn-success:focus, .btn-success.focus, .btn-success:active, .btn-success.active, .open > .dropdown-toggle.btn-success {
	background-color: #d0a65e;
    border-color: #d0a65e;	
}
.row {
	margin: 0;
}
</style>
@endsection

@section('content')
<div class="row" style="background-color: #f3f3f3;">
	@include('user.profile-menu')
	<div class="col-md-9 col-sm-9 col-xs-12 margin-top-10">
		<div class="panel panel-default">
		  <div class="panel-body">
		  	@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
		    <form action="{{ route('user.profileUpdate') }}" method="post" id="form">
				{{ csrf_field() }}
				<div class="col-md-12 col-xs-12">
					<div class="form-group col-md-6">
						<div class="input-group">
						  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						  <input type="text" name="firstName" class="form-control" placeholder="First Name" value="{{ $fname ?: old('firstName') }}" autocomplete="off" required>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
						  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						  <input type="text" name="lastName" class="form-control" placeholder="Last Name" value="{{ $lname ?: old('lastName') }}" autocomplete="off" required>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-xs-12">
					<div class="form-group col-md-6">
						<div class="input-group">
						  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						  <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email ?: old('email') }}" autocomplete="off" readonly>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
						  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
						  <input type="text" name="mobile" class="form-control mobile" onkeydown="return max_length(this,event,10)" onkeypress="return isNumberKey(event)" value="{{ $user->mobile ?: old('mobile') }}" autocomplete="off" required>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-xs-12">
					<div class="form-group col-md-6">
						<div class="input-group">
						  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						  <input type="text" name="birth_date" class="form-control birthDate" placeholder="Birth Date" value="{{ $user->birth_date ? date('d-m-Y', strtotime($user->birth_date)) : old('birth_date') }}" autocomplete="off" required max="{{ date('Y-m-d') }}" title="Birth Date">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
						  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						  <input type="text" name="anniversary_date" class="form-control anniversaryDate" placeholder="Anniversary Date" value="{{ $user->anniversary_date ? date('d-m-Y', strtotime($user->anniversary_date)) : old('anniversary_date') }}" autocomplete="off"  max="{{ date('Y-m-d') }}" title="Anniversary Date">
						</div>
					</div>
				</div>
				<div class="form-group col-md-7 pull-right">
					<input type="submit" class="more-product" value="Save">
				</div>
			</form>
		  </div>
		</div>
		<!-- Address -->
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
<!-- Address -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					<span id="addressHeader"></span>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</h4>
			</div>
			<div class="modal-body">
				<div class="row"><br>
					<div class="form-group col-md-6 col-xs-12">
						<label>First Name :</label>
						<input type="text" name="firstName" class="form-control firstName" autocomplete="off" value="{{ old('firstName') }}" required>
					</div>
					<div class="form-group col-md-6 col-xs-12">
						<label>Last Name :</label>
						<input type="text" name="lastName" class="form-control lastName" autocomplete="off" value="{{ old('lastName') }}" required>
					</div>
					<div class="form-group col-md-6 col-xs-12">
						<label>Mobile :</label>
						<input type="text" name="mobile" class="form-control mobile" onkeydown="return max_length(this,event,10)" onkeypress="return isNumberKey(event)" value="{{ old('mobile') }}" autocomplete="off" required>
					</div>
					<div class="form-group col-md-6 col-xs-12">
						<label>Address 1:</label>
						<input type="text" name="address" class="form-control address" autocomplete="off" required>
					</div>
					<div class="form-group col-md-6 col-xs-12">
						<label>Address 2:</label>
						<input type="text" name="address1" class="form-control address1" autocomplete="off" required>
					</div>
					<div class="form-group col-md-6 col-xs-12">
						<label>pinCode :</label>
						<input type="text" name="pincode" onkeydown="return max_length(this,event,6)" onkeypress="return isNumberKey(event)" class="form-control pincode" autocomplete="off" value="{{ old('pincode') }}" required>
					</div>
					<div class="form-group col-md-6 col-xs-12">
						<label>City :</label>
						<input type="text" name="city" class="form-control city" autocomplete="off" value="{{ old('city') }}" required>
					</div>
					<div class="form-group col-md-6 col-xs-12">
						<label>State :</label>
						<input type="text" name="state" class="form-control state" autocomplete="off" value="{{ old('state') }}" required>
						<input type="hidden" name="id" value="0">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success createAddress">Submit</button>
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
         firstName: 'required',
         lastName: 'required',
         email: {
            required: true,
            email: true,
         },
         mobile: {
            required: true,
         },
      }
      });

 	 	$('body').on('click', '.addAdddress', function() {
 	 		$("input[name='firstName']").val('');
	        $("input[name='lastName']").val('');
	        $("input[name='mobile']").val('');
	        $("input[name='pincode']").val('');
	        $("input[name='city']").val('');
	        $("input[name='state']").val('');
	        $("input[name='address']").val('');
	        $("input[name='address1']").val('');
	        $("input[name='id']").val('');
	        $(".redirect").val('');
			$('#addressHeader').html("Add New Address");
			$('#myModal').modal();
		});

   });
</script>
@endsection
