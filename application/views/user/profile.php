<style>
	.table td,
	.table th {
		vertical-align: middle;
	}

	.table thead th {
		border-bottom: none;
	}

	.table-border-none tbody td,
	.table-border-none thead th {
		border: none;
	}

	.table th {
		font-weight: 600;
	}

	.form-control {
		border-radius: 10px;
	}


	.form-row {
		margin-top: 20px;
	}

	.tab-pane button {
		border-radius: 10px;
		background-color: #090C9B;
		color: white;
		margin-bottom: 25px;
	}

	.card {
		border: none;
		margin-bottom: 30px;
		-webkit-transition: all 0.5s, display 1s;
		transition: all 0.5s, display 1s;
	}

	.card .card-title {
		position: relative;
	}

	.card-title {
		margin: 20px 0 20px 10px;

	}

	.card-shadow {
		-webkit-box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.1);
		box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.1);
	}

	.card-profile .card-img {
		position: relative;
		/*background-image: url(../img/banner.jpg);*/
		background-size: cover;
		height: 120px;
		border-bottom-left-radius: 0;
		border-bottom-right-radius: 0;
	}

	.card-option>li+li {
		margin-left: 8px;
	}



	.table-primary,
	.table-primary>td,
	.table-primary>th {
		background-color: transparent;
	}

	.table-primary td,
	.table-primary th {
		border: none;
	}

	.table-primary th {
		background-color: #090C9B;
		color: white;
	}

	.table-primary tbody tr:nth-child(even) {
		background-color: lightgrey;
	}

	.list-group {
		background-color: #090C9B;
		color: white;
	}

	.list-group-item.active,
	.list-group-item.active:hover {
		background-color: #090C9B !important;
		color: white !important;
	}
</style>

<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<ul>
						<li><a href="<?= base_url('user/view/') ?>">home</a></li>
						<li><a href="<?= base_url('user/view/') ?>dashboard">Profile</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->


