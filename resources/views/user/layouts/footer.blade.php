<!-- footer -->
@if($footer)
<div class="footer">
	<div class="footer-copy1" style="border-bottom: none;">
		<div class="footer-copy-pos">
			<a href="javascript:void(0);" class="scroll"><img src="/front/images/arrow.png" alt=" " class="img-responsive" /></a>
		</div>
	</div>
	<div class="container">
		<div class="w3_footer_grids">
			<div class="col-md-4 w3_footer_grid">
				<h3>Contact</h3>
				<ul class="address">
					<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i> {{ $content->address }}</li>
					<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:{{ $content->support_email }}">{{ $content->support_email }}</a></li>
					<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i> {{ substr($content->support_mobile, 0, 3) .'-'. substr($content->support_mobile, 3, 3) .'-'. substr($content->support_mobile, 6) }}</li>
				</ul>
			</div>
			<div class="col-md-4 w3_footer_grid">
				<h3>Information</h3>
				<ul class="info"> 
					<li><a href="{{ route('user.about') }}">About Us</a></li>
					<li><a href="{{ route('user.contact') }}">Contact Us</a></li>
					<!-- <li><a href="{{ route('user.faq') }}">FAQ's</a></li> -->
					<li><a href="{{ route('user.term') }}">Term & Condition</a></li>
					<li><a href="{{ route('user.privacyPolicy') }}">Privacy Policy</a></li>
					@if(\Auth::user())
						<li><a href="{{ route('user.myAccount') }}">Order Return</a></li>
					@else
						<?php \Session::put('redirect', route('user.myAccount')); ?>
						<li><a href="{{ route('user.loginForm') }}">Order Return</a></li>
					@endif
				</ul>
			</div>
			<div class="col-md-4 w3_footer_grid">
				<h3>Profile</h3>
				<h4 class="white-text">Follow Us</h4>
				<div class="agileits_social_button">
					<ul>
						<li><a href="{{ $content->fb_link ? $content->fb_link : 'javascript:void(0);' }}" target="_blank" class="facebook"> </a></li>
						<li><a href="{{ $content->twitter_link ? $content->twitter_link : 'javascript:void(0);' }}" target="_blank" class="twitter"> </a></li>
						@if(false)
							<li><a href="{{ $content->google_link ? $content->google_link : 'javascript:void(0);' }}" target="_blank" class="google"> </a></li>
						@endif
						<li><a href="{{ $content->instagram_link ? $content->instagram_link : 'javascript:void(0);' }}" class="instagram" target="_blank"></a></li>
					</ul>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class=" text-center">
			<p>&copy;{{ date('Y') }} Shroud Enterprise. All rights reserved | Design by <a href="https://www.acquainteck.com" target="_blank" class="white-text">Acquainteck Consultancy</a></p>
		</div>
		<button type="button" class="btn btn-sm btn-infi pull-right" style="margin-top: -50px;font-size: 18px;" title="Visitors">Visitor : {{ ($counter = \App\Models\Counter::find(1)) ? $counter->visitor : 0 }}</button>
		<br>
	</div>
	@if(false)
	<div class="footer-copy">
		<div class="footer-copy1">
			<div class="footer-copy-pos">
				<a href="javascript:void(0);" class="scroll"><img src="/front/images/arrow.png" alt=" " class="img-responsive" /></a>
			</div>
		</div>
		<div class="container">
			<p>&copy;{{ date('Y') }} Fashion. All rights reserved | Design by <a href="javascript:void(0);">Fashion</a></p>
		</div>
	</div>
	@endif
</div>
@endif

