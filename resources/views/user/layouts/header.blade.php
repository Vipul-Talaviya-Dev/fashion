<div class="menu">
    @if(!\Auth::check())
        <a href="javascript:void(0);" style="margin-right: 70px;" class="loginModel"><span class="glyphicon glyphicon-user white-text" aria-hidden="true"></span></a>
    @else
        <a href="{{ route('user.myAccount') }}" style="margin-right: 70px;"><span class="glyphicon glyphicon-user white-text" aria-hidden="true"></span></a>
    @endif
</div>
<div class="header">
    <div class="container">
        <div class="w3l_login">
            <a href="{{ route('user.index') }}" style="width: 10%;height: 0px;border: 0;">
                <img src="/front/images/logo.png" alt="Fashion" class="img-responsive" />
            </a>
        </div>
        <div class="w3l_logo">
            <!-- <a href="{{ route('user.index') }}"><img src="/front/images/logo.png" alt="Fashion" class="img-responsive" /></a> -->
            <!-- <h1><a href="{{ route('user.index') }}">Women's Fashion<span>For Fashion Lovers</span></a></h1> -->
        </div>
        @if(false)
        <div class="search">
            <input class="search_box" type="checkbox" id="search_box">
            <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
            <div class="search_form">
                <form action="#" method="post">
                    <input type="text" name="Search" placeholder="Search...">
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>
        @endif
        <div class="cart box_1">
            <a href="{{ route('user.cart') }}">
                <div class="total">
                <!--<span class="simpleCart_total"></span>--> (<span id="backetItem" class="backetItem">{{ ((\Session::get('cart') =="") ? 0 : count(\Session::get('cart'))) }}</span> items)</div>
                <img src="/front/images/bag.png" alt="cart" />
            </a>
            <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
            <div class="clearfix"> </div>
        </div>  
        <div class="clearfix"> </div>
    </div>
</div>
<div class="navigation"></div>