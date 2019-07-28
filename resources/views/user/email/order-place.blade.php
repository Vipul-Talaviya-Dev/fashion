<?php
	// $cs_order_id = 'FHN'.date('Ymd', strtotime($order['created_at'])).$order->id;
	$cs_order_id = $order->orderId();
?>
 <table width="100%" border="0" style="padding:24px;background-color:rgb(243,243,243)" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td>
<table width="540" border="0" align="center" cellpadding="0" cellspacing="0" style="padding:38px 30px 30px 15px;background-color:#fafafa">
	<tbody>
	<tr>
		<td width="100%" align="center">
			<a href="javascript:void(0);">
				<img src="{{ URL::asset('front/images/logo.png') }}" style="width: 20%;" alt="Online fashion store" align="center" title="Online fashion store" class="CToWUd">
			</a>
		</td>
    </tr>
	<tr><td colspan="2" height="10" style="border-bottom:1px solid #eaedef"></td></tr>
	<tr><td colspan="2">
		<table>
				<tbody>
				<tr>
					<td colspan="2" style="font-size:13px;font-family:Arial,Helvetica,sans-serif;color:#34495e">
					Dear <b>{{ $user->name }}</b>,
					</td>
				</tr>
				<tr>
                    <td style="font-size:13px;font-family:Arial,Helvetica,sans-serif;color:#34495e;padding-top:10px">
					 Thank you for shopping at SHROUD.
					</td>
				</tr>
				<tr>
                    <td style="font-size:13px;padding-top:10px;font-family:Arial,Helvetica,sans-serif;color:#34495e">
						We will send you another email once the items in your order have been shipped. Meanwhile, you can check the status of your order on Online Shroud Store.
					</td>
				</tr>
				</tbody>
		</table>
		</td>
	</tr>
	
	<tr><td colspan="2" height="20"></td></tr>
	<tr>
		<td>
			<table>
				<tbody>
				<tr>
				<td style="font-size:13px;padding-top:10px;font-family:Arial,Helvetica,sans-serif;color:#34495e">Kindly find below, the summary of your order ID is <b>{{ $cs_order_id }}</b> </td>
				</tr>
				</tbody>
			</table>
		</td>
	</tr>
	
	<tr><td colspan="2" height="10"></td></tr>
	<tr>
		<td>
			<table>
				<thead>
					<tr><th width="10px" style="font-family:Arial,Helvetica,sans-serif;color:#34495e;font-size:14px">#</th>
					<th width="200px" style="font-family:Arial,Helvetica,sans-serif;color:#34495e;font-size:14px">Item Details</th>
					<th width="100px" style="font-family:Arial,Helvetica,sans-serif;color:#34495e;font-size:14px">Item Price</th>
					<th width="100px" style="font-family:Arial,Helvetica,sans-serif;color:#34495e;font-size:14px">Qty</th>
					<th width="100px" style="font-family:Arial,Helvetica,sans-serif;color:#34495e;font-size:14px">Subtotal</th>
				</tr></thead>
				<tbody>
					<?php $cgst = 0;?>
				@foreach($order->orderProducts as $key => $orderProduct)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>
					<div align="center">
						<?php
							$variation = $orderProduct->product->variations()->find($orderProduct->variation_id);
							$image = explode(',', $variation->images);
						?>
						<a style="text-decoration:none" width="200px" href="{{ \Cloudder::secureShow($image[0]) }}" target="_blank">
						<img border="0" src="{{ \Cloudder::secureShow($image[0]) }}" style="width:80px;min-height:auto" class="CToWUd">
						</a><br>
						<span>{{ $orderProduct->product->name }} <br> (Order Id: {{ $orderProduct->orderProductId() }})</span>
					</div>
					</td>
					<td style="font-family:Arial,Helvetica,sans-serif;color:#34495e;font-size:13px"><div align="center">Rs. {{ $orderProduct->price }}</div></td>
					<td style="font-family:Arial,Helvetica,sans-serif;color:#34495e;font-size:13px"><div align="center">{{ $orderProduct->qty }}</div> </td>
					<td style="font-family:Arial,Helvetica,sans-serif;color:#34495e;font-size:13px"><div align="center">Rs. {{ $orderProduct->price * $orderProduct->qty }}</div> </td>
					<?php 
		              $cgstAmount = round(($orderProduct->price*2.5)/100, 2);
		              $cgst += $cgstAmount*$orderProduct->qty;
		            ?>
				</tr>
				@endforeach
			</tbody>
			</table>
		</td>
	</tr>
	<tr><td colspan="2" height="10" style="border-bottom:1px solid black"></td></tr>
	<tr>
		<td>
			<table>
			<tbody>
				<tr>
					<td>
						<div style="padding-left:250px;padding-right:10px;font-size:15px;margin-top:10px;"><b>Sub Total</b></div>
					</td>
					<td><div style="margin-top:10px;">Rs. {{ $order->total - ($cgst+$cgst) }}</div></td>
				</tr>
				<tr>
					<td>
						<div style="padding-left:250px;padding-right:10px;font-size:15px;margin-top:10px;font-family:Arial,Helvetica,sans-serif;color:green"> <b>SGST(2.5%) (+)</b></div>
					</td>
					<td><div style="margin-top:10px;">Rs. {{ $cgst }}</div></td>
				</tr>
				<tr>
					<td>
						<div style="padding-left:250px;padding-right:10px;font-size:15px;margin-top:10px;font-family:Arial,Helvetica,sans-serif;color:green"> <b>CGST(2.5%) (+)</b></div>
					</td>
					<td><div style="margin-top:10px;">Rs. {{ $cgst }}</div></td>
				</tr>
				<tr>
					<td>
						<div style="padding-left:250px;padding-right:10px;font-size:15px;margin-top:10px;color:red;"><b>Discount (-)</b></div>
					</td>
					<td><div style="margin-top:10px;">Rs. {{ $order->discount_amount }}</div></td>
				</tr>
				<tr>
					<td>
						<div style="padding-left:250px;padding-right:10px;font-size:15px;margin-top:10px;font-family:Arial,Helvetica,sans-serif;color:green"> <b>Delivery Charge(+)</b></div>
					</td>
					<td><div style="margin-top:10px;">Rs. {{ $order->delivery_charge }}</div></td>
				</tr>
				<tr>
					<td>
						<div style="padding-left:250px;padding-right:10px;font-size:18px;margin-top:10px;font-family:Arial,Helvetica,sans-serif;color:#34495e"><b>Total</b> </div>
					</td>
					<td> <div style="margin-top:10px;">Rs. {{ $order->cart_amount }}</div></td>
				</tr>
			</tbody>
			</table>
		</td>
	</tr>
	<tr><td colspan="2" height="10" style="border-bottom:1px solid #eaedef"></td></tr>
	<tr>
      <td valign="top" align="left" style="background-color:#ffffff;color:#565656;display:block;font-weight:300;margin:0;padding:0;clear:both" bgcolor="#ffffff">
			<table width="100%" cellspacing="0" cellpadding="0">
        		<tbody>
				<tr>
	            <td valign="top" align="left">
	              <p style="color:#565656;font-size:15px;font-family:Arial,Helvetica,sans-serif">Shipping Address</p>
	              <p style="padding:0;margin:15px 0 10px 0;font-size:18px;color:#333333;font-family:Arial,Helvetica,sans-serif">{{ $address->name }} &nbsp;&nbsp;&nbsp;&nbsp; {{ $address->mobile }}
	                    </p>
						<p style="line-height:18px;padding:0;margin:0;color:#565656;font-size:13px;font-family:Arial,Helvetica,sans-serif">{{ $address->address }} <br> {{ $address->city }} - {{ $address->pincode }}<br> {{ $address->state }}
	                </p>
	            </td>
				</tr>
        		</tbody>
			</table>            
    </td>
  </tr>
	<tr><td colspan="2" style="font-size:11px;text-align:center;font-family:Arial,Helvetica,sans-serif;color:#919bac;padding-top:10px">
        Feedback, suggestions or compliments - do write to <a href="mailto:support@shroud.in" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;color:#22a7f0;text-decoration:none" target="_blank">Support Mail</a>
		</td>
	</tr>
	
	<tr><td colspan="2" height="10" style="border-bottom:1px solid #eaedef"></td></tr>
	@if(false)
	<tr>
		<td>
			<div style="padding-left:185px;">
				<a href="https://www.facebook.com/purchasekaro"><img src=""></a>
				<a href="https://twitter.com/purchasekaro"><img src=""></a>
				<a href="https://www.linkedin.com/company/purchasekaro-com"><img src=""></a>
				<a href="https://plus.google.com/b/108977991095064028173/108977991095064028173"><img src=""></a>
				<a href="https://www.youtube.com/channel/UCZ61J0rd7wzWrK7SIKas_cg"><img src=""></a>
			</div>
		</td>
	</tr>
	@endif
	<tr><td colspan="2" style="border-bottom:1px solid #eaedef"></td></tr>
	<tr><td align="center" style="font-weight:bold;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#929292"><div style="padding-bottom:10px">All Rights Reserved. Online Shroud Store</div>
	<p style="padding:10px 0 0 0;margin:0;border-top:solid 1px #cccccc;font-size:11px;color:#565656">24x7 Customer Support&nbsp; | &nbsp;Policy&nbsp; | &nbsp;Flexible Payment Options</p>
	</td>
	</tr>
	</tbody>
</table>
</td>
</tr>
</tbody>
</table>