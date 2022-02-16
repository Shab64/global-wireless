



<!-- [ Main Content ] start -->
<div class="pc-container">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Slider</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?=site_url('admin')?>">Home</a></li>

							<li class="breadcrumb-item">Slider</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
		<div class="row">
			<!-- customar project  start -->
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<div class="row align-items-center m-l-0">
							<div class="col-sm-6">
							</div>
							<div class="col-sm-6 text-right">
								<a href="<?=site_url('admin/view/add-slider')?>" class="btn btn-success btn-sm mb-3 btn-round" ><i class="feather icon-plus"></i>Add Slider</a>
							</div>
						</div>
						<div class="table-responsive">
							<table id="report-table" class="table mb-0">
								<thead class="thead-light">
								<tr>
									<th>Image</th>
									<th>Title</th>
									<th>Detail</th>
									<th>Added Date</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								<?php if(!empty($all_sliders)) { ?>
									<?php foreach ($all_sliders as $slider) { ?>
										<?php $img = (!empty($slider['image'])) ? $slider['image'] : ""; ?>
										<tr>
											<td class="align-middle">
												<img src="<?=(!empty($slider['image'])) ? base_url('uploads/'.$img) : "https://thedailytouristbd.com/uploads/no_image.jpg"?>" alt="contact-img" title="contact-img" style="width: 100px;height: 58px;" class="rounded mr-3"  />
											</td>
											<td class="align-middle">
												<?=$slider['title']?>
											</td>
											<td class="align-middle">
												<?=$slider['detail']?>
											</td>
											<td class="align-middle">
												<?=$slider['date']?>
											</td>
											<td class="table-action">
												<a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="delete_('<?=site_url('admin/delete/sliders/slider/'.$slider['id'])?>')"><i class="feather icon-trash-2"></i></a>
											</td>
										</tr>
									<?php } ?>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- customar project  end -->
		</div>
		<!-- [ Main Content ] end -->
	</div>
</div>
<div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<?=form_open_multipart('admin/insert/categories/products',array('autocomplete'=>'off'))?>
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" value="" required name="name" class="form-control" placeholder="Category name eg: samsung">
			</div>
			<div class="modal-footer">
				<input type="submit" value="add" class="btn btn-primary btn-sm">
			</div>
		</div>
		<?=form_close() ?>
	</div>
</div>
<!-- [ Main Content ] end -->

</div>


