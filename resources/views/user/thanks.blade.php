@extends('user.layouts.main')

@section('title', 'Thanks For Shopping with us')

@section('css')
<style type="text/css">
.total {
    display: contents;
    vertical-align: middle;
}
.btn-success, .btn-danger {
    background-color: #d0a65e;
    border-color: #d0a65e;
}
.btn-success:hover, .btn-success:focus, .btn-success.focus, .btn-success:active, .btn-success.active, .open > .dropdown-toggle.btn-success {
	background-color: #d0a65e;
    border-color: #d0a65e;	
}
</style>
@endsection
@section('content')
<hr>
<div class="single">
	<div class="container">
		<div class="mainContainer sixteen container">
			<section id="content" class="gray-area">
				<div class="container">
					<div id="main">
						<div class="booking-information travelo-box">
							@if($order->status == 3)
								<div class="booking-confirmation clearfix">
									<i class="soap-icon-recommend icon circle animated bounceInDown"></i>
									<div class="message">
										<h4 class="main-message">Thank You. Your Order has been placed.</h4>
										<p>A confirmation email has been sent to your registered email address.</p>
									</div>
								</div>  
								<hr/>
								<a href="javascript:void(0)" class="btn btn-success btn-lg">OrderId: {{ $order->orderId() }}</a>
								<div class="pck-box pck-box-shadow">
									<div class="table-responsive">
										<table class="table table-striped table-hover ">
											<thead>
												<tr class="primary">
													<th>Sub Order ID</th>
													<th>Product Name</th>
													<th>Size </th>
													<th>Color</th>
													<th>Price</th>
													<th>Qty</th>
													<th>SubTotal</th>
												</tr>
											</thead>
											@foreach($order->orderProducts as $orderProduct)
												<tr class="info">
													<td>{{ $orderProduct->orderProductId() }}</td>
													<td>
														{{ $orderProduct->product->name }} <br>
													</td>
													<td>
														{{ $orderProduct->variation->size->name }}
													</td>
													<td>
														<span class="btn colorSelected" style="background: {{ $orderProduct->variation->color->code }};padding: 9px 9px;" title="Color"></span>
													</td>
													<td><i class="fa fa-rupee"></i> &nbsp;{{ $orderProduct->price }}</td>
													<td>{{ $orderProduct->qty }}</td>
													<td><i class="fa fa-rupee"></i> &nbsp;{{ $orderProduct->price * $orderProduct->qty }}</td>
												</tr>
											@endforeach
											<tr class="thanks_summary_text">
												<td colspan="6" align="right">Total</td>
												<td align="left"><i class="fa fa-rupee"></i> &nbsp;{{ $order->total }}</td>
											</tr>
											<tr class="thanks_summary_text">
												<td colspan="6" align="right">Delivery Charge(+)</td>
												<td align="left"><i class="fa fa-rupee"></i> &nbsp;{{ $order->delivery_charge }}</td>
											</tr>
											@if($order->voucher_id > 0)	
												<tr class="thanks_summary_text">
													<td colspan="6" align="right">Applied Discount (-)</td>
													<td align="left"><i class="fa fa-rupee"></i> &nbsp;{{ $order->discount }}</td>
												</tr>
											@endif
											<tr class="thanks_summary_text total">
												<td colspan="6">Final Amount</td>
												<td align="left"><i class="fa fa-rupee"></i> &nbsp;{{ $order->cart_amount }}</td>
											</tr>
										</table>
									</div>				
								</div>
								<p><br></p>
								<div align="center">
									<a href="/products" class="more-product">&nbsp; Home &nbsp;</a>
								</div>
							@else
								<h4>OrderId: {{ $order->orderId() }}</h4>
								<div class="jumbotron" style="text-align: center;">
					                <h2>Thank You. Your Order has been Pending.</h2>
					                <span style="font-size:30px;color:#d0a65e;"><i class="fa fa-exclamation-circle fa-5x"></i></span>
					                <p>Please contact our support team.</p><br>
					                <a href="/products" class="more-product">&nbsp; Home &nbsp;</a>
					            </div>
							@endif
						</div>
					</div>
				</div>
			</section>
		</div>	
	</div>
</div>
<hr>
@endsection