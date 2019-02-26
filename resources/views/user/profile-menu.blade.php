<div class="col-md-3 col-xs-12 margin-top-10">
	<div class="usermenu-Container">
		<div class="usermenu-Head"><h2>My Account </h2></div>
		<a href="{{ route('user.myProfile') }}" class="default-text">
			<div class="usermenu-Panel">
				<div class="usermenu-PanelTitle"><i class="mdi-action-account-circle"></i> Profile</div>
				<div class="usermenu-PanelContent"></div>
			</div>
		</a>
		<a href="{{ route('user.addresses') }}" class="default-text">
			<div class="usermenu-Panel">
				<div class="usermenu-PanelTitle"><i class="mdi-action-account-circle"></i> Addresses</div>
				<div class="usermenu-PanelContent"></div>
			</div>
		</a>
		<a href="{{ route('user.myAccount') }}" class="default-text">
			<div class="usermenu-Panel">
				<div class="usermenu-PanelTitle"><i class="mdi-action-assignment"></i> Orders</div>
				<div class="usermenu-PanelContent"></div>
			</div>
		</a>
		<a href="{{ route('user.logout') }}" class="default-text">
			<div class="usermenu-Panel">
				<div class="usermenu-PanelTitle"><i class="mdi-action-assignment"></i> Logout</div>
				<div class="usermenu-PanelContent"></div>
			</div>
		</a>
	</div>
	<p><br></p>
</div>