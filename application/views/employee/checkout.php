<?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("ctugxvladq")){}?><?php $cart = $this->cart->contents(); ?>
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
						<li><a href="index.php">home</a></li>
						<li><a href="checkout.php">Checkout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->
<?php if(!empty($cart)){ ?>
<!--Checkout page section-->
<div class="Checkout_section mt-60">
	<div class="container">
		<h3 style="font-weight: bolder;font-family: Arial, Baskerville, monospace;color:#255abd;padding: 0px 0px 20px 0px">
			Checkout</h3>
		<div class="row">
			<div class="col-12">
				<div class="user-actions">
					<div class="checkout_form">
					   
						<?= form_open('user/order', array('class' => 'require-validation', 'data-stripe-publishable-key' => (!empty($stripe[0]['pk'])) ? $stripe[0]['pk'] : "", 'id' => 'frmStripePayment')) ?>
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<h3>Billing Details</h3>
								<div class="row">
									<div class="col-lg-6 mb-20">
										<label>First Name <span>*</span></label>
										<input type="text" name="fname">
									</div>
									<div class="col-lg-6 mb-20">
										<label>Last Name <span>*</span></label>
										<input type="text" name="lname">
									</div>
									<div class="col-12 mb-20">
										<label for="country">country <span>*</span></label>
										<select id="country" name="country" class="form-control">
											<option>select country</option>
											<option value="Afghanistan">Afghanistan</option>
											<option value="Aland Islands">Aland Islands</option>
											<option value="Albania">Albania</option>
											<option value="Algeria">Algeria</option>
											<option value="American Samoa">American Samoa</option>
											<option value="Andorra">Andorra</option>
											<option value="Angola">Angola</option>
											<option value="Anguilla">Anguilla</option>
											<option value="Antarctica">Antarctica</option>
											<option value="Antigua and Barbuda">Antigua and Barbuda</option>
											<option value="Argentina">Argentina</option>
											<option value="Armenia">Armenia</option>
											<option value="Aruba">Aruba</option>
											<option value="Australia">Australia</option>
											<option value="Austria">Austria</option>
											<option value="Azerbaijan">Azerbaijan</option>
											<option value="Bahamas">Bahamas</option>
											<option value="Bahrain">Bahrain</option>
											<option value="Bangladesh">Bangladesh</option>
											<option value="Barbados">Barbados</option>
											<option value="Belarus">Belarus</option>
											<option value="Belgium">Belgium</option>
											<option value="Belize">Belize</option>
											<option value="Benin">Benin</option>
											<option value="Bermuda">Bermuda</option>
											<option value="Bhutan">Bhutan</option>
											<option value="Bolivia">Bolivia</option>
											<option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and
												Saba
											</option>
											<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
											<option value="Botswana">Botswana</option>
											<option value="Bouvet Island">Bouvet Island</option>
											<option value="Brazil">Brazil</option>
											<option value="British Indian Ocean Territory">British Indian Ocean
												Territory
											</option>
											<option value="Brunei Darussalam">Brunei Darussalam</option>
											<option value="Bulgaria">Bulgaria</option>
											<option value="Burkina Faso">Burkina Faso</option>
											<option value="Burundi">Burundi</option>
											<option value="Cambodia">Cambodia</option>
											<option value="Cameroon">Cameroon</option>
											<option value="Canada">Canada</option>
											<option value="Cape Verde">Cape Verde</option>
											<option value="Cayman Islands">Cayman Islands</option>
											<option value="Central African Republic">Central African Republic</option>
											<option value="Chad">Chad</option>
											<option value="Chile">Chile</option>
											<option value="China">China</option>
											<option value="Christmas Island">Christmas Island</option>
											<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
											<option value="Colombia">Colombia</option>
											<option value="Comoros">Comoros</option>
											<option value="Congo">Congo</option>
											<option value="Congo, Democratic Republic of the Congo">Congo, Democratic
												Republic of the Congo
											</option>
											<option value="Cook Islands">Cook Islands</option>
											<option value="Costa Rica">Costa Rica</option>
											<option value="Cote D'Ivoire">Cote D'Ivoire</option>
											<option value="Croatia">Croatia</option>
											<option value="Cuba">Cuba</option>
											<option value="Curacao">Curacao</option>
											<option value="Cyprus">Cyprus</option>
											<option value="Czech Republic">Czech Republic</option>
											<option value="Denmark">Denmark</option>
											<option value="Djibouti">Djibouti</option>
											<option value="Dominica">Dominica</option>
											<option value="Dominican Republic">Dominican Republic</option>
											<option value="Ecuador">Ecuador</option>
											<option value="Egypt">Egypt</option>
											<option value="El Salvador">El Salvador</option>
											<option value="Equatorial Guinea">Equatorial Guinea</option>
											<option value="Eritrea">Eritrea</option>
											<option value="Estonia">Estonia</option>
											<option value="Ethiopia">Ethiopia</option>
											<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
											</option>
											<option value="Faroe Islands">Faroe Islands</option>
											<option value="Fiji">Fiji</option>
											<option value="Finland">Finland</option>
											<option value="France">France</option>
											<option value="French Guiana">French Guiana</option>
											<option value="French Polynesia">French Polynesia</option>
											<option value="French Southern Territories">French Southern Territories
											</option>
											<option value="Gabon">Gabon</option>
											<option value="Gambia">Gambia</option>
											<option value="Georgia">Georgia</option>
											<option value="Germany">Germany</option>
											<option value="Ghana">Ghana</option>
											<option value="Gibraltar">Gibraltar</option>
											<option value="Greece">Greece</option>
											<option value="Greenland">Greenland</option>
											<option value="Grenada">Grenada</option>
											<option value="Guadeloupe">Guadeloupe</option>
											<option value="Guam">Guam</option>
											<option value="Guatemala">Guatemala</option>
											<option value="Guernsey">Guernsey</option>
											<option value="Guinea">Guinea</option>
											<option value="Guinea-Bissau">Guinea-Bissau</option>
											<option value="Guyana">Guyana</option>
											<option value="Haiti">Haiti</option>
											<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald
												Islands
											</option>
											<option value="Holy See (Vatican City State)">Holy See (Vatican City
												State)
											</option>
											<option value="Honduras">Honduras</option>
											<option value="Hong Kong">Hong Kong</option>
											<option value="Hungary">Hungary</option>
											<option value="Iceland">Iceland</option>
											<option value="India">India</option>
											<option value="Indonesia">Indonesia</option>
											<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
											<option value="Iraq">Iraq</option>
											<option value="Ireland">Ireland</option>
											<option value="Isle of Man">Isle of Man</option>
											<option value="Israel">Israel</option>
											<option value="Italy">Italy</option>
											<option value="Jamaica">Jamaica</option>
											<option value="Japan">Japan</option>
											<option value="Jersey">Jersey</option>
											<option value="Jordan">Jordan</option>
											<option value="Kazakhstan">Kazakhstan</option>
											<option value="Kenya">Kenya</option>
											<option value="Kiribati">Kiribati</option>
											<option value="Korea, Democratic People's Republic of">Korea, Democratic
												People's Republic of
											</option>
											<option value="Korea, Republic of">Korea, Republic of</option>
											<option value="Kosovo">Kosovo</option>
											<option value="Kuwait">Kuwait</option>
											<option value="Kyrgyzstan">Kyrgyzstan</option>
											<option value="Lao People's Democratic Republic">Lao People's Democratic
												Republic
											</option>
											<option value="Latvia">Latvia</option>
											<option value="Lebanon">Lebanon</option>
											<option value="Lesotho">Lesotho</option>
											<option value="Liberia">Liberia</option>
											<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
											<option value="Liechtenstein">Liechtenstein</option>
											<option value="Lithuania">Lithuania</option>
											<option value="Luxembourg">Luxembourg</option>
											<option value="Macao">Macao</option>
											<option value="Macedonia, the Former Yugoslav Republic of">Macedonia, the
												Former Yugoslav Republic of
											</option>
											<option value="Madagascar">Madagascar</option>
											<option value="Malawi">Malawi</option>
											<option value="Malaysia">Malaysia</option>
											<option value="Maldives">Maldives</option>
											<option value="Mali">Mali</option>
											<option value="Malta">Malta</option>
											<option value="Marshall Islands">Marshall Islands</option>
											<option value="Martinique">Martinique</option>
											<option value="Mauritania">Mauritania</option>
											<option value="Mauritius">Mauritius</option>
											<option value="Mayotte">Mayotte</option>
											<option value="Mexico">Mexico</option>
											<option value="Micronesia, Federated States of">Micronesia, Federated States
												of
											</option>
											<option value="Moldova, Republic of">Moldova, Republic of</option>
											<option value="Monaco">Monaco</option>
											<option value="Mongolia">Mongolia</option>
											<option value="Montenegro">Montenegro</option>
											<option value="Montserrat">Montserrat</option>
											<option value="Morocco">Morocco</option>
											<option value="Mozambique">Mozambique</option>
											<option value="Myanmar">Myanmar</option>
											<option value="Namibia">Namibia</option>
											<option value="Nauru">Nauru</option>
											<option value="Nepal">Nepal</option>
											<option value="Netherlands">Netherlands</option>
											<option value="Netherlands Antilles">Netherlands Antilles</option>
											<option value="New Caledonia">New Caledonia</option>
											<option value="New Zealand">New Zealand</option>
											<option value="Nicaragua">Nicaragua</option>
											<option value="Niger">Niger</option>
											<option value="Nigeria">Nigeria</option>
											<option value="Niue">Niue</option>
											<option value="Norfolk Island">Norfolk Island</option>
											<option value="Northern Mariana Islands">Northern Mariana Islands</option>
											<option value="Norway">Norway</option>
											<option value="Oman">Oman</option>
											<option value="Pakistan">Pakistan</option>
											<option value="Palau">Palau</option>
											<option value="Palestinian Territory, Occupied">Palestinian Territory,
												Occupied
											</option>
											<option value="Panama">Panama</option>
											<option value="Papua New Guinea">Papua New Guinea</option>
											<option value="Paraguay">Paraguay</option>
											<option value="Peru">Peru</option>
											<option value="Philippines">Philippines</option>
											<option value="Pitcairn">Pitcairn</option>
											<option value="Poland">Poland</option>
											<option value="Portugal">Portugal</option>
											<option value="Puerto Rico">Puerto Rico</option>
											<option value="Qatar">Qatar</option>
											<option value="Reunion">Reunion</option>
											<option value="Romania">Romania</option>
											<option value="Russian Federation">Russian Federation</option>
											<option value="Rwanda">Rwanda</option>
											<option value="Saint Barthelemy">Saint Barthelemy</option>
											<option value="Saint Helena">Saint Helena</option>
											<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
											<option value="Saint Lucia">Saint Lucia</option>
											<option value="Saint Martin">Saint Martin</option>
											<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
											<option value="Saint Vincent and the Grenadines">Saint Vincent and the
												Grenadines
											</option>
											<option value="Samoa">Samoa</option>
											<option value="San Marino">San Marino</option>
											<option value="Sao Tome and Principe">Sao Tome and Principe</option>
											<option value="Saudi Arabia">Saudi Arabia</option>
											<option value="Senegal">Senegal</option>
											<option value="Serbia">Serbia</option>
											<option value="Serbia and Montenegro">Serbia and Montenegro</option>
											<option value="Seychelles">Seychelles</option>
											<option value="Sierra Leone">Sierra Leone</option>
											<option value="Singapore">Singapore</option>
											<option value="Sint Maarten">Sint Maarten</option>
											<option value="Slovakia">Slovakia</option>
											<option value="Slovenia">Slovenia</option>
											<option value="Solomon Islands">Solomon Islands</option>
											<option value="Somalia">Somalia</option>
											<option value="South Africa">South Africa</option>
											<option value="South Georgia and the South Sandwich Islands">South Georgia
												and the South Sandwich Islands
											</option>
											<option value="South Sudan">South Sudan</option>
											<option value="Spain">Spain</option>
											<option value="Sri Lanka">Sri Lanka</option>
											<option value="Sudan">Sudan</option>
											<option value="Suriname">Suriname</option>
											<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
											<option value="Swaziland">Swaziland</option>
											<option value="Sweden">Sweden</option>
											<option value="Switzerland">Switzerland</option>
											<option value="Syrian Arab Republic">Syrian Arab Republic</option>
											<option value="Taiwan, Province of China">Taiwan, Province of China</option>
											<option value="Tajikistan">Tajikistan</option>
											<option value="Tanzania, United Republic of">Tanzania, United Republic of
											</option>
											<option value="Thailand">Thailand</option>
											<option value="Timor-Leste">Timor-Leste</option>
											<option value="Togo">Togo</option>
											<option value="Tokelau">Tokelau</option>
											<option value="Tonga">Tonga</option>
											<option value="Trinidad and Tobago">Trinidad and Tobago</option>
											<option value="Tunisia">Tunisia</option>
											<option value="Turkey">Turkey</option>
											<option value="Turkmenistan">Turkmenistan</option>
											<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
											<option value="Tuvalu">Tuvalu</option>
											<option value="Uganda">Uganda</option>
											<option value="Ukraine">Ukraine</option>
											<option value="United Arab Emirates">United Arab Emirates</option>
											<option value="United Kingdom">United Kingdom</option>
											<option value="United States">United States</option>
											<option value="United States Minor Outlying Islands">United States Minor
												Outlying Islands
											</option>
											<option value="Uruguay">Uruguay</option>
											<option value="Uzbekistan">Uzbekistan</option>
											<option value="Vanuatu">Vanuatu</option>
											<option value="Venezuela">Venezuela</option>
											<option value="Viet Nam">Viet Nam</option>
											<option value="Virgin Islands, British">Virgin Islands, British</option>
											<option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
											<option value="Wallis and Futuna">Wallis and Futuna</option>
											<option value="Western Sahara">Western Sahara</option>
											<option value="Yemen">Yemen</option>
											<option value="Zambia">Zambia</option>
											<option value="Zimbabwe">Zimbabwe</option>
										</select>
									</div>

									<div class="col-12 mb-20">
										<label>Street address <span>*</span></label>
										<input placeholder="House number and street name" type="text" name="address">
									</div>
									<div class="col-12 mb-20">
										<label>Town / City <span>*</span></label>
										<input type="text" name="city">
									</div>
									<div class="col-12 mb-20">
										<label>State / County <span>*</span></label>
										<input type="text" name="state">
									</div>
									<div class="col-lg-6 mb-20">
										<label>Phone<span>*</span></label>
										<input type="number" name="phone">

									</div>
									<div class="col-lg-6 mb-20">
										<label> Email Address <span>*</span></label>
										<input type="email" name="email">

									</div>

									<div class="col-12 mb-20">
										<div id="collapsetwo" class="collapse one" data-parent="#accordion">
											<div class="row">
												<div class="col-lg-6 mb-20">
													<label>First Name <span>*</span></label>
													<input type="text">
												</div>
												<div class="col-lg-6 mb-20">
													<label>Last Name <span>*</span></label>
													<input type="text">
												</div>
												<div class="col-12 mb-20">
													<label>Company Name</label>
													<input type="text">
												</div>
												<div class="col-12 mb-20">
													<div class="select_form_select">
														<label for="countru_name">country <span>*</span></label>
														<select class="niceselect_option" name="cuntry"
																id="countru_name">
															<option value="2">bangladesh</option>
															<option value="3">Algeria</option>
															<option value="4">Afghanistan</option>
															<option value="5">Ghana</option>
															<option value="6">Albania</option>
															<option value="7">Bahrain</option>
															<option value="8">Colombia</option>
															<option value="9">Dominican Republic</option>

														</select>
													</div>
												</div>

												<div class="col-12 mb-20">
													<label>Street address <span>*</span></label>
													<input placeholder="House number and street name"
														   type="text">
												</div>
												<div class="col-12 mb-20">
													<input placeholder="Apartment, suite, unit etc. (optional)"
														   type="text">
												</div>
												<div class="col-12 mb-20">
													<label>Town / City <span>*</span></label>
													<input type="text">
												</div>
												<div class="col-12 mb-20">
													<label>State / County <span>*</span></label>
													<input type="text">
												</div>
												<div class="col-lg-6 mb-20">
													<label>Phone<span>*</span></label>
													<input type="text">

												</div>
												<div class="col-lg-6">
													<label> Email Address <span>*</span></label>
													<input type="text">

												</div>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="order-notes">
											<label for="order_note">Order Notes</label>
											<textarea id="order_note"
													  placeholder="Notes about your order, e.g. special notes for delivery."
													  name="note"></textarea>
										</div>
									</div>
								</div>

							</div>
							<div class="col-lg-6 col-md-6">
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
												<td> <?= $value['name'] ?> <strong> × <?= $value['qty'] ?></strong></td>
												<td>$<?= $value['price'] * $value['qty'] ?></td>
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
												<td>$<?=$total?></
												>
											</tr>
										<?php } ?>
										<tr>
											<th>Cart Subtotal</th>
											<td>$<?= $total?></td>
										</tr>
										<tr>
											<th>Shipping</th>
											<td><strong>Free shipping</strong></td>
										</tr>
										<tr class="order_total">
											<th>Order Total</th>
											<td><strong>$<?=$total?></strong></td>
										</tr>
										<?php } ?>
										</tfoot>
									</table>
								</div>
								<div class="col-md-12">
									<div class="panel-default">
										<input id="" type="radio" checked/>
										<label for="payment_defult" data-target="" aria-controls="collapsedefult">Credit Card </label>
										<div id="" class=" one" data-parent="">
											<div class="">
												<p>Pay via card; you can pay with your credit card just enter your card details.
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
													<input type="text" id="card-number" name="card_no" placeholder=""
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
													<input type="text" name="card_holder"  placeholder=""
														   class="form-control" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group expiration">
													<label for="">expiry month
													</label>
													<input type="number" name="card_expiry_month" placeholder=""
														   class="form-control card-expiry-month" id="month" required>
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
									<div id="error-message" style="color:red;font-weight:450"></div>
									<div class="order_button" style="margin-top: 10px">
									    <div id="loader" style="display:none;width:50px">
                        <img alt="loader" src="<?=base_url('assets/LoaderIcon.gif') ?>">
                    </div>
										<button onClick="stripePay(event);" id="submit-btn" style="background: #3B5999;color: white" >Pay now</button>
										
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
<?php } else redirect('user/view/products'); ?>

