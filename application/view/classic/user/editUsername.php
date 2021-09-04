<main>
   <div class="page-header page-header-dark bg-gradient-primary-to-secondary">
      <div class="container-fluid">
         <div class="page-header-content py-5">
            <h1 class="page-header-title">
               <div class="page-header-icon"><i data-feather="file"></i></div>
               <span>UserController/editUsername</span>
            </h1>
            <div class="page-header-subtitle"></div>
         </div>
      </div>
   </div>
   <div class="container-fluid mt-4">
      <div class="card">
         <div class="card-header">Change your username</div>
         <div class="card-body">
            <form action="<?php echo Config::get('URL'); ?>user/editUserName_action" method="post">
				<div class="form-group">
					 <label for="change_input_password_current">New username:</label>
					 <input type="text" name="user_name" required class = 'form-control'/>
					 <input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />
				 </div>
				 <div class="form-group">
					 <input type="submit" value="Change username" class = 'btn btn-success btn-block'/>
				 </div>
        	</form>
         </div>
      </div>
   </div>
</main>
