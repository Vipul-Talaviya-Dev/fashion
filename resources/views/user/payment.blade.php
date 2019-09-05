<!DOCTYPE html>
<html lang="en">
<head>
	<title>Payment  | Fashion</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="theme-color" content="#f3b449">
	<link href="/front/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/material.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/toast.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/payment.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/popuo-box.css" rel="stylesheet" type="text/css" property="" media="all" />
	<link href='https://fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'> -->
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
			margin-top: -25px;
		}
		.modal-footer {
		    text-align: center; 
		    border-top: none; 
		}
		.close {
	        float: inherit;
		    font-size: 14px;
		    font-weight: normal;
		    line-height: 1;
		    color: #fff;
		    text-shadow: 0 1px 0 #fff;
		    opacity: 1;
		    line-height: 1.42857143;
		}
		.btn-danger {
		    background-color: #d0a65e;
		    border-color: #d0a65e;
		}
		.btn-danger:hover, .btn-danger:focus, .btn-danger.focus, .btn-danger:active, .btn-danger.active, .open > .dropdown-toggle.btn-danger {
			background-color: #d0a65e;
		    border-color: #d0a65e;
		}
		#myMemberDiscountModal .membershipDis {
		  width: 50%;margin-left: 30%;margin-top: 20%;
		}
		@media (min-width: 320px) and (max-width: 480px) {
		  #myMemberDiscountModal .membershipDis {
		    width: auto;margin-left: 0;margin-top: 0;
		  }
		}
	</style>
</head>

<body>
	<div id="preloader" class="loader" style="display: none;"><div id="loader"></div></div>
	<div id="page-wrapper">
		<header id="header" class="navbar-static-top">
			<div class="order-header">
				<div class="container">
					<div class="col-md-2 col-xs-12">
						<div class="width-10">
			                <img src="/front/images/logo.png" alt="Fashion" class="img-responsive" />
				        </div>
					</div>
					<div class="col-md-10 col-xs-12">
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
						<div class="col-md-7 col-xs-12">
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
											<div class="col-xs-2 col-md-3 font-size-13"><i class="fa fa-rupee"></i> &nbsp;  {{ ($variation->price * $data['qty']) }}</div>
										</div>
										<hr>
									@endforeach
										<div class="row order-cart-summary" style="line-height: 2">
											<div class="col-md-6">Sub Total</div>
											<div class="col-md-6 order-cart-amount"><i class="fa fa-rupee"></i> &nbsp;  {{ $total }}</div>
											@if(Session::get('discount') > 0)
											<div class="col-md-6">{{ (!Session::get('offer')) ? 'Member Ship Discount' : 'Discount' }}</div>
											<div class="col-md-6 order-cart-amount"> [-] <i class="fa fa-rupee"></i> &nbsp;  {{ Session::get('discount') }}</div>
											@endif
											<div class="col-md-6">Delivery Charges</div>
											<div class="col-md-6 order-cart-amount"> [+] <i class="fa fa-rupee"></i> &nbsp;  {{ $deliverCharge }}</div>
											<div class="col-md-6 total">Total Amount</div>
											<div class="col-md-6 order-cart-amount total"><i class="fa fa-rupee"></i> &nbsp;  {{ ($finalAmount - Session::get('discount')) + $deliverCharge }}</div>
										</div>
								</div>
							</div>
							@if(!Session::get('discount'))
							<!-- Coupons & Gift Vouchers-->
							@if($user->member_ship_code)
							@else
								<div class="panel panel-default pck-box-shadow">
									<div class="panel-collapse collapse in" id="promotional">
										<div class="panel-body">
											<div class="col-md-12 col-xs-12">
												<label style="margin-top: 7px;">MemberShip Terms & Conditions.</label>
												<hr>
												<ul>
													<li>1. Purchase worth Rs. 2000/- & get SHROUD membership.</li>
													<li>2. Members will get flat 20% discount on every purchase.</li>
													<li>3. Only members will eligible for discount & other offer at SHROUD.</li>
													<li>4. This membership must not be clubbed with any other offer from SHROUD.</li>
												</ul>
												@if((\Auth::user()->member_ship_code == null) && ($finalAmount >= 2000))
													<a class="pull-right getCode" style="cursor: pointer;">Get Code</a>
												@endif
											</div>
										</div>
									</div>
								</div>
							@endif

							<div class="panel panel-default pck-box-shadow">
								<div class="panel-collapse collapse in" id="promotional">
									<div class="panel-body">
										<div class="col-md-12 col-xs-12">
											<label style="margin-top: 7px;">Enter Promotion Code (?)</label>
											<div class="input-group width-50">
												<input class="pck-input adv offer_code" type="text" autocomplete="off" value="">
												<span class="input-group-btn"><button type="button" class="btn btn-danger apply_offer">Apply</button></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endif
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
						<div class="col-md-5 col-xs-12">
							<!--online Payment-->
							<div class="panel panel-info">
								<div class="panel-heading">
									<h4 class="panel-title white-text"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-2">Payment Modes</a></h4>
								</div>
								<div class="panel-collapse collapse in" id="collapse-2">
									<div class="panel-body">
										<!-- Credit Card -->
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="101"><span class="circle"></span><span class="check"></span> Credit Card</label>
											<ul class="payment_card_img">
												<li><img class="img-responsive" src="/front/images/discover-curved-32px.png"></li><li><img class="img-responsive" src="/front/images/american-express-curved-32px.png"></li><li><img class="img-responsive" src="/front/images/mastercard-curved-32px.png"></li><li><img class="img-responsive" src="/front/images/visa-curved-32px.png"></li>
											</ul>
										</div>
										<br>
										<span>Note: Payments will be processed through a merchant account residing in <b>India</b></span>
										<hr>
										<!-- Debit Card -->
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="2"><span class="circle"></span><span class="check"></span> Debit Card</label>
											<ul class="payment_card_img">
												<li><img class="img-responsive" src="/front/images/rupay-curved-32px.png"></li><li><img class="img-responsive" src="/front/images/maestro-curved-32px.png"></li><li><img class="img-responsive" src="/front/images/mastercard-curved-32px.png"></li><li><img class="img-responsive" src="/front/images/visa-curved-32px.png"></li>
											</ul>
										</div>
										<hr>
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="3"><span class="circle"></span><span class="check"></span> Net Banking</label>
											<a class="pull-right label label-success" data-style="toast" data-content="This is a toast! Lorem lipsum dolor sit amet..." data-toggle="snackbar" data-timeout="0">Details</a>
										</div><hr>
										<div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="1"><span class="circle"></span><span class="check"></span> Cash On Delivery</label>
											<button class="btn btn-danger btn-xs pull-right cod_place_btn" type="submit" name="PLACE_ORDER" >Place Order</button>
										</div><hr>
										<!-- <div class="radio radio-danger">
											<label><input type="radio" class="payment_option" name="payment_option" value="104"><span class="circle"></span><span class="check"></span> EMI Option</label>
										</div><hr> -->
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
			</section><p><br></p>
		</form>
	</div>
