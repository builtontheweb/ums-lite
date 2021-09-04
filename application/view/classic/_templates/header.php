<?php
include "vendor/init.php";
if (Session::userIsLoggedIn()){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <base href="<?= Config::get("URL"); ?>">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= getSiteDetails('siteTitle'); ?></title>
        <link href="<?=  "themes/" . Config::get("THEME"); ?>/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard"><?= siteLogo(); ?></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="user/index">My account</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="login/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <!-- <div class="nav">
                            <div class="sb-sb-sidenav-menu-heading">Controllers</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div> -->
                        <div class="nav">
                          <div class="sb-sidenav-menu-heading">Controllers</div>
                          <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboard" aria-expanded="false" aria-controls="collapseDashboard">
                            <div class="nav-link-icon">
                              <i data-feather="layout"></i>
                            </div>Dashboard
                            <div class="sb-sidenav-collapse-arrow">
                              <i class="fas fa-angle-down"></i>
                            </div>
                          </a>
                          <div class="collapse" id="collapseDashboard" data-parent="#accordionSidenav">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                              <a class="nav-link" href="dashboard/index">Index</a>
                            </nav>
                          </div>
                          <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapseUser">
                            <div class="nav-link-icon">
                              <i data-feather="user"></i>
                            </div>User
                            <div class="sb-sidenav-collapse-arrow">
                              <i class="fas fa-angle-down"></i>
                            </div>
                          </a>
                          <div class="collapse" id="collapseUser" data-parent="#accordionSidenav">
                            <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="user/index">Index</a>
                              <a class="nav-link" href="user/changePassword">Change Password</a>
                              <a class="nav-link" href="user/changeUserRole">Change User Role</a>
                              <!--<a class="nav-link" href="user/editAvatar">Edit Avatar</a>-->
                              <a class="nav-link" href="user/editUserEmail">Edit Email Address</a>
                              <a class="nav-link" href="user/editUsername">Edit Username</a>
                            </nav>
                          </div>
                          <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseProfile" aria-expanded="false" aria-controls="collapseProfile">
                            <div class="nav-link-icon">
                              <i data-feather="users"></i>
                            </div>Profile
                            <div class="sb-sidenav-collapse-arrow">
                              <i class="fas fa-angle-down"></i>
                            </div>
                          </a>
                          <div class="collapse" id="collapseProfile" data-parent="#accordionSidenav">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                              <a class="nav-link" href="profile/index">Index</a>
                            </nav>
                          </div>
                          <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseError" aria-expanded="false" aria-controls="collapseError">
                            <div class="nav-link-icon">
                              <i data-feather="alert-triangle"></i>
                            </div>Error
                            <div class="sb-sidenav-collapse-arrow">
                              <i class="fas fa-angle-down"></i>
                            </div>
                          </a>
                          <div class="collapse" id="collapseError" data-parent="#accordionSidenav">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                              <a class="nav-link" href="error/error404">404 Page</a>
                              <a class="nav-link" href="error/error500">500 Page</a>
                            </nav>
                          </div>
                          <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseNote" aria-expanded="false" aria-controls="collapseNote">
                            <div class="nav-link-icon">
                              <i data-feather="edit"></i>
                            </div>Note
                            <div class="sb-sidenav-collapse-arrow">
                              <i class="fas fa-angle-down"></i>
                            </div>
                          </a>
                          <div class="collapse" id="collapseNote" data-parent="#accordionSidenav">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                              <a class="nav-link" href="note/index">Index</a>
                            </nav>
                          </div>
                          <?php if(Session::get("user_account_type") == 7 ){ ?>
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseAdmin" aria-expanded="false" aria-controls="collapseAdmin">
                              <div class="nav-link-icon">
                                <i data-feather="sliders"></i>
                              </div>Admin
                              <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                              </div>
                            </a>
                            <div class="collapse" id="collapseAdmin" data-parent="#accordionSidenav">
                              <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="admin/index">Index</a>
                                <a class="nav-link" href="admin/siteSettings">Site Settings</a>
                              </nav>
                            </div>
                          <?php } ?>
                          <div class="sb-sidenav-menu-heading">Addons</div>
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
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?= getUserFullName(Session::get("user_id")); ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">

<?php }else{ ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
    <head>
      <base href="<?= Config::get("URL"); ?>">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Authentication - <?= getSiteDetails('siteTitle'); ?></title>
        <link href="<?=  "themes/" . Config::get("THEME"); ?>/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
<?php } ?>
