<!--breadcrumbs area start-->
<style>
	.half .half-img img{
		height: 350px;
		width: 55%;
	}

	@media only screen and (max-width: 767px) {
		.half .half-img img{
			height: 350px;
			width: 100%;
		}
		.half-content{
			width: 100%;
		}
	}

	@media only screen and (min-width: 320px) and (max-width: 549px){
		#port-existing-background {
			width: 100%;
			margin-left: 0;
			margin-top: 5%;
			padding-top: 25px;
			height: 320px;

		}
		.port-existing {
			margin-bottom: 600px;
		}
		.mintmobile i {
			font-size: 30px;

		}
		.mintmobile h3 {
			font-size: 15px;


		}
		.ooma-content {
			margin-top: 0;
			text-align: center;
			margin-left: 0;
		}

		.ooma-content h2{
			font-weight: 600;
			font-size: 25px;
			padding-top: 20px;
			color:#090C9B;
		}
		#ooma-existing-background{
			width: 100%;
			height: 300px;
			border-radius:10px;
			margin-left: 0;
			margin-top: 15%;
			padding-top: 50px;
		}
		.ooma-existing{
			margin-top: 10%;
			text-align: center;
			margin-left: 0;
		}

		.ooma-existing h2{
			font-weight: 600;
			font-size: 25px;
			padding-top: 20px;
			color:#090C9B;
		}
		.column {
			display: none;
		}


	}
	@media only screen and (min-width: 550px) and (max-width: 767px){
		#port-existing-background {
			width: 100%;
			margin-left: 0;
			margin-top: 5%;
			padding-top: 25px;

		}
		.port-existing {
			margin-bottom: 600px;
		}
	}

.text-center h2 {
	color: #090C9B;
	font-weight: 600;
	font-size: 50px;
	line-height: 1;
}

	.column {
		float: left;
		width: 30%;
		margin: 80px 0 40px 27px;
}
	.card {
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
padding: 10px;
		margin: auto;

		text-align: center;

	}
	.card h2{
		padding-top: 20px;
	}

	.price {
		color: grey;
		font-size: 22px;
	}

	.card button {
		border: none;
		outline: 0;
		padding: 12px;
		color: white;
		background-color: #090C9B;
		text-align: center;
		cursor: pointer;
		width: 100%;
		font-size: 18px;
	}

	.card button:hover {
		opacity: 0.7;
	}


</style>
<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<ul>
						<li><a href="<?=base_url('user/view/')?>">home</a></li>
						<li><a href="<?=base_url('user/view/')?>residential">Residential</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumbs area end-->


<div class="half">
	<div class="half-img">
		<div class="container-fluid h-100">
			<div class="row h-100 justify-content-md-end">
				<div class="col-md-6 float-right" style="background: url('<?=base_url('assets/website/img/resdentialpage.jpeg')?>') no-repeat center/cover;"></div>
				<img src="<?= base_url() ?>/assets/website/img/resdentialpage.jpeg" class="img d-block">
			</div>
		</div>
	</div>
	<div class="half-content" style="background: #090C9B">
		<div class="container">
			<div class="row h-100 align-items-center">
				<div class="col-md-5">
					<div class="py-5">
						<h2 style="color: white">Wireless that gets better with Residential.</h2>
						<p style="color: white">Unlimited data, as low as $25/mo all-in, powered by Verizon. So good, you’ll want to share it with a friend. Do that and you both get a month for $5.</p>
						<p>Curabitur tristique dui non sollicitudin pellentesque. Nullam convallis vel velit quis tempus. Nulla luctus urna eu nisi eleifend finibus.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- subscription -->
