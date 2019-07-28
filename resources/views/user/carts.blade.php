<style type="text/css">
.modal-body p {
    margin-top: 0;
}
</style>
<div id="cartLoad" class="modal fade in top-65" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="border-bottom: 1px solid #e5e5e5;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;</button>
				<h4 class="modal-title" id="myModalLabel" style="padding-left: 0;">Shopping Cart</h4>
			</div>
			@if(\Session::get('cart') != null)
			<div class="modal-body" style="padding: 0px;">
				<div style="margin: 10px 30px 0px 30px;">
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
									<p>Color: <span class="btn colorSelected" style="background: {{ $variation->color->code  }};padding: 15px 15px;" title="{{ $variation->color->name }}"></span></p><br>
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
								<td class="invert"><i class="fa fa-rupee"></i> &nbsp;  <span class="cart-subtotal sellingprice" id="product_subtotal{{ $variation->id }}">{{ $variation->price }}</span></td>
								<td class="invert">
									<span><button type="button" class="fa fa-times removeItem" data-id="{{ $cart['cart_id'] }}"></button></span>
								</td>
							</tr>
							@endforeach
						</table>
					</div>
					<div class="clearfix"></div>
					<p><br></p>
					<div class="row">
						<div class="row pull-left" style="margin-left: 40px;">
							<label style="margin-top: 7px;">MemberShip Terms & Conditions.</label>
							<hr>
							<ul style="list-style: none;">
								<li>1. Purchase worth Rs. 2000/- & get SHROUD membership.</li>
								<li>2. Members will get flat 20% discount on every purchase.</li>
								<li>3. Only members will eligible for discount & other offer at SHROUD.</li>
								<li>4. This membership must not be clubbed with any other offer from SHROUD.</li>
							</ul>
						</div>
						<div class="row pull-right">	
							<div class="cart-totals">
								<table id="shopping-cart-totals-table">
									<tbody>
										<tr>
											<td colspan="4">Subtotal</td>
											<td> <i class="fa fa-rupee"></i> &nbsp; <span class="price" id="total">{{ $total }}</span></td>
										</tr>
										<tr>
											<td colspan="4">Delivery Charge</td>
											<td> <i class="fa fa-rupee"></i> &nbsp; <span id="deliverCharge">{{ $deliverCharge }}</span></td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4"><strong>Grand Total</strong></td>
											<td><strong> <i class="fa fa-rupee"></i> &nbsp;  <span id="finalPrice">{{ $finalAmount+$deliverCharge }}</span></strong></td>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="modal-footer">
				<a href="{{ route('user.products') }}" class="checkout-btn pull-left"><i class="glyphicon glyphicon-menu-left" aria-hidden="true"></i> Continue Shopping</a>

				<a href="javascript:void(0);" class="checkout-btn pull-right" id="orderContinue"> Checkout <i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i></a>
			</div>
			@else
			<div class="modal-body modal-body-sub" align="center">
				<div><img src="/front/images/cart-3.png" style="width: 50%;" class="img-responsive"></div>
			</div>
			<div class="modal-footer">
				<a href="/" class="checkout-btn pull-right"> GO FOR SHOPPING</a>
			</div>
			@endif
			<p><br></p><p><br></p>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function () {
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