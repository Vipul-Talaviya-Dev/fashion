@extends('user.layouts.main')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Online Shopping')

@section('content')
<!-- banner -->
<div class="">
	<div class="bannerImg sliderfig" style="margin: 1em 0 0;">
		<ul id="banner">			
			@foreach($banners as $banner)
				<li title="{{ $banner->name }}" style="padding: 0px;">
					<img src="{{ \Cloudder::secureShow($banner->image) }}" alt="{{ $banner->name }}" class="img-responsive" />
				</li>
			@endforeach
		</ul>
	</div>
</div>
<!-- <div class="banner" id="home1">
	<div class="container">
		<h3>fashions fade, <span>style is eternal</span></h3>
	</div>
</div> -->
<!-- //banner -->

<!-- special-deals -->
<div class="special-deals">
	<div class="container">
		<h2>Special Deals</h2>
		<div class="w3agile_special_deals_grids">
			@foreach($windowImages as $windowImage)
				<a href="{{$windowImage->link}}">
					<div class="col-md-6 w3agile_special_deals_grid_left">
						<div class="w3agile_special_deals_grid_left_grid">
							<img src="{{ \Cloudder::secureShow($windowImage->image) }}" alt="{{ $windowImage->title }}" class="img-responsive" />
							<!-- <div class="w3agile_special_deals_grid_left_grid_pos1">
								<h5>30%<span>Off/-</span></h5>
							</div> -->
							<div class="w3agile_special_deals_grid_left_grid_pos">
								<h4>{{ $windowImage->title }} </h4>
							</div>
						</div>
					</div>
				</a><div class="clearfix"></div>
			@endforeach
		</div>
	</div>
</div>
<!-- //special-deals -->
<!-- new-products -->
<div class="new-products">
	<div class="container">
		<h3>New Products</h3>
		<div class="agileinfo_new_products_grids">
			@foreach($products as $product)
				<div class="col-md-3 agileinfo_new_products_grid">
					<?php
						if($product->category && $product->category->parent && $product->category->parent->parent) {
							$url = $product->category->parent->parent->slug.'/'.$product->category->parent->slug.'/'.$product->category->slug.'/'.$product->slug;
						} else if($product->category && $product->category->parent) {
							$url = 'products/'.$product->category->parent->slug.'/'.$product->category->slug.'/'.$product->slug;
						} else {
							$url = 'products/all/'.$product->category->slug.'/'.$product->slug;
						}
					?>
					<a href="/shop/{{$url}}" class="">
						<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
							<div class="hs-wrapper hs-wrapper1">
								<img src="{{ \Cloudder::secureShow($product->thumb_image) }}" alt="{{ $product->name }}" class="img-responsive" />
								<!-- <div class="w3_hs_bottom w3_hs_bottom_sub">
									<ul>
										<li>
											<a href="" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
										</li>
									</ul>
								</div> -->
							</div>
							<h5>{{ $product->name }}</h5>
							<div class="simpleCart_shelfItem">
								<p>
									<!-- <span>Rs. {{ $product->max_price }}</span>  -->
									Rs. <i class="item_price">{{ $product->price }}</i>
								</p>
								<!-- <p><a class="item_add" href="javascript:void(0);">Add to cart</a></p> -->
							</div>
						</div>
					</a>
				</div>
			@endforeach
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //new-products -->
<!-- newsletter -->
<div class="newsletter">
	<div class="container">
		<div class="col-md-6 w3agile_newsletter_left">
			<h3>SUBSCRIBE TO EMAILER</h3>
			<!-- <p>Excepteur sint occaecat cupidatat non proident, sunt.</p> -->
		</div>
		<div class="col-md-6 w3agile_newsletter_right">
			<form method="post">
				<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
				<input type="submit" value="" />
			</form>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //newsletter -->
@endsection

@section('js')
<script src="/front/js/script.js" type="text/javascript"></script>
<script src="/front/js/jquery.flexisel.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // $('.example1').wmuSlider(); // wmuSlider
    });
    // jquery.flexisel.js 
    $(window).load(function() {
    	$("#brands").flexisel({
    		visibleItems: 4,
    		animationSpeed: 1000,
    		autoPlay: true,
    		autoPlaySpeed: 3000,            
    		pauseOnHover: true,
    		enableResponsiveBreakpoints: true,
    		responsiveBreakpoints: { 
    			portrait: { 
    				changePoint:480,
    				visibleItems: 1
    			}, 
    			landscape: { 
    				changePoint:640,
    				visibleItems:2
    			},
    			tablet: { 
    				changePoint:768,
    				visibleItems: 3
    			}
    		}
    	});
    	$("#banner").flexisel({
    		visibleItems: 1,
    		animationSpeed: 1000,
    		autoPlay: true,
    		autoPlaySpeed: 5000,            
    		pauseOnHover: false,
    		enableResponsiveBreakpoints: true,
    	});

    	$(".bannerImg").find(".nbs-flexisel-nav-left").remove();
    	$(".bannerImg").find(".nbs-flexisel-nav-right").remove();
    });
</script>
@endsection
