<style>
	/*h1 {*/
	/*	text-align: center;*/
	/*}*/
	/*button {*/
	/*	padding: 0;*/
	/*	margin: 0;*/
	/*	border-style: none;*/
	/*	touch-action: manipulation;*/
	/*	display: inline-block;*/
	/*	border: none;*/
	/*	background: none;*/
	/*	cursor: pointer;*/
	}
	/* End Reset for the demo */

	/*#qty {*/
	/*	display: flex;*/
	/*	flex-wrap: wrap;*/
	/*	justify-content: center;*/
	/*	text-align: center;*/
	/*}*/
	/*label {*/
	/*	flex: 1 0 100%;*/
	/*}*/
	/*input {*/
	/*	width: 7rem;*/
	/*	height: 3rem;*/
	/*	font-size: 1.3rem;*/
	/*	text-align: center;*/
	/*	!*border: 1px solid $btn_grey;*!*/
	/*}*/
	/*button {*/
	/*	width: 3rem;*/
	/*	height: 3rem;*/
	/*	color: #fff;*/
	/*	font-size: 2rem;*/
	/*	!*background: $btn_grey;*!*/
	/*}*/
	/*button.qtyminus {*/
	/*	margin-right: 0.3rem;*/
	/*}*/
	/*button.qtyplus {*/
	/*	margin-left: 0.3rem;*/
	/*}*/


