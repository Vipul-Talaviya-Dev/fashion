@extends('user.layouts.main')

@section('title')
	{{ $product->name }}
@endsection

@section('css')
<link rel="stylesheet" href="/front/css/flexslider.css" type="text/css" media="screen" />
<style type="text/css">
	.flex-control-thumbs img {
		height: 135px;
	}
	.resp-tab-active {
	    border:1px solid #fff;
	    text-shadow: none;
	    color: #fff;
	    background:#fff;
	}
</style>
@endsection
@section('content')
<!-- Detail Start -->
<div class="single">
	<div class="container">
		<div class="col-md-4 single-left">
			<div class="flexslider">
				<ul class="slides">
					<?php
						$images = explode(',', $variation->images);
					?>
					<li data-thumb="{{ \Cloudder::secureShow($images[0]) }}">
						<div class="thumb-image">
							<img src="{{ \Cloudder::secureShow($images[0]) }}" data-imagezoom="true" class="img-responsive" alt="{{ $product->name }}">
						</div>
					</li>
					<?php
						if(count($images) > 0) {
							foreach ($images as $img) {
								echo '<li data-thumb="'.\Cloudder::secureShow($img).'">
										<div class="thumb-image">
											<img src="'.\Cloudder::secureShow($img).'" data-imagezoom="true" class="img-responsive" alt="'.$product->name.'">
										</div>
									</li>';
							}
						}
					?>
				</ul>
			</div>
		</div>
		<div class="col-md-8 single-right">
			<h3>{{ $product->name }}</h3>
			@if(false)
				<div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked>
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
				</div>
			@endif
			<div class="color-quality">
				<div class="color-quality-left">
					<h5>Color : </h5>
					<ul>
						@if($colorVariations)
							@foreach($colorVariations as $colorVariation)
								<li>
									<a href="javascript:void(0);" class="btn varbtn colorVariation" data-col="{{ $colorVariation->color_id }}"><span style="background: {{ $colorVariation->color->code  }}"></span> {{ $colorVariation->color->name }}</a>
								</li>
							@endforeach
						@endif
					</ul>
					<p><br></p>
					<h5>Select Size : </h5>
					<ul>
						@if($sizeVariations)
							@foreach($sizeVariations as $sizeVariation)
								<li>
									<a href="javascript:void(0);" class="btn varbtn variation" name="size" id="varbtn-{{ $sizeVariation->size_id }}" data-id="{{ $sizeVariation->size_id }}" data-variation="{{ $sizeVariation->id }}" data-product="{{ $product->id }}" data-col="{{ $sizeVariation->color_id }}"> {{ $sizeVariation->size->name }}</a><input type="radio" name="variation" class="radio-cust radio-variation" id="{{ $sizeVariation->size_id }}" data-col="{{ $sizeVariation->color_id }}" style="display:none;" value="{{ $sizeVariation->size_id }}">
								</li>
							@endforeach
						@endif
					</ul>
				</div>
				<div class="color-quality-right">
					<strong>Estimated Delivery</strong><br>
					<?php $date = strtotime("+7 day");
						echo date('M d', $date);
						echo "&nbsp&nbsp"."To"."&nbsp&nbsp";
						$date = strtotime("+10 day");
						echo date('M d , Y', $date);
					?>	
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="simpleCart_shelfItem">
				<p>Rs. <i class="item_price">{{ $variation->price }}</i></p>
				<p>
					@if($variation->qty == 0)
						<a href="javascript:void(0);">Out Of Stock</a>
					@else
						<a class="item_add" href="javascript:void(0);">Add to cart</a>
					@endif	
				</p>
			</div>

		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- Detail End -->

<div class="additional_info" style="padding: 0;">
	<div class="container">
		<div class="sap_tabs">	
			<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
				<ul>
					<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"></li>
					@if(false)
						<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>
					@endif	
				</ul>		
				<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
					<p>{!!  $product->description !!}</p>
				</div>	
				@if(false)
				<div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
					<h4>(2) Reviews</h4>
					<div class="additional_info_sub_grids">
						<div class="col-xs-2 additional_info_sub_grid_left">
							<img src="/front/images/1.png" alt=" " class="img-responsive" />
						</div>
						<div class="col-xs-10 additional_info_sub_grid_right">
							<div class="additional_info_sub_grid_rightl">
								<a href="javascript:void(0);">Laura</a>
								<h5>April 03, 2016.</h5>
								<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
									velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
								quo voluptas nulla pariatur.</p>
							</div>
							<div class="additional_info_sub_grid_rightr">
								<div class="rating">
									<div class="rating-left">
										<img src="/front/images/star-.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="/front/images/star-.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="/front/images/star-.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="/front/images/star.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="/front/images/star.png" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="additional_info_sub_grids">
						<div class="col-xs-2 additional_info_sub_grid_left">
							<img src="/front/images/2.png" alt=" " class="img-responsive" />
						</div>
						<div class="col-xs-10 additional_info_sub_grid_right">
							<div class="additional_info_sub_grid_rightl">
								<a href="javascript:void(0);">Michael</a>
								<h5>April 04, 2016.</h5>
								<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
									velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
								quo voluptas nulla pariatur.</p>
							</div>
							<div class="additional_info_sub_grid_rightr">
								<div class="rating">
									<div class="rating-left">
										<img src="/front/images/star-.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="/front/images/star-.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="/front/images/star.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="/front/images/star.png" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="/front/images/star.png" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="review_grids">
						<h5>Add A Review</h5>
						<form action="#" method="post">
							<input type="text" name="Name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
							<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
							<input type="text" name="Telephone" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
							<textarea name="Review" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="">Add Your Review</textarea>
							<input type="submit" value="Submit" >
						</form>
					</div>
				</div> 	
				@endif		        					            	      
			</div>	
		</div>
	</div>
