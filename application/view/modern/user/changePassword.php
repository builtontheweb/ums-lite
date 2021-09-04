
<main>
   <div class="page-header page-header-dark bg-gradient-primary-to-secondary">
      <div class="container-fluid">
         <div class="page-header-content py-5">
            <h1 class="page-header-title">
               <div class="page-header-icon"><i data-feather="file"></i></div>
               <span>UserController/changePassword</span>
            </h1>
            <div class="page-header-subtitle"></div>
         </div>
      </div>
   </div>
   <div class="container-fluid mt-4">
      <div class="card">
         <div class="card-header">Set new password</div>
         <div class="card-body">
            <form method="post" action="<?php echo Config::get('URL'); ?>user/changePassword_action" name="new_password_form">
				<div class="form-group">
					 <label for="change_input_password_current">Enter Current Password:</label>
					<input id="change_input_password_current" type='password'
						   name='user_password_current' pattern=".{6,}" required autocomplete="off" class = 'form-control' />
				 </div>
				 <div class="form-group">
					 <label for="change_input_password_new">New password (min. 6 characters)</label>
					<input id="change_input_password_new" type="password"
						   name="user_password_new" pattern=".{6,}" required autocomplete="off"  class = 'form-control' />
				 </div>
				 <div class="form-group">
					 <label for="change_input_password_repeat">Repeat new password</label>
					<input id="change_input_password_repeat" type="password"
						   name="user_password_repeat" pattern=".{6,}" required autocomplete="off"  class = 'form-control' />
				 </div>
				 <div class="form-group">
					 <input type="submit"  name="submit_new_password" value="Submit new password" class = 'btn btn-success btn-block'/>
				 </div>
        	</form>
         </div>
      </div>
   </div>
</main>