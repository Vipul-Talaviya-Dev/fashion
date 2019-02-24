<!-- footer -->
@if($footer)
<div class="footer">
	<div class="container">
		<div class="w3_footer_grids">
			<div class="col-md-4 w3_footer_grid">
				<h3>Contact</h3>
				<ul class="address">
					<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
					<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
					<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
				</ul>
			</div>
			<div class="col-md-4 w3_footer_grid">
				<h3>Information</h3>
				<ul class="info"> 
					<li><a href="javascript:void(0);">About Us</a></li>
					<li><a href="{{ route('user.contact') }}">Contact Us</a></li>
					<li><a href="javascript:void(0);">FAQ's</a></li>
				</ul>
			</div>
			<div class="col-md-4 w3_footer_grid">
				<h3>Profile</h3>
				<h4>Follow Us</h4>
				<div class="agileits_social_button">
					<ul>
						<li><a href="javascript:void(0);" class="facebook"> </a></li>
						<li><a href="javascript:void(0);" class="twitter"> </a></li>
						<li><a href="javascript:void(0);" class="google"> </a></li>
						<li><a href="javascript:void(0);" class="pinterest"> </a></li>
					</ul>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
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
</div>
@endif

<div class="modal fade" id="logingId" tabindex="-1" role="dialog" aria-labelledby="logingId"
aria-hidden="true">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			&times;</button>
			<h4 class="modal-title" id="myModalLabel">
			Don't Wait, Login now!</h4>
		</div>
		<div class="modal-body modal-body-sub">
			<div class="row">
				<div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
					<div class="sap_tabs">	
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
							<ul>
								<li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>
								<li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
							</ul>	
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
											<input placeholder="First Name" name="name" type="text" class="fName" required autocomplete="off">
											<input placeholder="Last Name" name="name" style="margin: 1em 0 0;" type="text" class="lName" required autocomplete="off">
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
					<div id="OR" class="hidden-xs">OR</div>
				</div>
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
			</div>
		</div>
	</div>
</div>
</div>
<!-- footer -->