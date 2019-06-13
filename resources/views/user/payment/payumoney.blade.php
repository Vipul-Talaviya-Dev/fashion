<html>
<head>
    <title>Waiting...for Payment | Shroud Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/front/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/front/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href='https://fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="container" style="padding:40px;" align="center">
        <div class="row">
            <div class="jumbotron">
                <img src="/front/images/logo.png" alt="Shroud Store" class="img-responsive" style="width: 20%;"><p><br></p>
                <h2>We are going to our Payment Services...</h2>
                <p>Wait for Few Seconds...</p>
                <span style="font-size:30px;color:#d0a65e;"><i class="fa fa-spinner fa-spin fa-5x"></i></span>
            </div>
            <div style="margin-top:40px;"> All Rights Reserved @ Shroud Store</div>
        </div>
    </div>

    <form method="post" name="redirect" action="{{ $endPoint }}">
        <input type=hidden name="key" value="{{ $parameters['key'] }}">
        <input type=hidden name="hash" value="{{ $hash }}">
        <input type=hidden name="txnid" value="{{ $parameters['txnid'] }}">
        <input type=hidden name="amount" value="{{ $parameters['amount'] }}">
        <input type=hidden name="firstname" value="{{ $parameters['firstname'] }}">
        <input type=hidden name="email" value="{{ $parameters['email'] }}">
        <input type=hidden name="phone" value="{{ $parameters['phone'] }}">
        <input type=hidden name="productinfo" value="{{ $parameters['productinfo'] }}">
        <input type=hidden name="surl" value="{{ $parameters['surl'] }}">
        <input type=hidden name="furl" value="{{ $parameters['furl'] }}">
        <input type=hidden name="service_provider" value="{{ $parameters['service_provider'] }}">
        <input type=hidden name="lastname" value="{{ $parameters['lastname'] or '' }}">
        <input type=hidden name="curl" value="{{ $parameters['curl'] or '' }}">
        <input type=hidden name="address1" value="{{ $parameters['address1'] or '' }}">
        <input type=hidden name="address2" value="{{ $parameters['address2'] or '' }}">
        <input type=hidden name="city" value="{{ $parameters['city'] or '' }}">
        <input type=hidden name="state" value="{{ $parameters['state'] or '' }}">
        <input type=hidden name="country" value="{{ $parameters['country'] or '' }}">
        <input type=hidden name="zipcode" value="{{ $parameters['zipcode'] or '' }}">
        <input type=hidden name="udf1" value="{{ $parameters['udf1'] or '' }}">
        <input type=hidden name="udf2" value="{{ $parameters['udf2'] or '' }}">
        <input type=hidden name="udf3" value="{{ $parameters['udf3'] or '' }}">
        <input type=hidden name="udf4" value="{{ $parameters['udf4'] or '' }}">
        <input type=hidden name="udf5" value="{{ $parameters['udf5'] or '' }}">
        <input type=hidden name="pg" value="{{ $parameters['pg'] or '' }}">
    </form>
<script src="/front/js/jquery.min.js" type="text/javascript"></script>
    <script src="/front/js/bootstrap-3.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            document.addEventListener('contextmenu', event => event.preventDefault());
        });
        $(document).keydown(function (event) {
            if (event.keyCode == 123) {
                return false;
            } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {        
                return false;
            }
        });
    </script>
    <script language='javascript'>document.redirect.submit();</script>
</body>
</html>