<main>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
				<div class="card my-5">
					<div class="card-body p-5 text-center">
						<div class="h3 font-weight-light mb-0">Password Recovery</div>
					</div>
					<hr class="my-0"/>
					<div class="card-body p-5">
						<div class="text-center mb-4">
							
						</div>
						<form method="post" action="<?php echo Config::get('URL'); ?>login/setNewPassword" name="new_password_form">
							<input type='hidden' name='user_name' value='<?php echo $this->user_name; ?>' />
							<input type='hidden' name='user_password_reset_hash' value='<?php echo $this->user_password_reset_hash; ?>' />
							<div class="form-group"><label class="text-gray-600 small" for="emailExample">New Password</label>
								<input class="form-control form-control-solid py-4" type="password" placeholder="" aria-label="Email Address" aria-describedby="emailExample" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
							</div>
							<div class="form-group"><label class="text-gray-600 small" for="emailExample">Confirm Password</label>
								<input class="form-control form-control-solid py-4" type="password" placeholder="" aria-label="Email Address" aria-describedby="emailExample" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
							</div>
							<div class="form-group mb-0">
								<input type="submit" class="btn btn-primary btn-block" name = 'submit_new_password' value="Change Password"/>
							</div>
						</form>
					</div>
					<hr class="my-0"/>
					<div class="card-body px-5 py-4">
						<div class="small text-center">Choose a secure password!</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
