<!doctype html>
<html class="no-js" lang="en">


<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Global Wireless</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon/favicon.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<!-- CSS
	  ========================= -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;1,100&display=swap"
		  rel="stylesheet">
	<!-- Plugins CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/website/css/plugin.css">

	<!-- Main Style CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/website/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/website/css/login.css">
	<link rel="stylesheet"
		  href="<?= base_url() ?>assets/website/fonts/material-icon/css/material-design-iconic-font.min.css">


</head>

<body>


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
				<div class="Offcanvas_menu_wrapper">
					<div class="canvas_close">
						<a href="javascript:void(0)"><i class="fa fa-window-close" aria-hidden="true"></i></a>
					</div>
					<div class="support_info">
						<p>Telephone Enquiry: <a href="tel:0123456789">0123456789</a></p>
					</div>
					<div class="top_right text-right">
						<ul>
							<li><a href="<?= base_url('user/signin') ?>"> Login </a></li>
							<li><a href="<?= base_url('user/view/checkout') ?>"> Checkout </a></li>
						</ul>
					</div>


					<!--mini cart end-->


					<div class="Offcanvas_footer">
						<span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
						<ul>
							<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
							<li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Offcanvas menu area end-->


<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<ul>
						<li><a href="<?= base_url('user') ?>"> Home </a></li>
						<li><a href="<?= base_url('user/signin') ?>"> Login </a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="form">

	<ul class="tab-group">
		<li class="tab active"><a href="#signup">Sign Up</a></li>
		<li class="tab"><a href="#login">Log In</a></li>
	</ul>

	<div class="tab-content">
		<div id="signup">
			<h1>Sign Up for Free</h1>

			<form action="<?= site_url('user/do_reg') ?>" method="post">

				<div class="top-row">
					<div class="field-wrap">
						<label style="color: black; opacity: 50%; ">
							Name<span class="req">*</span>
						</label>
						<input type="text" name="name" required autocomplete="off"/>
					</div>

					<div class="field-wrap">
						<label style="color: black; opacity: 50%;">Phone<span class="req">*</span>
						</label>
						<input type="number" name="phone" required autocomplete="off"/>
					</div>
				</div>
				<div class="top-row">
					<div class="field-wrap">
						<label style="color: black; opacity: 50%;">Address<span class="req">*</span>
						</label>
						<input type="text" name="address" required autocomplete="off"/>
					</div>
					<div class="field-wrap">
						<label style="color: black; opacity: 50%;">Email Address<span class="req">*</span>
						</label>
						<input type="email" name="email" required autocomplete="off"/>
					</div>
				</div>


				<div class="field-wrap">
					<label style="color: black; opacity: 50%;">
						Set A Password<span class="req">*</span>
					</label>
					<input type="password" name="password" required autocomplete="off"/>
				</div>

				<button type="submit" class="button button-block">Get Started</button>

			</form>

		</div>

		<div id="login">
			<h1>Welcome Back!</h1>

			<form action="<?= site_url('user/do_login') ?>" method="post">

				<div class="field-wrap">
					<label style="color: black; opacity: 50%;">
						Email Address<span class="req">*</span>
					</label>
					<input type="email" name="email" required autocomplete="off"/>
				</div>

				<div class="field-wrap">
					<label style="color: black; opacity: 50%;">
						Password<span class="req">*</span>
					</label>
					<input type="password" name="password" required autocomplete="off"/>
				</div>
				<?php $error = $this->session->flashdata('error_login');
				if (isset($error)) { ?>
					<?php echo $error ?>
				<?php } ?>
				<p class="forgot"><a href="#">Forgot Password?</a></p>

				<button class="button button-block">Log In</button>

			</form>

		</div>

	</div><!-- tab-content -->

</div> <!-- /form -->


<!-- modal area start-->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="modal_body">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-5 col-sm-12">
							<div class="modal_tab">
								<div class="tab-content product-details-large">
									<div class="tab-pane fade show active" id="tab1" role="tabpanel">
										<div class="modal_tab_img">
											<a href="#"><img src="assets/img/product/product1.jpg" alt=""></a>
										</div>
									</div>
									<div class="tab-pane fade" id="tab2" role="tabpanel">
										<div class="modal_tab_img">
											<a href="#"><img src="assets/img/product/product2.jpg" alt=""></a>
										</div>
									</div>
									<div class="tab-pane fade" id="tab3" role="tabpanel">
										<div class="modal_tab_img">
											<a href="#"><img src="assets/img/product/product3.jpg" alt=""></a>
										</div>
									</div>
									<div class="tab-pane fade" id="tab4" role="tabpanel">
										<div class="modal_tab_img">
											<a href="#"><img src="assets/img/product/product5.jpg" alt=""></a>
										</div>
									</div>
								</div>
								<div class="modal_tab_button">
									<ul class="nav product_navactive owl-carousel" role="tablist">
										<li>
											<a class="nav-link active" data-toggle="tab" href="#tab1" role="tab"
											   aria-controls="tab1" aria-selected="false"><img
														src="assets/img/product/product1.jpg" alt=""></a>
										</li>
										<li>
											<a class="nav-link" data-toggle="tab" href="#tab2" role="tab"
											   aria-controls="tab2" aria-selected="false"><img
														src="assets/img/product/product2.jpg" alt=""></a>
										</li>
										<li>
											<a class="nav-link button_three" data-toggle="tab" href="#tab3"
											   role="tab" aria-controls="tab3" aria-selected="false"><img
														src="assets/img/product/product3.jpg" alt=""></a>
										</li>
										<li>
											<a class="nav-link" data-toggle="tab" href="#tab4" role="tab"
											   aria-controls="tab4" aria-selected="false"><img
														src="assets/img/product/product5.jpg" alt=""></a>
										</li>

									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-7 col-md-7 col-sm-12">
							<div class="modal_right">
								<div class="modal_title mb-10">
									<h2>Handbag feugiat</h2>
								</div>
								<div class="modal_price mb-10">
									<span class="new_price">$64.99</span>
									<span class="old_price">$78.99</span>
								</div>
								<div class="modal_description mb-15">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
										laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam
										in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel
										recusandae </p>
								</div>
								<div class="variants_selects">
									<div class="variants_size">
										<h2>size</h2>
										<select class="select_option">
											<option selected value="1">s</option>
											<option value="1">m</option>
											<option value="1">l</option>
											<option value="1">xl</option>
											<option value="1">xxl</option>
										</select>
									</div>
									<div class="variants_color">
										<h2>color</h2>
										<select class="select_option">
											<option selected value="1">purple</option>
											<option value="1">violet</option>
											<option value="1">black</option>
											<option value="1">pink</option>
											<option value="1">orange</option>
										</select>
									</div>
									<div class="modal_add_to_cart">
										<form action="#">
											<input min="0" max="100" step="2" value="1" type="number">
											<button type="submit">add to cart</button>
										</form>
									</div>
								</div>
								<div class="modal_social">
									<h2>Share this product</h2>
									<ul>
										<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
										<li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a>
										</li>
										<li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- modal area end-->


<!-- JS
============================================ -->

<!-- Plugins JS -->
<script src="<?= base_url() ?>assets/website/js/plugin.js"></script>

<!-- Main JS -->
<script src="<?= base_url() ?>assets/website/js/main.js"></script>
<script src="<?= base_url() ?>assets/website/js/index.js"></script>
<script src="<?= base_url() ?>assets/website/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/website/js/bootstrap.min.js"></script>


</body>


</html>
