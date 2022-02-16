<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--	<link rel="stylesheet" href="--><? //= base_url('assets/css/bootstrap.min.css') ?><!--" />-->
	<!--	<link href="-->
	<? //=base_url()?><!--/assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
	<!--	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<style type="text/css">
		.panel-title {
			display: inline;
			font-weight: bold;
		}
	</style>
	<title>Stripe Subscription Payment API Integration</title>
	<script src="https://js.stripe.com/v3/"></script>
</head>
<body>

<div class="container">
	<div class="panel panel-info">
		<form method="post" action="" id="payment_form">
			<div class="panel-heading">
				<div class="panel-title">Panel Subscription With Stripe</div>
				<p>
					<b>Select Plan:</b>
					<select name="selected_price" id="selected_price">
						<?php if (isset($productInfo) && !empty($productInfo)) {
							foreach ($productInfo as $pInfo) { ?>
								<option value="<?= $pInfo['price_id'] ?>"><?= $pInfo['name'] . " $" . $pInfo['price'] . "/" . $pInfo['interval'] ?></option>
							<?php }
						} ?>
					</select>
				</p>
			</div>
			<div class="panel-body">
				<div id="paymentResponse"></div>
				<div class="form-group">
					<label>Name: </label>
					<input type="text" name="name" id="name" class="field" placeholder="Enter Name" required>
				</div>
				<div class="form-group">
					<label>Email: </label>
					<input type="email" name="email" id="email" class="field" placeholder="Enter Email" required>
				</div>
				<div class="form-group">
					<label>CARD NUMBER</label>
					<div id="card_number" class="field"></div>
				</div>
				<div class="row" style="display: inline">
					<div class="form-group">
						<label>EXPIRY DATE</label>
						<div id="card_expiry" class="field"></div>
					</div>
					<div class="form-group">
						<label>CVC CODE</label>
						<div id="card_cvc" class="field"></div>
					</div>
				</div>
				<button type="submit" class="btn btn-success" id="payBtn">Submit Payment</button>
			</div>
		</form>
	</div>
</div>
<script>
	//Set You Published API Key
	var stripe = Stripe("<?php echo $this->config->item('stripe_publishable_key'); ?>");

	//Create an Instance of An Element
	var element = stripe.elements();

	var style = {
		base: {
			fontWeight: 20,
			fontFamily: 'Robot, Open Sans, Segoe UI, sans-serif',
			fontSize: '30px',
			lineHeight: '1.4',
			color: '#555',
			backgroundColor: '#fff',
			'::placeholder': {
				color: '#888'
			},
		},
		invalid: {
			color: '#eb1c26'
		}
	};

	var cardElement = element.create('cardNumber', {
		style: style
	});
	cardElement.mount('#card_number');

	var exp = element.create('cardExpiry', {});
	exp.mount('#card_expiry');

	var cvc = element.create('cardCvc', {});
	cvc.mount('#card_cvc');

	var resultContainer = document.getElementById('paymentResponse');
	cardElement.addEventListener('change', function (event) {
		if (event.error) {
			resultContainer.innerHTML = '<p>' + event.error.message + '</p>';
		} else {
			resultContainer.innerHTML = " ";
		}
	});

	//Get Payment from Element
	var form = document.getElementById('payment_form');

	form.addEventListener('submit', function (e) {
		e.preventDefault();
		createToken();
	});

	//Create a Single use token to charge the user
	function createToken() {
		stripe.createToken(cardElement).then(function (result) {

			if (result.error) {
				//Inform the user if there was an error
				resultContainer.innerHTML = '<p>' + result.error.message + '</p>';
			} else {
				//Send Token To Your Server
				stripeTokenHandler(result.token);
			}
		});
	}

	//Callback to handle the response from stripe
	function stripeTokenHandler(token) {
		//If insert the token ID into form so it gets Submitted to the server
		var hiddenInput = document.createElement('input');
		hiddenInput.setAttribute('type', 'hidden');
		hiddenInput.setAttribute('name', 'stripeToken');
		hiddenInput.setAttribute('value', token.id);
		form.appendChild(hiddenInput);

		//Submit the Form
		form.submit();
	}


</script>
</body>
</html>
