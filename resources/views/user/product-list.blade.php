@extends('user.layouts.main')

@section('title', 'Fashion')

@section('content')
<div class="dresses">
		<div class="container">
			<div class="w3ls_dresses_grids">
				<div class="col-md-4 w3ls_dresses_grid_left">
					<div class="w3ls_dresses_grid_left_grid">
						<h3>Categories</h3>
						<div class="w3ls_dresses_grid_left_grid_sub">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
								  <h4 class="panel-title asd">
									<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>New Arrivals
									</a>
								  </h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								  <div class="panel-body panel_text">
									<ul>
										<li><a href="dresses.html">Dresses</a></li>
										<li><a href="sweaters.html">Sweaters</a></li>
										<li><a href="skirts.html">Shorts & Skirts</a></li>
										<li><a href="jeans.html">Jeans</a></li>
										<li><a href="shirts.html">Shirts</a></li>
									</ul>
								  </div>
								</div>
							  </div>
							  <div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingTwo">
								  <h4 class="panel-title asd">
									<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Foot Wear
									</a>
								  </h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								   <div class="panel-body panel_text">
									<ul>
										<li><a href="sandals.html">Flats</a></li>
										<li><a href="sandals.html">Sandals</a></li>
										<li><a href="sandals.html">Boots</a></li>
										<li><a href="sandals.html">Heals</a></li>
										<li><a href="sandals.html">Shirts</a></li>
									</ul>
								  </div>
								</div>
							  </div>
							</div>
							<ul class="panel_bottom">
								<li><a href="products.html">Summer Store</a></li>
								<li><a href="dresses.html">New In Clothing</a></li>
								<li><a href="sandals.html">New In Shoes</a></li>
								<li><a href="products.html">Latest Watches</a></li>
							</ul>
						</div>
					</div>
					<div class="w3ls_dresses_grid_left_grid">
						<h3>Color</h3>
						<div class="w3ls_dresses_grid_left_grid_sub">
							<div class="ecommerce_color">
								<ul>
									<li><a href="#"><i></i> Red(5)</a></li>
									<li><a href="#"><i></i> Brown(2)</a></li>
									<li><a href="#"><i></i> Yellow(3)</a></li>
									<li><a href="#"><i></i> Violet(6)</a></li>
									<li><a href="#"><i></i> Orange(2)</a></li>
									<li><a href="#"><i></i> Blue(1)</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="w3ls_dresses_grid_left_grid">
						<h3>Size</h3>
						<div class="w3ls_dresses_grid_left_grid_sub">
							<div class="ecommerce_color ecommerce_size">
								<ul>
									<li><a href="#">Medium</a></li>
									<li><a href="#">Large</a></li>
									<li><a href="#">Extra Large</a></li>
									<li><a href="#">Small</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 w3ls_dresses_grid_right">
					@if(false)
					<div class="w3ls_dresses_grid_right_grid2">
						<div class="w3ls_dresses_grid_right_grid2_right">
							<select name="select_item" class="select_item">
								<option selected="selected">Default sorting</option>
								<option>Sort by popularity</option>
								<option>Sort by average rating</option>
								<option>Sort by newness</option>
								<option>Sort by price: low to high</option>
								<option>Sort by price: high to low</option>
							</select>
						</div>
						<div class="clearfix"> </div>
					</div>
					@endif
					<div class="w3ls_dresses_grid_right_grid3">
						<?php $count = 1; ?>
						@foreach($products as $product)
						<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
							<?php
								if($product->category && $product->category->parent && $product->category->parent->parent) {
									$url = $product->category->parent->parent->slug.'/'.$product->category->parent->slug.'/'.$product->category->slug.'/'.$product->slug;
								} else if($product->category && $product->category->parent) {
									$url = 'products/'.$product->category->parent->slug.'/'.$product->category->slug.'/'.$product->slug;
								} else {
									$url = 'products/all/'.$product->category->slug.'/'.$product->slug;
								}
							?>
							<a href="/shop/{{ $url }}">
								<div class="agile_ecommerce_tab_left dresses_grid">
									<div class="hs-wrapper hs-wrapper2">
										<?php
											$variation = $product->variation;
											$v = explode(',', $variation->images);
											$image = $v[0];
										?>
										<img src="{{ \Cloudder::secureShow($image) }}" alt="{{ $product->name }}" class="img-responsive" />
									</div>
									<h5>{{ (strlen($product->name) > 15) ? substr($product->name, 0, 15).'...' : $product->name }}</h5>
									<div class="simpleCart_shelfItem">
										<p>Rs. <i class="item_price">{{ $variation->price }}</i></p>
										<!-- <p><a class="item_add" href="javascript:void(0);">Add to cart</a></p> -->
									</div>
								</div>
							</a>
							@if($count == 3)
								<p><br></p>
								<?php $count = 1; ?>
							@else
								<?php $count++;?>
							@endif
						</div>
						@endforeach
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
			<div align="center">{{ $products->links() }}</div>
	</div>
@endsection
