<main>
   <div class="page-header page-header-dark bg-gradient-primary-to-secondary">
      <div class="container-fluid">
         <div class="page-header-content py-5">
            <h1 class="page-header-title">
               <div class="page-header-icon"><i data-feather="file"></i></div>
               <span>NoteController/index</span>
            </h1>
            <div class="page-header-subtitle"></div>
         </div>
      </div>
   </div>
   <div class="container-fluid mt-4">
      <div class="card">
         <div class="card-header">What happens here?</div>
         <div class="card-body">
            This is just a simple CRUD implementation. Creating, reading, updating and deleting things.
         </div>
      </div>
	   <div class="card mt-4">
         <div class="card-header">What happens here?</div>
         <div class="card-body">
            <form method="post" action="<?php echo Config::get('URL');?>note/create">
                <label>Text of new note: </label>
				<textarea class = 'form-control' name = 'note_text' rows = 5>I'm some text</textarea>
                <input type="submit" class = 'btn btn-block btn-success mt-2' value='Create this note' autocomplete="off" />
            </form>
         </div>
      </div>
	   <div class="card mt-4">
         <div class="card-header">All notes</div>
         <div class="card-body">
            <?php if ($this->notes) { ?>
            <table class="table">
                <thead>
                <tr>
                    <td>Id</td>
                    <td>Note</td>
                    <td>EDIT</td>
                    <td>DELETE</td>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($this->notes as $key => $value) { ?>
                        <tr>
                            <td><?= $value->note_id; ?></td>
                            <td><?= htmlentities($value->note_text); ?></td>
                            <td><a href="<?= Config::get('URL') . 'note/edit/' . $value->note_id; ?>">Edit</a></td>
                            <td><a href="<?= Config::get('URL') . 'note/delete/' . $value->note_id; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
                <div>No notes yet. Create some !</div>
            <?php } ?>
         </div>
      </div>
   </div>
</main>