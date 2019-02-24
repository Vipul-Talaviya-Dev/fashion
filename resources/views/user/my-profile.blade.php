@extends('user.layouts.main')

@section('title', 'My Profile')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12" style="background-color: #f3f3f3;">
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
				<div class="form-group col-md-7 pull-right">
					<input type="submit" class="more-product" value="Save">
				</div>
			</form>
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
   });
</script>
@endsection
