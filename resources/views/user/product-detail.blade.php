@extends('user.layouts.main')

@section('title')
	{{ $product->name }}
@endsection

@section('meta')
<meta name="description" content="{{ $product->meta_description }}">
<meta name="keywords" content="{{ $product->meta_keyword }}">
@endsection

@section('css')
<link rel="stylesheet" href="/front/css/flexslider.css" type="text/css" media="screen" />
<style type="text/css">
	.flex-control-thumbs img {
		height: 135px;
	}
	/*.resp-tab-active {
	    border:1px solid #fff;
	    text-shadow: none;
	    color: #fff;
	    background:#fff;
	}*/
	.modal-header {
	    padding: 1em 1em 0;	
	}
	.close {
	    font-size: 2em;
	}
	@if($variation->qty == 0)
		.flexslider {
	    	filter: blur(2px);
	    	-webkit-filter: blur(2px);
	    }
    @endif
    @media (max-width: 568px) {
    .padding-top-10 {
        margin-bottom: -20px;
    }
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
			<p><br></p>
		</div>
		<div class="col-md-8 single-right">
			<h3>{{ $product->name }} <a href="javascript:void(0);" class="pull-right default-text" data-toggle="modal" data-target="#chart">Chart</a></h3>
			<div class="color-quality">
				<div class="color-quality-left">
					<h5>Color : </h5>
					<ul>
						@if($colorVariations)
							@foreach($colorVariations as $colorVariation)
								<li style="{{ $variation->color_id == $colorVariation->color->id ? 'border: 1px solid #000;padding: 1px;' : '' }}">
									<a href="{{ $url.'/'.base64_encode($colorVariation->id).'/'.str_random(25) }}" class="btn varbtn {{ $variation->color_id == $colorVariation->color->id ? 'colorSelected' : '' }}" data-col="{{ $colorVariation->color_id }}" style="background: {{ $colorVariation->color->code  }};padding: 15px 15px;" title="{{ $colorVariation->color->name }}"></a>
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
									<a href="{{ $url.'/'.base64_encode($sizeVariation->id).'/'.str_random(25) }}" class="btn varbtn variation {{ ($variation->size_id == $sizeVariation->size->id) ? 'varselected disabled' : '' }}" name="size" id="varbtn-{{ $sizeVariation->size_id }}" data-id="{{ $sizeVariation->size_id }}" data-variation="{{ $sizeVariation->id }}" data-product="{{ $product->id }}" data-col="{{ $sizeVariation->color_id }}"> {{ $sizeVariation->size->name }}</a><input type="radio" name="variation" class="radio-cust radio-variation" id="{{ $sizeVariation->size_id }}" data-col="{{ $sizeVariation->color_id }}" style="display:none;" value="{{ $sizeVariation->size_id }}">
								</li>
							@endforeach
						@endif
					</ul>
				</div>
				<div class="color-quality-right"></div>
				<div class="clearfix"> </div>
				<p><br></p>
			</div>
			<div class="simpleCart_shelfItem">
				<p><i class="fa fa-rupee"></i> &nbsp;  <i class="item_price">{{ $variation->price }}</i></p>
			</div>
			<div class="simpleCart_shelfItem">
					@if($variation->qty == 0)
						<p><a href="javascript:void(0);">Out Of Stock</a></p>
					@else
						<p>
							<a class="item_add text-center buynow" href="javascript:void(0);" data-byNow="1">Buy Now</a>
							<a class="item_add text-center" href="javascript:void(0);" data-byNow="0">Add to cart</a>
						</p>
					@endif	
			</div>
		</div>
		<div class="clearfix"></div><br>
		<div>
			<h3 class="margin-top-25">Product Details</h3>
		</div>
		<div class="additional_info_grid product-detail">
			<p>{!!  $product->description !!}</p>
		</div>
	</div>
</div>
<!-- Detail End -->
<div class="" style="background-color: #f1f1f1;">
		<div class="container">
			<h3 class="margin-top-25">Related Products</h3>
			<ul id="flexiselDemo2">
				@foreach($relatedProducts as $relatedProduct)
					@if($relatedProduct->variation)
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
											<i class="fa fa-rupee"></i> &nbsp;  <i class="item_price">{{ $variationProduct->price }}</i>
										</p>
									</div>
								</div>
							</div>
						</a>
					</li>
					@endif
				@endforeach
			</ul>
		</div>
	</div>
<!-- Modal -->
<div id="chart" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Chart <a type="button" class="close" data-dismiss="modal">&times;</a></h4>
      </div><hr>
      <div class="modal-body">{!! $product->chart !!}</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
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
			/*controlNav: false,
			direction: "horizontal",
			controlNav: "thumbnails",*/

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
			type: 'default', /*Types: default, vertical, accordion*/
			width: 'auto', /*auto or any width like 600px*/
			fit: true   /* 100% fit in a container*/
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
      	var a = $(this).attr("data-id");
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
