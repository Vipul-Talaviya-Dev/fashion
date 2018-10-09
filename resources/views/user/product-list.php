@extends('user.layouts.main')

@section('title', 'Fashion')

@section('content')
<!-- banner -->
<div class="banner" id="home1">
	<div class="container">
		<h3>fashions fade, <span>style is eternal</span></h3>
	</div>
</div>
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
					<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
						<div class="hs-wrapper hs-wrapper1">
							<img src="{{ \Cloudder::secureShow($product->thumb_image) }}" alt="{{ $product->name }}" class="img-responsive" />
							<?php 
								$images = explode(',', $product->small_image);
								foreach ($images as $image) {
									echo '<img src="'.\Cloudder::secureShow($image).'" alt="'.$product->name.'" class="img-responsive" />';
									
								}
							?>
							<div class="w3_hs_bottom w3_hs_bottom_sub">
								<ul>
									<li>
										<a href="" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</li>
								</ul>
							</div>
						</div>
						<h5>
							<?php
								if($product->category && $product->category->parent && $product->category->parent->parent) {
									$url = $product->category->parent->parent->slug.'/'.$product->category->parent->slug.'/'.$product->category->slug.'/'.$product->slug;
								} else if($product->category && $product->category->parent) {
									$url = $product->category->parent->slug.'/'.$product->category->slug.'/'.$product->slug;
								} else {
									$url = $product->category->slug.'/'.$product->slug;
								}
								echo '<a href="'.$url.'">'.$product->name.'</a>';
							
							?>
						</h5>
						<div class="simpleCart_shelfItem">
							<p><span>{{ $product->max_price }}</span> <i class="item_price">{{ $product->price }}</i></p>
							<p><a class="item_add" href="javascript:void(0);">Add to cart</a></p>
						</div>
					</div>
				</div>
			@endforeach
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //new-products -->
<!-- top-brands -->
<div class="top-brands">
	<div class="container">
		<h3>Top Brands</h3>
		<div class="sliderfig">
			<ul id="flexiselDemo1">			
				@foreach($brands as $brand)
					<li title="{{ $brand->name }}">
						<img src="{{ \Cloudder::secureShow($brand->image) }}" alt="{{ $brand->name }}" class="img-responsive" />
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
<!-- //top-brands -->
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
<script src="/front/js/easyResponsiveTabs.js" type="text/javascript"></script>
<script src="/front/js/jquery.magnific-popup.js" type="text/javascript"></script>
<script src="/front/js/jquery.countdown.js" type="text/javascript"></script>
<script src="/front/js/script.js" type="text/javascript"></script>
<script src="/front/js/jquery.wmuSlider.js" type="text/javascript"></script>
<script src="/front/js/jquery.flexisel.js" type="text/javascript"></script>
<script src="/front/js/modernizr.min.js" type="text/javascript"></script>
<script type="text/javascript">
    // easyResponsiveTabs.js
    $(document).ready(function () {
    	$('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
        // magnific-popup.js
        $('.popup-with-zoom-anim').magnificPopup({
        	type: 'inline',
        	fixedContentPos: false,
        	fixedBgPos: true,
        	overflowY: 'auto',
        	closeBtnInside: true,
        	preloader: false,
        	midClick: true,
        	removalDelay: 300,
        	mainClass: 'my-mfp-zoom-in'
        });

        $('.example1').wmuSlider(); // wmuSlider
    });
    // jquery.flexisel.js 
    $(window).load(function() {
    	$("#flexiselDemo1").flexisel({
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
    });
</script>
@endsection
