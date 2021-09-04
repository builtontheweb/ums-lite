<main>
   <div class="page-header page-header-dark bg-gradient-primary-to-secondary">
      <div class="container-fluid">
         <div class="page-header-content py-5">
            <h1 class="page-header-title">
               <div class="page-header-icon"><i data-feather="file"></i></div>
               <span>UserController/changeUserRole</span>
            </h1>
            <div class="page-header-subtitle"></div>
         </div>
      </div>
   </div>
   <div class="container-fluid mt-4">
      <div class="card">
         <div class="card-header">Change account type</div>
         <div class="card-body">
            <p>
            This page is a basic implementation of the upgrade-process.
            User can click on that button to upgrade their accounts from
            "basic account" to "premium account". This script simple offers
            a click-able button that will upgrade/downgrade the account instantly.
            In a real world application you would implement something like a
            pay-process.
			</p>
			<p>
				Please note: This whole process has been renamed from AccountType (v3.0) to UserRole (v3.1).
			</p>

			<h2>Currently your account type is: <?php echo Session::get('user_account_type'); ?></h2>
			<!-- basic implementation for two account types: type 1 and type 2 -->
			<form action="<?php echo Config::get('URL'); ?>user/changeUserRole_action" method="post">
				<?php if (Session::get('user_account_type') == 1) { ?>
					<input type="submit" name="user_account_upgrade" value="Upgrade my account (to Premium User)" />
				<?php } else if (Session::get('user_account_type') == 2) { ?>
					<input type="submit" name="user_account_downgrade" value="Downgrade my account (to Basic User)" />
				<?php } else if (Session::get('user_account_type') == 7) { ?>
					You're an admin - usually a button would appear to chnage role - most likely use is with a pay process
				<?php } ?>
			</form>
         </div>
      </div>
   </div>
</main>