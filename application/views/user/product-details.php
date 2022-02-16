<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/xzoom.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://raw.githubusercontent.com/bbbootstrap/libraries/main/xzoom.css" media="all" />
<style>
	.image {
		opacity: 0.8;
		width: 30px;
		height: 30px;
		background-position: center center;
		/*background-color: gray;*/
		display: inline-block;
		margin: 10px;
	}

	.image:hover {
		opacity: 1;
	}

	.radio-img > input {
		display: none;
	}

	.radio-img > .image {
		cursor: pointer;
		/*border: 2px solid black;*/
	}

	.radio-img > input:checked + .image {
		border: 3px solid #3B5999;
	}q

	.memory {
		opacity: 0.8;
		width: 60px;
		height: 30px;
		background-position: center center;
		/*background-color: gray;*/
		display: inline-block;
		margin: 10px;
		padding-left: 3px;
	}

	.radio-memory > input {
		display: none;
	}

	.radio-memory > .memory {
		cursor: pointer;
		/*border: 2px solid black;*/
	}

	.radio-memory > input:checked + .memory {
		border: 2px solid #3B5999;
	}
	 .xzoom-gallery {
		 margin-top: 10px
	 }

	.xzoom {
		margin-top: 40px
	}


</style>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<ul>
						<li><a href="<?= site_url('user') ?>">home</a></li>
						<li>product details</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->
