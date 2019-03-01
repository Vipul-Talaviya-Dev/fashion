@extends('user.layouts.main')

@section('title', 'Cart')

@section('content')
<div class="checkout" style="padding: 2em;">
	<div class="container">
		<!-- <h3>Your shopping cart contains: <span>3 Products</span></h3> -->
		<div class="row">
			<table class="timetable_sub table-reponsive" >
				<thead>
					<tr>
						<th>SL No.</th>	
						<th colspan="2">Item Detail</th>
						<th>Quality</th>
						<th>Price</th>
						<th>Remove</th>
					</tr>
				</thead>
				<?php
				$total = 0;
				$finalAmount = 0;
				?>
				@foreach(\Session::get('cart') as $cartId => $cart)
				<?php
					$cartId++;
					$product = \App\Models\Product::find($cart['cart_product_id']);
					$variation = $product->variations()->find($cart['variation_id']);

					$total += $variation->price;
					$finalAmount = $total;
					$image = explode(',', $variation->images);
				?>
				<tr class="rem{{ $cartId }}">
					<td class="invert">{{ $cartId }}</td>
					<td class="invert-image"><img src="{{ \Cloudder::secureShow($image[0]) }}" class="img-responsive cart-thumb-img" alt="{{ $product->name }}"></td>
					<td class="invert">
						<p>{{ $product->name }}</p><br>
						<p>Color: <b>{{ $variation->color->name }}</b></p><br>
						<p>Size: <b>{{ $variation->size->name }}</b></p> 
					</td>
					<td class="invert">
						<div class="quantity"> 
							<div class="quantity-select">                           
								<div class="entry value-minus btn-number" data-type="minus" data-field="{{ $variation->id }}">&nbsp;</div>
								<span><input type="text" style="text-align: center;" name="{{ $variation->id }}" readonly data-field="{{ $variation->id }}" class="value input-number update-qty" value="1" min="1" max="{{ $variation->qty }}" size="2"></span>
								<div class="entry value-plus btn-number" data-type="plus" data-field="{{ $variation->id }}">&nbsp;
								</div>
							</div>
						</div>
						<span class="max-qty-reach-{{ $variation->id }}"></span>
					</td>
					<td class="cart-td-border" style="display:none;">
						<input type="hidden" class="p_id" value="{{ $product->id }}">
						<input type="hidden" class="variation_id" value="{{ $variation->id }}">
						<span id="product_subtotal1{{ $variation->id }}" >{{ $variation->price }}</span>
					</td>
					<td class="invert">Rs. <span class="cart-subtotal sellingprice" id="product_subtotal{{ $variation->id }}">{{ $variation->price }}</span></td>
					<td class="invert">
						<div class="rem">
							<div class="close1 removeItem" style="right: 60px;" data-id="{{ $cart['cart_id'] }}"></div>
						</div>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		<div class="clearfix"></div>
		<p><br></p>
		<div class="row pull-right">	
			<div class="cart-totals">
				<table id="shopping-cart-totals-table">
					<tbody>
						<tr>
							<td colspan="4">Subtotal</td>
							<td> Rs.<span class="price" id="total">{{ $total }}</span></td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4"><strong>Grand Total</strong></td>
							<td><strong> Rs. <span id="finalPrice">{{ $finalAmount }}</span></strong></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"></div>
		<p><br></p>
		<hr>
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 pull-left">
				<a href="/" class="checkout-btn"><i class="glyphicon glyphicon-menu-left" aria-hidden="true"></i> Continue Shopping</a>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12 pull-right">
				<a href="javascript:void(0);" class="checkout-btn pull-right" id="orderContinue"> Checkout <i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
	$(document).ready(function () {
		$("body").on("click", ".btn-number", function(e) {
			e.preventDefault();
			fieldName = $(this).attr('data-field');
			type      = $(this).attr('data-type');
			var input = $("input[name='"+fieldName+"']");
			var price = document.getElementById('product_subtotal1'+fieldName).innerHTML;
			var currentVal = parseInt(input.val());
			if (!isNaN(currentVal)) {
				if(type == 'minus') {
					if(currentVal > input.attr('min')) {
						input.val(currentVal - 1).change();
						document.getElementById('product_subtotal'+fieldName).innerHTML = price *(currentVal - 1);
						$('.error-'+fieldName).remove();
					} 
					if(parseInt(input.val()) == input.attr('min')) {
						$('.error-'+fieldName).remove();
						$(this).attr('disabled', true);
					}

				} else if (type == 'plus') {
					if(currentVal < input.attr('max')) {
						input.val(currentVal + 1).change();
						document.getElementById('product_subtotal'+fieldName).innerHTML = price *(currentVal + 1);
					}
					if(parseInt(input.val()) == input.attr('max')) {
						$('.error-'+fieldName).remove();
						$('.max-qty-reach-'+fieldName).after('<span class="input-error error-'+fieldName+'" style="color: red;">Max Quantity Reach</span>');
						$(this).attr('disabled', true);
					}
				}
			} else {
				input.val(0);
			}
			//total of selling price
			var sum = 0;
			$('.sellingprice').each(function(){
				sum += parseInt($(this).text());  
			});
			document.getElementById('total').innerHTML = sum;
			//final amount
			document.getElementById('finalPrice').innerHTML = parseInt(sum);
		});

		$('.input-number').focusin(function(){
			$(this).data('oldValue', $(this).val());
		});
		$('.input-number').change(function() {
			minValue =  parseInt($(this).attr('min'));
			maxValue =  parseInt($(this).attr('max'));
			valueCurrent = parseInt($(this).val());
			name = $(this).attr('name');
			if(valueCurrent >= minValue) {
				$(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
			} 
			if(valueCurrent <= maxValue) {
				$(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
			} 
		});

		$("body").on("click", "#orderContinue", function(){
			var product_id   = $('.p_id').map(function(){ return this.value;}).get();
			var product_qty  = $('.update-qty').map(function(){ return this.value;}).get();
			var variation_id  = $('.variation_id').map(function(){ return this.value;}).get();
			var total        = document.getElementById('total').innerHTML;
			var finalamount  = document.getElementById('finalPrice').innerHTML;
			if(product_id == "" || product_qty == "" || variation_id == "" || total == "" || finalamount == "") {
				window.location.href = "/";
			}

			show_loader();
			$.ajax({ 
				type: "POST",
				cache: false,
				url: '{{ route("user.cartOrderDetail") }}',
				data: {finalamount:finalamount,product_qty:product_qty,total:total,product_id:product_id,variation_id:variation_id, '_token': '{{ csrf_token() }}'},
				success: function(result) {
					if (result.status) {
			            window.location.href = "{{route('user.orderShipping')}}";
			        } else {
			        	toastr.warning(result.error);
			        }
					hide_loader();
				}
			});
		});

	});
</script>
@endsection
