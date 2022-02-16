<style>
	@media (max-width: 600px) {
		.multiline {
			font-size: 20px !important;
		}

		.multiline2 {
			letter-spacing: 1.5px;
			line-height: 150%;
			font-size: 20px;
		}

		#mobile-sale {
			background-color: #e6eeff !important;
			width: 100%;
			height: auto;
			/* padding-top: 200px; */
			margin-bottom: 0px;
			/* -ms-grid-column: 1; */
			border-radius: 10px;
			margin-left: 0px;
		}

		h2 {
			font-size: 20px !important;
		}

		p {
			margin-left: 0px !important;
			font-size: 16px !important;
			text-align: center;
		}


		.hover-table-layout {
			width: 100%;
		}


		.label_product {
			left: 0;
		}

	}
	
	#carouselExampleCaptions .carousel-inner .carousel-item img{
	    height: 100vh;
	}
	
	#mobile-sale .content-text h2{
		text-align: center;
		font-family: 'Poppins', sans-serif;
		font-size: 60px;
		color: #090C9B;
		padding-top: 50px;
		text-transform: uppercase;
		font-weight: 500;
	}
	#mobile-sale .content-text p{
		margin-left: 120px;
		margin-top: 20px;
		color: #090C9B;
		font-weight: 500;
		font-family: 'Poppins', sans-serif;
		font-size: 22px;
	}
	#carousel .carousel-inner .carousel-item img {
		height: 600px;
	}
	.caption h2 {
		color: black;
		font-size: 25px;
		font-weight: 600;
	}
	.caption a{
		background: #090C9B;
		color: white;
		border-radius: 20px;
	}

	@media only screen and (max-width: 450px) {
		#carousel .carousel-inner {
			display: none;
		}
		#carouselExampleCaptions .carousel-inner {
	    height: 200px;
	}
	#carouselExampleCaptions .carousel-inner .carousel-item img{
	    height: 200px;
	}

	}

	@media only screen and (min-width: 451px) and (max-width: 600px) {
	    
	    #carouselExampleCaptions .carousel-inner {
	    height: 250px;
	}
	#carouselExampleCaptions .carousel-inner .carousel-item img{
	    height: 250px;
	}
		#carousel .carousel-inner {
			margin-top: 20px;
			height: 450px;
			margin-bottom: 0;
		}
		.caption h2 {
			line-height: 1;
			color: black;
			font-size: 3px;
			font-weight: 500px;
		}
		.caption a{
			font-size: 18px;
			background: #090C9B;
			color: white;
			border-radius: 20px;
		}
		#carousel .carousel-inner img{
			height: 450px;
		}

	}

	@media only screen and (min-width: 601px) and (max-width: 786px) {
		#carousel .carousel-inner {
			margin-top: 20px;
			height: 450px;
			margin-bottom: 0;
		}
		.caption h2 {
			line-height: 1;
			color: black;
			font-size: 22px;
			font-weight: 500;
		}
		.caption a{
			font-size: 20px;
			background: #090C9B;
			color: white;
			border-radius: 20px;
		}
		#carousel .carousel-inner img{
			height: 450px;
		}
	}
	.list-unstyled li:last-child{
		box-shadow:inset 0 30px 5px rgba(0,0,0,.1);
	}
	.read-more{
		/*filter: blur(100px);*/
		box-shadow: 0 -10px 30px 20px rgba(0,0,0,0.4);
	}


	@media only screen and (max-width: 786px) {
		#carouselExampleCaptions h1 {
			font-size: 30px;
		}
	}
</style>

<!--slider area start-->

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="background-color: #0b0b0b">
	<?php if(!empty($all_sliders)){ ?>
	<div class="carousel-inner">
		<?php foreach ($all_sliders as $k=>$slider) { ?>
		<div class="carousel-item <?php if($k == 0) { echo "active";} ?>">
			<img src="<?=base_url('uploads/'.$slider['image'])?>" class="d-block w-100 img-responsive"  alt="...">
			<div class="carousel-caption d-none d-md-block">
				<h1 style="<?=($k == 3 or $k === 4) ? "color:#090C9B" : "color:#fff" ?>"><?=$slider['title']?></h1>
				<h4 style="<?=($k == 3 or $k === 4) ? "color:#090C9B" : "color:#fff" ?>"><?=$slider['detail']?></h4>
			</div>
		</div>
		<?php } ?>
	</div>
	<?php } ?>
	<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">prev</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>


<!--slider area end-->


