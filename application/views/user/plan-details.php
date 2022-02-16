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
<?php //var_dump($plan); ?>
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
<?php if(!empty($plan)){ ?>
	<!--product details start-->
	<div class="product_details mt-60 mb-60">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="product-details-tab">
						<div id="img-1" class="zoomWrapper single-zoom">
							<a href="#">
								<img id="zoom1" src="<?=base_url()?>/assets/website/img/bg/banner.jpg" data-zoom-image="<?=base_url()?>/assets/website/img/product/productbig5.jpg" alt="big-1">
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
						<form action="<?=site_url('user/addplantocart/'.urlencode(base64_encode($plan['id'])))?>" method="post">

							<h1><?=$plan['plan_name']?></h1>
							<div class="product_nav">
							</div>
							<div class="price_box">
								<span class="current_price">$<?=$plan['plan_price']?></span>

							</div>
							<div class="product_desc">
								<p><?=(!empty($product_id[0]['basic_detail'])) ? $product_id[0]['basic_detail'] : ''?></p>
							</div>
							<div class="product_variant color">
								<h3>Available Options</h3>
								<?php $plan_details = json_decode($plan['plan_details'], true);
								if (!empty($plan_details)): ?>
									<ul>
										<?php foreach ($plan_details as $detail): ?>
											<p>* <?= $detail ?></p>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
							<div class="product_variant quantity">
								<label>quantity</label>
								<input min="1" max="100" value="1" type="number" id="qty" name="qty" readonly>
								<input value="" type="hidden"  name="id">
								<input type="submit" value="add to cart" style="background: #3B5999;color: whitesmoke">
							</div>

							<div class="product_variant quantity">
								<label for="">Category: </label>
								<span style="color: deepskyblue;margin-left: 12px"> <?= $plan['plan_category'] ?></span>
							</div>
<!--							<div class=" product_d_action">-->
<!--								<ul>-->
<!--									<li><a href="--><?//=site_url('user/wishlist/product-details/'.$product_id[0]['id'])?><!--" title="Add to wishlist" style="color: #3B5999"><i class="fa fa-heart-o"></i> Add to Wishlist</a></li>-->
<!--								</ul>-->
<!--							</div>-->
<!--							<div class="product_meta">-->
<!--								<span style="font-weight: 600">Category: <a href="javascript:void(0)" style="color:#3B5999;">--><?//=$product_id[0]['cat'][0]['name']?><!--</a></span>-->
<!--							</div>-->

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
