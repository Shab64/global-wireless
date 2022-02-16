<!doctype html>
<html class="no-js" lang="en">


<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Global Wireless</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/website/img/favicon/favicon.ico">
	<link rel="stylesheet" href="<?= base_url() ?>assets/toast/jquery.toast.css">
	<link rel="stylesheet" href="<?=base_url('assets/fonts/fontawesome.css')?>"/>
	<link rel="stylesheet" href="<?=base_url('assets/fonts/font-awesome.min.css')?>"/>
	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>"/>

	<!-- CSS
	  ========================= -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,800;0,900;1,700&display=swap"
		  rel="stylesheet">
	<!-- Plugins CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/website/css/plugin.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/website/css/review.css">
	<!-- Main Style CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/website/css/style.css">
	<!--	toast-->
	<script src="<?= base_url() ?>/assets/js/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url('assets/js/popper.min.js')?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>

	<style>
		body h1 {
			font-weight: 500 !important;
		}

		.my-img {
			width: 300px;
			height: 200px;
			object-fit: cover;
		}

		.searchform {
			margin-top: 15px;
		}

		@media (max-width: 769px) {
			.ftco-navbar-light .navbar-toggler {
				display: none;
			}

			.searchform {
				display: none;
			}

			.main_header {
				padding-bottom: 0px;
			}
		}

		@media only screen and (max-width: 991px) {
			#ftco-nav .nav-item {
				display: none;
			}
		}
		@media only screen and (min-width: 992px) and (max-width: 1060px) {
	
		.ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
	font-size: 10px;
	margin: 0;
	padding: 0;
	padding-left: 10px;
	}
}
@media only screen and (min-width: 1061px) and (max-width: 1119px) {
	
		.ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
	font-size: 12px;
	margin: 0;
	padding: 0;
	padding-left: 14px;
	}
}
@media only screen and (min-width: 1120px) and (max-width: 1200px) {
	
		.ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
	font-size: 13px;
	margin: 0;
	padding: 0;
	padding-left: 20px;
	}
}
@media only screen and (min-width: 1201px) and (max-width: 1263px) {
	
		.ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
	font-size: 15px;
	margin: 0;
	padding: 0;
	padding-left: 25px;
	}
}

		.header_top .dropdown-menu .dropdown-item:hover, .header_top .dropdown-menu .dropdown-item:focus {
			background: #090C9B !important;
			color: #fff;
		}

		.mini_cart {
			overflow-y: scroll !important;
		}

		.finish-loading {
			display: none !important;
		}

		.loading-1 {
			position: fixed;
			width: 100%;
			height: 100%;
			z-index: 99;
			background: #fff;
			display: grid;
			place-items: center;
		}
		/*.pricing-plans{*/
		/*	height: 100px;*/
		/*	overflow-y: scroll;*/
		/*	overflow-x: hidden;*/
		/*}*/
		#style-1::-webkit-scrollbar-track
		{
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
			border-radius: 10px;
			background-color: #E6EEFF;
		}

		#style-1::-webkit-scrollbar
		{
			width: 4px;
			background-color: #E6EEFF;
		}

		#style-1::-webkit-scrollbar-thumb
		{
			border-radius: 20px;
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
			background-color: #007bff;
		}

		/*start new plan styling*/
		.rounded-lg {
			border-radius: 1rem !important;
		}

		.text-small {
			font-size: 0.9rem !important;
		}

		.custom-separator {
			width: 5rem;
			border-radius: 3rem;
			border-bottom: 6px solid #007bff;
			margin-left: 80px;
		}

		.text-uppercase {
			letter-spacing: 0.1em;
		}

		/*end*/
	</style>
</head>

<body>
<div class="loading-1">
	<div style="text-align: center">
		<img src="<?= base_url('images/mobile.gif') ?>">
		<!--<h3 style="color: #090C9B">Global CRM</h3>-->
	</div>
</div>


