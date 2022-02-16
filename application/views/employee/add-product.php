
<div class="pc-container">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Product</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?=site_url('amin')?>">Home</a></li>

							<li class="breadcrumb-item"><?=(!empty($product_id)) ? "Edit Product" : "Add Product"; ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
		<div class="row">
			<!-- customar project  start -->
			<div class="col-12">
				<div class="card">
					<div class="card-body" >
						<?=(!empty($product_id)) ? form_open_multipart('employee/update/products/add-product/' . $product_id[0]['id']) : form_open_multipart('employee/insert/products/products',array('autocomplete'=>'off'));   ?>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="floating-label" for="Name">Name</label>
									<input name="title" type="text" class="form-control" id="Name" value="<?= (!empty($product_id)) ? $product_id[0]['title'] : "" ?>" placeholder="">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="floating-label" for="Category">Category</label>
									<select class="form-control" id="Category" name="cat_id">
										<option value="" hidden>Select category</option>
										<?php if(!empty($all_category)) { foreach ($all_category as $cat) {  ?>
											<option value="<?=(!empty($cat['id'])) ? $cat['id'] : ""?>"   <?=(!empty($product_id[0]['cat_id']) AND $product_id[0]['cat_id']=== $cat['id']) ? "selected" : ""?>><?=(!empty($cat['name'])) ? $cat['name'] : ""?></option>
										<?php } } ?>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="floating-label" for="Price">Type</label>
									<select class="form-control" id="type" name="product_type">
										<option value="phone" <?=(!empty($product_id) AND $product_id[0]['product_type'] === 'phone') ? "selected" : ""?>>Mobile Phone</option>
										<option value="accessory" <?=(!empty($product_id) AND $product_id[0]['product_type'] === 'accessory') ? "selected" : ""?>>Accessory</option>
										<option value="voip_phones" <?=(!empty($product_id) AND $product_id[0]['product_type'] === 'voip_phones') ? "selected" : ""?>>Voip phone</option>
										<option value="sip_phones" <?=(!empty($product_id) AND $product_id[0]['product_type'] === 'sip_phones') ? "selected" : ""?>>Sip phone</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="floating-label" for="Price">Price</label>
									<input type="number" name="price" step=".01" class="form-control" id="Price" value="<?=(!empty($product_id)) ? $product_id[0]['price'] : '' ?>" placeholder="in usd">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="floating-label" for="Quantity">Quantity</label>
									<input type="number" name="qty" class="form-control" id="Quantity" value="<?=(!empty($product_id)) ? $product_id[0]['qty'] : 1 ?>" placeholder="" min="1">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="floating-label" for="Quantity">Basic detail</label>
									<textarea type="text" name="basic_detail" class="form-control" placeholder=""><?=(!empty($product_id)) ?  $product_id[0]['basic_detail'] : "" ?></textarea>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label class="floating-label" for="Price">Description</label>
									<textarea class="form-control" name="desc" id="ckeditor"><?=(!empty($product_id)) ?  $product_id[0]['desc']  : "" ?></textarea>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group fill">
									<label class="floating-label" for="Icon">Product Image</label>
									<input type="file" name="files[]" class="form-control" id="Icon" placeholder="sdf" multiple>
									<?php $images = (!empty($product_id)) ? json_decode($product_id[0]['image'],true)  : "" ?>
									<?php if(!empty($images)){ ?>
										<?php for($Nimg=0;$Nimg<count($images);$Nimg++){ ?>
											<img src="<?= base_url('uploads/' . $images[$Nimg]) ?>" class="img-fluid" alt="" width="50">
										<?php } ?>
									<?php } ?>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group custom-switch">
									<input type="checkbox" <?=(!empty($product_id) AND $product_id[0]['status'] === 'published') ? "checked" : "" ?> class="custom-control-input" name="status" value="published" id="customSwitch4" checked="">
									<label class="custom-control-label" for="customSwitch4">Publish</label>
								</div>
							</div>


							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-2">
										<div class="form-group fill">
											<label class="floating-label" for="Icon">Available Colors</label>
										</div>
									</div>
									<span id="appendColors">

										</span>
									<?php $color = (!empty($product_id)) ? json_decode($product_id[0]['color'],true)  : "" ?>
									<?php if (!empty($color)) { ?>
										<?php foreach ($color as $k => $colour) { ?>
											<div class="col-sm-1" id="color_del<?=$k?>">
												<div class="form-group fill">
													<p class="col-sm-1" style="margin: 0px;padding: 0px 0px 8px 0px" onclick="delete_addOns('color',<?=$k?>,<?=$product_id[0]['id']?>,'color_del<?=$k?>')"><i class="fa fa-trash-alt"></i></p>
													<input type="color" name="color[]" class="form-control" value="<?=$colour?>">
												</div>
											</div>
										<?php } ?>
									<?php } else{ echo '<p style="color: gray">No color available</p>';}?>
									<div class="col-sm-3">
										<div class="form-group fill" style="margin-top: 40px">
											<p class="btn btn-sm btn-dark btn-rounded" id="color">add colors</p>
										</div>
									</div>
								</div>
							</div>


							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-2">
										<div class="form-group fill">
											<label class="floating-label" for="Icon">Available Memory</label>
										</div>
									</div>
									<div id="appendMemory">
									</div>
									<?php $memories = (!empty($product_id)) ? json_decode($product_id[0]['memory'],true)  : "" ?>
									<?php if (!empty($memories)) { ?>
										<?php foreach ($memories as $k => $memory) { ?>
											<div class="col-sm-2" id="memory_del<?=$k?>">
												<div class="form-group">
													<p class="col-sm-1" style="margin: 0px;padding: 0px 0px 8px 0px" onclick="delete_addOns('memory',<?=$k?>,<?=$product_id[0]['id']?>,'memory_del<?=$k?>')"><i class="fa fa-trash-alt"></i></p>
													<input type="number" name="memory[]" value="<?=$memory?>" class="form-control" id="Quantity" placeholder="">
												</div>
											</div>
										<?php } ?>
									<?php } else{ echo '<p style="color: gray">No memory available</p>';}?>

									<div class="col-sm-3">
										<div class="form-group fill" style="margin-top: 40px">
											<p class="btn btn-sm btn-dark btn-rounded" id="memory">add memory</p>
										</div>
									</div>
								</div>

							</div>
							<div class="col-sm-">
								<input type="submit" class="btn btn-primary" value="<?=(!empty($product_id)) ? "Edit Product" : "Add Product"; ?>">
							</div>
						</div>
						<?=form_close() ?>
					</div>
				</div>
			</div>
			<!-- customar project  end -->
		</div>
		<!-- [ Main Content ] end -->
	</div>
