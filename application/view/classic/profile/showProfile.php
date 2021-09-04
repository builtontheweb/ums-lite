<main>
   <div class="page-header page-header-dark bg-gradient-primary-to-secondary">
      <div class="container-fluid">
         <div class="page-header-content py-5">
            <h1 class="page-header-title">
               <div class="page-header-icon"><i data-feather="file"></i></div>
               <span>ProfileController/showProfile/:id</span>
            </h1>
			 <div class="page-header-subtitle"></div>
			 
         </div>
      </div>
   </div>
   <div class="container-fluid mt-4">
      <div class="card">
         <div class="card-header">What happens here?</div>
         <div class="card-body">
            This controller/action/view shows all public information about a certain user.
         </div>
      </div>
	  <div class="card mt-4">
         <div class="card-header">List of users</div>
         <div class="card-body">
            <?php if ($this->user) { ?>
            <div>
                <table class="table">
                    <thead class = 'text-white bg-primary'>
                    <tr>
                        <td>Id</td>
                        <td>Avatar</td>
                        <td>Username</td>
                        <td>User's email</td>
                        <td>Activated ?</td>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="<?= ($this->user->user_active == 0 ? 'inactive' : 'active'); ?>">
                            <td><?= $this->user->user_id; ?></td>
                            <td>
                                <?php if (isset($this->user->user_avatar_link)) { ?>
                                    <img src="<?= $this->user->user_avatar_link; ?>" height = '25' />
                                <?php } ?>
                            </td>
                            <td><?= $this->user->user_name; ?></td>
                            <td><?= $this->user->user_email; ?></td>
                            <td><?= ($this->user->user_active == 0 ? 'No' : 'Yes'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php } ?>
         </div>
      </div>
   </div>
</main>
