<!DOCTYPE html>
<html lang="en">
<head>
    <title>employee Panel</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="" />

    <!-- Favicon icon -->
    <link rel="icon" href="<?=base_url()?>assets/images/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="<?=base_url()?>assets/css/plugins/dataTables.bootstrap4.min.css">


    <!-- font css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/fonts/font-awsome-pro/css/pro.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/fonts/feather.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/fonts/fontawesome.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/customizer.css">


	<!-- Changed Below -->
	<script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script>


<!--	<script src="--><?//=base_url('assets')?><!--/js/jquery.min.js"></script>-->
	<script src="<?= base_url() ?>assets/js/vendor-all.min.js"></script>


	<!-- Snack Bar -->
	<script src="<?= base_url('assets') ?>/js/snackbar.js"></script>

	<script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1951099,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

	<script>
		function toast(type, text, icon) {
			$.toast({
				heading: type,
				text: text,
				showHideTransition: 'slide',
				position: "bottom-right",
				icon: icon
			})
		};
	</script>

</head>

<body class="">

<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ Mobile header ] start -->
<div class="pc-mob-header pc-header">
    <div class="pcm-logo">
        <img src="<?=base_url()?>/images/logo.png" alt="" class="logo logo-lg">
    </div>
    <div class="pcm-toolbar">
        <a href="#!" class="pc-head-link" id="mobile-collapse">
            <div class="hamburger hamburger--arrowturn">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
            <!-- <i data-feather="menu"></i> -->
        </a>
        <a href="#!" class="pc-head-link" id="headerdrp-collapse">
            <i data-feather="align-right"></i>
        </a>
        <a href="#!" class="pc-head-link" id="header-collapse">
            <i data-feather="more-vertical"></i>
        </a>
    </div>
</div>
<!-- [ Mobile header ] End -->

<!-- [ navigation menu ] start -->
<nav class="pc-sidebar ">
    <div class="navbar-wrapper">
        <div class="m-header" >
            <a href="<?=site_url('employee')?>" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
				<img src="<?=base_url()?>/images/logo.png" alt="logo" class="img-fluid" width="90%">
                <img src="<?=base_url()?>/images/logo-sm.svg" alt="" class="logo logo-sm">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="<?=site_url('employee')?>" class="pc-link "><span class="pc-micon"><i data-feather="home"></i></span><span class="pc-mtext">Dashboard</span><span class="pc-arrow"></span></a>
                </li>
<!--                 <li class="pc-item">-->
<!--                    <a href="--><?//=site_url('employee/view/employees')?><!--" class="pc-link"><span class="pc-micon"><i class="fa fa-users"></i></span><span class="pc-mtext">Employees</span></a>-->
<!--                </li>-->
                
                <li class="pc-item">
                    <a href="<?=site_url('employee/view/users')?>" class="pc-link"><span class="pc-micon"><i class="fa fa-user-circle"></i></span><span class="pc-mtext">Users</span></a>
                </li>

                <li class="pc-item">
                    <a href="<?=site_url('employee/view/')?>products" class="pc-link"><span class="pc-micon"><i class="fa fa-cart-plus"></i></span><span class="pc-mtext">Products</span></a>
                </li>
				<li class="pc-item">
                    <a href="<?=site_url('employee/view/')?>categories" class="pc-link"><span class="pc-micon"><i class="fa fa-list-alt"></i></span><span class="pc-mtext">Categories</span></a>
                </li>
<!--				<li class="pc-item">-->
<!--                    <a href="--><?//=site_url('employee/view/')?><!--plan" class="pc-link"><span class="pc-micon"><i class="fa fa-cart-plus"></i></span><span class="pc-mtext">Plans</span></a>-->
<!--                </li>-->
<!---->
<!--                <li class="pc-item">-->
<!--                    <a href="--><?//=site_url('employee/view/order')?><!--" class="pc-link"><span class="pc-micon"><i class="fa fa-file-invoice-dollar mr-1"></i></span><span class="pc-mtext">Orders</span></a>-->
<!--                </li>-->
<!---->
<!---->
<!--                <li class="pc-item">-->
<!--                    <a href="--><?//=site_url('employee/view/coupons')?><!--" class="pc-link"><span class="pc-micon"><i class="fa fa-gift"></i></span><span class="pc-mtext">Coupons</span></a>-->
<!--                </li>-->
<!--				<li class="pc-item">-->
<!--                    <a href="--><?//=site_url('employee/view/stripe')?><!--" class="pc-link"><span class="pc-micon"><i class="fa fa-cog"></i></span><span class="pc-mtext">Stripe configuration</span></a>-->
<!--                </li>-->


            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
