
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets/backend/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/style.css">
    <!-- Modals CSS
		============================================ -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/modals.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/responsive.css">
    <!-- chosen CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/chosen/bootstrap-chosen.css">
    <!-- select2 CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/select2/select2.min.css"> 
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/form/all-type-forms.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- jquery
    ============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/jquery-3.4.0.min.js"></script>
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/backend/css/datatables/datatables.min.css"/>
 
    <script type="text/javascript" src="<?php echo base_url() ?>assets/backend/js/datatables/datatables.min.js"></script>
    <style>
        .bgredd{
            background-color:red;
        }
        .ubah{
            border-radius:10%;
        }
        .form-control-plaintext {
            display: block;
            width: 100%;
            padding-top: $input-padding-y;
            padding-bottom: $input-padding-y;
            margin-bottom: 0; // match inputs if this class comes on inputs with default margins
            line-height: $input-line-height;
            background-color: transparent;
            border: solid transparent;
            border-width: $input-border-width 0;

            &.form-control-sm,
            &.form-control-lg {
                padding-right: 0;
                padding-left: 0;
            }
        }
    </style>
    
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="<?php echo base_url() ?>assets/backend/img/logo/logo.png" alt="" /></a>
                <strong><a href="index.html"><img src="<?php echo base_url() ?>assets/backend/img/logo/logosn.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            <a title="Dashboard" href="<?php echo base_url(); ?>" aria-expanded="false">
                                <span class="fa fa-home" aria-hidden="true"></span> 
                                <span class="mini-click-non">Home</span>
                            </a>
                        </li>
                        <li>
                            <a title="Pemasokan" href="<?php echo base_url().'index.php/pemasokan'?>" aria-expanded="false">
                                <span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> 
                                <span class="mini-click-non">Pemasokan</span>
                            </a>
                        </li>
                        <li>
                            <a title="Penjualan" href="<?php echo base_url().'index.php/penjualan'?>" aria-expanded="false">
                                <span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> 
                                <span class="mini-click-non">Penjualan</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="index.html">
								   <span class="fa fa-home"></span>
								   <span class="mini-click-non">Katalog</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Kategori Produk" href="<?php echo base_url().'index.php/kategori_produk' ?>"><span class="mini-sub-pro">Kategori Produk</span></a></li>
                                <li><a title="List Produk" href="<?php echo base_url().'index.php/produk' ?>"><span class="mini-sub-pro">Produk</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="index.html">
								   <span class="fa fa-home"></span>
								   <span class="mini-click-non">Bahan Baku</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Kategori Bahan Baku" href="<?php echo base_url().'index.php/kategori_bahan_baku' ?>"><span class="mini-sub-pro">Kategori Bahan Baku</span></a></li>
                                <li><a title="List Bahan Baku" href="<?php echo base_url().'index.php/bahan_baku' ?>"><span class="mini-sub-pro">List Bahan Baku</span></a></li>
                                <li><a title="Resep" href="<?php echo base_url().'index.php/resep' ?>"><span class="mini-sub-pro">Resep</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a title="Customer" href="<?php echo base_url().'index.php/customer'?>" aria-expanded="false">
                                <span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> 
                                <span class="mini-click-non">Customer</span>
                            </a>
                        </li>
                        <li>
                            <a title="Supplier" href="<?php echo base_url().'index.php/supplier'?>" aria-expanded="false">
                                <span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> 
                                <span class="mini-click-non">Supplier</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="index.html">
								   <span class="fa fa-person"></span>
								   <span class="mini-click-non">Staff</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Pengaturan Hak Akses" href="<?php echo base_url().'index.php/hak_akses' ?>"><span class="mini-sub-pro">Hak Akses</span></a></li>
                                <li><a title="List Staff" href="<?php echo base_url().'index.php/list_staff' ?>"><span class="mini-sub-pro">List Staff</span></a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#">
								   <span class="fa fa-home"></span>
								   <span class="mini-click-non">Keuangan</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Rekap Pemasukan" href="<?php echo base_url().'index.php/rekap_pemasukan' ?>"><span class="mini-sub-pro">Rekap Pemasukan</span></a></li>
                                <li><a title="Rekap Pengeluaran" href="<?php echo base_url().'index.php/rekap_pengeluaran' ?>"><span class="mini-sub-pro">Rekap Pengeluaran</span></a></li>
                                <li><a title="Pemasukan Lain" href="<?php echo base_url().'index.php/pemasukan_lain' ?>"><span class="mini-sub-pro">Pemasukan Lain</span></a></li>
                                <li><a title="Pengeluaran Lain" href="<?php echo base_url().'index.php/pengeluaran_lain' ?>"><span class="mini-sub-pro">Pengeluaran Lain</span></a></li>
                                
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="<?php echo base_url(); ?>>"><img class="main-logo" src="<?php echo base_url() ?>assets/backend/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="#" class="nav-link">Documentation</a>
                                                </li>

                                                <li class="nav-item"><a href="#" class="nav-link">Support</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<img src="<?php echo base_url() ?>assets/backend/img/product/pro4.jpg" alt="" />
															<span class="admin-name">Prof.Anderson</span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
                                                        </li>
                                                        <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                        </li>
                                                        <li><a href="#"><span class="edu-icon edu-money author-log-ic"></span>User Billing</a>
                                                        </li>
                                                        <li><a href="#"><span class="edu-icon edu-settings author-log-ic"></span>Settings</a>
                                                        </li>
                                                        <li><a href="#"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="index.html">Dashboard v.1</a></li>
                                                <li><a href="index-1.html">Dashboard v.2</a></li>
                                                <li><a href="index-3.html">Dashboard v.3</a></li>
                                                <li><a href="analytics.html">Analytics</a></li>
                                                <li><a href="widgets.html">Widgets</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="events.html">Event</a></li>
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="#">Professors <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <li><a href="all-professors.html">All Professors</a>
                                                </li>
                                                <li><a href="add-professor.html">Add Professor</a>
                                                </li>
                                                <li><a href="edit-professor.html">Edit Professor</a>
                                                </li>
                                                <li><a href="professor-profile.html">Professor Profile</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demopro" href="#">Students <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demopro" class="collapse dropdown-header-top">
                                                <li><a href="all-students.html">All Students</a>
                                                </li>
                                                <li><a href="add-student.html">Add Student</a>
                                                </li>
                                                <li><a href="edit-student.html">Edit Student</a>
                                                </li>
                                                <li><a href="student-profile.html">Student Profile</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#democrou" href="#">Courses <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="democrou" class="collapse dropdown-header-top">
                                                <li><a href="all-courses.html">All Courses</a>
                                                </li>
                                                <li><a href="add-course.html">Add Course</a>
                                                </li>
                                                <li><a href="edit-course.html">Edit Course</a>
                                                </li>
                                                <li><a href="course-profile.html">Courses Info</a>
                                                </li>
                                                <li><a href="course-payment.html">Courses Payment</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demolibra" href="#">Library <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demolibra" class="collapse dropdown-header-top">
                                                <li><a href="library-assets.html">Library Assets</a>
                                                </li>
                                                <li><a href="add-library-assets.html">Add Library Asset</a>
                                                </li>
                                                <li><a href="edit-library-assets.html">Edit Library Asset</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demodepart" href="#">Departments <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demodepart" class="collapse dropdown-header-top">
                                                <li><a href="departments.html">Departments List</a>
                                                </li>
                                                <li><a href="add-department.html">Add Departments</a>
                                                </li>
                                                <li><a href="edit-department.html">Edit Departments</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="mailbox.html">Inbox</a>
                                                </li>
                                                <li><a href="mailbox-view.html">View Mail</a>
                                                </li>
                                                <li><a href="mailbox-compose.html">Compose Mail</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                                <li><a href="google-map.html">Google Map</a>
                                                </li>
                                                <li><a href="data-maps.html">Data Maps</a>
                                                </li>
                                                <li><a href="pdf-viewer.html">Pdf Viewer</a>
                                                </li>
                                                <li><a href="x-editable.html">X-Editable</a>
                                                </li>
                                                <li><a href="code-editor.html">Code Editor</a>
                                                </li>
                                                <li><a href="tree-view.html">Tree View</a>
                                                </li>
                                                <li><a href="preloader.html">Preloader</a>
                                                </li>
                                                <li><a href="images-cropper.html">Images Cropper</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a href="bar-charts.html">Bar Charts</a>
                                                </li>
                                                <li><a href="line-charts.html">Line Charts</a>
                                                </li>
                                                <li><a href="area-charts.html">Area Charts</a>
                                                </li>
                                                <li><a href="rounded-chart.html">Rounded Charts</a>
                                                </li>
                                                <li><a href="c3.html">C3 Charts</a>
                                                </li>
                                                <li><a href="sparkline.html">Sparkline Charts</a>
                                                </li>
                                                <li><a href="peity.html">Peity Charts</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="static-table.html">Static Table</a>
                                                </li>
                                                <li><a href="data-table.html">Data Table</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="formsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">App views <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Pagemob" class="collapse dropdown-header-top">
                                                <li><a href="login.html">Login</a>
                                                </li>
                                                <li><a href="register.html">Register</a>
                                                </li>
                                                <li><a href="lock.html">Lock</a>
                                                </li>
                                                <li><a href="password-recovery.html">Password Recovery</a>
                                                </li>
                                                <li><a href="404.html">404 Page</a></li>
                                                <li><a href="500.html">500 Page</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
        </div>
        <br>
        <!-- Content Start -->
            <?php
            $this->load->view($path);
            ?>
            
        <!-- Content End -->
        <br>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url() ?>assets/backend/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url() ?>assets/backend/js/metisMenu/metisMenu-active.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url() ?>assets/backend/js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url() ?>assets/backend/js/sparkline/sparkline-active.js"></script>
    <!-- chosen JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/chosen/chosen.jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/backend/js/chosen/chosen-active.js"></script>
        
    <!-- select2 JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url() ?>assets/backend/js/select2/select2-active.js"></script>
    
    <!-- tab JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url() ?>assets/backend/js/main.js"></script>
</body>

</html>