</div>

<!-- [ Main Content ] end -->
</div>

<script>
	function delete_addOns(type,id,product_id,del_html){
		$.post("<?=site_url('employee/delete_product_addons/products/add-product')?>",{type,id,product_id},function (e){
			$("#"+del_html).css('display','none');
		})
	}
	let total_append = 1;
	$("#color").click(function (){
		total_append++;
		$("#appendColors").after(`<div class="col-sm-1" id="total_${total_append}">
				<div class="form-group fill">
					<p class="col-sm-1" style="margin: 0px;padding: 0px 0px 8px 0px" onclick="$('#total_'+${total_append}).css('display','none')"><i class="fa fa-trash-alt"></i></p>
					<input type="color" name="color[]" class="form-control" >

				</div>
				</div>`)
	})
	$("#memory").click(function (){
		total_append++;
		$("#appendMemory").after(`<div class="col-sm-2" id="memory_${total_append}">
				<div class="form-group fill">
					<p class="col-sm-1" style="margin: 0px;padding: 0px 0px 8px 0px"  onclick="$('#memory_'+${total_append}).css('display','none')"><i class="fa fa-trash-alt"></i></p>
					<input type="number" name="memory[]" class="form-control" id="color" placeholder="In GB">

				</div>
				</div>`)
	})
	function change_status(id){
		$.post("<?=site_url('super_employee/order_status')?>",{id},function(e){
			location.reload()
		})
	}
</script>