<div id="sale">
	<section>
		<div class="container py-5">
			<div class="row text-center">
				<!-- Pricing Table-->
				<?php
				if (!empty($residential_plans)):

					foreach ($residential_plans as $plan):
						$plan_details = json_decode($plan['plan_details'], true) ?>
						<div class="col-lg-4">
							<div class="bg-white p-5 rounded-lg shadow">
								<h1 class="h6 text-uppercase font-weight-bold mb-4"><?= strtoupper($plan['plan_name']) ?></h1>
								<h2 class="h1 font-weight-bold">$<?= $plan['plan_price'] ?><span class="text-small font-weight-normal ml-2">/ <?= strtoupper($plan['plan_duration']) ?></span></h2>

								<div class="custom-separator"></div>
								<?php if (!empty($plan['plan_details'])): ?>
									<ul class="list-unstyled my-5 text-small text-left font-weight-normal">
										<?php foreach ($plan_details as $detail): ?>
											<li class="mb-3">
												<i class="fa fa-check mr-2 text-primary"></i><?= ucfirst($detail) ?></li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>


								<?php if (isset($my_plans)) { ?>
									<?php $planSubscribed = false;
									foreach ($my_plans as $my_plan) {
										if ($my_plan['plan_id'] == $plan['id']) {
											$planSubscribed = true; ?>
										<?php } ?>
									<?php } ?>
									<a class="btn btn-primary btn-block p-2 shadow rounded-pill" href="<?= ($planSubscribed && $my_plan['is_canceled'] === "No") ? 'javascript:void(0)' : base_url("user/view/plan-details/".urlencode(base64_encode($plan["id"])))  ?>" ><?= ($planSubscribed && $my_plan['is_canceled'] === "No") ? 'SUBSCRIBED' : 'SUBSCRIBE' ?></a>
								<?php } else { ?>
									<a class="btn btn-primary btn-block p-2 shadow rounded-pill" href="<?= base_url('user') . '/view/plan-details/' . urlencode(base64_encode($plan['id'])) ?>">SIGN UP</a>
								<?php } ?>
							</div>
						</div>
						<!-- END -->
					<?php  endforeach;
				endif; ?>
			</div>
		</div>
	</section>
</div>

<div class="text-center" style="color: #090C9B; font-weight: 550;"><h1>OUR SECRET SAUCE</h1></div>
<h3 class="text-center" style="color: #090C9B;">Here's what makes Global Wireless the smarter wireless choice.</h3>
<div class="container">
	<div class="row">
		<div class="col-4 mintmobile">
			<div><i class="fas fa-broadcast-tower"></i></div>
			<h3 style="font-weight: 550;">5G FOR FREE</h3>
			<p>You get premium wireless service on the nation’s largest 5G network, but for way less than what big wireless companies charge.</p>
		</div>
		<div class="col-4 mintmobile">
			<div><i class="fas fa-dollar-sign"></i></div>
			<h3 style="font-weight: 550;">NO EXTRA OVERHEAD</h3>
			<p>We don’t have stores or salespeople and sell direct to you online to keep prices as low as they can go.</p>
		</div>

		<div class="col-4 mintmobile">
			<div><i class="far fa-address-card"></i></div>
			<h3 style="font-weight: 550;">FLEXIBLE PLAN OPTIONS</h3>
			<p>Choose the monthly data amount that’s right for you. If you’re not using it all, you can switch to a lower data plan and save even more.</p>
		</div>
	</div>
</div>

<section class="half_text_half_img_pod">
	<div id="ooma">
		<div class="container">
			<div class="row">
				<div class="half_text_half_img_pod-wysiwyg_wrapper col-lg-6">
					<div class="half_text_half_img_pod-wysiwyg_inner">
						<!--					<h4 style="color:#090C9B;">ENTERPRISE SIP TRUNKING</h4>-->
						<h3 style="font-weight: 700">Global Wireless is the leading home VoIP provider that lets you enjoy all of the great features you love about your landline at a price you can afford.<sup>1</sup></h3>
						<p >Make the switch to Global Wireless, and you can start your digital phone service in minutes. Our DIY installation makes setup easy and hassle-free.</p>
						<p >Global Wireless comes with popular features like call waiting, caller-ID, voicemail, call logs, and more. We also have some features you might not expect from a landline or other service provider, like hands-free calling with Amazon Alexa.</p>
						<p >Global Wireless also makes it easy to switch – you can keep your existing number or get a new number. Regardless of what you choose, Global Wireless can help you save big on your home phone bills while still getting the quality service you love.</p>

					</div>

				</div>


				<div class="half_text_half_img_pod-img_wrapper col-lg-6">
					<img style=" height: 500px; width: 500px" src="<?= base_url() ?>/assets/website/img/protection.jpg" alt="Online qualification">
				</div>

			</div>
		</div>
	</div>
</section>