<!-- [ Header ] start -->
<header class="pc-header ">
    <div class="header-wrapper">
        <div class="mr-auto pc-mob-drp">
            <ul class="list-unstyled">

            </ul>
        </div>
        <div class="ml-auto">
            <ul class="list-unstyled">
                <?php $employee = $this->session->userdata('employee_login'); ?>

                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?=base_url()?>assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
                        <span>
								<span class="user-name"><?=(!empty($employee[0]['fname'])) ? $employee[0]['fname'].' '.$employee[0]['lname'] : ""; ?></span>
								<span class="user-desc">Employee</span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
                        <div class=" dropdown-header">
                            <h6 class="text-overflow m-0">Welcome !</h6>
						</div>

						<!--                        <a href="#!" class="dropdown-item">-->
<!--                            <i data-feather="user"></i>-->
<!--                            <span>My Account</span>-->
<!--                        </a>-->
<!--                        <a href="#!" class="dropdown-item">-->
<!--                            <i data-feather="settings"></i>-->
<!--                            <span>Settings</span>-->
<!--                        </a>-->
<!--                        <a href="#!" class="dropdown-item">-->
<!--                            <i data-feather="life-buoy"></i>-->
<!--                            <span>Support</span>-->
<!--                        </a>-->
                        <a href="#!" class="dropdown-item">
                            <i data-feather="lock"></i>
                            <span>Lock Screen</span>
                        </a>
                        <a href="<?=site_url('employee/logout')?>" class="dropdown-item">
                            <i data-feather="power"></i>
                            <span>Logout</span>
                        </a>
					</div>
                </li>
            </ul>
        </div>

    </div>
</header>

