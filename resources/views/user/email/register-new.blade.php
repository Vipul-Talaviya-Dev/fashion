<?php
 $message='<table width="100%" border="0" style="padding:24px; background-image: url('.BUCKETURL.'public/emailbg.png); background-color:rgb(243, 243, 243); cellspacing="0" ;cellpadding="0"; align="center">
<tbody>
<tr>
<td>
<table width="540" border="0" align="center" cellpadding="0" cellspacing="0" style="padding:38px 30px 30px 30px;background-color:#fafafa">
	<tbody>
	<tr>
		<td width="100%"><a href="'.SITEURL.'" target="_blank"><img src="'.BUCKETURL.'public/'.$b2b['b2b_logo'].'" alt="Purchasekaro" title="Purchasekaro"></a></td>
    </tr>
	<tr><td colspan="2" height="10" style="border-bottom:1px solid #eaedef"></td></tr>
	<tr><td colspan="2">
		<table>
				<tbody>
				<tr>
					<td colspan="2" style="font-size:13px;font-family:Arial,Helvetica,sans-serif;color:#34495e">
					Dear <b>'.$user['user_full_name'].'</b>,<br/>
					</td>
				</tr>
				<tr>
                    <td style="font-size:13px;font-family:Arial,Helvetica,sans-serif;color:#34495e"><br/>
					You can now enjoy a personalized shopping experience, including quicker checkout and a public wishlist. Product rating and reviews submitted by you (if any) are now visible to others.
					</td>
				</tr>
				<tr>
                    <td style="font-size:13px;padding-top:10px;font-family:Arial,Helvetica,sans-serif;color:#34495e">
					In case you have questions or need further assistance, call us on 07405010808 or contact us. We would be glad to help you. We are available 24 hours a day, 7 days a week. </td>
				</tr>
				</tbody>
		</table>
		</td>
	</tr>
	<tr><td colspan="2" height="20"></td></tr>
	<tr>
	<tr>
		<td colspan="2">
			<table width="100%" style="padding:18px 18px 14px 18px;border:1px solid #eaedef;background-color:#ffffff">
				<tbody>
				<tr>
					<td style="font-size:13px;font-family:Arial,Helvetica,sans-serif;color:#34495e; padding-top:10px;">Below are your credentials. Please keep this email for future use.</td>
				</tr>
				<tr>
					<td style="font-size:13px;font-family:Arial,Helvetica,sans-serif;color:#34495e; padding-top:10px;"><strong>Your login Email ID : </strong>'.$user['user_email'].'</td>
				</tr>
				<tr>
					<td style="font-size:13px;font-family:Arial,Helvetica,sans-serif;color:#34495e; padding-top:10px;"><strong>Password : </strong>'.base64_decode($user['user_pwd']).'</td>
				</tr>
				<tr>
				
				
			</tbody>
		</table>
		</td>
	</tr>
                        
	<tr><td colspan="2" height="20"></td></tr>
	<td colspan="2">
		<table width="100%" style="padding:18px 18px 14px 18px;border:1px solid #eaedef;background-color:#ffffff">
			<tbody>
			<tr style="text-align:center;">
			<td width="80">
			<a href="http://www.purchasekaro.com/"><img src="'.BUCKETURL.'public/shopping-icon.png" alt="Online Shopping" title="Online Shopping">
			</a>
			</td>
			<td style="text-align:center"><img src="http://s16.postimg.org/3w7nt4x1t/plus.png" alt="Plus" title="Plus"></td>
			<td width="80">
			<a href="http://www.purchasekaro.com/recharge/"><img src="'.BUCKETURL.'public/icon-recharge.png" alt="Recharge" title="Recharge">
			</a>
			</td>
			<td style="text-align:center"><img src="http://s16.postimg.org/3w7nt4x1t/plus.png" alt="Plus" title="Plus"></td>
			<td width="80">
			<img src="'.BUCKETURL.'public/icon-travel.png" alt="Travel and Tourism" title="Travel and Tourism">
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
	<tr><td colspan="2" height="10"></td></tr>
	<tr><td colspan="2" style="font-size:11px;text-align:center;font-family:Arial,Helvetica,sans-serif;color:#919bac">
        Feedback, suggestions or compliments - do write to <a href="mailto:support@purchasekaro.com" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;color:#22a7f0;text-decoration:none" target="_blank">support@purchasekaro.com </a>
		</td>
	</tr>
	<!------ Social Icons --------->
	<tr><td colspan="2" height="10" style="border-bottom:1px solid #eaedef;"></td></tr>
	<tr>
		<td>
			<div style="padding-left:185px;">
				<a href="https://www.facebook.com/purchasekaro"><img src="'.BUCKETURL.'public/facebook.png"></a>
				<a href="https://twitter.com/purchasekaro"><img src="'.BUCKETURL.'public/twitter.png"></a>
				<a href="https://www.linkedin.com/company/purchasekaro-com"><img src="'.BUCKETURL.'public/linkedin.png"></a>
				<a href="https://plus.google.com/b/108977991095064028173/108977991095064028173"><img src="'.BUCKETURL.'public/google-plus.png"></a>
				<a href="https://www.youtube.com/channel/UCZ61J0rd7wzWrK7SIKas_cg"><img src="'.BUCKETURL.'public/youtube.png"></a>
			</div>
		</td>
	</tr>
	
	<tr><td colspan="2" style="border-bottom:1px solid #eaedef"></td></tr>
	<tr><td align="center" style="font-weight:bold;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#929292;"><div style="padding-bottom:10px;padding-top:10px;">All Rights Reserved. Purchasekaro Online Shopping Pvt. Ltd.</div>
	<p style="padding:10px 0 0 0;margin:0;border-top:solid 1px #cccccc;font-size:11px;color:#565656">24x7 Customer Support&nbsp; | &nbsp;Carekaro Policy&nbsp; | &nbsp;Flexible Payment Options&nbsp; | &nbsp;900+ Categories</p>
	</td>
	
	</tr>
	</tbody>
</table>
</td>
</tr></tbody>
</table>';
?>