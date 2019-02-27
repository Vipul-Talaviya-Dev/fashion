<!DOCTYPE html>
<html lang="en">
<head>
	<title>Payment  | Fashion</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="/front/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/material.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/toast.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/payment.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/popuo-box.css" rel="stylesheet" type="text/css" property="" media="all" />
	<link href='https://fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
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
</head>

<body>
	<div id="preloader" class="loader" style="display: none;"><div id="loader"></div></div>
	<div id="page-wrapper">
		<header id="header" class="navbar-static-top">
			<div class="order-header">
				<div class="container">
					<div class="col-md-2">
						<h2>
			                <img src="/front/images/logo.png" alt="Fashion" style="width: 52%;" class="img-responsive" />
				        </h2>
					</div>
					<div class="col-md-10">
						<div class="pull-right">
							<div class="order-header-menu">
								<!-- <i class="fa fa-phone order-header-icon"></i>
								<span> 07405-010-808</span> -->
								<span>&nbsp;</span>	
								<i class="fa fa-user order-header-icon"></i>
								<span>{{ \Auth::user()->name }}</span>		
							</div>
						</div>	
					</div>	
				</div>
			</div>
		</header>
		<form action="{{ route('user.order-place') }}" method="post">
			{{ csrf_field() }}
			<div data-alerts="alerts"></div>
			<section id="content" class="gray-area">
				<div class="container">
					<div class="row">
						<!-- <div class="row bs-wizard" style="border-bottom:0;">
							<div class="col-xs-4 bs-wizard-step complete">
								<div class="text-center bs-wizard-stepnum">Step 1</div>
								<div class="progress"><div class="progress-bar"></div></div>
								<a href="#" class="bs-wizard-dot"></a>
								<div class="bs-wizard-info text-center">Shipping Address</div>
							</div>
							<div class="col-xs-4 bs-wizard-step complete">
								<div class="text-center bs-wizard-stepnum">Step 2</div>
								<div class="progress"><div class="progress-bar"></div></div>
								<a href="#" class="bs-wizard-dot"></a>
								<div class="bs-wizard-info text-center">Payment</div>
							</div>
							<div class="col-xs-4 bs-wizard-step disabled">
								<div class="text-center bs-wizard-stepnum">Step 3</div>
								<div class="progress" style="background: #c8c8c8;"><div class="progress-bar"></div></div>
								<a href="#" class="bs-wizard-dot"></a>
								<div class="bs-wizard-info text-center">Order Place</div>
							</div>
						</div> -->
						<!-- Shopping Cart Details-->
						<div class="col-md-7">
							<div class="pck-box pck-box-shadow">
								<h2 style="font-size: 1.6667em;">Order Summary</h2>
								<div align="left">
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
										<div class="row">
											<div class="col-xs-3 col-md-2">
												<a href="javascript:void(0);">
													<img src="{{ \Cloudder::secureShow($image[0]) }}" alt="{{ $product->name }}" class="cart-img-thumb">
												</a>
											</div>
											<div class="col-xs-4 col-md-5 order-pay">
												<h5 style="line-height: 19px;">{{ $product->name }}<br>
													<span class="cart-variation"><span>Size :  {{ $variation->size->name }}</span></span><br>
													<span class="cart-variation"><span>Color : {{ $variation->color->name }}</span></span>
												</h5>
											</div>
											<div class="col-xs-3 col-md-2 font-size-13">{{ $data['qty'] }} x Qty</div>
											<div class="col-xs-2 col-md-3 font-size-13">Rs. {{ ($variation->price * $data['qty']) }}</div>
										</div>
										<hr>
									@endforeach
										<div class="row order-cart-summary" style="line-height: 2">
											<div class="col-md-6">Sub Total</div>
											<div class="col-md-6 order-cart-amount">Rs. {{ $total }}</div>
											<div class="col-md-6">Delivery Charges</div>
											<div class="col-md-6 order-cart-amount"> [+] Rs. 0</div>
											<div class="col-md-6 total">Total Amount</div>
											<div class="col-md-6 order-cart-amount total">Rs. {{ $finalAmount }}</div>
										</div>
								</div>
							</div>
							<!-- Coupons & Gift Vouchers-->
							<div class="panel panel-default pck-box-shadow">
								<div class="panel-heading"><h4 class="panel-title white-text"><a data-toggle="collapse" data-parent="#accordion" href="#promotional">Apply Your Offer or Gift Voucher</a></h4></div>
								<div class="panel-collapse collapse in" id="promotional">
									<div class="panel-body">
										<div class="col-md-12 col-xs-12">
											<label style="margin-top: 7px;">Enter MemberShip Code (?)</label>
											<div class="input-group" style="width: 50%;">
												<input class="pck-input adv gift_voucher_data" type="text" autocomplete="off" value="{{ Auth::user()->member_ship_code }}">
												<span class="input-group-btn"><button type="button" class="btn btn-danger apply_gift_voucher">Apply</button></span>
											</div>
											<span style="display: block;">
												<b>Note:</b> You Will Purchase (Rs. 2000/-) Up Shopping to get discount.
												@if(\Auth::user()->member_ship_code == null)
												<a class="pull-right getCode" style="cursor: pointer;">Get Code</a>
												@endif
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default pck-box-shadow">
								<div class="panel-heading"><h4 class="panel-title">Shipping Address Details</h4></div>
								<div class="panel-body">
									<div class="notification-area">
										<div class="info-box">
											<p><b>{{ $address->name }}</b><br><br>
												{{ $address->address }}<br>
												{{ $address->address_1 }}<br>
												{{ $address->city }} - {{ $address->pincode }}, {{ $address->state }}<br>Phone: {{ $address->mobile }}<br>
											</p>
										</div>
									</div>	
								</div>
							</div>
						</div>
						<!-- Payment Options-->
						<div class="col-md-5">
							<!--online Payment-->
							<div class="panel panel-info">
								<div class="panel-heading">
									<h4 class="panel-title white-text"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-2">Other Online Payment Options</a></h4>
								</div>
								<div class="panel-collapse collapse in" id="collapse-2">
									<div class="panel-body">
										<!-- Credit Card -->
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="101"><span class="circle"></span><span class="check"></span> Credit Card</label>
											<ul class="payment_card_img">
												<li><img src="/front/images/discover-curved-32px.png"></li><li><img src="/front/images/american-express-curved-32px.png"></li><li><img src="/front/images/mastercard-curved-32px.png"></li><li><img src="/front/images/visa-curved-32px.png"></li>
											</ul>
										</div>
										<br>
										<span>Note: Payments will be processed through a merchant account residing in <b>India</b></span>
										<hr>
										<!-- Debit Card -->
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="102"><span class="circle"></span><span class="check"></span> Debit Card</label>
											<ul class="payment_card_img">
												<li><img src="/front/images/rupay-curved-32px.png"></li><li><img src="/front/images/maestro-curved-32px.png"></li><li><img src="/front/images/mastercard-curved-32px.png"></li><li><img src="/front/images/visa-curved-32px.png"></li>
											</ul>
										</div>
										<hr>
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="103"><span class="circle"></span><span class="check"></span> Net Banking</label>
											<a class="pull-right label label-success" data-style="toast" data-content="This is a toast! Lorem lipsum dolor sit amet..." data-toggle="snackbar" data-timeout="0">Details</a>
										</div><hr>
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="1"><span class="circle"></span><span class="check"></span> Cash On Delivery</label>
											<button class="btn btn-danger btn-xs pull-right cod_place_btn" type="submit" name="PLACE_ORDER" >Place Order</button>
										</div><hr>
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="104"><span class="circle"></span><span class="check"></span> EMI Option</label>
										</div><hr>
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="107"><span class="circle"></span><span class="check"></span> UPI</label>
										</div>
										<!-- <hr> -->
										<!-- <div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="1" checked><span class="circle"></span><span class="check"></span> Order Place</label>
										</div> -->
									</div>
								</div>
							</div>
							<button type="submit" name="PLACE_ORDER" class="btn btn-placeholder btn-raised pull-right">Proceed to Pay <i class="fa fa-arrow-circle-right"></i></button>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>
