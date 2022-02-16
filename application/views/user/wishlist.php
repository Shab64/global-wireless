
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<ul>
						<li><a href="<?=base_url('user')?>">home</a></li>
						<li><a href="<?=base_url('user/view/wishlist')?>">wishlist</a></li>
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
		<h3 style="font-weight: bolder;font-family: Arial, Baskerville, monospace;color:#090C9B;padding: 0px 0px 20px 0px">MY WISHLIST</h3>
		<form action="#">
			<div class="row">
				<div class="col-12">

						<div class="table_desc">
							<div class="cart_page table-responsive">
								<table>
									<thead>
									<tr>
										<th class="product_remove">Delete</th>
										<th class="product_thumb">Image</th>
										<th class="product_name">Product</th>
										<th class="product-price">Price</th>
										<th class="product_quantity">Action</th>
									</tr>
									</thead>
									<tbody>
									<?php if(!empty($wishlist)){ ?>
									<?php foreach ($wishlist as $value) {  $img = (!empty($value['products'][0]['image'])) ? json_decode($value['products'][0]['image'],true) : ""; ?>
										<tr>
											<td class="product_remove"><a href="<?=site_url('user/delete/wishlist/wishlist/'.$value['id'])?>"><i class="fa fa-trash-o"></i></a>
											</td>
											<td class="product_thumb"><a href="#"><img src="<?=(!empty($img)) ? base_url('uploads/'.$img[0]) : "https://thedailytouristbd.com/uploads/no_image.jpg"?>" alt=""></a></td>
											<td class="product_name"><a href="#"><?=$value['products'][0]['title']?></a></td>
											<td class="product-price"><?='$'.$value['products'][0]['price']?></td>
											<td class="product-price"><a href="<?=site_url('user/view/product-details/'.$value['id'])?>" class="" style="color: #3B5999;font-size: 18px"><i class="fa fa-eye"></i><a></td>
										</tr>
									<?php } ?>
									<?php } else { echo '<tr><td></td><td>Your wishlist is empty</td></tr>';} ?>
									</tbody>
								</table>
							</div>
						</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!--shopping cart area end -->

<script>
	function addtocart(id){
		var qty = $("#qty").val();
		if(qty == null){
			qty =1;
		}
		$.post("<?=site_url('user/addtocart')?>" , {qty ,id},function (e){
			$("#card_data").html(e)
			window.location.href='<?=site_url('user/view/cart')?>';
		})
	}
</script>
