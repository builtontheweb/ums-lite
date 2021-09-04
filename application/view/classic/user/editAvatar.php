
<main>
   <div class="page-header page-header-dark bg-gradient-primary-to-secondary">
      <div class="container-fluid">
         <div class="page-header-content py-5">
            <h1 class="page-header-title">
               <div class="page-header-icon"><i data-feather="file"></i></div>
               <span>Edit your avatar</span>
            </h1>
            <div class="page-header-subtitle">If you still see the old picture after uploading a new one: Hard-Reload the page with <i>Shift + F5!</i> Your browser doesn't
            realize there's a new image as new and old one have the same filename.</div>
         </div>
      </div>
   </div>
   <div class="container-fluid mt-4">
      <div class="card">
         <div class="card-header">Changing your avatar</div>
         <div class="card-body">
            <form action="<?php echo Config::get('URL'); ?>user/uploadAvatar_action" method="post" enctype="multipart/form-data">
				<label for="avatar_file">Select an avatar image from your hard-disk (will be scaled to 44x44 px, only .jpg currently):</label>
				<input type="file" name="avatar_file" required />
				<!-- max size 5 MB (as many people directly upload high res pictures from their digital cameras) -->
				<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
				<input type="submit" value="Upload image" />
        	</form>
			<div class="box">
				<h3>Delete your avatar</h3>
				<p>Click this link to delete your (local) avatar: <a href="<?php echo Config::get('URL'); ?>user/deleteAvatar_action">Delete your avatar</a>
			</div>
         </div>
      </div>
   </div>
</main>