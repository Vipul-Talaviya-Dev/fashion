<table width="100%" border="0" style="padding:24px; background-color:rgb(243, 243, 243); cellspacing="0" ;cellpadding="0"; align="center">
<tbody>
<tr>
<td>
<table width="540" border="0" align="center" cellpadding="0" cellspacing="0" style="padding:38px 30px 30px 30px;background-color:#fafafa">
	<tbody>
	<tr>
		<td width="100%"><a href="" target="_blank"><img src="{{ stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://'.$_SERVER['SERVER_NAME'] }}/front/images/logo.png" style="height: 50px"></a></td>
    </tr>
	<tr><td colspan="2" height="10" style="border-bottom:1px solid #eaedef"></td></tr>
	<tr><td colspan="2">
		<table>
				<tbody>
				<tr>
					<td colspan="2" style="font-size:13px;font-family:Arial,Helvetica,sans-serif;color:#34495e">
					Dear <b>{{ $name }}</b>,<br/>
					</td>
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
					<td style="font-size:13px;font-family:Arial,Helvetica,sans-serif;color:#34495e; padding-top:10px;"><strong>Your login Email ID : </strong>{{ $email }}</td>
				</tr>
				<tr>
					<td style="font-size:13px;font-family:Arial,Helvetica,sans-serif;color:#34495e; padding-top:10px;"><strong>Password : </strong>{{ $password }}</td>
				</tr>
				<tr>
			</tbody>
		</table>
		</td>
	</tr>
                        
	<tr><td colspan="2" height="20"></td></tr>
	<tr><td colspan="2" height="10"></td></tr>
	</tbody>
</table>
</td>
</tr></tbody>
</table>