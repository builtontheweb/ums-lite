<?php
include "vendor/init.php";
if (Session::userIsLoggedIn()){
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="<?= Config::get("URL"); ?>">
			<meta charset="utf-8"/>
			<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
			<meta name="description" content=""/>
			<meta name="author" content=""/>
			<title>
				<?= getSiteDetails("siteTitle"); ?>
			</title>
			<link href="<?= "themes/" . Config::get("THEME"); ?>/css/styles.css" rel="stylesheet"/>
			<link rel="icon" type="image/x-icon" href="<?= "themes/" . Config::get("THEME"); ?>/assets/img/favicon.png"/>
			<script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
		</head>
		<body class="nav-fixed">

			<nav class="topnav navbar navbar-expand shadow <?= getSiteDetails('topBarTheme'); ?>" id="sidenavAccordion">
				<a class="navbar-brand d-none d-sm-block" href="dashboard">
					<?= siteLogo(); ?>
				</a>
				<button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#">
					<i data-feather="menu"></i>
				</button>
				<ul class="navbar-nav align-items-center ml-auto">
					<li class="nav-item dropdown no-caret mr-3 dropdown-user">
						<a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img class="img-fluid" src="
								<?= $this->user_gravatar_image_url; ?>"/>
							</a>
							<div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
								<h6 class="dropdown-header d-flex align-items-center">
									<img class="dropdown-user-img" src="
										<?= $this->user_gravatar_image_url; ?>"/>
										<div class="dropdown-user-details">
											<div class="dropdown-user-details-name">
												<?= getUserFullName(Session::get("user_id")); ?>
											</div>
											<div class="dropdown-user-details-email">
												<?= Session::get("user_email"); ?>
											</div>
										</div>
									</h6>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="user/index">
										<div class="dropdown-item-icon">
											<i data-feather="settings"></i>
										</div>Account
									</a>
									<a class="dropdown-item" href="login/logout">
										<div class="dropdown-item-icon">
											<i data-feather="log-out"></i>
										</div>Logout
									</a>
								</div>
							</li>
						</ul>
					</nav>
					<div id="layoutSidenav">
						<div id="layoutSidenav_nav">
							<nav class="sidenav shadow-right <?= getSiteDetails('sideBarTheme'); ?>">
								<div class="sidenav-menu">
									<div class="nav accordion" id="accordionSidenav">
										<div class="sidenav-menu-heading">Controllers</div>
										<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseDashboard" aria-expanded="false" aria-controls="collapseDashboard">
											<div class="nav-link-icon">
												<i data-feather="layout"></i>
											</div>Dashboard
											<div class="sidenav-collapse-arrow">
												<i class="fas fa-angle-down"></i>
											</div>
										</a>
										<div class="collapse" id="collapseDashboard" data-parent="#accordionSidenav">
											<nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
												<a class="nav-link" href="dashboard/index">Index</a>
											</nav>
										</div>
										<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseUser" aria-expanded="false" aria-controls="collapseUser">
											<div class="nav-link-icon">
												<i data-feather="user"></i>
											</div>User
											<div class="sidenav-collapse-arrow">
												<i class="fas fa-angle-down"></i>
											</div>
										</a>
										<div class="collapse" id="collapseUser" data-parent="#accordionSidenav">
											<nav class="sidenav-menu-nested nav">
												<a class="nav-link" href="user/index">Index</a>
												<a class="nav-link" href="user/changePassword">Change Password</a>
												<a class="nav-link" href="user/changeUserRole">Change User Role</a>
												<!--<a class="nav-link" href="user/editAvatar">Edit Avatar</a>-->
												<a class="nav-link" href="user/editUserEmail">Edit Email Address</a>
												<a class="nav-link" href="user/editUsername">Edit Username</a>
											</nav>
										</div>
										<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="false" aria-controls="collapseProfile">
											<div class="nav-link-icon">
												<i data-feather="users"></i>
											</div>Profile
											<div class="sidenav-collapse-arrow">
												<i class="fas fa-angle-down"></i>
											</div>
										</a>
										<div class="collapse" id="collapseProfile" data-parent="#accordionSidenav">
											<nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
												<a class="nav-link" href="profile/index">Index</a>
											</nav>
										</div>
										<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseError" aria-expanded="false" aria-controls="collapseError">
											<div class="nav-link-icon">
												<i data-feather="alert-triangle"></i>
											</div>Error
											<div class="sidenav-collapse-arrow">
												<i class="fas fa-angle-down"></i>
											</div>
										</a>
										<div class="collapse" id="collapseError" data-parent="#accordionSidenav">
											<nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
												<a class="nav-link" href="error/error404">404 Page</a>
												<a class="nav-link" href="error/error500">500 Page</a>
											</nav>
										</div>
										<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseNote" aria-expanded="false" aria-controls="collapseNote">
											<div class="nav-link-icon">
												<i data-feather="edit"></i>
											</div>Note
											<div class="sidenav-collapse-arrow">
												<i class="fas fa-angle-down"></i>
											</div>
										</a>
										<div class="collapse" id="collapseNote" data-parent="#accordionSidenav">
											<nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
												<a class="nav-link" href="note/index">Index</a>
											</nav>
										</div>
										<?php if(Session::get("user_account_type") == 7 ){ ?>
										<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="false" aria-controls="collapseAdmin">
											<div class="nav-link-icon">
												<i data-feather="sliders"></i>
											</div>Admin
											<div class="sidenav-collapse-arrow">
												<i class="fas fa-angle-down"></i>
											</div>
										</a>
										<div class="collapse" id="collapseAdmin" data-parent="#accordionSidenav">
											<nav class="sidenav-menu-nested nav">
												<a class="nav-link" href="admin/index">Index</a>
												<a class="nav-link" href="admin/siteSettings">Site Settings</a>
											</nav>
										</div>
										<?php } ?>
										<div class="sidenav-menu-heading">Addons</div>
										<a class="nav-link" href="javascript:void(0)">
											<div class="nav-link-icon">
												<i data-feather="help-circle"></i>
											</div>Documentation
										</a>
										<a class="nav-link" href="javascript:void(0)">
											<div class="nav-link-icon">
												<i data-feather="tool"></i>
											</div>Extending
										</a>
									</div>
								</div>
								<div class="sidenav-footer">
									<div class="sidenav-footer-content">
										<div class="sidenav-footer-subtitle">Logged in as:</div>
										<div class="sidenav-footer-title">
											<?= getUserFullName(Session::get("user_id")); ?>
										</div>
									</div>
								</div>
							</nav>
						</div>
						<div id="layoutSidenav_content">


<?php }else{ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<base href = '<?= Config::get("URL"); ?>/'>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Authentication - <?= getSiteDetails('siteTitle'); ?></title>
        <link href="<?=  "themes/" . Config::get("THEME"); ?>/css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="<?=  "themes/" . Config::get("THEME"); ?>/assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
<?php } ?>
