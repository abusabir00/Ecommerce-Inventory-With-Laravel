<!-- mt side menu start here -->
			<div class="mt-side-menu">
				<!-- mt holder start here -->
				<div class="mt-holder">
					<a href="#" class="side-close"><span></span><span></span></a>
					<strong class="mt-side-title">MY ACCOUNT</strong>

@if(!Session::get('cusId'))
					<!-- mt side widget start here -->
					<div class="mt-side-widget">
						<header>
							<span class="mt-side-subtitle">SIGN IN</span>
							<p>Welcome back! Sign in to Your Account</p>
						</header>
						<form action="#">
							<fieldset>
								<input type="text" placeholder="Username or email address" class="input">
								<input type="password" placeholder="Password" class="input">
								<div class="box">
									<span class="left"><input class="checkbox" type="checkbox" id="check1"><label for="check1">Remember Me</label></span>
									<a href="#" class="help">Help?</a>
								</div>
								<button type="submit" class="btn-type1">Login</button>
							</fieldset>
						</form>
					</div>
					<!-- mt side widget end here -->
@else
<div class="mt-side-widget">
<fieldset><a href="/herons/customerLogout/" class="btn-type1">Logout</a></fieldset>
</div>
@endif					

				</div>
				<!-- mt holder end here -->
			</div><!-- mt side menu end here -->