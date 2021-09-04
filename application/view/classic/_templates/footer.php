<?php
//check if we are on index/index page - Even if the user is logged display the index styling differently - more info in extending documentation
$page = $_SERVER['REQUEST_URI'];
if (Session::userIsLoggedIn() /* The next section can be removed if /index/index is becoming obsolete */ && strpos($page, 'index/index') == false){
  ?>

  <footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
      <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted">Copyright &copy; <?= getSiteDetails("siteTitle"); ?> <?= date("Y"); ?> </div>
        <div>
          <strong>version: </strong><?= getSiteDetails("VERSION"); ?>
        </div>
      </div>
    </div>
  </footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?=  "themes/" . Config::get("THEME"); ?>/js/scripts.js"></script>
<?php $this->renderFeedbackMessages(); ?>
</body>
</html>
<?php }else{ ?>

</div>
<div id="layoutAuthentication_footer">
  <footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
      <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted">Copyright &copy; <?= getSiteDetails("siteTitle"); ?> <?= date("Y"); ?> </div>
        <div>
          <strong>version: </strong><?= getSiteDetails("VERSION"); ?>
        </div>
      </div>
    </div>
  </footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?=  "themes/" . Config::get("THEME"); ?>/js/scripts.js"></script>
<?php $this->renderFeedbackMessages(); ?>
</body>
</html>
<?php } ?>
