@extends('user.layouts.main')

@section('title', 'Chage Password')

@section('css')
<style type="text/css">
.row {
     margin-right: 0; 
     margin-left: 0; 
}
#password-error, #confirmPassword-error {
	display: none !important;
}
.panel-default > .panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
}
</style>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12" style="background-color: #f3f3f3;">
		@include('user.profile-menu')
		<div class="col-md-9 col-sm-9 col-xs-12 margin-top-10">
			<div class="panel panel-default">
				<div class="panel-heading">Rest Password</div>
			  <div class="panel-body">
			  	@if ($errors->any())
				    <div class="alert alert-danger">
			            @foreach ($errors->all() as $error)
			                <div>{{ $error }}</div>
			            @endforeach
				    </div>
				@endif
			    <form action="{{ route('user.changeNewPassword') }}" method="post" id="form">
					{{ csrf_field() }}
					<div class="col-md-12 col-xs-12">
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
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
      $("#form").validate({
      	rules: {
         password: 'required',
         confirmPassword: 'required',
        }
      });
   });
</script>
@endsection