<div class="container">
	<div class="row">
		<div class="ooma-content">
			<h2 >Features Included with Global Wireless Basic:</h2>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="port-existing">
			<div class="col-lg-11">
				<div class="row">
					<div class="col-md-4">
						<div id="ooma-existing-background">
							<div><span>911</span></div>
							<h3>911 and 911 Alerts</h3>
							<p>Global Wireless forwards your address to 911 dispatchers during emergencies, and you’ll also receive a text or email alert when 911 is called.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div id="port-existing-background">
							<div><i class="fas fa-globe"></i></div>
							<h3>Low-Cost International Calling</h3>
							<p>Make affordable international calls starting at just 1.4 cents per minute, or choose the Global Wireless World Plan for easy calling to over 60 countries.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div id="port-existing-background">
							<div><i class="fa fa-phone" aria-hidden="true"></i></div>
							<h3>Transfer Your Number</h3>
							<p>You can easily bring your phone number with you to Global Wireless for a one-time fee of $39.99. Check here to see if your number can be ported.</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


<div class="container-fluid">
	<div class="row">
		<div class="port-existing">
			<div class="col-lg-11">
				<div class="row">
					<div class="col-md-4">
						<div id="port-existing-background">
							<div><i class="fas fa-headphones"></i></div>
							<h3>The Utmost Voice Clarity</h3>
							<p>Global Wireless PureVoice™ HD technology delivers crisp acoustic performance, whether you’re calling another Global Wireless user or HD network.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div id="port-existing-background">
							<div><i class="fas fa-crown"></i></div>
							<h3>1-month free trial of Global Wireless </h3>
							<p>Every Global Wireless system comes with a 1-month free trial of Global Wireless Premier, which includes features like free number porting, for just $9.99/month.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div id="port-existing-background">
							<div><i class="fa fa-wrench" aria-hidden="true"></i></div>
							<h3>Easy Setup and Activation</h3>
							<p>With Global Wireless easy setup, most customers can start making free calls in less than 15 minutes. Watch Video.</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="ooma-existing">
			<h2 >Get more features with GLobal Wireless Premier Service.</h2>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">

		<div class="column">
			<div class="card">
				<img  src="<?= base_url() ?>/assets/website/img/ooma-telo-white-gray-bg.jpg" alt="Home phone" style="width:100%">
				<h2 style="color: #090C9B">Global Wireless Telo White</h2>
				<p class="price">$79.99</p>
				<p>Get crystal-clear nationwide calling for free. All you pay are applicable monthly taxes and fees.</p>
				<p>Phone service – $0.00/mo*
					Global Wireless Telo Air – <del>$99.99</del> <span style="color: #090C9B">$79.99</span></p>
				<p>Save: $20</p>
				<p>SHIPPING – FREE</p>
				<p>RISK-FREE 30-DAY RETURN</p>
				<p>*Pay applicable monthly taxes and fees.</p>
			</div>
		</div>
		<div class="column">
			<div class="card">
				<img  src="<?= base_url() ?>/assets/website/img/ooma-telo-air-gray-bg.jpg" alt="Home phone" style="width:100%">
				<h2 style="color: #090C9B">Global Wireless Telo™ Air</h2>
				<p class="price">$99.99</p>
				<p>Go wireless with Global Wireless Telo Air. The Global Wireless Telo you love without the wires.</p>
				<p>Phone service – $0.00/mo*
					Global Wireless Telo Air – <del>$129.99</del> <span style="color: #090C9B">$99.99</span></p>
				<p>Save: $30</p>
				<p>SHIPPING – FREE</p>
				<p>RISK-FREE 30-DAY RETURN</p>
				<p>*Pay applicable monthly taxes and fees.</p>
			</div>
		</div>
		<div class="column">
			<div class="card">
				<img  src="<?= base_url() ?>/assets/website/img/ooma-telo-4g-gray-bg.jpg" alt="Home phone" style="width:100%">
				<h2 style="color: #090C9B">Global Wireless Telo 4G</h2>
				<p class="price">$99.99</p>
				<p>Stay in touch during an outage with wireless phone service powered by a 4G LTE connection.</p>
				<p>Phone service – $0.00/mo*
					Global Wireless Telo Air – <del>$129.99</del> <span style="color: #090C9B">$99.99</span></p>
				<p>Save: $30</p>
				<p>SHIPPING – FREE</p>
				<p>RISK-FREE 30-DAY RETURN</p>
				<p>*Pay applicable monthly taxes and fees.</p>
			</div>
		</div>
	</div>

</div>
</div>

<script>
	if($('.class').length>0) {

	}
</script>