<!--shipping area start-->
<section class="shipping_area shipping_four mb-30" style="margin-top: 10px">
	<div class="container">
		<div class="shipping_inner">
			<div class=" row no-gutters">
				<div class="col-lg-3 col-md-6">
					<div class="single_shipping">
						<div class="shipping_icone">
							<img src="<?= base_url('assets/website') ?>/img/about/shipping1.png" alt="">
						</div>
						<div class="shipping_content">
							<h2>Free Delivery</h2>
							<p>For all oders over $99</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single_shipping">
						<div class="shipping_icone">
							<img src="<?= base_url('assets/website') ?>/img/about/shipping2.png" alt="">
						</div>
						<div class="shipping_content">
							<h2>Safe Payment</h2>
							<p>100% secure payment</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single_shipping">
						<div class="shipping_icone">
							<img src="<?= base_url('assets/website') ?>/img/about/shipping3.png" alt="">
						</div>
						<div class="shipping_content">
							<h2>Shop With Confidence</h2>
							<p>If goods have problems</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single_shipping last_child">
						<div class="shipping_icone">
							<img src="<?= base_url('assets/website') ?>/img/about/shipping4.png" alt="">
						</div>
						<div class="shipping_content">
							<h2>24/7 Help Center</h2>
							<p>Dedicated 24/7 support</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--shipping area end-->
<!--product area start-->

<div id="mobile-sale">
	<section>
		<div class="container py-5 ">
			<div class="row text-center">
				<!-- Pricing Table-->
				<?php
				if (!empty($three_plans)):
					foreach ($three_plans as $keee=>$plan):
						$plan_details = json_decode($plan['plan_details'], true) ?>
						<div class="col-lg-4 main-plans">
							<div class="pricing-plans" id="style-<?=$keee?>">
								<div class="bg-white p-5 rounded-lg shadow">
									<h1 class="h6 text-uppercase font-weight-bold mb-4"><?= strtoupper($plan['plan_name']) ?></h1>
									<h2 class="h1 font-weight-bold">$<?= $plan['plan_price'] ?><span class="text-small font-weight-normal ml-2">/ <?= strtoupper($plan['plan_duration']) ?></span></h2>

									<div class="custom-separator"></div>
									<?php if (!empty($plan['plan_details'])): ?>
										<ul class="list-unstyled my-5 text-small text-left font-weight-normal">
											<?php foreach ($plan_details as $detail): ?>
												<li class="mb-3">
													<i class="fa fa-check mr-2 text-primary"></i><?= ucfirst($detail) ?></li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>


									<?php if (isset($my_plans)) { ?>
										<?php $planSubscribed = false;
										foreach ($my_plans as $my_plan) {
											if ($my_plan['plan_id'] == $plan['id']) {
												$planSubscribed = true; ?>
											<?php } ?>
										<?php } ?>
<!--										<a class="btn btn-primary btn-block p-2 shadow rounded-pill" href="--><?//= ($planSubscribed && $my_plan['is_canceled'] === "No") ? 'javascript:void(0)' : base_url("user/view/plan-details/".urlencode(base64_encode($plan["id"])))  ?><!--" >--><?//= ($planSubscribed && $my_plan['is_canceled'] === "No") ? 'SUBSCRIBED' : 'SUBSCRIBE' ?><!--</a>-->
									<?php } else { ?>
<!--										<a class="btn btn-primary btn-block p-2 shadow rounded-pill" href="--><?//= base_url('user') . '/view/plan-details/' . urlencode(base64_encode($plan['id'])) ?><!--">SIGN UP</a>-->
									<?php } ?>
								</div>
							</div>
							<a class="btn btn-primary p-2 text-white btn-block read-more">Read More</a>
						</div>
						<!-- END -->
					<?php  endforeach;
				endif; ?>
			</div>
		</div>
	</section>
</div>
<!--product area end-->
<div id="carousel"  data-ride="carousel">


	<div class="carousel-inner" role="listbox">

		<div class="carousel-item active" >
			<img src="https://cdn.buttercms.com/QufzblbRa8xKRmte39Jw" style="height: 600px"  alt="...">
			<div class="caption">
				<h1>Warp speed on <br>5G, Ludicrous<br> speed on 4G</h1>
				<h2>Our ultra-fast 4G LTE and 5G networks<br> cover 99% of Americans. So we’ve got <br>you covered everywhere.</h2>
				<a href="<?=base_url('user/view/business')?>" class="btn btn-lg active" role="button" aria-pressed="true">Volp Business</a>
			</div>
		</div>
	</div>

</div>