<!--Offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>
<div class="Offcanvas_menu">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="canvas_open">
					<a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
				</div>
				<div class="Offcanvas_menu_wrapper" style="background-color: #3B5999!important;color: white">
					<div class="canvas_close">
						<a href="javascript:void(0)"><i class="fa fa-window-close" aria-hidden="true"></i></a>
					</div>

					<ul class="navbar-nav m-auto">
						<li class="nav-item"><a href="<?= base_url('user') ?>" class="nav-link">Home</a></li>
						<li class="nav-item"><a href="<?= base_url('user/view/products') ?>"
												class="nav-link">Products</a>
						</li>
						<li class="nav-item"><a href="<?= base_url('user/view/review') ?>" class="nav-link">Reviews</a>
						</li>
						<li class="nav-item"><a href="<?= base_url('user/view/contact') ?>" class="nav-link">Contact</a>
						</li>
						<li class=" nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown"
							   aria-haspopup="true" aria-expanded="false">Services</a>
							<div class="dropdown-menu" aria-labelledby="dropdown04">
								<a class="dropdown-item" href="<?= base_url('user/view/business') ?>">Business</a>
								<a class="dropdown-item" href="<?= base_url('user/view/residential') ?>">Residential</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="<?= base_url('user/view/faq') ?>">FAQ</a>
						</li>
						<li class="nav-item"><a class="nav-link" href="<?= base_url('user/view/return') ?>">Return
								Policy</a>
						</li>
					</ul>
					<div class="top_right text-right">
						<ul>
							<li><a href="<?= base_url('user/signin') ?>"> Login </a></li>
							<li><a href="<?= base_url('user/checkout') ?>"> Checkout </a></li>
						</ul>
					</div>

					<!--mini cart end-->
				</div>
			</div>
		</div>
	</div>
</div>
<!--Offcanvas menu area end-->

<!--header area start-->
<header>
	<div class="main_header">
		<!--header top start-->
		<div class="header_top">

			<div class="top_right text-right">
				<ul>
					<li style="font-size: small;color: papayawhip;float: left;margin-left: 250px">
						<a><?= date('F j, Y') ?></a></li>
					<?php $user = $this->session->userdata('client_login');
					if (isset($user)) { ?>
						<li>
							<div class="dropdown">
								<a style="color: white; font-size: small;" class=" dropdown-toggle" href="#"
								   role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
								   aria-expanded="false">
									<?= 'Welcome ' . ucfirst($user['name']); ?>
								</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<a class="dropdown-item" href="<?= site_url('user/view/profile') ?>">Profile</a>
									<a class="dropdown-item" href="<?= site_url('user/logout') ?>">Logout</a>
								</div>
							</div>
						</li>
					<?php } else { ?>
						<li><a style="color: white; font-size: small;" href="<?= base_url('user/signin') ?>"> Log in <i
										class="fa fa-sign-in" aria-hidden="true"></i></a></li> <?php } ?>
					<li><a href="javascript:void(0)" data-toggle="modal" data-target="#modalContactForm"
						   style="color: white;">Request a Quote</a></li>
				</ul>

			</div>
		</div>
	</div>
	<!--header top start-->
	<!--header middel start-->

	<!--header middel end-->
	<!--header bottom satrt-->
	<nav class="navbar navbar-expand-sm navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<div class="logo">
				<a href="<?= base_url('user') ?>"><img src="<?= base_url('assets/website') ?>/img/logo/logo.jpg" alt=""></a>
			</div>
			<form action="#" class="searchform order-sm-start order-lg-last">
				<div class="form-group d-flex">
					<input type="text" onkeyup="search_()" autocomplete="off" class="form-control pl-3" name="search"
						   id="search_data" placeholder="Search ..">
					<div>
						<ul id="searchResult" style="position: absolute;
    background: #fff;
    height: 200px;
    width: 19%;
    left: 1170px;
    top: 60px;
    border-radius: 11px;
    border: 1px solid #E5E5E5;
    list-style: none;
    display: none;
    z-index: 999;
    overflow-y: scroll;
