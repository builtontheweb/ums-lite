<main>
   <div class="page-header page-header-dark bg-gradient-primary-to-secondary">
      <div class="container-fluid">
         <div class="page-header-content py-5">
            <h1 class="page-header-title">
               <div class="page-header-icon"><i data-feather="file"></i></div>
               <span>UserController/showProfiler</span>
            </h1>
            <div class="page-header-subtitle">A simplified page header for use with the dashboard layout</div>
         </div>
      </div>
   </div>
   <div class="container-fluid mt-4">
      <div class="card">
         <div class="card-header">Simplified Page Header Option</div>
         <div class="card-body">
            <div>Your username: <?= $this->user_name; ?></div>
            <div>Your email: <?= $this->user_email; ?></div>
            <div>Your avatar image:
               <?php if (Config::get('USE_GRAVATAR')) { ?>
               Your gravatar pic (on gravatar.com): <img src='<?= $this->user_gravatar_image_url; ?>' />
               <?php } else { ?>
               Your avatar pic (saved locally): <img src='<?= $this->user_avatar_file; ?>' />
               <?php } ?>
            </div>
            <div>Your account type is: <?= $this->user_account_type; ?></div>
         </div>
      </div>
   </div>
</main>