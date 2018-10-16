@extends('user.layouts.main')

@section('title', 'Fashion')

@section('css')
<link rel="stylesheet" href="/front/css/flexslider.css" type="text/css" media="screen" />
@endsection
@section('content')
<!-- Detail Start -->
<div class="single">
	<div class="container">
		<div class="col-md-4 single-left">
			<div class="flexslider">
				<ul class="slides">
					<li data-thumb="/front/images/a.jpg">
						<div class="thumb-image"> <img src="/front/images/a.jpg" data-imagezoom="true" class="img-responsive"> </div>
					</li>
					<li data-thumb="/front/images/b.jpg">
						<div class="thumb-image"> <img src="/front/images/b.jpg" data-imagezoom="true" class="img-responsive"> </div>
					</li>
					<li data-thumb="/front/images/c.jpg">
						<div class="thumb-image"> <img src="/front/images/c.jpg" data-imagezoom="true" class="img-responsive"> </div>
					</li> 
				</ul>
			</div>
		</div>
		<div class="col-md-8 single-right">
			<h3>Swan Miami Red Skirt</h3>
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
			<div class="description">
				<h5><i>Description</i></h5>
				<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
					eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
					Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut 
					odit aut fugit, sed quia consequuntur magni dolores eos qui 
				ratione voluptatem sequi nesciunt.</p>
			</div>
			<div class="color-quality">
				<div class="color-quality-left">
					<h5>Color : </h5>
					<ul>
						<li><a href="#"><span></span>Red</a></li>
						<li><a href="#" class="brown"><span></span>Yellow</a></li>
						<li><a href="#" class="purple"><span></span>Purple</a></li>
						<li><a href="#" class="gray"><span></span>Violet</a></li>
					</ul>
				</div>
				<div class="color-quality-right">
					<h5>Quality :</h5>
					<div class="quantity"> 
						<div class="quantity-select">                           
							<div class="entry value-minus1">&nbsp;</div>
							<div class="entry value1"><span>1</span></div>
							<div class="entry value-plus1 active">&nbsp;</div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="occasional">
				<h5>Occasion :</h5>
				<div class="colr ert">
					<div class="check">
						<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Occasion Wear</label>
					</div>
				</div>
				<div class="colr">
					<div class="check">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Party Wear</label>
					</div>
				</div>
				<div class="colr">
					<div class="check">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Formal Wear</label>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="simpleCart_shelfItem">
				<p><span>$320</span> <i class="item_price">$250</i></p>
				<p><a class="item_add" href="#">Add to cart</a></p>
			</div>

		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- Detail End -->
<div class="additional_info">
	<div class="container">
		<div class="sap_tabs">	
			<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
				<ul>
					<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Information</span></li>
					<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>
				</ul>		
				<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
					<h3>Swan Miami Red Skirt</h3>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
						eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
						Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut 
						odit aut fugit, sed quia consequuntur magni dolores eos qui 
						ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum 
						exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea 
						commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate 
						velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
					quo voluptas nulla pariatur.</p>
				</div>	

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
			</div>	
		</div>
	</div>
</div>

<div class="w3l_related_products">
		<div class="container">
			<h3>Related Products</h3>
			<ul id="flexiselDemo2">			
				<li>
					<div class="w3l_related_products_grid">
						<div class="agile_ecommerce_tab_left dresses_grid">
							<div class="hs-wrapper hs-wrapper3">
								<img src="/front/images/ss1.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss2.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss3.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss4.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss5.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss6.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss7.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss8.jpg" alt=" " class="img-responsive">
								<div class="w3_hs_bottom">
									<div class="flex_ecommerce">
										<a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</div>
								</div>
							</div>
							<h5><a href="single.html">Pink Flared Skirt</a></h5>
							<div class="simpleCart_shelfItem">
								<p class="flexisel_ecommerce_cart"><span>$312</span> <i class="item_price">$212</i></p>
								<p><a class="item_add" href="#">Add to cart</a></p>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="w3l_related_products_grid">
						<div class="agile_ecommerce_tab_left dresses_grid">
							<div class="hs-wrapper hs-wrapper3">
								<img src="/front/images/ss2.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss3.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss4.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss5.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss6.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss9.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss7.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss8.jpg" alt=" " class="img-responsive">
								<div class="w3_hs_bottom">
									<div class="flex_ecommerce">
										<a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</div>
								</div>
							</div>
							<h5><a href="single.html">Red Pencil Skirt</a></h5>
							<div class="simpleCart_shelfItem">
								<p class="flexisel_ecommerce_cart"><span>$432</span> <i class="item_price">$323</i></p>
								<p><a class="item_add" href="#">Add to cart</a></p>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="w3l_related_products_grid">
						<div class="agile_ecommerce_tab_left dresses_grid">
							<div class="hs-wrapper hs-wrapper3">
								<img src="/front/images/ss3.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss4.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss5.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss6.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss7.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss8.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss9.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss1.jpg" alt=" " class="img-responsive">
								<div class="w3_hs_bottom">
									<div class="flex_ecommerce">
										<a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</div>
								</div>
							</div>
							<h5><a href="single.html">Yellow Cotton Skirt</a></h5>
							<div class="simpleCart_shelfItem">
								<p class="flexisel_ecommerce_cart"><span>$323</span> <i class="item_price">$310</i></p>
								<p><a class="item_add" href="#">Add to cart</a></p>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="w3l_related_products_grid">
						<div class="agile_ecommerce_tab_left dresses_grid">
							<div class="hs-wrapper hs-wrapper3">
								<img src="/front/images/ss4.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss5.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss6.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss7.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss8.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss9.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss1.jpg" alt=" " class="img-responsive">
								<img src="/front/images/ss2.jpg" alt=" " class="img-responsive">
								<div class="w3_hs_bottom">
									<div class="flex_ecommerce">
										<a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</div>
								</div>
							</div>
							<h5><a href="single.html">Black Short</a></h5>
							<div class="simpleCart_shelfItem">
								<p class="flexisel_ecommerce_cart"><span>$256</span> <i class="item_price">$200</i></p>
								<p><a class="item_add" href="#">Add to cart</a></p>
							</div>
						</div>
					</div>
				</li>
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
			controlNav: "thumbnails"
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
</script>
<!--quantity-->
@endsection
