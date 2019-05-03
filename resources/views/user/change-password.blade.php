@extends('user.layouts.main')

@section('title', 'chage-password')

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
		<div class="panel panel-default">
		  <div class="panel-body">
		  	@if ($errors->any())
			    <div class="alert alert-danger">
		            @foreach ($errors->all() as $error)
		                <div>{{ $error }}</div>
		            @endforeach
			    </div>
			@endif
		    <form action="{{ route('user.changePassword') }}" method="post" id="form">
				{{ csrf_field() }}
				<div class="col-md-12 col-xs-12">
					<div class="form-group col-md-6">
						<div class="input-group">
						  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						  <input type="password" name="oldPassword" class="form-control" placeholder="Enter Old Password"  autocomplete="off" required>
						</div>
					</div>

					<div class="form-group col-md-6">
						<div class="input-group">
						  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						  <input type="password" name="password" class="form-control" placeholder="Enter New Password"  autocomplete="off" required>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="input-group">
						  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						  <input type="password" name="confirmPassword" class="form-control" placeholder="Enter Confirm Password" autocomplete="off" required>
						</div>
					</div>
				</div>
				<div class="form-group col-md-7 pull-right">
					<input type="submit" class="more-product" value="Submit">
				</div>
			</form>
		  </div>
		</div>
	</div>
</div>
@endsection