<div class="modal fade" id="logingId" tabindex="-1" role="dialog" aria-labelledby="logingId"
aria-hidden="true">
<div class="modal-dialog modal-lg">
	<div class="modal-content" style="margin-top: -5%;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			&times;</button>
			<h4 class="modal-title" id="myModalLabel">
			Create an account with shroud!</h4>
		</div>
		<div class="modal-body modal-body-sub">
			<div class="row">
				<div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
					<div class="sap_tabs">	
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
							<ul>
								<li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>
								<li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
								<li class="resp-tab-item" aria-controls="tab_item-2"><span>Forgot Password</span></li>
							</ul>	
							<div id="message" class="text-center"></div>	
							<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
								<div class="facts">
									<div class="register">
										<input type="email" name="email" class="keyup-email email" placeholder="Enter Email Address"  required="" autocomplete="off">
										<input type="password" class="password" name="password" placeholder="Enter Password" required="" autocomplete="off">
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
											<input placeholder="Enter First Name" name="name" type="text" class="fName" required autocomplete="off">
											<input placeholder="Enter Last Name" name="name" style="margin: 1em 0 0;" type="text" class="lName" required autocomplete="off">
											<input placeholder="Enter Mobile" name="mobile" type="text" class="signupMobile" required style="margin: 1em 0 0;" onkeydown="return max_length(this,event,10)" onkeypress="return isNumberKey(event)" autocomplete="off">
											<input placeholder="Enter Birth Date format DD-MM-YYYY" name="birthDate" class="birthDate" type="text" required autocomplete="off" style="margin: 1em 0 0;" max="{{ date('Y-m-d') }}" title="Birth Date Format DD-MM-YYYY " readonly>
											<input placeholder="Enter Anniversary Date format DD-MM-YYYY" name="anniversaryDate" class="anniversaryDate" type="text" required autocomplete="off" style="margin: 1em 0 0;" max="{{ date('Y-m-d') }}" title="Anniversary Date Format DD-MM-YYYY" readonly>
											<input placeholder="Enter Email Address" name="email" class="signupEmail keyup-email" type="email" required autocomplete="off">	
											<input placeholder="Enter Password" name="password" class="signupPassword" type="password" required autocomplete="off">	
											<input placeholder="Enter Confirm Password" name="confirmPassword" class="confirmPassword" type="password" required autocomplete="off">
											<div class="sign-up">
												<input type="button" class="login-btn" id="signUp" value="Create Account"/>
											</div>
										</div>
										<div id="otpDiv" style="display: none;">
											<p class="pull-right">This OTP expires in <span class="timeCounter">05:00</span> minutes.</p>
											@if(false)
												<p>Don't Share OTP. Your Otp is = <span id="otp"></span>.  This OTP expires in <span class="timeCounter">05:00</span> minutes.</p>
											@endif
											<input placeholder="Enter Otp" name="otp" type="text" class="otp" required autocomplete="off" onkeydown="return max_length(this,event,4)" onkeypress="return isNumberKey(event)" maxlength="4">
											<a class="pull-right" id="resendOtp" data-id="1" style="cursor: pointer;">Resend</a>
											<div class="sign-up">
												<input type="button" class="login-btn" id="otpBtn" value="Submit"/>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
								<div class="facts">
									<div class="register">
										<div id="forgotPasswordDiv">
											<input type="text" name="emailorMobile" class="emailorMobile" placeholder="Enter Email Or Mobile No Enter"  required="" autocomplete="off">
											<div class="sign-up">
												<button type="button" class="login-btn" id="forgotPassword">Submit</button>
											</div>
										</div>
										<div id="forgotPasswordOtpDiv" style="display: none;">
											<p class="pull-right">This OTP expires in <span class="timeCounter">05:00</span> minutes.</p>
											@if(false)
												<p>Don't Share OTP. Your Otp is = <span id="forgotPasswordOtp"></span>. This OTP expires in <span class="timeCounter">05:00</span> minutes.</p>
											@endif
											<input placeholder="Enter Otp" name="otp" type="text" class="forgotPasswordOtp" required autocomplete="off" onkeydown="return max_length(this,event,4)" onkeypress="return isNumberKey(event)" maxlength="4">
											<a class="pull-right" id="resendOtp" data-id="2" style="cursor: pointer;">Resend</a>
											<div class="sign-up">
												<input type="button" class="login-btn" id="forgotPasswordOtpBtn" value="Submit"/>
											</div>
										</div>
									</div>
								</div> 
							</div>

						</div>	
					</div>
					<div id="OR" class="hidden-xs">OR</div>
				</div>
				<div class="col-md-4 modal_body_right modal_body_right1">
					<div class="row text-center sign-with">
						<div class="col-md-12">
							<h3 class="other-nw"> Sign in with</h3>
						</div>
						<div class="col-md-12">
							<ul class="social">
								<li class="social_facebook"><a href="{{ route('user.socialLogin', ['service' => 'facebook']) }}" class="entypo-facebook"></a></li>
								<li class="social_dribbble"><a href="{{ route('user.socialLogin', ['service' => 'google']) }}" class="entypo-dribbble"></a></li>
								<li class="social_instagram"><a href="javascript:void(0);" class="entypo-instagram"></a></li>
								<!-- <li class="social_behance"><a href="javascript:void(0);" class="entypo-behance"></a></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- footer -->