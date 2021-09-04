<main>
   <div class="page-header page-header-dark bg-gradient-primary-to-secondary">
      <div class="container-fluid">
         <div class="page-header-content py-5">
            <h1 class="page-header-title">
               <div class="page-header-icon"><i data-feather="file"></i></div>
               <span>AdminController/index</span>
            </h1>
            <div class="page-header-subtitle">This is only available to admin accounts (user_account_type = 7)</div>
			 <div class="page-header-subtitle"></div>
			 
         </div>
      </div>
   </div>
   <div class="container-fluid mt-4">
      <div class="card">
         <div class="card-header">What happens here?</div>
         <div class="card-body">
            This controller/action/view shows a list of all users in the system. with the ability to soft delete a user
            or suspend a user.
         </div>
      </div>
	  <div class="card mt-4">
         <div class="card-header">List of users</div>
         <div class="card-body">
            <table class="table">
                <thead>
                <tr class = 'align-middle'>
                    <td>Id</td>
                    <td >Avatar</td>
                    <td >Username</td>
                    <td >User's email</td>
                    <td >Activated ?</td>
                    <td >Link to user's profile</td>
                    <td >suspension Time in days</td>
                    <td >Soft delete</td>
                    <td >Submit</td>
                </tr>
                </thead>
                <?php foreach ($this->users as $user) { ?>
                    <tr class="<?= ($user->user_active == 0 ? 'inactive' : 'active'); ?> align-middle">
                        <td><?= $user->user_id; ?></td>
                        <td>
                            <?php if (isset($user->user_avatar_link)) { ?>
                                <img src="<?= $user->user_avatar_link; ?>" class = 'img-responsive' height = "25"/>
                            <?php } ?>
                        </td>
                        <td><?= $user->user_name; ?></td>
                        <td><?= $user->user_email; ?></td>
                        <td><?= ($user->user_active == 0 ? 'No' : 'Yes'); ?></td>
                        <td>
                            <a href="<?= Config::get('URL') . 'profile/showProfile/' . $user->user_id; ?>">Profile</a>
                        </td>
                        <form action="<?= config::get("URL"); ?>admin/actionAccountSettings" method="post">
                            <td><input type="number" name="suspension" class = 'form-control'/></td>
                            <td><input type="checkbox" name="softDelete" <?php if ($user->user_deleted) { ?> checked <?php } ?> class = 'form-control'/></td>
                            <td>
                                <input type="hidden" name="user_id" value="<?= $user->user_id; ?>" />
                                <input type="submit" class = 'btn btn-primary' />
                            </td>
                        </form>
                    </tr>
                <?php } ?>
            </table>
         </div>
      </div>
   </div>
</main>