"></ul>
					</div>
				</div>
			</form>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
					aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav m-auto">
					<li class="nav-item"><a href="<?= base_url('user') ?>" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="<?= base_url('user/view/products') ?>" class="nav-link">Products</a>
					</li>
					<li class=" nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown"
						   aria-haspopup="true" aria-expanded="false">Services</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="<?= base_url('user/view/business') ?>">Business</a>
							<a class="dropdown-item" href="<?= base_url('user/view/residential') ?>">Residential</a>
						</div>
					</li>
					<li class="nav-item"><a href="<?= base_url('user/view/review') ?>" class="nav-link">Reviews</a></li>
					<li class="nav-item"><a href="<?= base_url('user/view/contact') ?>" class="nav-link">Contact</a>
					</li>
					<li class=" nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown"
						   aria-haspopup="true" aria-expanded="false">Help</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="<?= base_url('user/blogs') ?>">Blogs</a>
							<a class="dropdown-item" href="<?= base_url('user/view/faq') ?>">FAQ</a>
							<a class="dropdown-item" href="<?= base_url('user/view/return') ?>">Return Policy</a>
						</div>
					</li>

				</ul>
			</div>
		</div>
		<?php $cart = $this->cart->contents();
		$total = 0; ?>
		<div class="middel_right_info">
			<a style="margin-right: 20px;font-size: 20px;position:relative " title="Wishlist"
			   href="<?= base_url('user/view/wishlist') ?>"><i style="color:#090C9B;" class="fas fa-heart"></i></a>
			<span style="position: absolute;background: white;font-weight: bolder; color: #3a87ad;font-size:10px; padding: 0px 7px;border-radius: 50%;top: 15px	;right: 125px"><?= (!empty($wishlist)) ? count($wishlist) : 0 ?></span>
			<div class="mini_cart_wrapper" style="position: relative">
				<a style="margin-right: 100px;position: relative" href="<?= base_url('user/view/cart') ?>"><i
							style="color:#090C9B;" class="fas fa-shopping-cart" title="shopping cart"></i></a>
				<span style="position: absolute;background: white;font-size:10px;color:#3a87ad;font-weight: bolder;margin: 0px; padding: 0px 7px;border-radius: 50%;top: -15px;right: 83px"><?= (!empty($cart)) ? count($cart) : ((!empty($cart_data)) ? count($cart_data) : 0) ?></span>

				<!--mini cart-->
				<?php if (!empty($cart)) { ?>
					<div class="mini_cart">
						<?php foreach ($cart as $value) { ?>
							<div class="cart_item">
								<div class="cart_img">
									<a href="#"><img src="<?= base_url('uploads/' . $value['options']['image']) ?>"
													 alt=""></a>
								</div>
								<div class="cart_info">
									<a href="#"><?= $value['name'] ?></a>
									<p>Qty: <?= $value['qty'] ?> X <span> <?= $value['price'] . '$' ?> </span></p>
								</div>
								<?php $total += $value['qty'] * $value['price']; ?>
							</div>
						<?php } ?>
						<div class="mini_cart_table">
							<div class="cart_total">
								<span>Sub total:</span>
								<span class="price"><?= $total . '$' ?></span>
							</div>
							<div class="cart_total mt-10">
								<span>total:</span>
								<span class="price"><?= $total . '$' ?></span>
							</div>
						</div>

						<div class="mini_cart_footer">
							<div class="cart_button">
								<a href="<?= base_url('user/view/cart') ?>">View cart</a>
							</div>
							<div class="cart_button">
								<a href="<?= base_url('user/checkout') ?>">Checkout</a>
							</div>

						</div>

					</div>
				<?php } ?>
	</nav>

	<!--header bottom end-->

</header>
<!--header area end-->