<!--featured product area start-->
<section class="featured_product_area mb-70">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section_title text-center">
					<h2 style="font-size: 40px!important;">Latest Products</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php if (!empty($all_products)) { ?>
				<?php foreach ($all_products as $pro) { ?>
					<?php $img = (!empty($pro['image'])) ? json_decode($pro['image']) : "" ?>
					<div class="col-lg-3">
						<article class="single_product">
							<figure>
								<div class="product_thumb">
									<a class="primary_img"
									   href="<?= site_url('user/view/product-details/' . $pro['id']) ?>"><img
												src="<?= (!empty($pro['image'])) ? base_url('uploads/' . $img[0]) : "https://thedailytouristbd.com/uploads/no_image.jpg" ?>"
												class="img-fluid " alt=""></a>

									<?php if(!empty($pro['product_tag']) and $pro['product_tag'] !== 'no_tag'){ ?>
										<div class="label_product">
											<span class="label_sale"><?=$pro['product_tag']?></span>
										</div>
									<?php } ?>
								</div>
								<figcaption class="product_content">
									<div class="price_box">
										<span class="current_price"><?=(!empty($pro) and !empty($pro['d_price'])) ? '<del style="color: grey">$'.$pro['d_price'].'</del> $'.$pro['price'] : '$'.$pro['price']; ?></span>
									</div>
									<h3 class="product_name"><a
												href="#"><?= (!empty($pro['title'])) ? $pro['title'] : '-' ?></a></h3>
									<div class="action_links">
										<ul>
											<li class="wishlist"><a
														href="<?= site_url('user/wishlist/wishlist/' . $pro['id']) ?>"
														title="Add to Wishlist"><i class="fa fa-heart-o"
																				   aria-hidden="true"></i></a></li>
											<li class="quick_button"><a href="javascript:void(0)"
																		onclick="quickView('<?= site_url('user/quickView/products/index/' . $pro['id']) ?>')"
																		title="quick view"> <span> <i class="fa fa-eye"
																									  aria-hidden="true"></i></span></a>
											</li>
										</ul>
									</div>
									<div class="add_to_cart">
										<a href="<?= site_url('user/view/product-details/' . $pro['id']) ?>"
										   title="view details">view product</a>
									</div>
								</figcaption>
							</figure>
						</article>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</section>
<p id="showmodalhere"></p>
<!--product area start-->
<section class="product_area mb-46">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section_title text-center">
					<h2 style="font-size: 40px!important;">Accessories</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php if (!empty($all_accessories)) { ?>
				<?php foreach ($all_accessories as $pro) { ?>
					<?php $img = (!empty($pro['image'])) ? json_decode($pro['image']) : "" ?>
					<div class="col-lg-3">
						<article class="single_product">
							<figure>
								<div class="product_thumb">
									<a class="primary_img"
									   href="<?= site_url('user/view/product-details/' . $pro['id']) ?>"><img src="<?= (!empty($pro['image'])) ? base_url('uploads/' . $img[0]) : "https://thedailytouristbd.com/uploads/no_image.jpg" ?>" class="my-img" alt=""></a>
									<?php if(!empty($pro['product_tag']) and $pro['product_tag'] !== 'no_tag'){ ?>
										<div class="label_product">
											<span class="label_sale"><?=$pro['product_tag']?></span>
										</div>
									<?php } ?>
									<div class="action_links">
										<ul>
											<li class="wishlist">
												<a href="<?= site_url('user/wishlist/product-details/' . $pro['id']) ?>" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
											</li>
											<li class="quick_button">
												<a href="javascript:void(0)" onclick="quickView('<?= site_url('user/quickView/products/index/' . $pro['id']) ?>')" title="quick view"> <span> <i class="fa fa-eye" aria-hidden="true"></i></span></a>
											</li>
										</ul>
									</div>
									<div class="add_to_cart">
										<a href="<?= site_url('user/view/product-details/' . $pro['id']) ?>"
										   title="view details">view product</a>
									</div>
								</div>
								<figcaption class="product_content">
									<div class="price_box">
										<span class="current_price"><?=(!empty($pro) and !empty($pro['d_price'])) ? '<del style="color: grey">$'.$pro['d_price'].'</del> $'.$pro['price'] : '$'.$pro['price']; ?></span>
									</div>
									<h3 class="product_name"><a
												href="#"><?= (!empty($pro['title'])) ? $pro['title'] : '-' ?></a></h3>
								</figcaption>
							</figure>
						</article>
					</div>
				<?php } ?>
			<?php } else echo "<div class='col-md-3'>No product available</div>"; ?>
		</div>

	</div>
</section>
<!--product area end-->
<script>
	function quickView(url) {
		$.post(url, function (e) {
			$(e).modal('show')
			$("#showmodalhere").html(e)
		})
	}
	setTimeout(function (){
		$(".pricing-plans").css({'height':'500px','overflow': 'hidden'})
	},200)

</script>