<!-- Modal -->
<div class="modal notification-modal fade" id="notification-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="nav nav-pill tabs-light mb-3" id="pc-noti-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pc-noti-home-tab" data-toggle="pill" href="#pc-noti-home" role="tab" aria-controls="pc-noti-home" aria-selected="true">Notification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pc-noti-news-tab" data-toggle="pill" href="#pc-noti-news" role="tab" aria-controls="pc-noti-news" aria-selected="false">News<span class="badge badge-danger ml-2 d-none d-sm-inline-block">4</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pc-noti-settings-tab" data-toggle="pill" href="#pc-noti-settings" role="tab" aria-controls="pc-noti-settings" aria-selected="false">Setting<span class="badge badge-success ml-2 d-none d-sm-inline-block">Update</span></a>
                    </li>
                </ul>
                <div class="tab-content pt-4" id="pc-noti-tabContent">
                    <div class="tab-pane fade show active" id="pc-noti-home" role="tabpanel" aria-labelledby="pc-noti-home-tab">
                        <div class="media">
                            <img src="<?=base_url()?>assets/images/user/avatar-1.jpg" alt="images" class="img-fluid avtar avtar-l">
                            <div class="media-body ml-3 align-self-center">
                                <div class="float-right">
                                    <div class="btn-group card-option">
                                        <button type="button" class="btn shadow-none">
                                            <i data-feather="heart" class="text-danger"></i>
                                        </button>
                                        <button type="button" class="btn shadow-none px-0 dropdown-toggle arrow-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i data-feather="more-horizontal"></i>
                                        </button>
                                        <div class="dropdown dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#!"><i data-feather="refresh-cw"></i> reload</a>
                                            <a class="dropdown-item" href="#!"><i data-feather="trash"></i> remove</a>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="mb-0 d-inline-block">Ashoka T.</h6>
                                <p class="mb-0 d-inline-block f-12 text-muted"> • 06/20/2019 at 6:43 PM </p>
                                <p class="my-3">Cras sit amet nibh libero in gravida nulla Nulla vel metus scelerisque ante sollicitudin.</p>
                                <div class="p-3 border rounded">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h6 class="mb-1 f-14">Death Star original maps and blueprint.pdf</h6>
                                            <p class="mb-0 text-muted">by<a href="#!"> Ashoka T </a>.</p>
                                        </div>
                                        <div class="btn-group d-none d-sm-inline-flex">
                                            <button type="button" class="btn shadow-none">
                                                <i data-feather="download-cloud"></i>
                                            </button>
                                            <button type="button" class="btn shadow-none px-0 dropdown-toggle arrow-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="more-horizontal"></i>
                                            </button>
                                            <div class="dropdown dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#!"><i data-feather="refresh-cw"></i> reload</a>
                                                <a class="dropdown-item" href="#!"><i data-feather="trash"></i> remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="media">
                            <img src="<?=base_url()?>assets/images/user/avatar-2.jpg" alt="images" class="img-fluid avtar avtar-l">
                            <div class="media-body ml-3 align-self-center">
                                <div class="float-right">
                                    <div class="btn-group card-option">
                                        <button type="button" class="btn shadow-none px-0 dropdown-toggle arrow-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i data-feather="more-horizontal"></i>
                                        </button>
                                        <div class="dropdown dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#!"><i data-feather="refresh-cw"></i> reload</a>
                                            <a class="dropdown-item" href="#!"><i data-feather="trash"></i> remove</a>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="mb-0 d-inline-block">Ashoka T.</h6>
                                <p class="mb-0 d-inline-block  f-12 text-muted"> • 06/20/2019 at 6:43 PM </p>
                                <p class="my-3">Cras sit amet nibh libero in gravida nulla Nulla vel metus scelerisque ante sollicitudin.</p>
                                <img src="<?=base_url()?>assets/images/slider/img-slide-3.jpg" alt="images" class="img-fluid wid-90 rounded m-r-10 m-b-10">
                                <img src="<?=base_url()?>assets/images/slider/img-slide-7.jpg" alt="images" class="img-fluid wid-90 rounded m-r-10 m-b-10">
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="media mb-3">
                            <img src="<?=base_url()?>assets/images/user/avatar-3.jpg" alt="images" class="img-fluid avtar avtar-l">
                            <div class="media-body ml-3 align-self-center">
                                <div class="float-right">
                                    3 <i data-feather="heart" class="text-danger fill-danger"></i>
                                </div>
                                <h6 class="mb-0 d-inline-block">Ashoka T.</h6>
                                <p class="mb-0 d-inline-block  f-12 <text-muted></text-muted>"> • 06/20/2019 at 6:43 PM </p>
                                <p class="my-3">Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pc-noti-news" role="tabpanel" aria-labelledby="pc-noti-news-tab">
                        <div class="pb-3 border-bottom mb-3 media">
                            <a href="#!"><img src="<?=base_url()?>assets/images/news/img-news-2.jpg" class="wid-90 rounded" alt="..."></a>
                            <div class="media-body ml-3">
                                <p class="float-right mb-0 text-success"><small>now</small></p>
                                <a href="#!"><h6>This is a news image</h6></a>
                                <p class="mb-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
                            </div>
                        </div>
                        <div class="pb-3 border-bottom mb-3 media">
                            <a href="#!"><img src="<?=base_url()?>assets/images/news/img-news-1.jpg" class="wid-90 rounded" alt="..."></a>
                            <div class="media-body ml-3">
                                <p class="float-right mb-0 text-muted"><small>3 mins ago</small></p>
                                <a href="#!"><h6>Industry's standard dummy</h6></a>
                                <p class="mb-2">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <a href="#" class="badge badge-light">Html</a>
                                <a href="#" class="badge badge-light">UI/UX designed</a>
                            </div>
                        </div>
                        <div class="pb-3 border-bottom mb-3 media">
                            <a href="#!"><img src="<?=base_url()?>assets/images/news/img-news-2.jpg" class="wid-90 rounded" alt="..."></a>
                            <div class="media-body ml-3">
                                <p class="float-right mb-0 text-muted"><small>5 mins ago</small></p>
                                <a href="#!"><h6>Ipsum has been the industry's</h6></a>
                                <p class="mb-2">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <a href="#" class="badge badge-light">JavaScript</a>
                                <a href="#" class="badge badge-light">Scss</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pc-noti-settings" role="tabpanel" aria-labelledby="pc-noti-settings-tab">
                        <h6 class="mt-2"><i data-feather="monitor" class="mr-2"></i>Desktop settings</h6>
                        <hr>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="pcsetting1" checked>
                            <label class="custom-control-label f-w-600 pl-1" for="pcsetting1">Allow desktop notification</label>
                        </div>
                        <p class="text-muted ml-5">you get lettest content at a time when data will updated</p>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="pcsetting2">
                            <label class="custom-control-label f-w-600 pl-1" for="pcsetting2">Store Cookie</label>
                        </div>
                        <h6 class="mb-0 mt-5"><i data-feather="save" class="mr-2"></i>Application settings</h6>
                        <hr>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="pcsetting3">
                            <label class="custom-control-label f-w-600 pl-1" for="pcsetting3">Backup Storage</label>
                        </div>
                        <p class="text-muted mb-4 ml-5">Automaticaly take backup as par schedule</p>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="pcsetting4">
                            <label class="custom-control-label f-w-600 pl-1" for="pcsetting4">Allow guest to print file</label>
                        </div>
                        <h6 class="mb-0 mt-5"><i data-feather="cpu" class="mr-2"></i>System settings</h6>
                        <hr>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="pcsetting5" checked>
                            <label class="custom-control-label f-w-600 pl-1" for="pcsetting5">View other user chat</label>
                        </div>
                        <p class="text-muted ml-5">Allow to show public user message</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-light-primary btn-sm">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- [ Header ] end -->