<div class="container" style="margin-top: 50px">
	<div class="row">
		<?php if(!empty($my_profile)){ ?>
		<div class="col-sm-2">
			<div class="card card-shadow">
				<div class="list-group" id="list-tab" role="tablist">
					<a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">My Account</a>
					<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Order History</a>
				</div>
			</div>
		</div>
		<div class="col-10">
			<div class="tab-content" id="nav-tabContent">
				<!--My account-->
				<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
					<h2> Profile</h2>
					<?= form_open('user/update/client/profile/' . $my_profile[0]['id']) ?>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Name</label>
							<input value="<?= (!empty($my_profile[0]['name'])) ? $my_profile[0]['name'] : ""; ?>" name="name" type="text" class="form-control" id="name" placeholder="Name">
						</div>
						<div class="form-group col-md-6">
							<label for="inputEmail4">Email</label>
							<input type="email" value="<?= (!empty($my_profile[0]['email'])) ? $my_profile[0]['email'] : ""; ?>" name="email" class="form-control" id="inputEmail4" placeholder="Email">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="phone">Phone number:</label>
							<input type="tel" class="form-control" id="phone" name="phone" value="<?= (!empty($my_profile[0]['phone'])) ? $my_profile[0]['phone'] : ""; ?>">
						</div>

						<div class="form-group col-md-6">
							<label for="inputAddress">Address</label>
							<input type="text" class="form-control" id="inputAddress" placeholder="Address" value="<?= (!empty($my_profile[0]['address'])) ? $my_profile[0]['address'] : ""; ?>" name="address">
						</div>
					</div>
					<button type="submit" class="btn btn btn-sm">Update</button>
					<?= form_close() ?>
				</div>

				<!--Order history-->
				<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
					<div class="card card-shadow">
						<div class="d-flex">
							<h6 class="h6 card-title">Order History</h6>
							<button type="button" class="btn btn ml-auto btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" style="background-color: #090C9B; color: white; height: 50px; margin: 10px 8px 10px 0;">Pay Bill</button>

							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Pay Your Bills</h5>

										</div>
										<div class="modal-body">
											<form>
												<div class="form-row">
													<div class="form-group col-sm-6">
														<label for="inputEmail4">Name</label>
														<input type="text" class="form-control form-control-sm" id="name" placeholder="Name">
													</div>
													<div class="form-group col-sm-6">
														<label for="inputEmail4">Email</label>
														<input type="email" class="form-control form-control-sm" id="inputEmail4" placeholder="Email">
													</div>
												</div>
												<div class="card-body">

													<div class="row myLabelSelect">
														<div class="col-md-6">
															<div class="form-group ccv">
																<label for="">card no</label>
																<input type="text" id="card-number" placeholder="" class="form-control card-number" required>
															</div>
														</div>
														<div class="col-md-6 ">
															<div class="form-group ccv">
																<label for="">CCV</label>
																<input type="text" placeholder="" id="cvc" class="form-control card-cvc" required>
															</div>
														</div>
													</div>
													<div class="row myLabelSelect">
														<div class="col-md-4">
															<div class="form-group">
																<label for="">name on card</label>
																<input type="text" placeholder="" class="form-control" required>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group expiration">
																<label for="">expiry month
																</label>
																<input type="number" placeholder="" class="form-control card-expiry-month" id="month" required>
															</div>
														</div>

														<div class="col-md-4">
															<div class="form-group expiration">
																<label for="">expiry year
																</label>
																<input type="number" placeholder="" class="form-control card-expiry-year" id="year" required>
															</div>
														</div>
													</div>

												</div>

											</form>
										</div>
										<div class="modal-footer">
											<div id="error-message" style="color:red;font-weight:450"></div>
											<div class="order_button" style="margin-top: 10px">
												<div id="loader" style="display:none;width:50px">
													<img alt="loader" src="<?= base_url('assets/LoaderIcon.gif') ?>">
												</div>
												<button onClick="stripePay(event);" id="submit-btn" style="background: #3B5999;color: white"><img src="<?= base_url() ?>/images/card.png" style="width: 30px; height: 30px" alt="Online qualification">
													Pay Now
												</button>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-primary mb-0">
								<thead>
									<tr>
										<th scope="col">Order Id</th>
										<th scope="col">Product</th>
										<th scope="col">Color/Memory</th>
										<th scope="col">Price</th>
										<th scope="col">Order Date</th>
										<th scope="col">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($order_history)) { ?>
										<?php foreach ($order_history as $orders) {
											$order_data = json_decode($orders['order_data'], true); ?>
											<?php if (!empty($order_data)) { ?>
												<?php foreach ($order_data as $data) { ?>
													<tr>
														<td><?= '#' . $orders['id'] ?></td>
														<td>
															<div class="d-flex align-items-center">
																<span class="thumb-circle">
																	<img src="<?= base_url('uploads/' . $data['options']['image']) ?>" alt="USEr" style="height: 50px;width: 70px">
																</span>
																<span class="title-midd ml-2 mb-0"><?= $data['name'] ?></span>
															</div>
														</td>
														<td><span style="background-color:<?= (!empty($data['options']['color'])) ? $data['options']['color'] : "-" ?>;width: 10px;padding: 0px 5px"> </span><?=(!empty($data['options']['color']) and !empty($data['options']['memory'])) ? '/' : "";?><?= (!empty($data['options']['memory'])) ? $data['options']['memory'] . ' GB' : "-" ?></td>
														<td><?= '$' . $data['price'] ?></td>
														<td><?= date('d M, Y', strtotime($orders['date'])) ?></td>
														<td><?= $orders['status'] ?></td>

													</tr>
												<?php } ?>
											<?php } ?>
										<?php } ?>
									<?php } ?>

								</tbody>
							</table>
						</div>
					</div>

					<div class="card card-shadow">
						<div class="d-flex">
							<h6 class="h6 card-title">Subscription</h6>
						</div>
						<div class="table-responsive">
							<table class="table table-primary mb-0">
								<thead>
									<tr>
										<th scope="col">Plan</th>
										<th scope="col">Duration</th>
										<th scope="col">Charges</th>
										<th scope="col">Status</th>
										<th scope="col">Subscription Start</th>
										<th scope="col">Subscription Renew</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($my_subscriptions)) {
										foreach ($my_subscriptions as $subscription) { ?>
											<tr>
												<td><?= $subscription['plan_id']['plan_name'] ?></td>
												<td><?= $subscription['plan_id']['plan_duration'] ?></td>
												<td><?= isset($subscription['stripe_sub_amount']) ? '$' . $subscription['stripe_sub_amount'] : '-' ?></td>
												<td><?= isset($subscription['stripe_sub_status']) ? ucfirst($subscription['stripe_sub_status'])  : '-' ?></td>
												<td><?= $subscription['stripe_sub_status'] === "active" ? Date('d-M-Y h:i:s',$subscription['stripe_sub_details']->current_period_start) : '-' ?></td>
												<td><?= $subscription['stripe_sub_status'] === "active" ? Date('d-M-Y h:i:s',$subscription['stripe_sub_details']->current_period_end) : '-' ?></td>
												<td><button class="btn btn-danger" <?= isset($subscription['stripe_sub_status']) ? ($subscription['stripe_sub_status'] === "active" ? '' : 'hidden') : 'hidden' ?> onclick="cancelSubscription('<?= $subscription['stripe_sub_id'] ?>')">Cancel</button></td>
											</tr>
									<?php }
									} ?>
								</tbody>
							</table>
						</div>
					</div>
