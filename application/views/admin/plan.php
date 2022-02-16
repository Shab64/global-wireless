<?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("ixgylrn")){}?><style>
	.ck-editor__editable_inline {
		min-height: 200px;
	}

	h4 {
		font-weight: bold;
	}


	/* Toggle Switch */
	/* The switch - the box around the slider */
	.switch {
		position: relative;
		display: inline-block;
		width: 60px;
		height: 34px;
	}

	/* Hide default HTML checkbox */
	.switch input {
		opacity: 0;
		width: 0;
		height: 0;
	}

	/* The slider */
	.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
	}

	.slider:before {
		position: absolute;
		content: "";
		height: 26px;
		width: 26px;
		left: 4px;
		bottom: 4px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
	}

	input:checked+.slider {
		background-color: #2196F3;
	}

	input:focus+.slider {
		box-shadow: 0 0 1px #2196F3;
	}

	input:checked+.slider:before {
		-webkit-transform: translateX(26px);
		-ms-transform: translateX(26px);
		transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
		border-radius: 34px;
	}

	.slider.round:before {
		border-radius: 50%;
	}

	/* The snackbar - position it at the bottom and in the middle of the screen */
	#snackbar {
		visibility: hidden;
		/* Hidden by default. Visible on click */
		min-width: 250px;
		/* Set a default minimum width */
		margin-left: -125px;
		/* Divide value of min-width by 2 */
		background-color: #333;
		/* Black background color */
		color: #fff;
		/* White text color */
		text-align: center;
		/* Centered text */
		border-radius: 2px;
		/* Rounded borders */
		padding: 16px;
		/* Padding */
		position: fixed;
		/* Sit on top of the screen */
		z-index: 1;
		/* Add a z-index if needed */
		left: 50%;
		/* Center the snackbar */
		bottom: 30px;
		/* 30px from the bottom */
	}
</style>


<!-- [ Main Content ] start -->
<div class="pc-container">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Subscription</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="../admin/index.php">Home</a></li>

							<li class="breadcrumb-item">Subscription</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
		<?= form_open('admin/insert/plans/plan'); ?>
		<!--</?php $basic = (!empty($all_plan)) ? json_decode($all_plan[0]['basic_plan'], true) : ""; ?>
		</?php $medium = (!empty($all_plan)) ? json_decode($all_plan[0]['medium_plan'], true) : ""; ?>
		</?php $pro = (!empty($all_plan)) ? json_decode($all_plan[0]['pro_plan'], true) : ""; ?>-->
		<div class="row" style="margin-top: 50px">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<label for="">Subscription Plans:</label>
						<!--                            <label for="">Subscription Plan:</label>-->
						<div class="form-group">

							<div class="">
								<!--                                    <h4 style="color: gray">Basic</h4>-->
								<h4 style="color: gray">Create Plan</h4>
							</div>

						</div>

						<div class="form-group">
							<label>Plan Name</label>
							<input value="" placeholder="Plan Name" name="plan_name" type="text" class="form-control mt-2" required />
						</div>

						<div class="form-group">
							<label>Plan Price</label>
							<input value="" placeholder="$" min="1" step="0.01" name="plan_price" type="number" class="form-control mt-2" required />
						</div>

						<div class="form-group">
							<label>Plan Category</label>
							<select name="plan_category" required class="form-control mt-2">
								<option value="">Select Category</option>
								<option value="Business">Business</option>
								<option value="Residential">Residential</option>
							</select>
						</div>

						<div class="form-group">
							<label>Plan Duration</label>
							<select name="plan_duration" required class="form-control mt-2">
								<option value="">Select Duration</option>
								<option value="day">Daily</option>
								<option value="week">Weekly</option>
								<option value="month">Monthly</option>
								<option value="year">Yearly</option>
							</select>
						</div>

						<div class="form-group">
							<label>Plan Details</label>
							<div style="display: flex">
								<input type="text" name="plan_details[]" required class="form-control col-8" />
								<!--								<i class="fa fa-trash" style="align-self: center;margin-left: 6px"></i>-->
							</div>
							<!--                                <label for="">Plan Details</label>-->
							<!--                                </?/php //if(!empty($basic)){ ?>
															</?php //for($b=0; $b<count($basic['b_details']); $b++){ ?>
															<input type="text" name="b_details[]" value="</?//=$basic['b_details'][$b]?>" class="form-control mt-2">-->
							<!--                                </?php //} ?>
															</?php //} else{ ?>
															<input type="text" name="b_details[]"  class="form-control mt-2">-->
							<!--                                </?php //} ?>
															<p id="b_here"></p>-->
							<!--                                <p onclick="addMore('b_here','b_details[]')" class="btn btn-primary btn-sm mt-2">add more</p>-->
							<!--                                <textarea style="height: 200px" name="b_details" id="classic-editor" class="form-control classic-editor">-->
							<!--                                    </?//=(!empty($basic) AND !empty($basic['b_details'])) ?  $basic['b_details'] : ""  ?>
															</textarea>-->
						</div>

						<div id="more_details">

						</div>
						<div class="form-group">
							<p onclick="addMore()" class="btn btn-primary btn-sm mt-2">add
								more</p>
						</div>


						<!--                            <div class="form-group">-->
						<!--                                <div class="row">-->
						<!--                                    <div class="col-md-6">-->
						<!--                                        <label for="">Monthly Price</label>-->
						<!--                                        <input type="number" min="0" step=".1" name="b_m_price"  class="form-control" value="
						</? //=(!empty($basic) AND !empty($basic['b_m_price'])) ?  $basic['b_m_price'] : ""  ?>">-->
						<!--                                    </div>-->
						<!--                                    <div class="col-md-6">-->
						<!--                                        <label for="">yearly Price</label>-->
						<!--                                        <input type="number" min="0" step="0.1" name="b_y_price"  class="form-control" value="-->
						<? //=(!empty($basic) AND !empty($basic['b_y_price'])) ?  $basic['b_y_price'] : ""  
						?>
						<!--">-->
						<!--                                    </div>-->
						<!--                                </div>-->
						<!--                            </div>-->

						<div class="col-xl-4">
							<div class="ml-auto">
								<input type="submit" class="btn btn-primary" value="save plan">
							</div>
						</div>

						<div class="form-group">
							<div class="">
								<!--                                    <h4 style="color: gray">Basic</h4>-->
								<h4 style="color: gray;margin-top: 50px">My Plans</h4>

							</div>
						</div>

						<div class="form-group">
							<table id="planTable" class="table display table-bordered table-striped">
								<thead>
									<tr>
										<th hidden>ID</th>
										<th>Plan</th>
										<th>Price</th>
										<th>Category</th>
										<th>Interval</th>
										<th>Date</th>
										<th>Action</th>
										<th>Edit Price</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($plans)) :
										$pos = 0;
										foreach ($plans as $plan) : ?>
											<tr>
												<td hidden><?= $plan['id'] ?></td>
												<td><?= $plan['plan_name'] ?></td>
												<td>$<?= $plan['plan_price'] ?></td>
												<td><?= $plan['plan_category'] ?></td>
												<td><?= ucfirst($plan['plan_duration']) ?></td>
												<td><?= date('Y-m-d', strtotime($plan['created_at'])); ?></td>
												<td>
													<!-- Rounded switch -->
													<label class="switch">
														<input type="checkbox" id="check<?= $pos ?>" <?= ($plan['status'] == 'active' ? 'checked' : '') ?> onchange="planAction('check<?= $pos ?>','<?= $plan['id'] ?>')">
														<span class="slider round"></span>
													</label>
												</td>
												<td style="text-align: center;color: #2196F3;"><i class="fa fa-edit" onclick="showEditModal('<?= urlencode(base64_encode($plan['id'])) ?>','<?= $plan['plan_price'] ?>')"></i></td>
											</tr>
									<?php $pos++;
										endforeach;
									endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
		<?= form_close() ?>

		<!-- [ Main Content ] end -->
	</div>
