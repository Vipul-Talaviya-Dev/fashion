<!DOCTYPE html>
<html lang="en">
<head>
	<title>Payment</title>
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
</head>

<body>
	<div id="preloader" class="loader" style="display: none;"><div id="loader"></div></div>
	<div id="page-wrapper">
		<header id="header" class="navbar-static-top">
			<div class="order-header">
				<div class="container">
					<div class="col-md-2"><img class="order-logo" src="https://tymkpck001.s3.amazonaws.com/assets/images/logoPCK.png" alt="Purchasekaro.com | India`s Emerging Online Shopping Website"></div>
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
		<form action="" method="post">
			{{ csrf_field() }}
			<div data-alerts="alerts"></div>
			<section id="content" class="gray-area">
				<div class="container">
					<div class="row">
						<div class="row bs-wizard" style="border-bottom:0;">
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
						</div>
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

									$total += ($product->price * $data['qty']);
									$finalAmount = $total;
									?>
										<div class="row">
											<div class="col-xs-3 col-md-2">
												<a href="javascript:void(0);">
													<img src="{{ \Cloudder::secureShow($product->thumb_image) }}" alt="{{ $product->name }}" class="cart-img-thumb">
												</a>
											</div>
											<div class="col-xs-4 col-md-5 order-pay">
												<h5 style="line-height: 19px;">{{ $product->name }}<br>
													<span class="cart-variation"><span>Size :  {{ $variation->size->name }}</span></span><br>
													<span class="cart-variation"><span>Color : {{ $variation->color->name }}</span></span>
												</h5>
											</div>
											<div class="col-xs-3 col-md-2 font-size-13">{{ $data['qty'] }} x Qty</div>
											<div class="col-xs-2 col-md-3 font-size-13">Rs. {{ ($product->price * $data['qty']) }}</div>
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
							<div class="panel panel-warning">
								<div class="panel-heading"><h4 class="panel-title white-text"><a data-toggle="collapse" data-parent="#accordion" href="#promotional">Apply Your Offer or Gift Voucher</a></h4></div>
								<div class="panel-collapse collapse in" id="promotional">
									<div class="panel-body">
										<div class="row">
											<div class="col-md-6">
												<label style="margin-top: 7px;">Enter Gift Voucher (?)</label>
												<div class="input-group">
													<input class="pck-input adv gift_voucher_data" type="text" autocomplete="off">
													<span class="input-group-btn"><button type="button" class="btn btn-danger apply_gift_voucher">Apply</button></span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="radio radio-inline checked">
													<label><input type="radio" name="offer_type" value="2" checked=""><span class="circle"></span><span class="check"></span> Coupon Code</label>
												</div>
												<div class="input-group">
													<input class="pck-input adv offer_value" type="text" autocomplete="off" placeholder="Enter Coupon Code">
													<span class="input-group-btn"><button type="button" class="btn btn-warning apply_offer">Apply</button></span>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="panel panel-info">
								<div class="panel-heading"><h4 class="panel-title white-text">Shipping Address Details</h4></div>
								<div class="panel-body">
									<div class="notification-area">
										<div class="info-box">
											<p><b>Vipul patel</b><br><br>
												614, Shree Ram Chambers, Opp: Circuit House, R.C.Dutt Road, Alkapuri, Vadodara (Guj) -390007Opp: Circuit House<br>
												VADODARA - 390007,Gujarat<br>Phone: 9998363518<br>
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
										@if(false)
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="101"><span class="circle"></span><span class="check"></span> Credit Card</label>
											<ul class="payment_card_img">
												<li><img src="https://tymkpck001.s3.amazonaws.com/assets/images/discover-curved-32px.png"></li><li><img src="https://tymkpck001.s3.amazonaws.com/assets/images/american-express-curved-32px.png"></li><li><img src="https://tymkpck001.s3.amazonaws.com/assets/images/mastercard-curved-32px.png"></li><li><img src="https://tymkpck001.s3.amazonaws.com/assets/images/visa-curved-32px.png"></li>
											</ul>
										</div>
										<br>
										<span>Note: Payments will be processed through a merchant account residing in <b>India</b></span>
										<hr>
										<!-- Debit Card -->
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="102"><span class="circle"></span><span class="check"></span> Debit Card</label>
											<ul class="payment_card_img">
												<li><img src="https://tymkpck001.s3.amazonaws.com/assets/images/rupay-curved-32px.png"></li><li><img src="https://tymkpck001.s3.amazonaws.com/assets/images/maestro-curved-32px.png"></li><li><img src="https://tymkpck001.s3.amazonaws.com/assets/images/mastercard-curved-32px.png"></li><li><img src="https://tymkpck001.s3.amazonaws.com/assets/images/visa-curved-32px.png"></li>
											</ul>
										</div>
										<hr>
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="103"><span class="circle"></span><span class="check"></span> Net Banking</label>
											<a class="pull-right label label-success" data-style="toast" data-content="This is a toast! Lorem lipsum dolor sit amet..." data-toggle="snackbar" data-timeout="0">Details</a>
										</div><hr>
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="501"><span class="circle"></span><span class="check"></span> Cash On Delivery</label>
											<button class="btn btn-danger btn-xs pull-right cod_place_btn" type="submit" name="PLACE_ORDER" style="    margin-top: -25px;">Place Order</button>
										</div><hr>
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="104"><span class="circle"></span><span class="check"></span> EMI Option</label>
										</div><hr>
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="107"><span class="circle"></span><span class="check"></span> UPI</label>
										</div>
										<hr>
										@endif
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="1" checked><span class="circle"></span><span class="check"></span> Order Place</label>
										</div>
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
		});
	</script>
</body>
</html>
