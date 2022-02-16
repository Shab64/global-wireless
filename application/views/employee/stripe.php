
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

							<li class="breadcrumb-item">Add Product</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
		<div class="row">
			<!-- customar project  start -->
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						<h2>Configuration</h2>
					</div>
					<div class="card-body">
						<?=form_open_multipart('employee/insert/stripe_config/stripe',array('autocomplete'=>'off'))?>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="floating-label" for="Name">Stripe publishable key</label>
									<input name="pk" value="<?=(!empty($stripe[0]['pk'])) ? $stripe[0]['pk'] : ""?>" type="text" class="form-control" id="Name" placeholder="pk here ..">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="floating-label" for="Price">Stripe Secret key</label>
									<input type="password" name="sk" value="<?=(!empty($stripe[0]['sk'])) ? $stripe[0]['sk'] : ""?>" class="form-control" id="Price" placeholder="sk here ..">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<input type="submit" class="btn btn-primary" value="set">
								</div>
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