</style>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<ul>
						<li><a href="index.php">home</a></li>
						<li><a href="cart.php">Cart</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="shopping_cart_area mt-60">
	<div class="container">
		<h3 style="font-weight: bolder;font-family: Arial, Baskerville, monospace;color:#090C9B;padding: 0px 0px 20px 0px">
			Shopping cart</h3>
		<?php $cart = $this->cart->contents(); if(!empty($cart)){ ?>
			<div class="row">
				<div class="col-12">
					<?php $total = 0; ?>
					<?php if (!empty($cart)) { ?>
						<div class="table_desc">
							<div class="cart_page table-responsive">
								<table>
									<thead>
									<tr>
										<th class="product_remove">Delete</th>
										<th class="product_thumb">Image</th>
										<th class="product_name">Product</th>
										<th class="product-price">Price</th>
										<th class="product_quantity">Quantity</th>
										<th class="product_total">Total</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($cart as $k=>$value) { ?>
										<tr>
											<td class="product_remove"><a href="<?= site_url('user/remove_from_cart/' . $value['rowid']) ?>"><i class="fa fa-trash-o"></i></a>
											</td>
											<td class="product_thumb">
												<a href="javascript:void(0)">
													<img src="<?=(!empty($value['options']['image'])) ? base_url('uploads/' . $value['options']['image']) : ''?>" alt="">
												</a>
											</td>
											<td class="product_name"><a href="#"><?= $value['name'] ?></a></td>
											<td class="product-price"><?= '$'.$value['price'] ?></td>

											<td class="product_quantity">
												<form action="<?=site_url('user/updateCart')?>" method="post">
													<input type="number" id="product_qty<?=$k?>" onfocus="showButton('<?=$k?>')" value="<?= $value['qty'] ?>" name="qty" max="<?= $value['qty'] ?>">
													<input type="hidden" value="<?=$k?>" name="rowid">
													<button type="submit" class="btn btn-sm btn-dark" id="update_cart<?=$k?>" style="display:none;" >Update</button>
												</form>
											</td>

											<td class="product_total"><?= '$'.$value['qty'] * $value['price'] ?></td>
											<?php $total += $value['qty'] * $value['price']; ?>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					<?php } else if (!empty($cart_data)) { ?>
						<div class="table_desc">
							<div class="cart_page table-responsive">
								<table>
									<thead>
									<tr>
										<th class="product_remove">Delete</th>
										<th class="product_thumb">Image</th>
										<th class="product_name">Product</th>
										<th class="product-price">Price</th>
										<th class="product_quantity">Quantity</th>
										<th class="product_total">Total</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($cart_data as $value) { ?>
										<tr>
											<td class="product_remove"><a href="<?= base_url('user/delete_cart_product/'.urlencode(base64_encode($value['cart_id']))) ?>"><i
															class="fa fa-trash-o"></i></a>
											</td>
											<td class="product_thumb"><a href="#"><img src="" alt=""></a></td>
											<td class="product_name"><a href="#"><?= $value['product_title'] ?></a></td>
											<td class="product-price"><?= '$' . $value['product_price'] ?></td>
											<td class="product_quantity"><?= $value['quantity'] ?></td>
											<td class="product_total"><?= '$' . $value['quantity'] * $value['product_price'] ?></td>
											<?php $total += $value['quantity'] * $value['product_price']; ?>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php $coupon = $this->session->userdata('coupon'); ?>
			<!--coupon code area start-->
			<div class="coupon_area">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="coupon_code left">
							<h3>Coupon</h3>
							<div class="coupon_inner">
								<?php if (!isset($coupon)) { ?>
									<p>Enter your coupon code if you have one.</p>
									<input type="text" placeholder="Coupon code" name="coupon" id="coupon_code_here">
									<span class="btn btn-dark" onclick="apply_coupon()">APPLY COUPON</span>
									<p id="coupon_status"></p>
								<?php } else {
									if (!empty($cart)) {
										echo '<p style="color:green;">Coupon applied</p>';
									} else {
										echo '<p>Cart empty</p>';
									}
								} ?>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="coupon_code right">
							<h3>Cart Totals</h3>
							<div class="coupon_inner">
								<?php if (!empty($cart)) { ?>
									<div class="cart_subtotal">
										<p>Subtotal</p>
										<p class="cart_amount"><?= '$'.$total ?></p>
									</div>
								<?php } else if (!empty($cart_data)) { ?>
									<div class="cart_subtotal">
										<p>Subtotal</p>
										<p class="cart_amount"><?= '$'.$total ?></p>
									</div>
								<?php } ?>
								<?php if (!empty($coupon) and !empty($cart)) { ?>
									<?php $coupon_data = (($total / 100) * (int)$coupon[0]['amount']);
									$total = $total - $coupon_data; ?>
									<div class="cart_subtotal">
										<p>Coupon code</p>
										<p class="cart_amount">
											<del><?= $coupon[0]['coupon_code'] ?></del>
										</p>
									</div>
									<div class="cart_subtotal">
										<p>Coupon applied</p>
										<p class="cart_amount"><?= '$'.$total ?></p>
									</div>
								<?php } ?>
								<?php if (!empty($cart)) { ?>
									<div class="cart_subtotal ">
										<p>Shipping</p>
										<p class="cart_amount"> Free shipping</p>
									</div>
									<div class="cart_subtotal">
										<p>Total</p>
										<p class="cart_amount"><?=  '$'.$total ?></p>
									</div>
									<div class="checkout_btn">
										<a href="<?= site_url('user/checkout') ?>">Proceed to Checkout</a>
									</div>
								<?php }
								else if (!empty($cart_data)){ ?>
									<div class="cart_subtotal ">
										<p>Shipping</p>
										<p class="cart_amount"> Free shipping</p>
									</div>
									<div class="cart_subtotal">
										<p>Total</p>
										<p class="cart_amount"><?=  '$'.$total?></p>
									</div>
									<div class="checkout_btn">
										<a href="<?= base_url('user/checkout') ?>">Proceed to Checkout</a>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--coupon code area end-->
		<?php } else { ?>
			<div class="cart">
				<div class="card-body">
					<h4>Your Cart Is Empty <i class="fa fa-shopping-bag" style="color:#090C9B "></i></h4>
					<p>Please add products to your cart</p>
				</div>
			</div>
		<?php } ?>

	</div>
</div>
<!--shopping cart area end -->


<script>
	function showButton(html_id){
		$("#update_cart"+html_id).css('display','block')
	}
	function updateProduct(html_id,product_id){

	}
	function apply_coupon() {
		var coupon = $("[name=coupon]").val()
		$.post("<?=site_url('user/apply_coupon')?>", {coupon}, function (e) {
			if (e === 1) {
				$("#coupon_code_here").val(' ')
				$("#coupon_status").html('<p style="color: red">Invalid coupon code</p>')
			} else {
				location.reload()
			}
		})

	}
</script>