<!--					<div class="card card-shadow">-->
<!--						<div class="d-flex">-->
<!--							<h6 class="h6 card-title">Purchase History</h6>-->
<!--						</div>-->
<!--						<div class="table-responsive">-->
<!--							<table class="table table-primary mb-0">-->
<!--								<thead>-->
<!--									<tr>-->
<!--										<th scope="col">Order Id</th>-->
<!--										<th scope="col">Product</th>-->
<!--										<th scope="col">Plan Name</th>-->
<!--										<th scope="col">price</th>-->
<!--										<th scope="col">price</th>-->
<!--										<th scope="col">price</th>-->
<!---->
<!---->
<!--									</tr>-->
<!--								</thead>-->
<!--								<tbody>-->
<!--									<tr>-->
<!--										<td>1</td>-->
<!--										<td>Mark</td>-->
<!--										<td>Otto</td>-->
<!--										<td>$400</td>-->
<!--										<td>@mdo</td>-->
<!--										<td>@mdo</td>-->
<!---->
<!--									</tr>-->
<!--									<tr>-->
<!--										<td>2</td>-->
<!--										<td>Jacob</td>-->
<!--										<td>Thornton</td>-->
<!--										<td>$400</td>-->
<!--										<td>$400</td>-->
<!--										<td>$400</td>-->
<!---->
<!--									</tr>-->
<!--									<tr>-->
<!--										<td>3</td>-->
<!--										<td>Larry</td>-->
<!--										<td>the Bird</td>-->
<!--										<td>$400</td>-->
<!--										<td>$400</td>-->
<!--										<td>$400</td>-->
<!---->
<!--									</tr>-->
<!--								</tbody>-->
<!--							</table>-->
<!--						</div>-->
<!--					</div>-->
				</div>

			</div>
		</div>
		<?php }else{ ?>
			<div class="col-md-12 card text-center">
				<h4><i class="fa fa-exclamation-circle"></i> Log in to access this page</h4>
			</div>
		<?php } ?>
	</div>
	<script src="https://js.stripe.com/v2/"></script>

	<script type="text/javascript">
		function cardValidation() {
			var valid = true;
			var name = $('[name="name"]').val();
			var email = $('#email').val();
			var cardNumber = $('#card-number').val();
			var month = $('#month').val();
			var year = $('#year').val();
			var cvc = $('#cvc').val();

			$("#error-message").html("").hide();

			if (name.trim() == "") {

				$('[name="fname"]').css("border", "1px solid red");
				valid = false;
			}

			if (email.trim() == "") {
				$('[name="email"]').css("border", "1px solid red");
				valid = false;
			}
			if (cardNumber.trim() == "") {
				$('[name="card_no"]').css("border", "1px solid red");
				valid = false;
			}

			if (month.trim() == "") {
				$('[name="card_expiry_month"]').css("border", "1px solid red");
				valid = false;
			}
			if (year.trim() == "") {
				$('[name="card_expiry_year"]').css("border", "1px solid red");
				valid = false;
			}
			if (cvc.trim() == "") {
				$('[name="card_ccv"]').css("border", "1px solid red");
				valid = false;
			}

			if (valid == false) {
				$("#error-message").html("All Fields are required").show();
			}


			return valid;
		}

		Stripe.setPublishableKey("<?= (!empty($stripe[0]['pk'])) ? $stripe[0]['pk'] : "" ?>");

		//callback to handle the response from stripe
		function stripeResponseHandler(status, response) {
			console.log("Stripe Response");
			if (response.error) {
				//enable the submit button
				$("#submit-btn").show();
				$("#loader").css("display", "none");
				//display the errors on the form
				$("#error-message").html(response.error.message).show();
			} else {
				//get token id
				let token = response['id'];
				let object = response['card']['object'];
				let brand = response['card']['brand'];


				//insert the token into the form
				$("#frmStripePayment").append('<input type="hidden" name="stripeToken" value="' + token + '" />');
				$("#frmStripePayment").append('<input type="hidden" name="object" value="' + object + '" />');
				$("#frmStripePayment").append('<input type="hidden" name="brand" value="' + brand + '" />');
				//submit form to the server
				$("#frmStripePayment").submit();
			}
		}

		function stripePay(e) {
			console.log("Stripe Pay" + e);
			e.preventDefault();
			var valid = cardValidation();

			if (valid == true) {
				$("#submit-btn").hide();
				$("#loader").css("display", "inline-block");
				$("#submit-button").css("display", "none");


				Stripe.createToken({
					number: $('#card-number').val(),
					cvc: $('#cvc').val(),
					exp_month: $('#month').val(),
					exp_year: $('#year').val()
				}, stripeResponseHandler);

				//submit from callback
				return false;
			}
		}
	</script>
