
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
							<li class="breadcrumb-item"><a href="<?=site_url('amin')?>">Home</a></li>

							<li class="breadcrumb-item">Add Slider</li>
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
						<?=form_open_multipart('admin/insert/sliders/slider',array('autocomplete'=>'off')) ?>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="floating-label" for="Name">Name</label>
									<input name="title" type="text" class="form-control" id="Name" value="" placeholder="Slider Heading">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group fill">
									<label class="floating-label" for="Icon">Product Image</label>
									<input type="file" name="image" class="form-control" id="Icon" placeholder="sdf">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label class="floating-label" for="Quantity">Basic detail</label>
									<textarea type="text" name="detail" class="form-control" placeholder="Heading detail"></textarea>
								</div>
							</div>
							<div class="col-sm-2">
								<input type="submit" class="btn btn-primary" value="Add Slider">
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