<!--sticky header area start-->
<div class="sticky_header_area sticky-header" style="background:white">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-3">
				<div class="logo">
					<a href="<?= base_url('user') ?>"><img src="<?= base_url('assets/website/img/logo/logo.jpg') ?>"
														   alt=""></a>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="sticky_header_right menu_position">
					<div class="main_menu">
						<nav class="navbar navbar-expand-sm navbar-dark ftco_navbar bg-dark ftco-navbar-light"
							 id="ftco-navbar">
							<div class="container">

								<button class="navbar-toggler" type="button" data-toggle="collapse"
										data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false"
										aria-label="Toggle navigation">
									<span class="fa fa-bars"></span> Menu
								</button>
								<div class="collapse navbar-collapse" id="ftco-nav">
									<ul class="navbar-nav m-auto">
										<li class="nav-item"><a href="<?= base_url('user') ?>" class="nav-link">Home</a>
										</li>
										<li class="nav-item"><a href="<?= base_url('user/view/products') ?>"
																class="nav-link">Products</a></li>
										<!--<li class="nav-item"><a href="<?= base_url('user/view/my-subscriptions') ?>" class="nav-link">My Subscriptions</a></li>-->
										<li class=" nav-item dropdown">
											<a href="#" class="nav-link dropdown-toggle" id="dropdown04"
											   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
											<div class="dropdown-menu" aria-labelledby="dropdown04">
												<a class="dropdown-item" href="<?= base_url('user/view/business') ?>">Business</a>
												<a class="dropdown-item"
												   href="<?= base_url('user/view/residential') ?>">Residential</a>
											</div>
										</li>

										<li class="nav-item"><a href="<?= base_url('user/view/review') ?>"
																class="nav-link">Reviews</a></li>
										<li class="nav-item"><a href="<?= base_url('user/view/contact') ?>"
																class="nav-link">Contact</a></li>
										<li class=" nav-item dropdown">
											<a href="#" class="nav-link dropdown-toggle" id="dropdown04"
											   data-toggle="dropdown" aria-haspopup="true"
											   aria-expanded="false">Help</a>
											<div class="dropdown-menu" aria-labelledby="dropdown04">
												<a class="dropdown-item" href="<?= base_url('user/view/faq') ?>">FAQ</a>
												<a class="dropdown-item" href="<?= base_url('user/return') ?>">Return
													Policy</a>
											</div>
										</li>

									</ul>
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background: #090C9B;color: white;">
				<h5 class="modal-title" id="exampleModalLabel">Request a Quote</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"
						style="left:92%;border:0px!important">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="contact-form" method="POST" action="<?= site_url('user/contact') ?>" id="request_a_quote">
				<div class="modal-body mx-3">
					<p id="required"></p>
					<div class="md-form mb-2">
						<i class="fas fa-user prefix grey-text"></i> <label data-error="wrong" data-success="right"
																			for="form34">Name</label>
						<input type="text" id="form34" class="form-control " name="name" required>

					</div>

					<div class="md-form mb-2">
						<i class="fas fa-envelope prefix grey-text"></i> <label data-error="wrong" data-success="right"
																				for="form29">Email</label>
						<input type="email" id="form29" class="form-control " name="email" required>

					</div>

					<div class="md-form mb-2">
						<i class="fas fa-tag prefix grey-text"></i> <label data-error="wrong" data-success="right"
																		   for="form32">Phone</label>
						<input type="number" id="form32" class="form-control " name="phone" required>

					</div>

					<div class="md-form mb-2">
						<i class="fa fa-pencil prefix grey-text"></i> <label data-error="wrong" data-success="right"
																			 for="form8">Your message</label>
						<textarea type="text" id="form8" name="message" class="md-textarea form-control" rows="6"
								  required></textarea>

					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button style="background-color: #090C9B; color: white;" type="button" class="btn btn-unique"
							id="request-quote">Request
					</button>
				</div>
			</form>
		</div>

	</div>
</div>

<!--<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>-->
<!--<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->
<!--<script type="text/javascript" src="slick/slick.min.js"></script>-->
<!--sticky header area end-->
<!--	<script>-->
<!--		$(document).ready(function(){-->
<!--			$('.your-class').slick({-->
<!--				setting-name: setting-value-->
<!--		});-->
<!--		});-->
<!--	</script>-->
