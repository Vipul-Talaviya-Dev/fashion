<!DOCTYPE html>
<html lang="en">
<head>
	<title>Waiting...for Payment | Fashion</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="/front/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/front/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href='https://fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php
		echo'
			<form method="post" name="gotopck" action="">
				<input type=hidden name="data" value="">
				'.csrf_field().'
			</form>
			<script>
			//setTimeout("document.gotopck.submit()",10);
			</script>';
	?>
	<div id="preloader" class="loader" style="display: none;"><div id="loader"></div></div>
	<div class="container" style="padding:40px;" align="center">
		<div class="row">
			<div class="jumbotron">
				<img src="/front/images/logo.png" alt="Fashion" class="img-responsive" style="width: 20%;"><p><br></p>
				<h2>We are going to our Payment Services...</h2>
				<p>Wait for Few Seconds...</p>
				<span style="font-size:30px;color:#d0a65e;"><i class="fa fa-spinner fa-spin fa-5x"></i></span>
			</div>
			<div style="margin-top:40px;"> All Rights Reserved @ Fashion</div>
		</div>
	</div>
	<!-- Core JS files -->
	<script src="/front/js/jquery.min.js" type="text/javascript"></script>
	<script src="/front/js/bootstrap-3.1.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			document.addEventListener('contextmenu', event => event.preventDefault());
			// setTimeout('document.frmTransaction.submit()',10);
		});
		$(document).keydown(function (event) {
		    if (event.keyCode == 123) { // Prevent F12
		        return false;
		    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
		        return false;
		    }
		});
	</script>
</body>
</html>
