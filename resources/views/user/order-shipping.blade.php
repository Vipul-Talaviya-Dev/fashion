@extends('user.layouts.main')

@section('title', 'Order Shipping')

@section('content')
<hr>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="col-md-8 col-sm-6 col-xs-6 order-boxos pck-box-shadow">
		<div class="">
			<div class="panel-heading">Shipping Detail</div>
			<div class="panel-body">
				<form action="{{ route('user.shippingDetail') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group col-md-4 {{ $errors->has('name') ? 'has-error' : ''  }}">
						<label>Name :</label>
						<input type="text" name="name" class="form-control" autocomplete="off" value="{{ old('name') }}" required>
						@foreach($errors->get('name') as $error)
                        	<span style="color: red;">{{$error}}</span>
                        @endforeach
					</div>
					<div class="form-group col-md-4 {{ $errors->has('email') ? 'has-error' : ''  }}">
						<label>Email :</label>
						<input type="email" name="email" class="form-control" value="{{ old('email') }}" autocomplete="off" required>
						@foreach($errors->get('email') as $error)
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
					<div class="form-group col-md-4 {{ $errors->has('address') ? 'has-error' : ''  }}">
						<label>Address :</label>
						<textarea name="address" class="form-control" rows="5" placeholder="Enter Address (Plot no. / House No. , Street, Society, Area, Etc)" autocomplete="off" required>{{ old('address') }}</textarea>
						@foreach($errors->get('address') as $error)
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
					<div class="form-group col-md-4 {{ $errors->has('country') ? 'has-error' : ''  }}">
						<label>Country :</label>
						<input type="text" name="country" class="form-control" autocomplete="off" value="{{ old('country') }}" required>
						@foreach($errors->get('country') as $error)
                        	<span style="color: red;">{{$error}}</span>
                        @endforeach
					</div>
					<!-- <div class="col-md-12 col-sm-12 col-xs-12">
						<button type="submit" class="btn btn-default">Submit</button>
					</div> -->
				</form>
			</div>
			<p><br></p>
		</div>
	</div>
	<div class="col-md-4 col-sm-6 col-xs-6 ">
		<div class="order-boxos pck-box-shadow">
							<h5 class="order-boxos-header">Order Summary</h5><hr>
														<div class="order-boxos-items">
																		<div class="order-boxos-item">
											<div class="order-boxos-item-image">
												<img src="https://tymkpck001.s3.amazonaws.com/product/image/thumb/20160309132726YALOEOMS2OAEKKV03453_4.jpg" alt="Spell Sundancer Floral Top">
											</div>
											<div class="order-boxos-item-detail">
												<h5>Spell Sundancer Floral Top <br>
													<span class="cart-variation"><span>Alphabetic Size : S</span></span>
												</h5>
												<div class="pull-left">Quantity : 1</div>
												<div class="pull-right">₹ 549</div>
											</div>
										</div>
																			<div class="order-boxos-item">
											<div class="order-boxos-item-image">
												<img src="https://tymkpck001.s3.amazonaws.com/product/image/thumb/201603091437369VUXHD7BVP4IVGW10803_f.jpg" alt="Tank Top Navy Blue">
											</div>
											<div class="order-boxos-item-detail">
												<h5>Tank Top Navy Blue <br>
													<span class="cart-variation"><span>Alphabetic Size : Free Size</span></span>
												</h5>
												<div class="pull-left">Quantity : 1</div>
												<div class="pull-right">₹ 399</div>
											</div>
										</div>
																</div>
							<div class="order-boxos-total">
								<table>
									<tbody><tr>
										<td class="text-left">Subtotal Amount</td>
										<td class="text-right">₹ 948</td>
									</tr>
									<tr>
										<td class="text-left">Total shipping Charges</td>
										<td class="text-right green">₹ 0</td>
									</tr>
									<tr>
										<td class="text-left">Total Amount</td>
										<td class="text-right"><strong>₹ 948</strong></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="form-group spacet-20">
						<input type="submit" class="btn btn-block btn-danger" name="Payment" value="Order Place"></div>					</div>
	</div>
</div>

@endsection
@section('js')

@endsection
