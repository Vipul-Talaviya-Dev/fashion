<?php
	$cs_order_id = $order->orderId();
?>
 <table width="100%" border="0" style="padding:24px;background-color:rgb(243,243,243)" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td>
<table width="540" border="0" align="center" cellpadding="0" cellspacing="0" style="padding:38px 30px 30px 15px;background-color:#fafafa">
	<tbody>
	<tr>
		<td width="100%">
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
				<!-- <tr>
                    <td style="font-size:13px;font-family:Arial,Helvetica,sans-serif;color:#34495e;padding-top:10px">
					 Thank you for your order.
					</td>
				</tr> -->
				<tr>
                    <td style="font-size:13px;padding-top:10px;font-family:Arial,Helvetica,sans-serif;color:#34495e">
                    	
                    	{{ \App\Helper\Helper::orderSummary($order->status) }}

                    	@if($order->status != 8)
							We will send you another email if there is any changes.
							Meanwhile you can check the status of your order on online Shroud store.
                		@endif

                    	@if(false)
							We will send you another email once the items in your order have been <b>{{ \App\Helper\Helper::orderStatus($order->status) }}</b>.
                        	Meanwhile, you can check the status of your order on Online Shroud Store.
                    	@endif
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
				<td style="font-size:13px;padding-top:10px;font-family:Arial,Helvetica,sans-serif;color:#34495e">Please find below, the summary of your order <b>{{ $cs_order_id }}</b> </td>
				</tr>
				</tbody>
			</table>
		</td>
	</tr>
	
	<tr><td colspan="2" height="10" style="border-bottom:1px solid #eaedef"></td></tr>
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