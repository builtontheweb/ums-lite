<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
			<div class="card my-5">
				<div class="card-body p-5 text-center">
					<div class="h3 font-weight-light mb-3">Sign In</div>
					
						
				</div>
				<hr class="my-0"/>
				<div class="card-body p-5">
					<form action="<?php echo Config::get('URL'); ?>login/login" method="post">
						<div class="form-group"><label class="text-gray-600 small" for="emailExample">Email address</label><input class="form-control form-control-solid py-4" type="text" placeholder="" aria-label="Email Address" aria-describedby="emailExample" name="user_name"/>
						</div>
						<div class="form-group"><label class="text-gray-600 small" for="passwordExample">Password</label><input class="form-control form-control-solid py-4" type="password" placeholder="" aria-label="Password" aria-describedby="passwordExample" name="user_password"/>
						</div>
						<div class="form-group"><a class="small" href="<?php echo Config::get('URL'); ?>login/requestPasswordReset">Forgot your password?</a>
						</div>
						<!-- when a user navigates to a page that's only accessible for logged a logged-in user, then
												 the user is sent to this page here, also having the page he/she came from in the URL parameter
												 (have a look). This "where did you came from" value is put into this form to sent the user back
												 there after being logged in successfully.
												 Simple but powerful feature, big thanks to @tysonlist. -->
						<?php if (!empty($this->redirect)) { ?>
						<input type="hidden" name="redirect" value="<?php echo $this->encodeHTML($this->redirect); ?>"/>
						<?php } ?>
						<!--
												set CSRF token in login form, although sending fake login requests mightn't be interesting gap here.
												If you want to get deeper, check these answers:
													1. natevw's http://stackoverflow.com/questions/6412813/do-login-forms-need-tokens-against-csrf-attacks?rq=1
													2. http://stackoverflow.com/questions/15602473/is-csrf-protection-necessary-on-a-sign-up-form?lq=1
													3. http://stackoverflow.com/questions/13667437/how-to-add-csrf-token-to-login-form?lq=1
											-->
						<input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>"/>
						<div class="form-group d-flex align-items-center justify-content-between mb-0">
							<div class="custom-control custom-control-solid custom-checkbox"><input class="custom-control-input small" id="customCheck1" type="checkbox" name="set_remember_me_cookie"/><label class="custom-control-label" for="customCheck1">Remember password</label>
							</div>
							<input type="submit" class="btn btn-primary" value="Login"/>
						</div>
					</form>
				</div>
				<hr class="my-0"/>
				<div class="card-body px-5 py-4">
					<div class="small text-center">New user? <a href="<?php echo Config::get('URL'); ?>register/index">Create an account!</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</main>