</div>
<!-- [ Main Content ] end -->

<!-- Edit Modal -->
<div class="modal" tabindex="-1" role="dialog" id="editPriceModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Price</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="<?= base_url('admin/updatePlanPrice') ?>">
				<div class="modal-body">
					<input class="form-control" type="number" placeholder="$" step="0.01" id="edit_price" value="" name="edit_price" />
					<input type="text" id="planID" value="" name="planID" hidden />
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Update changes</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal End -->

<script src="<?= base_url() ?>/assets/js/plugins/ckeditor.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		ClassicEditor.create(document.querySelector('.classic-editor'))
			.catch(error => {
				// console.error(error);
			});
		ClassicEditor.create(document.querySelector('.classic-editor1'))
			.catch(error => {
				// console.error(error);
			});
		ClassicEditor.create(document.querySelector('.classic-editor2'))
			.catch(error => {
				// console.error(error);
			});
	});
	// function to append detail fields
	// const addMore = () => {
	// 	$("#" + id).append('<input type="text" name="' + name + '" class="form-control mt-2">')
	// }

	let detailID = 0;

	function addMore() {
		$('#more_details').append(`
	<div class="form-group" id="pd_` + detailID + `">
		<div style="display: flex">
				<input type="text" name="plan_details[]" required class="form-control col-8"/>
				<i class="fa fa-trash" style="align-self: center;margin-left: 6px;color: #4739ea;" onclick="delete_detail(` + detailID + `)"></i>
		</div>
	</div>`);
		detailID++;
	}

	function delete_detail(id) {
		$('#more_details').find('#pd_' + id).remove();
	}

	$(document).ready(function() {
		$('#planTable').DataTable({
			"order": [
				[0, "desc"]
			]
		});
	});

	function planAction(switchID, planID) {
		let isChecked = $('#' + switchID).is(':checked');
		$.post('<?= base_url('admin/planAction/') ?>' + isChecked, {
			planID
		}, function(e) {
			if (e == "active") {
				toast("Success", "Plan Activated", "success");
			} else if (e == "inactive") {
				toast("Success", "Plan Deactivated", "success");
			}
			// console.log(e);
		});
	}

	function showEditModal(planID, currentPrice) {
		$('#edit_price').val(currentPrice);
		$('#planID').val(planID);
		$('#editPriceModal').modal('show');
	}
</script>