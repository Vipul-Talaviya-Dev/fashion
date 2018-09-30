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
    <link href="/front/css/jquery.countdown.css" rel="stylesheet" />
    <link href="/front/css/popuo-box.css" rel="stylesheet" type="text/css" property="" media="all" />
    <link href='https://fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    @yield('css')
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>


</head>

<body>
@include('user.layouts.header')
@yield('content')
@include('user.layouts.footer')
<!-- Core JS files -->
<script src="/front/js/jquery.min.js" type="text/javascript"></script>
<script src="/front/js/simpleCart.min.js" type="text/javascript"></script>
<script src="/front/js/bootstrap-3.1.1.min.js" type="text/javascript"></script>
<script src="/front/js/easyResponsiveTabs.js" type="text/javascript"></script>
<script src="/front/js/jquery.magnific-popup.js" type="text/javascript"></script>
<script src="/front/js/jquery.countdown.js" type="text/javascript"></script>
<script src="/front/js/script.js" type="text/javascript"></script>
<script src="/front/js/jquery.wmuSlider.js" type="text/javascript"></script>
<script src="/front/js/jquery.flexisel.js" type="text/javascript"></script>
<script src="/front/js/modernizr.min.js" type="text/javascript"></script>
@yield('js')
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
    // easyResponsiveTabs.js
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
        // magnific-popup.js
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

        $('.example1').wmuSlider(); // wmuSlider
    });
    // jquery.flexisel.js 
    $(window).load(function() {
        $("#flexiselDemo1").flexisel({
            visibleItems: 4,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,            
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: { 
                portrait: { 
                    changePoint:480,
                    visibleItems: 1
                }, 
                landscape: { 
                    changePoint:640,
                    visibleItems:2
                },
                tablet: { 
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });
    });
</script>
</body>
</html>