<?php $id = $this->uri->segment(4);
if (!empty($id) and !empty($product_id)) { ?>
	<?php $img = (!empty($product_id[0]['image'])) ? json_decode($product_id[0]['image']) : "" ?>
	<!--product details start-->
	<div class="product_details mt-60 mb-60">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="product-details-tab xzoom-container">
						<img id="xzoom-default" class="xzoom" src="<?= (!empty($product_id[0]['image'])) ? base_url('uploads/' . $img[0]) : "https://thedailytouristbd.com/uploads/no_image.jpg" ?>" xoriginal="<?= (!empty($product_id[0]['image'])) ? base_url('uploads/' . $img[0]) : "https://thedailytouristbd.com/uploads/no_image.jpg" ?>" alt="big-1">
						<div class="xzoom-thumbs">
							<?php if(!empty($img)){ ?>
							<?php for ($x=0;$x<count($img);$x++){ ?>
							<a href="<?= (!empty($product_id[0]['image'])) ? base_url('uploads/' . $img[$x]) : "https://thedailytouristbd.com/uploads/no_image.jpg" ?>">
								<img class="xzoom-gallery img-thumbnail img-responsive" style="width: 100px;height: 100px" src="<?= (!empty($product_id[0]['image'])) ? base_url('uploads/' . $img[$x]) : "https://thedailytouristbd.com/uploads/no_image.jpg" ?>" xpreview="<?= (!empty($product_id[0]['image'])) ? base_url('uploads/' . $img[$x]) : "https://thedailytouristbd.com/uploads/no_image.jpg" ?>">
							</a>
							<?php } } ?>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="product_d_right">
						<form action="<?= site_url('user/addtocart') ?>" method="post">
							<h1><?= $product_id[0]['title'] ?></h1>
							<div class="price_box">
								<span class="current_price"><?= '$' . $product_id[0]['price'] ?></span>
							</div>
							<div class="product_desc">
								<p><?= (!empty($product_id[0]['basic_detail'])) ? $product_id[0]['basic_detail'] : '' ?></p>
							</div>
							<div class="product_variant color">
								<h3>Available Options</h3>
								<?php if (!empty($product_id[0]['color'])) {
									$color = json_decode($product_id[0]['color'], true); ?>
									<label>color</label>
									<ul class="mb-2">
										<?php foreach ($color as $k => $colour) { ?>
											<label class="radio-img">
												<input type="radio"
													   name="color" <?= ($k == 0) ? "checked='checked'" : "" ?>
													   value="<?= $colour ?>"/>
												<div class="image" style="background-color:<?= $colour ?>"></div>
											</label>

										<?php } ?>
									</ul>
								<?php } else echo 'no color option available'; ?>
								<?php if (!empty($product_id[0]['memory'])) {
									$memory = json_decode($product_id[0]['memory'], true); ?>
									<label>memory</label>
									<ul>
										<?php foreach ($memory as $k => $memo) { ?>
											<label class="radio-memory">
												<input type="radio"
													   name="memory" <?= ($k == 0) ? "checked='checked'" : "" ?>
													   value="<?= $memo ?>"/>
												<div class="memory"><?= $memo . ' GB' ?></div>
											</label>
										<?php } ?>
									</ul>
								<?php } else echo '<p>no memory option available</p>'; ?>
							</div>
							<div class="product_variant quantity">
								<label>quantity</label>
								<input min="1" max="<?= $product_id[0]['qty'] ?>" value="1" type="number" id="qty" name="qty">
								<input value="<?= $product_id[0]['id'] ?>" type="hidden" name="id">
								<?php if($product_id[0]['qty'] >0){ ?>
								<input type="submit" value="add to cart" style="background: #3B5999;color: whitesmoke">
								<?php }else echo "<p CLASS='btn btn-danger'>OUT OF STOCK</p>" ?>
							</div>
							<div class=" product_d_action">
								<ul>
									<li>
										<a href="<?= site_url('user/wishlist/product-details/' . $product_id[0]['id']) ?>"
										   title="Add to wishlist" style="color: #3B5999"><i class="fa fa-heart-o"></i>
											Add to Wishlist</a></li>
								</ul>
							</div>
							<div class="product_meta">
								<span style="font-weight: 600">Category: <a href="javascript:void(0)"
																			style="color:#3B5999;"><?= (!empty($product_id[0]['cat'])) ? $product_id[0]['cat'][0]['name'] : "no category found" ?></a></span>
							</div>

						</form>


					</div>
				</div>
			</div>
		</div>
	</div>
	<!--product details end-->

	<!--product info start-->
	<div class="product_d_info mb-60">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="product_d_inner">
						<div class="product_info_button">
							<ul class="nav" role="tablist">
								<li>
									<a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
									   aria-selected="false">Description</a>
								</li>
								<!--                                <li>-->
								<!--                                    <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"-->
								<!--                                        aria-selected="false">Reviews</a>-->
								<!--                                </li>-->
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="info" role="tabpanel">
								<div class="product_info_content">
									<?php if (!empty($product_id[0]['desc'])) {
										echo $product_id[0]['desc'];
									} ?>
								</div>
							</div>
							<div class="tab-pane fade" id="sheet" role="tabpanel">
								<div class="product_d_table">
									<form action="#">
										<table>
											<tbody>
											<tr>
												<td class="first_child">Compositions</td>
												<td>Polyester</td>
											</tr>
											<tr>
												<td class="first_child">Styles</td>
												<td>Girly</td>
											</tr>
											<tr>
												<td class="first_child">Properties</td>
												<td>Short Dress</td>
											</tr>
											</tbody>
										</table>
									</form>
								</div>
								<div class="product_info_content">
									<p>Fashion has been creating well-designed collections since 2010. The brand offers
										feminine designs delivering stylish separates and statement dresses which have
										since evolved into a full ready-to-wear collection in which every item is a
										vital part of a woman's wardrobe. The result? Cool, easy, chic looks with
										youthful elegance and unmistakable signature style. All the beautiful pieces are
										made in Italy and manufactured with the greatest attention. Now Fashion extends
										to a range of accessories including shoes, hats, belts and more!</p>
								</div>
							</div>

							<div class="tab-pane fade" id="reviews" role="tabpanel">
								<div class="reviews_wrapper">
									<h2>1 review for Donec eu furniture</h2>
									<div class="reviews_comment_box">
										<div class="comment_thmb">
											<img src="https://demo.hasthemes.com/junko-preview/junko/assets/img/blog/comment2.jpg"
												 alt="">
										</div>
										<div class="comment_text">
											<div class="reviews_meta">
												<div class="star_rating">
													<ul>
														<li><a href="#"><i class="ion-ios-star"></i></a></li>
														<li><a href="#"><i class="ion-ios-star"></i></a></li>
														<li><a href="#"><i class="ion-ios-star"></i></a></li>
														<li><a href="#"><i class="ion-ios-star"></i></a></li>
														<li><a href="#"><i class="ion-ios-star"></i></a></li>
													</ul>
												</div>
												<p><strong>admin </strong>- September 12, 2018</p>
												<span>roadthemes</span>
											</div>
										</div>

									</div>
									<div class="comment_title">
										<h2>Add a review </h2>
										<p>Your email address will not be published. Required fields are marked </p>
									</div>
									<div class="product_ratting mb-10">
										<h3>Your rating</h3>
										<ul>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
										</ul>
									</div>
									<div class="product_review_form">
										<form action="#">
											<div class="row">
												<div class="col-12">
													<label for="review_comment">Your review </label>
													<textarea name="comment" id="review_comment"></textarea>
												</div>
												<div class="col-lg-6 col-md-6">
													<label for="author">Name</label>
													<input id="author" type="text">

												</div>
												<div class="col-lg-6 col-md-6">
													<label for="email">Email </label>
													<input id="email" type="text">
												</div>
											</div>
											<button type="submit">Submit</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--product info end-->
<?php } else {
	echo '<h4 style="text-align: center;padding: 50px">404 Page not found</h4>';
} ?>

