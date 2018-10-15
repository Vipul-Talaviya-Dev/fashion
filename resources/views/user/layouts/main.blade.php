<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @yield('meta')
    
    <link href="/front/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/front/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/front/css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
    <!-- <link href="/front/css/jquery.countdown.css" rel="stylesheet" /> -->
    <link href="/front/css/popuo-box.css" rel="stylesheet" type="text/css" property="" media="all" />
    <link href='https://fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    @yield('css')
</head>

<body>
@include('user.layouts.header')
@yield('content')
@include('user.layouts.footer')
<!-- Core JS files -->
<script src="/front/js/jquery.min.js" type="text/javascript"></script>
<script src="/front/js/simpleCart.min.js" type="text/javascript"></script>
<script src="/front/js/bootstrap-3.1.1.min.js" type="text/javascript"></script>

@yield('js')
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
</body>
</html>
