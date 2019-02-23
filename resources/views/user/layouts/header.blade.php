<div class="menu">
    @if(!\Auth::check())
        <a href="javascript:void(0);" style="margin-right: 70px;" class="loginModel white-text">Login & Signup</a>
    @else
        <a href="{{ route('user.myAccount') }}" style="margin-right: 70px;" class="white-text">My Account</a>
    @endif
</div>
<div class="header padding-top-10">
    <div class="container" align="{{ ($cart) ? '' : 'center' }}">
        <div class="{{ ($cart) ? 'w3l_login' : 'width-10' }}">
            <a href="{{ route('user.index') }}" style="width: 10%;height: 0px;border: 0;">
                <img src="/front/images/logo.png" alt="Fashion" class="img-responsive">
            </a>
        </div>
        @if($cart)
        <div class="w3l_logo"></div>
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