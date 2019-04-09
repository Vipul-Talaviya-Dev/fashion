@extends('user.layouts.main')

@section('title', 'Our Product List')

@section('css')
<link rel="stylesheet" href="/front/css/product-filter.css" type="text/css" media="screen" />
<style type="text/css">
	.body {
		background: #f3f3f3;
	}
</style>
@endsection

@section('content')
<div class="dresses">
		<div class="container">
			<div class="w3ls_dresses_grids">
				<div class="col-md-4 w3ls_dresses_grid_left">
					<div class="filters">
						<div class="product-filter col-md-12">
							<div class="bhgxx2 col-md-12">
								<div class="list">
									<section class="reset-filter-part">
					                    <div class="filter-title">
					                        <div class="filter-text"><span>Filters</span></div>
					                        <a href="{{ route('user.products') }}" class="filter-clear-all"><span>Clear all</span></a>
					                    </div>
					                </section>
					                <section class="size-list">
					                    <div class="_3xglSm _1iMC4O">
					                        <div class="_2yccxO D0YrLF">Size</div><svg width="20" height="27" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg" class="_3KyMh7 _2Gnm9R"><path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#f8f8f8" class="_1ooUW7"></path></svg>
					                    </div>
					                    <?php
					                    	$serchSizes = (request('sizes') ? explode(',', request('sizes')) : []);
					                    ?>
					                    @foreach($sizes as $size)
						                    <div class="_3mk-PQ">
						                        <div class="_36jUgy">
						                            <div class="_4IiNRh _2mtkou" title="{{ $size->name }}">
						                                <div class="_2wQvxh _1WV8jE">
						                                    <div class="_2kFyHg _2mtkou"><label><input type="checkbox" class="_3uUUD5 sizes" value="{{ $size->id }}"
						                                    @if(in_array($size->id, $serchSizes))
						                                    	checked
						                                    @endif 
					                                    	><div class="_1p7h2j"></div><div class="_1GEhLw">{{ $size->name }}</div></label></div>
						                                </div>
						                            </div>
						                        </div>
						                    </div>
					                    @endforeach
					                </section>
					                <section class="size-list">
					                    <div class="_3xglSm _1iMC4O">
					                        <div class="_2yccxO D0YrLF">Color</div><svg width="20" height="27" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg" class="_3KyMh7 _2Gnm9R"><path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#f8f8f8" class="_1ooUW7"></path></svg>
					                    </div>
					                    <?php
					                    	$serchColors = (request('colors') ? explode(',', request('colors')) : []);
					                    ?>
					                    @foreach($colors as $color)
						                    <div class="_3mk-PQ">
						                        <div class="_36jUgy">
						                            <div class="_4IiNRh _2mtkou" title="{{ $color->name }}">
						                                <div class="_2wQvxh _1WV8jE">
						                                    <div class="_2kFyHg _2mtkou"><label><input type="checkbox" class="_3uUUD5 colors" value="{{ $color->id }}"
						                                    	@if(in_array($color->id, $serchColors))
							                                    	checked
							                                    @endif
					                                    	><div class="_1p7h2j"></div><div class="_1GEhLw">{{ $color->name }}</div></label></div>
						                                </div>
						                            </div>
						                        </div>
						                    </div>
					                    @endforeach
					                </section>
								</div>
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
						@if($product->variation)
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
						@endif
						@endforeach
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
			<div align="center">{!! $products->appends($_GET)->render() !!}</div>
	</div>
@endsection

@section('js')
<script type="text/javascript">
	$(document).ready(function() {
		var sizes = "{{ (request('sizes') ? request('sizes') : '') }}",
		colors = "{{ (request('colors') ? request('colors') : '') }}";
		$("body").on("click", ".sizes", function() {
			sizes = $('.sizes:checked').map(function() { return this.value; }).get().join(',');
			searchRedirect(sizes, colors);
		});

		$("body").on("click", ".colors", function() {
			colors = $('.colors:checked').map(function() { return this.value; }).get().join(',');
			searchRedirect(sizes, colors);
		});

		function searchRedirect(sizes, colors) {
			window.location.href= "{{ route('user.products') }}?sizes="+sizes+"&colors="+colors;
		}
	})
</script>
@endsection
