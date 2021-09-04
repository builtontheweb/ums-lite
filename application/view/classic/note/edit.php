<main>
   <div class="page-header page-header-dark bg-gradient-primary-to-secondary">
      <div class="container-fluid">
         <div class="page-header-content py-5">
            <h1 class="page-header-title">
               <div class="page-header-icon"><i data-feather="file"></i></div>
               <span>NoteController/edit/:note_id</span>
            </h1>
            <div class="page-header-subtitle"></div>
         </div>
      </div>
   </div>
   <div class="container-fluid mt-4">
      <div class="card">
         <div class="card-header">Edit a note</div>
         <div class="card-body">
            <?php if ($this->note) { ?>
            <form method="post" action="<?php echo Config::get('URL'); ?>note/editSave">
                <label>Change text of note: </label>
                <!-- we use htmlentities() here to prevent user input with " etc. break the HTML -->
                <input type="hidden" name="note_id" value="<?php echo htmlentities($this->note->note_id); ?>" />
				
				<textarea class = 'form-control' name = 'note_text' rows = 5><?php echo htmlentities($this->note->note_text); ?></textarea>
                <input type="submit" class = 'mt-2 btn btn-block btn-success' value='Change' />
            </form>
        <?php } else { ?>
            <p>This note does not exist.</p>
        <?php } ?>
         </div>
      </div>
   </div>
</main>