<script src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
function cardValidation () {
    var valid = true;
var fname = $('[name="fname"]').val();
    var lname = $('[name="lname"]').val();
    var country = $('[name="country"]').val();
    var address = $('[name="address"]').val();
    var city = $('[name="city"]').val();
    var phone = $('[name="phone"]').val();
    var state = $('[name="state"]').val();
    var email = $('[name="email"]').val();
    var cardNumber = $('#card-number').val();
    var month = $('#month').val();
    var year = $('#year').val();
    var cvc = $('#cvc').val();

    $("#error-message").html("").hide();


    if (fname.trim() == "") {
    
        $('[name="fname"]').css("border","1px solid red");
        valid = false;
    }
    if (lname.trim() == "") {
        $('[name="lname"]').css("border","1px solid red");
        valid = false;
    }
    if (country.trim() == "") {
        $('[name="country"]').css("border","1px solid red");
        valid = false;
    }
    if (city.trim() == "") {
        $('[name="city"]').css("border","1px solid red");
        valid = false;
    }
    if (address.trim() == "") {
        $('[name="address"]').css("border","1px solid red");
        valid = false;
    }
    if (phone.trim() == "") {
        $('[name="phone"]').css("border","1px solid red");
        valid = false;
    }
    if (state.trim() == "") {
        $('[name="state"]').css("border","1px solid red");
        valid = false;
    }
    if (email.trim() == "") {
        $('[name="email"]').css("border","1px solid red");
    	   valid = false;
    }
    if (cardNumber.trim() == "") {
        $('[name="card_no"]').css("border","1px solid red");
    	   valid = false;
    }

    if (month.trim() == "") {
        $('[name="card_expiry_month"]').css("border","1px solid red");
    	    valid = false;
    }
    if (year.trim() == "") {
        $('[name="card_expiry_year"]').css("border","1px solid red");
        valid = false;
    }
    if (cvc.trim() == "") {
        $('[name="card_ccv"]').css("border","1px solid red");
        valid = false;
    }

    if(valid == false) {
        $("#error-message").html("All Fields are required").show();
    }

    return valid;
}
Stripe.setPublishableKey("<?=(!empty($stripe[0]['pk'])) ? $stripe[0]['pk'] : "" ?>");
//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $("#submit-btn").show();
        $( "#loader" ).css("display", "none");
        //display the errors on the form
        $("#error-message").html(response.error.message).show();
    } else {
        //get token id
        var token = response['id'];
        //insert the token into the form
        $("#frmStripePayment").append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        //submit form to the server
        $("#frmStripePayment").submit();
    }
}
function stripePay(e) {
    e.preventDefault();
    var valid = cardValidation();

    if(valid == true) {
        $("#submit-btn").hide();
        $( "#loader" ).css("display", "inline-block");
        $( "#submit-button" ).css("display", "none");
        
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
