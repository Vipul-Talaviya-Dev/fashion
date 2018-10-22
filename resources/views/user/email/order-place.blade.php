<?php
$cs_order_id = ORDER_NUMBER.date('Ymd', strtotime($order['order_date'])).$order_id;

 $m1 = '<table width="100%" border="0" style="padding:24px;background-image:url('.SHOP_IMAGE.'email/back.png);background-color:rgb(243,243,243)" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td>
<table width="540" border="0" align="center" cellpadding="0" cellspacing="0" style="padding:38px 30px 30px 30px;background-color:#fafafa">
	<tbody>
	<tr>
		<td width="100%"><a href="https://www.purchasekaro.com/" target="_blank"><img src="'.BUCKETURL.'public/'.$b2b['b2b_logo'].'" alt="Purchasekaro" align="center" title="Purchasekaro" class="CToWUd"></a></td>
    </tr>
	<tr><td colspan="2" height="10" style="border-bottom:1px solid #eaedef"></td></tr>
	<tr><td colspan="2">
		<table>
				<tbody>
				<tr>
					<td colspan="2" style="font-size:13px;font-family:Arial,Helvetica,sans-serif;color:#34495e">
					Dear <b>'.$user['user_full_name'].'</b>,
					</td>
				</tr>
				<tr>
                    <td style="font-size:13px;font-family:Arial,Helvetica,sans-serif;color:#34495e;padding-top:10px">
					 Thank you for your order!
					</td>
				</tr>
				<tr>
                    <td style="font-size:13px;padding-top:10px;font-family:Arial,Helvetica,sans-serif;color:#34495e">
						We will send you another email once the items in your order have been shipped.
                        Meanwhile, you can check the status of your order on Purchasekaro.com
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
				<td style="font-size:13px;padding-top:10px;font-family:Arial,Helvetica,sans-serif;color:#34495e">Please find below, the summary of your order '.$cs_order_id.' </td>
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
				<tbody>';
				$count =0;
				foreach($get_orders as $order1){
				 $count++;	
				 $order_date = $order['order_date'];
				 $sub_order = ORDER_NUMBER.date('Ymd', strtotime($order_date)).$order1['op_id'];
				$p_basic = get_product_basic($order1['product_id']);
				$p_price = get_product_price($order1['product_id']);
			$m2 = 	'<tr>
					<td>'.$count.'</td>
					<td>
					<div align="center">
					<a style="text-decoration:none" width="200px" href="'.SHOP_PRODUCT_THUMBIMAGE.$p_basic['product_image_main'].'" target="_blank">
					<img border="0" src="'.SHOP_PRODUCT_THUMBIMAGE.$p_basic['product_image_main'].'" style="width:80px;min-height:auto" class="CToWUd">
					</a>
					'.$p_basic['product_name'].'<br>(Order ID: '.$cs_order_id.')
					</div>
					</td>
					<td style="font-family:Arial,Helvetica,sans-serif;color:#34495e;font-size:13px"><div align="center">Rs.'.$p_price['product_selling_price'].'</div></td>
					<td style="font-family:Arial,Helvetica,sans-serif;color:#34495e;font-size:13px"><div align="center">'.$order1['product_qty'].'</div> </td>
					<td style="font-family:Arial,Helvetica,sans-serif;color:#34495e;font-size:13px"><div align="center">Rs.'.$p_price['product_selling_price'] * $order1['product_qty'].'</div> </td>
				</tr>';
				}
			$m3 = '	</tbody>
			</table>
		</td>
	</tr>
	<tr><td colspan="2" height="10" style="border-bottom:1px solid black"></td></tr>
	<tr>
		<td>
			<table>
			<tbody>
				<tr>
					<td><div style="padding-left:300px;padding-right:10px;font-size:15px;margin-top:10px;font-family:Arial,Helvetica,sans-serif;color:green">Delivery Charge(+)</div></td><td> Rs. '.$order['extra_shipping'].'</td>
				</tr>';
				if($order["ewallet"] == 0){
				$m4 =  '<tr><td><div style="padding-left:350px;padding-right:10px;font-size:18px;margin-top:10px;font-family:Arial,Helvetica,sans-serif;color:#34495e">Total </div></td><td> Rs.'.$order["cart_amount"].'</td></tr>';
				}
					elseif($order['ewallet'] > 0){
					$cart_amount = $order['cart_amount'] + $order['ewallet'];
			$m5 =  '
			<tr><td><div style="padding-left:350px;padding-right:10px;font-size:18px;margin-top:10px;font-family:Arial,Helvetica,sans-serif;color:#34495e">Total </div></td><td> Rs.'.$cart_amount.'</td></tr>';
			}
			$m6 = '
			</tbody>
			</table>
		</td>
	</tr>
	<tr><td colspan="2" height="10" style="border-bottom:1px solid #eaedef"></td></tr>
	
	<tr>
        <td valign="top" align="left" style="background-color:#ffffff;color:#565656;display:block;font-weight:300;margin:0;padding:0;clear:both" bgcolor="#ffffff">';
		 $ship_details = unserialize($order['order_ship_details']);
		$m7 = ' 
		<table width="100%" cellspacing="0" cellpadding="0">
            <tbody>
			<tr>
                <td valign="top" align="left">
                    <p style="color:#565656;font-size:15px;font-family:Arial,Helvetica,sans-serif">Shipping Address</p>
                    <p style="padding:0;margin:15px 0 10px 0;font-size:18px;color:#333333;font-family:Arial,Helvetica,sans-serif">
                        '.$ship_details['name'].' &nbsp;&nbsp;&nbsp;&nbsp;'. $ship_details['phone'].'
                    </p>
					<p style="line-height:18px;padding:0;margin:0;color:#565656;font-size:13px;font-family:Arial,Helvetica,sans-serif">
                        '.$ship_details['address'].'<br>'.$ship_details['city'].' - '.$ship_details['pincode'].'<br>Gujarat
                    </p>
                </td>
			</tr>
            </tbody>
		</table>            
        </td>
    </tr>
	
	<tr><td colspan="2" height="10" style="border-bottom:1px solid #eaedef"></td></tr>
	<tr><td colspan="2">
        <center><img src="'.SHOP_IMAGE.'email/order-placed.jpg" height="100px" width="500px" class="CToWUd"></center></td>
	</tr>
	<tr><td colspan="2" height="10" style="border-bottom:1px solid #eaedef"></td></tr>
	
	
	<tr>
	<td colspan="2">
		<table width="100%" style="padding:18px 18px 14px 18px;border:1px solid #eaedef;background-color:#ffffff">
			<tbody>
			<tr style="text-align:center;">
			<td width="80">
			<a href="http://www.purchasekaro.com/"><img src="http://www.purchasekaro.com/recharge/img/icon/shopping-icon.png" alt="Online Shopping" title="Online Shopping">
			</a>
			</td>
			<td style="text-align:center"><img src="http://s16.postimg.org/3w7nt4x1t/plus.png" alt="Plus" title="Plus"></td>
			<td width="80">
			<a href="http://www.purchasekaro.com/recharge/"><img src="http://www.purchasekaro.com/recharge/img/icon/icon-recharge.png" alt="Recharge" title="Recharge">
			</a>
			</td>
			<td style="text-align:center"><img src="http://s16.postimg.org/3w7nt4x1t/plus.png" alt="Plus" title="Plus"></td>
			<td width="80">
			<img src="http://www.purchasekaro.com/recharge/img/icon/icon-travel.png" alt="Travel and Tourism" title="Travel and Tourism">
			</td>
			</tr>
			<tr style="text-align:center;font-size:12px;line-height:1.4;font-family:Arial,Helvetica,sans-serif;color:#34495e">
			<td width="80">Online Shopping</td>
			<td width="80"></td>
			<td width="80">Recharge Utility</td>
			<td width="80"></td>
			<td width="80">Travel & Hotel</td>
			</tr>
		</tbody>
		</table>
		</td>
	</tr>
	
	<tr><td colspan="2" style="font-size:11px;text-align:center;font-family:Arial,Helvetica,sans-serif;color:#919bac;padding-top:10px">
        Feedback, suggestions or compliments - do write to <a href="mailto:support@purchasekaro.com" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;color:#22a7f0;text-decoration:none" target="_blank">support@purchasekaro.com </a>
		</td>
	</tr>
	
	<tr><td colspan="2" height="10" style="border-bottom:1px solid #eaedef"></td></tr>
	<tr>
		<td>
			<div style="padding-left:185px;">
				<a href="https://www.facebook.com/purchasekaro"><img src="'.IMAGE.'facebook.png"></a>
				<a href="https://twitter.com/purchasekaro"><img src="'.IMAGE.'twitter.png"></a>
				<a href="https://www.linkedin.com/company/purchasekaro-com"><img src="'.IMAGE.'linkedin.png"></a>
				<a href="https://plus.google.com/b/108977991095064028173/108977991095064028173"><img src="'.IMAGE.'google-plus.png"></a>
				<a href="https://www.youtube.com/channel/UCZ61J0rd7wzWrK7SIKas_cg"><img src="'.IMAGE.'youtube.png"></a>
			</div>
		</td>
	</tr>
	
	<tr><td colspan="2" style="border-bottom:1px solid #eaedef"></td></tr>
	<tr><td align="center" style="font-weight:bold;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#929292"><div style="padding-bottom:10px">All Rights Reserved. Purchasekaro Online Shopping Pvt. Ltd.</div>
	<p style="padding:10px 0 0 0;margin:0;border-top:solid 1px #cccccc;font-size:11px;color:#565656">24x7 Customer Support&nbsp; | &nbsp;Carekaro Policy&nbsp; | &nbsp;Flexible Payment Options&nbsp; | &nbsp;900+ Categories</p>
	</td>
	
	</tr>
	</tbody>
</table>
</td>
</tr>
</tbody>
</table>';
 $message = "$m1"."$m2"."$m3"."$m4"."$m5"."$m6"."$m7";
