<?php
    if($this->session->userdata('_login') != TRUE){
      redirect('login');          
    }else{
       $permission = $this->session->userdata('permission');
    }
?>
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
    <!-- Icofont CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/css/icofont/icofont.min.css">        
        
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
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/backend/css/datatables/datatables.min.css"/>
 
    <script type="text/javascript" src="<?php echo base_url() ?>assets/backend/js/datatables/datatables.min.js"></script>
    <!--DateTimePicker -->
    <link href="<?php echo base_url(); ?>assets/backend/css/DatetimePicker/bootstrap-datetimepicker.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/backend/js/moment.js"></script>
	<script src="<?php echo base_url(); ?>assets/backend/js/DatetimePicker/bootstrap-datetimepicker.js"></script>


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
        .margin-btm-10{
            margin-bottom:10px;
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
                <a href="index.html"><img class="main-logo" src="<?php echo base_url() ?>assets/backend/img/logo/poss.png" alt="" /></a>
                <strong><a href="index.html"><img src="<?php echo base_url() ?>assets/backend/img/logo/logosn.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            <a title="Dashboard" href="<?php echo base_url(); ?>" aria-expanded="false">
                                <span class="icofont-ui-home" aria-hidden="true"></span> 
                                <span class="mini-click-non">Home </span>
                            </a>
                        </li>
                        <?php
                        if(preg_match("/2/",$permission)){ 
                        ?>
                            <li>
                                <a title="Penjualan" href="<?php echo base_url().'index.php/penjualan'; ?>" aria-expanded="false">
                                    <span class="fa fa-shopping-cart" aria-hidden="true"></span> 
                                    <span class="mini-click-non">Penjualan</span>
                                </a>
                            </li>
                        <?php
                        }
                        if(preg_match("/1/",$permission)){ 
                        ?>
                            <li>
                                <a title="Pemasokan" href="<?php echo base_url().'index.php/pemasokan'; ?>" aria-expanded="false">
                                    <span class="fa fa-suitcase" aria-hidden="true"></span> 
                                    <span class="mini-click-non">Pemasokan</span>
                                </a>
                            </li>
                        <?php 
                        }
                        if(preg_match("/3/",$permission) || preg_match("/4/",$permission)){ 
                        ?>
                            <li>
                                <a class="has-arrow" href="#">
                                    <span class="fa fa-coffee"></span>
                                    <span class="mini-click-non">Katalog</span>
                                    </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <?php if(preg_match("/3/",$permission)){ ?><li><a title="Kategori Produk" href="<?php echo base_url().'index.php/kategori_produk'; ?>"><span class="mini-sub-pro">Kategori Produk</span></a></li> <?php } ?>
                                    <?php if(preg_match("/4/",$permission)){ ?><li><a title="List Produk" href="<?php echo base_url().'index.php/produk'; ?>"><span class="mini-sub-pro">Produk</span></a></li> <?php } ?>
                                </ul>
                            </li>
                        <?php 
                        }
                        if(preg_match("/5/",$permission) || preg_match("/6/",$permission) || preg_match("/7/",$permission)){ 
                        ?>
                            <li>
                                <a class="has-arrow" href="#">
                                    <span class="fa fa-lemon-o"></span>
                                    <span class="mini-click-non">Bahan Baku</span>
                                    </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <?php if(preg_match("/5/",$permission)){ ?><li><a title="Kategori Bahan Baku" href="<?php echo base_url().'index.php/kategori_bahan_baku'; ?>"><span class="mini-sub-pro">Kategori Bahan Baku</span></a></li><?php } ?>
                                    <?php if(preg_match("/6/",$permission)){ ?><li><a title="List Bahan Baku" href="<?php echo base_url().'index.php/bahan_baku'; ?>"><span class="mini-sub-pro">List Bahan Baku</span></a></li><?php } ?>
                                    <?php if(preg_match("/7/",$permission)){ ?><li><a title="Resep" href="<?php echo base_url().'index.php/resep'; ?>"><span class="mini-sub-pro">Resep</span></a></li><?php } ?>
                                </ul>
                            </li>
                        <?php
                        }
                        if(preg_match("/8/",$permission)){
                        ?>
                            <li>
                                <a title="Customer" href="<?php echo base_url().'index.php/customer';?>" aria-expanded="false">
                                    <span class="fa fa-user" aria-hidden="true"></span> 
                                    <span class="mini-click-non">Customer</span>
                                </a>
                            </li>
                        <?php 
                        }
                        if(preg_match("/9/",$permission)){
                        ?>
                            <li>
                                <a title="Supplier" href="<?php echo base_url().'index.php/supplier'; ?>" aria-expanded="false">
                                    <span class="fa fa-user" aria-hidden="true"></span> 
                                    <span class="mini-click-non">Supplier</span>
                                </a>
                            </li>
                        <?php 
                        }
                        if(preg_match("/10/",$permission) || preg_match("/11/",$permission)){
                        ?>
                            <li>
                                <a class="has-arrow" href="#">
                                    <span class="icofont-businessman"></span>
                                    <span class="mini-click-non">Staff</span>
                                    </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <?php if(preg_match("/10/",$permission)){ ?><li><a title="Pengaturan Hak Akses" href="<?php echo base_url().'index.php/hak_akses'; ?>"><span class="mini-sub-pro">Hak Akses</span></a></li><?php } ?>
                                    <?php if(preg_match("/11/",$permission)){ ?><li><a title="List Staff" href="<?php echo base_url().'index.php/staff'; ?>"><span class="mini-sub-pro">List Staff</span></a></li><?php } ?>
                                    
                                </ul>
                            </li>
                        <?php
                        }
                        if(preg_match("/12/",$permission)){
                        ?>
                        <li>
                            <a class="has-arrow" href="#">
								   <span class="fa fa-fax"></span>
								   <span class="mini-click-non">Keuangan</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <?php if(preg_match("/12/",$permission)){ ?><li><a title="Rekap Keuangan" href="<?php echo base_url().'index.php/rekap_keuangan'; ?>"><span class="mini-sub-pro">Rekap Keuangan</span></a></li><?php } ?>
                                
                            </ul>
                        </li>
                        <?php } ?>
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
                                        
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <!-- <img src="<?php echo base_url() ?>assets/backend/img/product/pro4.jpg" alt="" /> -->
                                                            <i class="icofont-user-alt-7" alt=""></i>
															<span class="admin-name"><?php echo $this->session->userdata('nama_terang'); ?></span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="<?php echo base_url().'index.php/login/logout' ?>" onclick="return confirm('Anda Yakin Ingin Keluar?')"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
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
                                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                        <?php
                                        if(preg_match("/2/",$permission)){ 
                                        ?>
                                            <li><a href="<?php echo base_url().'index.php/penjualan'; ?>">Penjualan</a></li>
                                        <?php
                                        }
                                        if(preg_match("/1/",$permission)){ 
                                        ?>
                                            <li><a href="<?php echo base_url().'index.php/pemasokan'; ?>">Pemasokan</a></li>
                                        <?php 
                                        }
                                        if(preg_match("/3/",$permission) || preg_match("/4/",$permission)){ 
                                        ?>
                                            <li><a data-toggle="collapse" href="#">Katalog <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                                <ul class="collapse dropdown-header-top">
                                                    <?php if(preg_match("/3/",$permission)){ ?><li><a href="<?php echo base_url().'index.php/kategori_produk'; ?>">Kategori Produk</a></li><?php } ?>
                                                    <?php if(preg_match("/4/",$permission)){ ?><li><a href="<?php echo base_url().'index.php/produk'; ?>">List Produk</a></li> <?php } ?>
                                                </ul>
                                            </li>
                                        <?php 
                                        }
                                        if(preg_match("/5/",$permission) || preg_match("/6/",$permission) || preg_match("/7/",$permission)){ 
                                        ?>
                                        <li><a data-toggle="collapse" href="#">Bahan Baku <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <?php if(preg_match("/5/",$permission)){ ?><li><a href="<?php echo base_url().'index.php/kategori_bahan_baku'; ?>">Kategori Bahan Baku</a></li> <?php } ?>
                                                <?php if(preg_match("/6/",$permission)){ ?><li><a href="<?php echo base_url().'index.php/bahan_baku'; ?>">List Bahan Baku</a></li> <?php } ?>
                                                <?php if(preg_match("/7/",$permission)){ ?><li><a href="<?php echo base_url().'index.php/resep'; ?>">Resep</a></li> <?php } ?>
                                            </ul>
                                        </li>
                                        <?php
                                        }
                                        if(preg_match("/8/",$permission)){
                                        ?>
                                        <li><a href="<?php echo base_url().'index.php/customer'; ?>">Customer</a></li>
                                        <?php 
                                        }
                                        if(preg_match("/9/",$permission)){
                                        ?>
                                        <li><a href="<?php echo base_url().'index.php/supplier'; ?>">Supplier</a></li>
                                        <?php 
                                        }
                                        if(preg_match("/10/",$permission) || preg_match("/11/",$permission)){
                                        ?>
                                        <li><a data-toggle="collapse" href="#">Staff <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demopro" class="collapse dropdown-header-top">
                                                <?php if(preg_match("/10/",$permission)){ ?><li><a href="<?php echo base_url().'index.php/hak_akses'; ?>">Hak Akses</a></li> <?php } ?>
                                                <?php if(preg_match("/11/",$permission)){ ?><li><a href="<?php echo base_url().'index.php/staff'; ?>">List Staff</a></li> <?php } ?>
                                            </ul>
                                        </li>
                                        <?php
                                        }
                                        if(preg_match("/12/",$permission)){
                                        ?>
                                        <li><a data-toggle="collapse" href="#">Keuangan <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="democrou" class="collapse dropdown-header-top">
                                                <?php if(preg_match("/12/",$permission)){ ?><li><a href="<?php echo base_url().'index.php/rekap_keuangan'; ?>">Rekap Keuangan</a></li>  <?php } ?>
                                            </ul>
                                        </li>
                                        <?php } ?>
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