<script>
	function addtocart_quantity() {
		var id = '<?=$this->uri->segment(4)?>'
		var qty = $("#qty").val();
		$.post("<?=site_url('user/addtocart')?>", {qty, id}, function (e) {
			$("#card_data").html(e)
			window.location.href = '<?=site_url('user/view/cart')?>';
		})
	}
</script>
<script>
	(function ($) {
		$(document).ready(function() {
			$('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#333', Xoffset: 15});
			$('.xzoom2, .xzoom-gallery2').xzoom({position: '#xzoom2-id', tint: '#ffa200'});
			$('.xzoom3, .xzoom-gallery3').xzoom({position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden'});
			$('.xzoom4, .xzoom-gallery4').xzoom({tint: '#006699', Xoffset: 15});
			$('.xzoom5, .xzoom-gallery5').xzoom({tint: '#006699', Xoffset: 15});

//Integration with hammer.js
			var isTouchSupported = 'ontouchstart' in window;

			if (isTouchSupported) {
//If touch device
				$('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function(){
					var xzoom = $(this).data('xzoom');
					xzoom.eventunbind();
				});

				$('.xzoom, .xzoom2, .xzoom3').each(function() {
					var xzoom = $(this).data('xzoom');
					$(this).hammer().on("tap", function(event) {
						event.pageX = event.gesture.center.pageX;
						event.pageY = event.gesture.center.pageY;
						var s = 1, ls;

						xzoom.eventmove = function(element) {
							element.hammer().on('drag', function(event) {
								event.pageX = event.gesture.center.pageX;
								event.pageY = event.gesture.center.pageY;
								xzoom.movezoom(event);
								event.gesture.preventDefault();
							});
						}

						xzoom.eventleave = function(element) {
							element.hammer().on('tap', function(event) {
								xzoom.closezoom();
							});
						}
						xzoom.openzoom(event);
					});
				});

				$('.xzoom4').each(function() {
					var xzoom = $(this).data('xzoom');
					$(this).hammer().on("tap", function(event) {
						event.pageX = event.gesture.center.pageX;
						event.pageY = event.gesture.center.pageY;
						var s = 1, ls;

						xzoom.eventmove = function(element) {
							element.hammer().on('drag', function(event) {
								event.pageX = event.gesture.center.pageX;
								event.pageY = event.gesture.center.pageY;
								xzoom.movezoom(event);
								event.gesture.preventDefault();
							});
						}

						var counter = 0;
						xzoom.eventclick = function(element) {
							element.hammer().on('tap', function() {
								counter++;
								if (counter == 1) setTimeout(openfancy,300);
								event.gesture.preventDefault();
							});
						}

						function openfancy() {
							if (counter == 2) {
								xzoom.closezoom();
								$.fancybox.open(xzoom.gallery().cgallery);
							} else {
								xzoom.closezoom();
							}
							counter = 0;
						}
						xzoom.openzoom(event);
					});
				});

				$('.xzoom5').each(function() {
					var xzoom = $(this).data('xzoom');
					$(this).hammer().on("tap", function(event) {
						event.pageX = event.gesture.center.pageX;
						event.pageY = event.gesture.center.pageY;
						var s = 1, ls;

						xzoom.eventmove = function(element) {
							element.hammer().on('drag', function(event) {
								event.pageX = event.gesture.center.pageX;
								event.pageY = event.gesture.center.pageY;
								xzoom.movezoom(event);
								event.gesture.preventDefault();
							});
						}

						var counter = 0;
						xzoom.eventclick = function(element) {
							element.hammer().on('tap', function() {
								counter++;
								if (counter == 1) setTimeout(openmagnific,300);
								event.gesture.preventDefault();
							});
						}

						function openmagnific() {
							if (counter == 2) {
								xzoom.closezoom();
								var gallery = xzoom.gallery().cgallery;
								var i, images = new Array();
								for (i in gallery) {
									images[i] = {src: gallery[i]};
								}
								$.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
							} else {
								xzoom.closezoom();
							}
							counter = 0;
						}
						xzoom.openzoom(event);
					});
				});

			} else {
//If not touch device

//Integration with fancybox plugin
				$('#xzoom-fancy').bind('click', function(event) {
					var xzoom = $(this).data('xzoom');
					xzoom.closezoom();
					$.fancybox.open(xzoom.gallery().cgallery, {padding: 0, helpers: {overlay: {locked: false}}});
					event.preventDefault();
				});

//Integration with magnific popup plugin
				$('#xzoom-magnific').bind('click', function(event) {
					var xzoom = $(this).data('xzoom');
					xzoom.closezoom();
					var gallery = xzoom.gallery().cgallery;
					var i, images = new Array();
					for (i in gallery) {
						images[i] = {src: gallery[i]};
					}
					$.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
					event.preventDefault();
				});
			}
		});
	})(jQuery);
</script>
