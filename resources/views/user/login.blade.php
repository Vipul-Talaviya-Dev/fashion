@extends('user.layouts.main')

@section('title', 'Order Shipping')

@section('content')
<hr>
<div class="col-md-10 col-md-offset-2 col-sm-12 col-xs-12">
	<div class="row">
		<div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
			<div class="sap_tabs">	
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					<ul>
						<li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
					</ul>
					<input type="hidden" name="redirect" class="redirect" value="{{ \Session::get('redirect') }}">	
					<div id="message" class="text-center"></div>	
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
						<div class="facts">
							<div class="register">
								<input type="email" name="email" class="keyup-email email" placeholder="Email Address"  required="" autocomplete="off">
								<input type="password" class="password" name="password" placeholder="Password" required="" autocomplete="off">
								<div class="sign-up">
									<button type="button" class="login-btn" id="userLogin">Sign in</button>
								</div>
							</div>
						</div> 
					</div>	

					<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
						<div class="facts">
							<div class="register">
								<div id="registrationCheck">
									<input placeholder="Name" name="name" type="text" class="signupName" required autocomplete="off">
									<input placeholder="Mobile" name="mobile" type="text" class="signupMobile" required style="margin: 1em 0 0;" onkeydown="return max_length(this,event,10)" onkeypress="return isNumberKey(event)" autocomplete="off">
									<input placeholder="Email Address" name="email" class="signupEmail keyup-email" type="email" required autocomplete="off">	
									<input placeholder="Password" name="password" class="signupPassword" type="password" required autocomplete="off">	
									<input placeholder="Confirm Password" name="confirmPassword" class="confirmPassword" type="password" required autocomplete="off">
									<div class="sign-up">
										<input type="button" class="login-btn" id="signUp" value="Create Account"/>
									</div>
								</div>
								<div id="otpDiv" style="display: none;">
									<p>Don't Share OTP. Your Otp is = <span id="otp"></span></p>
									<input placeholder="Otp" name="otp" type="text" class="otp" required>
									<div class="sign-up">
										<input type="button" class="login-btn" id="otpBtn" value="Submit"/>
									</div>
								</div>
							</div>
						</div>
					</div> 			        					            	      
				</div>	
			</div>
		</div>
		@if(false)
		<div class="col-md-4 modal_body_right modal_body_right1">
			<div class="row text-center sign-with">
				<div class="col-md-12">
					<h3 class="other-nw"> Sign in with</h3>
				</div>
				<div class="col-md-12">
					<ul class="social">
						<li class="social_facebook"><a href="javascript:void(0);" class="entypo-facebook"></a></li>
						<li class="social_dribbble"><a href="javascript:void(0);" class="entypo-dribbble"></a></li>
						<li class="social_twitter"><a href="javascript:void(0);" class="entypo-twitter"></a></li>
						<li class="social_behance"><a href="javascript:void(0);" class="entypo-behance"></a></li>
					</ul>
				</div>
			</div>
		</div>
		@endif
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12"><p><br></p></div>
@endsection
