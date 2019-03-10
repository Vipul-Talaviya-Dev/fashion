<div class="menu">
    <div class="white-text text-center"><b>{{ $content->offer_text }}</b></div>
    @if(!\Auth::check())
        <a href="javascript:void(0);" style="margin-top: -20px;" class="loginModel white-text pull-right">Login & Signup</a>
    @else
        <a href="{{ route('user.myAccount') }}" style="margin-top: -20px;" class="white-text pull-right">{{ \Auth::user()->name }}</a>
    @endif
</div>
<div class="header padding-top-10">
    <div class="container" align="center">
        <div class="{{ ($cart) ? 'w3l_login' : 'width-10' }}">
            <a href="{{ route('user.index') }}" style="width: 10%;height: 0px;border: 0;">
                <img src="/front/images/logo.png" alt="Fashion" class="img-responsive">
            </a>
        </div>
        @if($cart)
        <!-- <div class="w3l_logo"></div> -->
        <div class="cart box_1">
            <a href="javascript:void(0);" class="cart-list">
                <div class="total">
                    (<span id="backetItem" class="backetItem">{{ ((\Session::get('cart') =="") ? 0 : count(\Session::get('cart'))) }}</span>)
                </div>
                <img src="/front/images/bag.png" alt="cart">
            </a>
            <p><a href="javascript:void(0);" class="simpleCart_empty">&nbsp;</a></p>
            <div class="clearfix"></div>
        </div>  
        <div class="clearfix"> </div>
        @endif
    </div>
</div>
@if($cart)
<div class="navigation"></div>
@endif