@extends('user.layouts.main')

@section('title', 'Thanks For Shopping with us')

@section('css')
<style type="text/css">
.total {
    display: contents;
    vertical-align: middle;
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
									<table class="table table-striped table-hover ">
										<thead>
											<tr class="primary">
												<th>Sub Order ID</th>
												<th>Product Name</th>
												<th>Price</th>
												<th>Qty</th>
												<th>SubTotal</th>
											</tr>
										</thead>
											@foreach($order->orderProducts as $orderProduct)
											<tr class="info">
												<td>{{ 'FHN'.date('Ymd', strtotime($orderProduct->created_at)).$orderProduct->id }}</td>
												<td>{{ $orderProduct->product->name }}</td>
												<td>Rs. {{ $orderProduct->price }}</td>
												<td>{{ $orderProduct->qty }}</td>
												<td>Rs. {{ $orderProduct->price * $orderProduct->qty }}</td>
											</tr>
											@endforeach
											<tr class="thanks_summary_text">
												<td colspan="4" align="right">Total</td>
												<td align="left">Rs. {{ $order->total }}</td>
											</tr>
											@if($order->voucher_id > 0)	
												<tr class="thanks_summary_text">
													<td colspan="4" align="right">Applied Discount (-)</td>
													<td align="left">Rs. {{ $order->discount }}</td>
												</tr>
											@endif
											<tr class="thanks_summary_text total">
												<td colspan="4">Final Amount</td>
												<td align="left">Rs. {{ $order->cart_amount }}</td>
											</tr>
										</table>				
									</div>
								</div>
							@else
								<h4>OrderId: {{ $order->orderId() }}</h4>
								<div class="jumbotron" style="text-align: center;">
					                <h2>Thank You. Your Order has been Pending.</h2>
					                <span style="font-size:30px;color:#d0a65e;"><i class="fa fa-exclamation-circle fa-5x"></i></span>
					                <p>Please contact our support team.</p><br>
					                <a href="/" class="more-product">&nbsp; Go For Home &nbsp;</a>
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