@if(\Auth::user()->member_ship_code == null)
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content" style="width: 50%;margin-left: 30%;">
			<div class="modal-header">
				<h4 class="modal-title">
					MemberShip Code
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<h5 style="margin-top: 15px;">Are you sure you want to get membership ?</h5>
				</div>
			</div>
			<div class="modal-footer">
				<a href="{{ route('user.getMemberShip') }}" class="btn btn-default" id="getMemberCode">Confirm</a>
			</div>
		</div>
	</div>
</div>
@endif
	@include('user.layouts.footer')
	<!-- Core JS files -->
	<script src="/front/js/jquery.min.js" type="text/javascript"></script>
	<script src="/front/js/bootstrap-3.1.1.min.js" type="text/javascript"></script>
	<script src="/front/js/material.min.js" type="text/javascript"></script>
	<script src="/front/js/toast.js" type="text/javascript"></script>
	<script src="/front/js/script.js" type="text/javascript"></script>

	<script type="text/javascript">
		$(document).ready(function($) {
			$("body").on("click", ".scroll", function(event){     
				event.preventDefault();
				$('html,body').animate({scrollTop: "0px"},1000);
			});
			@if(\Auth::user()->member_ship_code == null)
				$('body').on('click', '.getCode', function() {
					$('#myModal').modal();
				});
			@endif
		});
	</script>
</body>
</html>