@if(\Auth::user()->member_ship_code == null)
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content" style="width: 50%;margin-left: 30%;margin-top: 20%;">
			<div class="modal-header">
				<h4 class="modal-title text-center">
					Membership Offer
					<!-- <button type="button" class="close">&times;</button> -->
				</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<h5 class="text-center" style="margin-top: 15px;line-height: 1.2;">Congratulations you are eligible for become MEMBER </h5>
					<!-- <h5 class="text-center" style="margin-top: 15px;line-height: 1.2;">Be the member of shroud & add more discount on your shopping.! </h5> -->
				</div>
			</div>
			<div class="modal-footer">
				<a href="{{ route('user.getMemberShip') }}" class="btn btn-danger" id="getMemberCode">Confirm</a>
					<a href="javascript:void(0);" class="btn btn-danger close">Close</a>
			</div>
		</div>
	</div>
</div>
@endif

@if((\Auth::user()->member_ship_code != null))
<div id="myMemberDiscountModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content membershipDis">
			<div class="modal-header">
				<h4 class="modal-title text-center">Membership Offer</h4>
			</div>
			<div class="modal-body" align="center"><br>
				<label style="margin-top: 7px;">Enter Membership Code</label>
				<div class="input-group">
					<input class="pck-input adv member_ship_code" type="text" autocomplete="off" value="{{ Auth::user()->member_ship_code }}">
				</div>
				<span style="display: block;">
					@if(\Auth::user()->member_ship_code == null)
					<a class="pull-right getCode" style="cursor: pointer;">Get Code</a>
					@endif
				</span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger apply_code">Apply</button>
				<a href="javascript:void(0);" class="btn btn-danger close">Close</a>
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
		$(document).ready(function() {
			$("body").on("click", ".scroll", function(event){     
				event.preventDefault();
				$('html,body').animate({scrollTop: "0px"},1000);
			});
			@if(Cookie::get('userCloseModel'))

			@elseif((\Auth::user()->member_ship_code == null) && ($finalAmount >= 2000))
				$('#myModal').modal();

			@endif
			$('body').on('click', '.getCode', function() {
				$('#myModal').modal();
			});

			$("body").on("click", ".close", function() {
				$('#myModal').modal("hide");
				$('#myMemberDiscountModal').modal("hide");
				<?php
					Cookie::queue("userCloseModel", 1, 30);
				?>
			});
			@if((\Auth::user()->member_ship_code != null))
				@if(!Session::get('discount'))
					$('#myMemberDiscountModal').modal();
				@endif
			@endif
		});
	</script>
</body>
</html>
