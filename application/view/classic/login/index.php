<main>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
				<div class="card shadow-lg border-0 rounded-lg mt-5">
					<div class="card-body p-5 text-center">
						<div class="h3 font-weight-light mb-3">Sign In</div>


					</div>
					<hr class="my-0"/>
					<div class="card-body p-5">
						<form action="<?php echo Config::get('URL'); ?>login/login" method="post">
							<div class="form-floating mb-3">

								<input class="form-control" type="text" placeholder="name@example.com" name="user_name"/>
								<label for="emailExample">Email address</label>
							</div>
							<div class="form-floating mb-3">

								<input class="form-control" type="password" placeholder="Password" name="user_password"/>
								<label for="passwordExample">Password</label>
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
							<div class="form-check mb-3">
									<input class="form-check-input" id="customCheck1" type="checkbox" name="set_remember_me_cookie"/>
									<label class="form-check-label" for="customCheck1">Remember password</label>
							</div>
							<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
								<a class="small" href="<?php echo Config::get('URL'); ?>login/requestPasswordReset">Forgot your password?</a>
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
