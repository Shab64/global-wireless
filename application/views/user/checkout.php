<?php $cart = $this->cart->contents(); ?>
<style>
	/* Variables */

	#payment-form * {
		box-sizing: border-box;
	}

	#payment-form body {
		font-family: -apple-system, BlinkMacSystemFont, sans-serif;
		font-size: 16px;
		-webkit-font-smoothing: antialiased;
		display: flex;
		justify-content: center;
		align-content: center;
		height: 100vh;
		width: 100vw;
	}

	#payment-form form {
		width: 30vw;
		min-width: 500px;
		align-self: center;
		box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),
		0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);
		border-radius: 7px;
		padding: 40px;
	}

	#payment-form input {
		border-radius: 6px;
		margin-bottom: 6px;
		padding: 12px;
		border: 1px solid rgba(50, 50, 93, 0.1);
		/*height: 44px;*/
		font-size: 16px;
		/*width: 100%;*/
		background: white;
	}

	#payment-form .result-message {
		line-height: 22px;
		font-size: 16px;
	}

	#payment-form .result-message a {
		color: rgb(89, 111, 214);
		font-weight: 600;
		text-decoration: none;
	}

	#payment-form .hidden {
		display: none;
	}

	#payment-form #card-error {
		color: rgb(105, 115, 134);
		text-align: left;
		font-size: 13px;
		line-height: 17px;
		margin-top: 12px;
	}

	#payment-form #card-element {
		border-radius: 4px 4px 0 0;
		padding: 12px;
		border: 1px solid rgba(50, 50, 93, 0.1);
		height: 44px;
		width: 100%;
		background: white;
	}

	#payment-form #payment-request-button {
		margin-bottom: 32px;
	}

	/* Buttons and links */
	#payment-form button {
		background: #5469d4;
		color: #ffffff;
		font-family: Arial, sans-serif;
		border-radius: 0 0 4px 4px;
		border: 0;
		padding: 12px 16px;
		font-size: 16px;
		font-weight: 600;
		cursor: pointer;
		display: block;
		transition: all 0.2s ease;
		box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
		width: 100%;
	}

	#payment-form button:hover {
		filter: contrast(115%);
	}

	#payment-form button:disabled {
		opacity: 0.5;
		cursor: default;
	}

	/* spinner/processing state, errors */
	#payment-form .spinner,
	.spinner:before,
	.spinner:after {
		border-radius: 50%;
	}

	#payment-form.spinner {
		color: #ffffff;
		font-size: 22px;
		text-indent: -99999px;
		margin: 0px auto;
		position: relative;
		width: 20px;
		height: 20px;
		box-shadow: inset 0 0 0 2px;
		-webkit-transform: translateZ(0);
		-ms-transform: translateZ(0);
		transform: translateZ(0);
	}

	#payment-form .spinner:before,
	.spinner:after {
		position: absolute;
		content: "";
	}

	#payment-form .spinner:before {
		width: 10.4px;
		height: 20.4px;
		background: #5469d4;
		border-radius: 20.4px 0 0 20.4px;
		top: -0.2px;
		left: -0.2px;
		-webkit-transform-origin: 10.4px 10.2px;
		transform-origin: 10.4px 10.2px;
		-webkit-animation: loading 2s infinite ease 1.5s;
		animation: loading 2s infinite ease 1.5s;
	}

	#payment-form .spinner:after {
		width: 10.4px;
		height: 10.2px;
		background: #5469d4;
		border-radius: 0 10.2px 10.2px 0;
		top: -0.1px;
		left: 10.2px;
		-webkit-transform-origin: 0px 10.2px;
		transform-origin: 0px 10.2px;
		-webkit-animation: loading 2s infinite ease;
		animation: loading 2s infinite ease;
	}

	@-webkit-keyframes loading {
		0% {
			-webkit-transform: rotate(0deg);
			transform: rotate(0deg);
		}
		100% {
			-webkit-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}

	@keyframes loading {
		0% {
			-webkit-transform: rotate(0deg);
			transform: rotate(0deg);
		}
		100% {
			-webkit-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}

	@media only screen and (max-width: 600px) {
		form {
			width: 80vw;
		}
	}


</style>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<ul>
						<li><a href="<?=base_url('user/')?>">home</a></li>
						<li><a href="<?=base_url('user/view/')?>checkout">Checkout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->

<?php if (!empty($cart)) { ?>
	<!--Checkout page section-->
	<div class="Checkout_section mt-60">
		<div class="container">
			<h3 style="font-weight: bolder;font-family: Arial, Baskerville, monospace;color:#090C9B;padding: 0px 0px 20px 0px">
				Checkout</h3>
			<div class="row">
				<div class="col-12">
					<div class="user-actions">
						<div class="checkout_form">
							<?= form_open('user/order', array('class' => 'require-validation', 'data-stripe-publishable-key' => (!empty($stripe[0]['pk'])) ? $stripe[0]['pk'] : "", 'id' => 'frmStripePayment')) ?>
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<div style="padding: 5px;background: #f5f5f5;" id="billing_details">
										<h3 class="mb-20" style="height: 98px!important;margin-bottom: 20px">Billing Details</h3>
										<div class="row">
											<div class="col-lg-6 mb-20">
												<label>First Name <span>*</span></label>
												<input type="text" name="fname" class="form-control">
											</div>
											<div class="col-lg-6 mb-20">
												<label>Last Name <span>*</span></label>
												<input type="text" name="lname" class="form-control">
											</div>
											<div class="col-12 mb-20">
												<label for="country">country <span>*</span></label>
												<select id="country" name="country" class="form-control">
													<option value="United States">United States</option>
												</select>
											</div>
											<div class="col-12 mb-20">
												<label>Street address <span>*</span></label>
												<input placeholder="House number and street name" type="text"
													   name="address" class="form-control" id="address_2">
											</div>
											<div class="col-6 mb-20">
												<label>Town / City <span>*</span></label>
												<input type="text" name="city" class="form-control">
											</div>
											<div class="col-6 mb-20">
												<label>Zip Code <span>*</span></label>
												<input type="number" name="zip_code" class="form-control" id="zip_code">
											</div>
											<div class="col-12 mb-20">
												<div style="color: red;font-weight: bold" id="address_error"></div>
												<label>State <span>*</span></label>
												<select class="form-control" name="state"  id="state_2">
													<option value="AL">Alabama</option>
													<option value="AK">Alaska</option>
													<option value="AZ">Arizona</option>
													<option value="AR">Arkansas</option>
													<option value="CA">California</option>
													<option value="CO">Colorado</option>
													<option value="CT">Connecticut</option>
													<option value="DE">Delaware</option>
													<option value="DC">District Of Columbia</option>
													<option value="FL">Florida</option>
													<option value="GA">Georgia</option>
													<option value="HI">Hawaii</option>
													<option value="ID">Idaho</option>
													<option value="IL">Illinois</option>
													<option value="IN">Indiana</option>
													<option value="IA">Iowa</option>
													<option value="KS">Kansas</option>
													<option value="KY">Kentucky</option>
													<option value="LA">Louisiana</option>
													<option value="ME">Maine</option>
													<option value="MD">Maryland</option>
													<option value="MA">Massachusetts</option>
													<option value="MI">Michigan</option>
													<option value="MN">Minnesota</option>
													<option value="MS">Mississippi</option>
													<option value="MO">Missouri</option>
													<option value="MT">Montana</option>
													<option value="NE">Nebraska</option>
													<option value="NV">Nevada</option>
													<option value="NH">New Hampshire</option>
													<option value="NJ">New Jersey</option>
													<option value="NM">New Mexico</option>
													<option value="NY">New York</option>
													<option value="NC">North Carolina</option>
													<option value="ND">North Dakota</option>
													<option value="OH">Ohio</option>
													<option value="OK">Oklahoma</option>
													<option value="OR">Oregon</option>
													<option value="PA">Pennsylvania</option>
													<option value="RI">Rhode Island</option>
													<option value="SC">South Carolina</option>
													<option value="SD">South Dakota</option>
													<option value="TN">Tennessee</option>
													<option value="TX">Texas</option>
													<option value="UT">Utah</option>
													<option value="VT">Vermont</option>
													<option value="VA">Virginia</option>
													<option value="WA">Washington</option>
													<option value="WV">West Virginia</option>
													<option value="WI">Wisconsin</option>
													<option value="WY">Wyoming</option>
												</select>
											</div>
											<div class="col-lg-6 mb-20">
												<label>Phone<span>*</span></label>
												<input type="number" name="phone" id="ph" class="form-control">

											</div>
											<div class="col-lg-6 mb-20">
												<label> Email Address <span>*</span></label>
												<input type="email" name="email" id="em" class="form-control">

											</div>
											<div class="col-12">
												<div class="order-notes">
													<label for="order_note">Order Notes</label>
													<textarea id="order_note"
															  placeholder="Notes about your order, e.g. special notes for delivery."
															  name="note" class="form-control"></textarea>
												</div>
											</div>
										</div>
										<div id="error-message" style="color:red;font-weight:450"></div>
										<button class="btn btn-primary mt-2" id="continuetoPayment">continue to payment</button>
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div style="padding: 5px">
									<h3>Your order</h3>
									<div class="order_table table-responsive">
										<table>
											<thead>
											<tr>
												<th>Product</th>
												<th>Total</th>
											</tr>
											</thead>
											<tbody>
											<?php $total = 0; ?>
											<?php if (!empty($cart)) { ?>
											<?php foreach ($cart as $value) { ?>
												<tr>
													<td> <?= $value['name'] ?> <strong> ?? <?= $value['qty'] ?></strong>
													</td>
													<td> <?= '$'.$value['price'] * $value['qty'] ?></td>
												</tr>
												<?php $total += $value['qty'] * $value['price']; ?>
											<?php } ?>
											</tbody>
											<tfoot>
											<?php $coupon = $this->session->userdata('coupon'); ?>
											<?php if (!empty($coupon)) { ?>
												<?php $coupon_data = (($total / 100) * (int)$coupon[0]['amount']);
												$total = $total - $coupon_data; ?>
												<tr>
													<td>Coupon code</td>
													<td>
														<del><?= $coupon[0]['coupon_code'] ?></del>
													</td>
												</tr>
												<tr>
													<td>Coupon applied</td>
													<td><?= '$'.$total ?></td>
												</tr>
											<?php } ?>
											<tr>
												<th>Cart Subtotal</th>
												<td><?= '$'.$total ?></td>
											</tr>
											<tr>
												<th>Shipping</th>
												<td><strong>Free shipping</strong></td>
											</tr>
											<tr>
												<th>Tax</th>
												<td><strong id="tax_total">$0</strong></td>
											</tr>
											<tr class="order_total">
												<th>Order Total</th>
												<td>$<strong id="order_total"><?= $total ?></strong></td>
											</tr>
											<?php } ?>
											</tfoot>
										</table>
									</div>
										<div id="payment_card">
											<div class="col-md-12">
												<div class="panel-default">
													<input id="" type="radio" checked/>
													<label for="payment_defult" data-target="" aria-controls="collapsedefult">Credit
														Card </label>
													<div id="" class=" one" data-parent="">
														<div class="">
															<p>Pay via card; you can pay with your credit card just enter your
																card details.
																We will keep your details secure.
															</p>
														</div>
													</div>
												</div>
												<div class="card-body">

													<div class="row myLabelSelect">
														<div class="col-md-6">
															<div class="form-group ccv">
																<label for="">card no</label>
																<input type="text" id="card-number" name="card_no"
																	   placeholder=""
																	   class="form-control card-number" required>
															</div>
														</div>
														<div class="col-md-6 ">
															<div class="form-group ccv">
																<label for="">CCV</label>
																<input type="text" name="card_ccv" placeholder="" id="cvc"
																	   class="form-control card-cvc" required>
															</div>
														</div>
													</div>
													<div class="row myLabelSelect">
														<div class="col-md-4">
															<div class="form-group">
																<label for="">name on card</label>
																<input type="text" name="card_holder" placeholder=""
																	   class="form-control" required>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group expiration">
																<label for="">expiry month
																</label>
																<input type="number" name="card_expiry_month" placeholder=""
																	   class="form-control card-expiry-month" id="month"
																	   required>
															</div>
														</div>

														<div class="col-md-4">
															<div class="form-group expiration">
																<label for="">expiry year
																</label>
																<input type="number" name="card_expiry_year" placeholder=""
																	   class="form-control card-expiry-year" id="year" required>
															</div>
														</div>
													</div>

												</div>
											</div>
											<div class="payment_method">
												<div class="panel-default">
													<div id="method" class="collapse one" data-parent="#accordion">
														<div class="card-body1">
															<p>Please send a check to Store Name, Store Street, Store Town,
																Store State
																/ County, Store Postcode.</p>
														</div>
													</div>
												</div>
												<div class="order_button" style="margin-top: 10px">
													<div id="loader" style="display:none;width:50px">
														<img alt="loader" src="<?= base_url('assets/LoaderIcon.gif') ?>">
													</div>
													<button onClick="stripePay(event);" id="submit-btn"
															style="background: #3B5999;color: white">Pay now
													</button>

												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
							<?= form_close() ?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
<?php } else {
	redirect('user/view/products');
} ?>

<script src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">

	$(document).ready(function (e){
		$("#billing_details input,textarea").css('background','white')
		$("#payment_card").css('opacity','.2')
		$("#payment_card button").attr('disabled',true)
		$("#payment_card button").css('display','none')
	})
	$("#continuetoPayment").click(function (e){
		e.preventDefault()
		let valid=true
		let fname = $('[name="fname"]').val();
		let lname = $('[name="lname"]').val();
		let address = $('#address_2').val();
		let city = $('[name="city"]').val();
		let phone = $('#ph').val();
		let state = $('#state_2').val();
		let email = $('#em').val();
		let zipCode = $('#zip_code').val();


		$("#error-message").html("").hide();
		// console.log("valid",valid,fname,lname,country,city,address,phone,state,email,cardNumber,month,year,cvc);

		if (zipCode.trim() == "") {

			$('#zip_code').css("border", "1px solid red");
			valid = false;
		}
		if (fname.trim() == "") {

			$('[name="fname"]').css("border", "1px solid red");
			valid = false;
		}
		if (lname.trim() == "") {
			$('[name="lname"]').css("border", "1px solid red");
			valid = false;
		}
		if (city.trim() == "") {
			$('[name="city"]').css("border", "1px solid red");
			valid = false;
		}
		if (address.trim() == "") {
			$('[name="address"]').css("border", "1px solid red");
			valid = false;
		}
		if (phone.trim() == "") {
			$('[name="phone"]').css("border", "1px solid red");
			valid = false;
		}
		if (state.trim() == "") {
			$('[name="state"]').css("border", "1px solid red");
			valid = false;
		}
		if (email.trim() == "") {
			$('[name="email"]').css("border", "1px solid red");
			valid = false;
		}
		if (valid == false) {
			$("#error-message").html("All Fields are required").show();
		}


		if(address.length>0 && city.length >0 && state.length >0 && fname.length>0 && lname.length>0 && phone.length>0 && email.length>0){
			$.post("<?=site_url('user/shippingCharges/'.$total.'/')?>"+address+'/'+city+'/'+state+'/'+zipCode,function (e){
				if(e.replace(/\s/g, '') !== 'Pleasecheckyouraddress'){

					$("#payment_card").css('opacity','1')
					$("#payment_card button").attr('disabled',false)
					$("#payment_card button").css('display','block')
					$("#continuetoPayment").css('display','none')

					$("#address_error").html('')
					$("#tax_total").html('$'+e)
					let total = '<?=$total?>';
					let newTotal=parseFloat(total)+parseFloat(e)
					$("#order_total").html(newTotal)
				}else {
					$("#address_error").html(e)
				}
			})

		}
		return valid;
	})


	//function tax(){
	//	var city = $('[name="city"]').val();
	//	var state = $('#state_2').val();
	//	var address = $('#address_2').val();
	//	var zipCode = $('#zip_code').val();
	//	if(address.length>0 && city.length >0 && state.length >0){
	//		$.post("<?//=site_url('user/shippingCharges/'.$total.'/')?>//"+address+'/'+city+'/'+state+'/'+zipCode,function (e){
	//			if(e.replace(/\s/g, '') !== 'Pleasecheckyouraddress'){
	//				$("#tax_total").html('$'+e)
	//				let total = '<?//=$total?>//';
	//				let newTotal=parseFloat(total)+parseFloat(e)
	//				$("#order_total").html(newTotal)
	//			}else {
	//				$("#address_error").html(e)
	//			}
	//		})
	//	}
	//}
	function cardValidation() {
		var valid = true;
		var fname = $('[name="fname"]').val();
		var lname = $('[name="lname"]').val();
		var country = $('[name="country"]').val();
		var address = $('[name="address"]').val();
		var city = $('[name="city"]').val();
		var phone = $('#ph').val();
		var state = $('[name="state"]').val();
		var email = $('#em').val();
		var cardNumber = $('#card-number').val();
		var month = $('#month').val();
		var year = $('#year').val();
		var cvc = $('#cvc').val();

		$("#error-message").html("").hide();
		// console.log("valid",valid,fname,lname,country,city,address,phone,state,email,cardNumber,month,year,cvc);

		if (fname.trim() == "") {

			$('[name="fname"]').css("border", "1px solid red");
			valid = false;
		}
		if (lname.trim() == "") {
			$('[name="lname"]').css("border", "1px solid red");
			valid = false;
		}
		if (country.trim() == "") {
			$('[name="country"]').css("border", "1px solid red");
			valid = false;
		}
		if (city.trim() == "") {
			$('[name="city"]').css("border", "1px solid red");
			valid = false;
		}
		if (address.trim() == "") {
			$('[name="address"]').css("border", "1px solid red");
			valid = false;
		}
		if (phone.trim() == "") {
			$('[name="phone"]').css("border", "1px solid red");
			valid = false;
		}
		if (state.trim() == "") {
			$('[name="state"]').css("border", "1px solid red");
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

	Stripe.setPublishableKey("<?=(!empty($stripe[0]['pk'])) ? $stripe[0]['pk'] : "" ?>");

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
			$("#frmStripePayment").append('<input type="hidden" name="stripeToken" value="'+token+'" />');
			$("#frmStripePayment").append('<input type="hidden" name="object" value="'+object+'" />');
			$("#frmStripePayment").append('<input type="hidden" name="brand" value="'+brand+'" />');
			//submit form to the server
			$("#frmStripePayment").submit();
		}
	}

	function stripePay(e) {
		console.log("Stripe Pay"+e);
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
