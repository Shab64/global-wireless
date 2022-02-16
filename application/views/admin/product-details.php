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
	}

	.memory {
		opacity: 0.8;
		width: 60px;
		height: 30px;
		background-position: center center;
		/*background-color: gray;*/
		display: inline-block;
		margin: 10px;
		padding-left:3px;
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
</style>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<ul>
						<li><a href="<?=site_url('user')?>">home</a></li>
						<li>product details</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->
<?php $id =$this->uri->segment(4); if(!empty($id) AND !empty($product_id)){ ?>
	<!--product details start-->
	<div class="product_details mt-60 mb-60">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="product-details-tab">
						<div id="img-1" class="zoomWrapper single-zoom">
							<a href="#">
								<img id="zoom1" src="<?=base_url('uploads/'.$product_id[0]['image'])?>"
									 data-zoom-image="assets/img/product/productbig5.jpg" alt="big-1">
							</a>
						</div>
						<!--                        <div class="single-zoom-thumb">-->
						<!--                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">-->
						<!--                                <li>-->
						<!--                                    <a href="#" class="elevatezoom-gallery active" data-update=""-->
						<!--                                        data-image="https://demo.hasthemes.com/junko-preview/junko/assets/img/product/productbig.jpg"-->
						<!--                                        data-zoom-image="https://demo.hasthemes.com/junko-preview/junko/assets/img/product/productbig.jpg">-->
						<!--                                        <img src="https://demo.hasthemes.com/junko-preview/junko/assets/img/product/productbig.jpg" alt="zo-th-1" />-->
						<!--                                    </a>-->
						<!---->
						<!--                                </li>-->
						<!--                            </ul>-->
						<!--                        </div>-->
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="product_d_right">
						<form action="<?=site_url('user/addtocart')?>" method="post">

							<h1><?=$product_id[0]['title']?></h1>
							<div class="product_nav">
								<!--                                <ul>-->
								<!--                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>-->
								<!--                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>-->
								<!--                                </ul>-->
							</div>
							<div class="price_box">
								<span class="current_price">$<?=$product_id[0]['price']?></span>

							</div>
							<div class="product_desc">
								<p><?=(!empty($product_id[0]['basic_detail'])) ? $product_id[0]['basic_detail'] : ''?></p>
							</div>
							<div class="product_variant color">
								<h3>Available Options</h3>
								<?php if(!empty($product_id[0]['color'])) { $color = json_decode($product_id[0]['color'],true); ?>
									<label>color</label>
									<ul class="mb-2">
										<?php foreach ($color as $k=>$colour){ ?>
											<label class="radio-img">
												<input type="radio" name="color" <?=($k == 0) ? "checked='checked'": ""?>  value="<?=$colour?>" />
												<div class="image" style="background-color:<?=$colour?>"></div>
											</label>

										<?php } ?>
									</ul>
								<?php } else echo 'no color option available';?>
								<?php if(!empty($product_id[0]['memory'])) { $memory = json_decode($product_id[0]['memory'],true); ?>
									<label>memory</label>
									<ul>
										<?php foreach ($memory as $k=>$memo){ ?>
											<label class="radio-memory">
												<input type="radio" name="memory" <?=($k == 0) ? "checked='checked'": ""?>  value="<?=$memo?>" />
												<div class="memory"><?= $memo.' GB'?></div>
											</label>
										<?php } ?>
									</ul>
								<?php } else echo '<p>no memory option available</p>'; ?>
							</div>
							<div class="product_variant quantity">
								<label>quantity</label>
								<input min="1" max="100" value="1" type="number" id="qty" name="qty">
								<input value="<?=$product_id[0]['id']?>" type="hidden"  name="id">
								<input type="submit" value="add to cart" style="background: #3B5999;color: whitesmoke">
							</div>
							<div class=" product_d_action">
								<ul>
									<li><a href="<?=site_url('user/wishlist/product-details/'.$product_id[0]['id'])?>" title="Add to wishlist" style="color: #3B5999"><i class="fa fa-heart-o"></i> Add to Wishlist</a></li>
								</ul>
							</div>
							<div class="product_meta">
								<span style="font-weight: 600">Category: <a href="javascript:void(0)" style="color:#3B5999;"><?=$product_id[0]['cat'][0]['name']?></a></span>
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
									<?php if(!empty($product_id[0]['desc'])){
										echo $product_id[0]['desc'];
									}?>
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
											<img src="https://demo.hasthemes.com/junko-preview/junko/assets/img/blog/comment2.jpg" alt="">
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
<?php } else { echo '<h4 style="text-align: center;padding: 50px">404 Page not found</h4>';} ?>

<script>
	function addtocart_quantity(){
		var id = '<?=$this->uri->segment(4)?>'
		var qty = $("#qty").val();
		$.post("<?=site_url('user/addtocart')?>" , {qty ,id},function (e){
			$("#card_data").html(e)
			window.location.href='<?=site_url('user/view/cart')?>';
		})
	}
</script>
