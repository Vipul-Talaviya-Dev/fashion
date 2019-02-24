@extends('user.layouts.main')

@section('title', 'Contact')

@section('content')
<p>&nbsp;</p>
<div class="col-md-12 col-sm-12 col-xs-12" style="background-color: #f3f3f3;">
	<div class="panel panel-default margin-top-25">
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
	    <form action="{{ route('user.addContact') }}" method="post" id="form">
			{{ csrf_field() }}
			<div class="col-md-4 col-md-offset-4 col-xs-12">
				<div class="form-group col-md-12 col-xs-12">
					<div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					  <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" autocomplete="off" required>
					</div>
				</div>
				<div class="form-group col-md-12 col-xs-12">
					<div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					  <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autocomplete="off">
					</div>
				</div>
				<div class="form-group col-md-12 col-xs-12">
					<div class="input-group">
					  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
					  <input type="text" name="mobile" class="form-control mobile" onkeydown="return max_length(this,event,10)" onkeypress="return isNumberKey(event)" value="{{ old('mobile') }}" autocomplete="off" required placeholder="mobile">
					</div>
				</div>
				<div class="form-group col-md-12 col-xs-12">
					  <textarea  name="message" class="form-control message" placeholder="Enter Message" rows="4" required>{{ old('message') }}</textarea>
				</div>
			</div>
			<div class="form-group col-md-7 pull-right">
				<input type="submit" class="more-product" value="Save">
			</div>
		</form>
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
         name: 'required',
         message: 'required',
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