</div>

<div class="w3l_related_products">
		<div class="container">
			<h3>Related Products</h3>
			<ul id="flexiselDemo2">
				@foreach($relatedProducts as $relatedProduct)
					<li>
						<?php
							if($relatedProduct->category && $relatedProduct->category->parent && $relatedProduct->category->parent->parent) {
								$url = $relatedProduct->category->parent->parent->slug.'/'.$relatedProduct->category->parent->slug.'/'.$relatedProduct->category->slug.'/'.$relatedProduct->slug;
							} else if($relatedProduct->category && $relatedProduct->category->parent) {
								$url = 'products/'.$relatedProduct->category->parent->slug.'/'.$relatedProduct->category->slug.'/'.$relatedProduct->slug;
							} else {
								$url = 'products/all/'.$relatedProduct->category->slug.'/'.$relatedProduct->slug;
							}
						?>
						<a href="/shop/{{ $url }}">
							<div class="w3l_related_products_grid">
								<div class="agile_ecommerce_tab_left dresses_grid">
									<div class="hs-wrapper hs-wrapper3">
										<?php
											$variationProduct = $relatedProduct->variation;
											$v = explode(',', $variationProduct->images);
											$image = $v[0];
										?>
										<img src="{{ \Cloudder::secureShow($image) }}" alt="{{ $relatedProduct->name }}" class="img-responsive" />
										<?php 
											foreach ($images as $image) {
												echo '<img src="'.\Cloudder::secureShow($image).'" alt="'.$relatedProduct->name.'" class="img-responsive" />';
											}
										?>
									</div>
									<h5>{{ $relatedProduct->name }}</h5>
									<div class="simpleCart_shelfItem">
										<p class="flexisel_ecommerce_cart">
											Rs. <i class="item_price">{{ $variationProduct->price }}</i>
										</p>
									</div>
								</div>
							</div>
						</a>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
@endsection

@section('js')
<script src="/front/js/jquery.flexslider.js"></script>
<script src="/front/js/imagezoom.js"></script>
<script src="/front/js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript" src="/front/js/jquery.flexisel.js"></script>
<!--quantity-->
<script type="text/javascript">
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			visibleItems: 1,
    		animationSpeed: 1000,
    		autoPlay: true,
    		autoPlaySpeed: 5000,            
    		pauseOnHover: false,
    		enableResponsiveBreakpoints: true,
			// controlNav: false,
			// direction: "horizontal",
			// controlNav: "thumbnails",

		});
		$("#flexiselDemo2").flexisel({
			visibleItems:4,
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
	$(document).ready(function() {
		$('#horizontalTab1').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion           
			width: 'auto', //auto or any width like 600px
			fit: true   // 100% fit in a container
		});
		$('body').on('click', '.value-plus1', function(){
			var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
			divUpd.text(newVal);
		});

		$('body').on('click', '.value-minus1', function(){
			var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
			if(newVal>=1) divUpd.text(newVal);
		});
	});

	$("body").on("click", ".variation", function() { 
		$(".variation").removeClass("varselected");
      	var a = $(this).attr("data-id"); // size
      	var c = $(this).attr("data-col");
      	$(".variation").removeClass("disabled");
      	var e = $(this).attr("data-product");
      	$("#varbtn-"+a).addClass("varselected");
      	$("#varbtn-"+a).addClass("disabled");

      	$(".colorVariation").each(function(index, data) {
      		var v = $(this).attr("data-col");
      		$(this).removeClass("disabled");
      		$(this).removeClass("colorSelected");
      		if(parseInt(v) == parseInt(c)) {
	      		$(this).addClass("colorSelected");
      		}
      	});
	});
</script>


<!--quantity-->
@endsection
