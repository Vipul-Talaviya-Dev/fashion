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
					                <section class="size-list">
					                    <div class="_3xglSm _1iMC4O">
					                        <div class="_2yccxO D0YrLF">Types</div><svg width="20" height="27" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg" class="_3KyMh7 _2Gnm9R"><path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#f8f8f8" class="_1ooUW7"></path></svg>
					                    </div>
					                    <?php
					                    	$serchTypes = (request('types') ? explode(',', request('types')) : []);
					                    ?>
					                    @foreach($types as $type)
						                    <div class="_3mk-PQ">
						                        <div class="_36jUgy">
						                            <div class="_4IiNRh _2mtkou" title="{{ $type->name }}">
						                                <div class="_2wQvxh _1WV8jE">
						                                    <div class="_2kFyHg _2mtkou"><label><input type="checkbox" class="_3uUUD5 types" value="{{ $type->id }}"
						                                    	@if(in_array($type->id, $serchTypes))
							                                    	checked
							                                    @endif
					                                    	><div class="_1p7h2j"></div><div class="_1GEhLw">{{ $type->name }}</div></label></div>
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
					@if(count($variations) > 0)
						@foreach($variations as $variation)
							<div class="col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_dresses">
								<?php
									if($variation->product->category && $variation->product->category->parent && $variation->product->category->parent->parent) {
										$url = $variation->product->category->parent->parent->slug.'/'.$variation->product->category->parent->slug.'/'.$variation->product->category->slug.'/'.$variation->product->slug;
									} else if($variation->product->category && $variation->product->category->parent) {
										$url = 'products/'.$variation->product->category->parent->slug.'/'.$variation->product->category->slug.'/'.$variation->product->slug;
									} else {
										$url = 'products/all/'.$variation->product->category->slug.'/'.$variation->product->slug;
									}
									$url = $url.'/'.base64_encode($variation->id).'/'.str_random(25);
								?>
								<div style="position: relative;">
									<a href="/shop/{{ $url }}">
										<div class="agile_ecommerce_tab_left dresses_grid">
											<div class="hs-wrapper hs-wrapper2">
												<?php
													$v = explode(',', $variation->images);
													$image = $v[0];
												?>
												<img src="{{ \Cloudder::secureShow($image) }}" alt="{{ $variation->product->name }}" class="img-responsive {{ ($variation->qty == 0) ? 'out-stock-img' : '' }}" />
											</div>
											<h5>{{ (strlen($variation->product->name) > 15) ? substr($variation->product->name, 0, 15).'...' : $variation->product->name }}</h5>
											<div class="simpleCart_shelfItem">
												<p>Rs. <i class="item_price">{{ $variation->price }}</i></p>
												<!-- <p><a class="item_add" href="javascript:void(0);">Add to cart</a></p> -->
											</div>
										</div>
									</a>
									@if($variation->qty == 0)
										<a href="/shop/{{ $url }}" class="out-stock-list-btn">Out of Stock</a>
									@endif
								</div>
								@if($count == 3)
									<p><br></p>
									<?php $count = 1; ?>
								@else
									<?php $count++;?>
								@endif
							</div>
						@endforeach
					@else
						<div class="col-sm-12" align="center">
 							<div class="pck-box pck-box-shadow not_available" style="display: block;">
								<h4 align="center">No Products available..</h4>
							</div>
						</div>
					@endif
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
			<div align="center">{!! $variations->appends($_GET)->render() !!}</div>
	</div>
@endsection

@section('js')
<script type="text/javascript">
	$(document).ready(function() {
		var sizes = "{{ (request('sizes') ? request('sizes') : '') }}",
		colors = "{{ (request('colors') ? request('colors') : '') }}",
		types = "{{ (request('types') ? request('types') : '') }}";
		$("body").on("click", ".sizes", function() {
			sizes = $('.sizes:checked').map(function() { return this.value; }).get().join(',');
			searchRedirect(sizes, colors, types);
		});

		$("body").on("click", ".colors", function() {
			colors = $('.colors:checked').map(function() { return this.value; }).get().join(',');
			searchRedirect(sizes, colors, types);
		});

		$("body").on("click", ".types", function() {
			types = $('.types:checked').map(function() { return this.value; }).get().join(',');
			searchRedirect(sizes, colors, types);
		});

		function searchRedirect(sizes, colors, types) {
			window.location.href= "{{ route('user.products') }}?sizes="+sizes+"&colors="+colors+'&types='+types;
		}
	})
</script>
@endsection
