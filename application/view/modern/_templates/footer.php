<?php
//check if we are on index/index page - Even if the user is logged display the index styling differently - more info in extending documentation
$page = $_SERVER['REQUEST_URI'];
if (Session::userIsLoggedIn() /* The next section can be removed if /index/index is becoming obsolete */ && strpos($page, 'index/index') == false){
?>

                <footer class="footer mt-auto footer-light">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 small">Copyright &copy; <?= getSiteDetails("siteTitle"); ?> <?= date("Y"); ?> </div>
							<div class = 'col-md-6 small text-center'><strong>Current page:</strong> <?= $_SERVER['REQUEST_URI']; ?></div>
                            <div class="col-md-3 text-md-right small">
<!--                                Contact us: <a href="mailto:<?= getSiteDetails("contactEmail"); ?>"><?= getSiteDetails("contactEmail"); ?> -->
								<strong>version: </strong><?= getSiteDetails("VERSION"); ?></a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?=  "themes/" . Config::get("THEME"); ?>/js/scripts.js"></script>
		<?php $this->renderFeedbackMessages(); ?>
    </body>
</html>
<?php }else{ ?>
</div>
            <div id="layoutAuthentication_footer">
                <footer class="footer mt-auto footer-dark">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 small">Copyright &copy; <?= getSiteDetails("siteTitle"); ?> <?= date("Y"); ?> </div>
							<div class = 'col-md-6 small text-center'><strong>Current page:</strong> <?= $_SERVER['REQUEST_URI']; ?></div>
                            <div class="col-md-3 text-md-right small">
<!--                                Contact us: <a href="mailto:<?= getSiteDetails("contactEmail"); ?>"><?= getSiteDetails("contactEmail"); ?> -->
								<strong>version: </strong><?= getSiteDetails("VERSION"); ?></a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?=  "themes/" . Config::get("THEME"); ?>/js/scripts.js"></script>
		<?php $this->renderFeedbackMessages(); ?>
    </body>
</html>
<?php } ?>
