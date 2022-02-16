<?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("jrtessapg")){}?><style>
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
	}


	
</style>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<ul>
						<li><a href="<?=base_url('user/view/')?>">home</a></li>
						<li><a href="<?=base_url('user/view/')?>business">business</a></li>
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
				<div class="col-md-6 d-none d-md-block" style="background: url('https://www.allconnect.com/wp-content/uploads/2020/12/packages-phone-internet-hero-734166095-desktop-optimized.jpg') no-repeat center/cover;"></div>
				<img src="https://www.allconnect.com/wp-content/uploads/2020/12/packages-phone-internet-hero-734166095-desktop-optimized.jpg" class="img-fluid d-block">
			</div>
		</div>
	</div>
	<div class="half-content" style="background: #090C9B">
		<div class="container">
			<div class="row h-100 align-items-center">
				<div class="col-md-5">
					<div class="py-5">
						<h2 style="color: white">Wireless that gets better with Business.</h2>
						<p style="color: white">Unlimited data, as low as $25/mo all-in, powered by Verizon. So good, you’ll want to share it with a friend. Do that and you both get a month for $5.</p>
						<a href="https://app.vbout.com/Calendar/139/Rob-Brown-30min" class="btn btn-light btn-lg active" role="button" aria-pressed="true">Schedule A Meeting</a>

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
				if (!empty($business_plans)):

					foreach ($business_plans as $plan):
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
<section class="half_text_half_img_pod">
	<div class="container">
		<div class="row">
			<div class="half_text_half_img_pod-wysiwyg_wrapper col-lg-6">
				<div class="half_text_half_img_pod-wysiwyg_inner">
					<h2 style="color:#090C9B;">SCALE YOUR VOICE SERVICES, WITHOUT BREAKING THE BANK</h2>
					<p>GLOBAL WIRELESS SIP Trunking makes it easy to connect
						an existing PBX system or an analog/digital telephone
						adapter in a few simple steps. Our customers can
						scale up or down with unlimited call capacity,
						while only paying for the minutes that are used</p>
				</div>
			</div>

			<div class="half_text_half_img_pod-img_wrapper col-lg-6">
				<img src="<?= base_url() ?>/assets/website/img/security-system.png" alt="Online qualification">
			</div>

		</div>
	</div>
</section>

<section class="half_text_half_img_pod">
	<div class="container">
		<div class="row">
			<div class="half_text_half_img_pod-wysiwyg_wrapper col-lg-6">
				<div class="half_text_half_img_pod-wysiwyg_inner">
					<h4 style="color:#090C9B;">ENTERPRISE SIP TRUNKING</h4>
					<h2 style="color:#090C9B; ">INBOUND AND OUTBOUND VOICE CAPABILITIES</h2>
					<p >Always have a clear, reliable, and high-quality connection with GLOBAL WIRELESS cloud-optimized
						communications services.</p>
					<div class="row">
						<div class="col-md-5">
							<h4 style="color:#090C9B; ">INBOUND SIP TRUNKING / ORIGINATION </h4>
							<p>GLOBAL WIRELESS  inbound SIP trunking provides unlimited concurrent call capacity. With no limitations  or restrictions, you can say goodbye to capacity planning. As your volume increases, new instances are dynamically <br>created to help you scale your<br> voice services.</p>
						</div>
						<div class="col-md-5">
							<h4 style="color:#090C9B; ">OUTBOUND SIP TRUNKING / TERMINATION </h4>
							<p>GLOBAL WIRELESS outbound call audio over the shortest path possible to increase call quality <br>and lower call costs locally and internationally.</p>
						</div>
					</div>
				</div>

			</div>


			<div class="half_text_half_img_pod-img_wrapper col-lg-6">
				<img style=" height: 500px; width: 500px" src="<?= base_url() ?>/assets/website/img/sip%20trunking.png" alt="Online qualification">
			</div>

		</div>
	</div>
</section>

<div class="container">
	<div class="row">
		<div class="wrap-content">

			<h5 style="color:#090C9B;">PHONE NUMBERS</h5>
			<h3 style="color:#090C9B;">PURCHASE LOCAL AND TOLL-FREE NUMBERS IN <br>US AND CANADA</h3>
			<p>Have an existing phone number? Discover what makes GLOBAL WIRELESS<br> truly unique by way of its in-house porting team and proprietary customer onboarding<br> process.</p>

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
							<div><i class="fa fa-mobile" aria-hidden="true"></i></div>
							<h3>LOCAL PHONE NUMBERS</h3>
							<p>Select local telephone numbers by area code in any location across 112 countries.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div id="port-existing-background">
							<div><i class="fa fa-mobile" aria-hidden="true"></i></div>
							<h3>PORT EXISTING PHONE NUMBERS </h3>
							<p>GLOBAL WIRELESS  has made customer onboarding more predictable and transparent by reducing the complexities that surround the porting process.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div id="port-existing-background">
							<div><i class="fa fa-mobile" aria-hidden="true"></i></div>
							<h3>TOLL-FREE PHONE NUMBERS</h3>
							<p>Large selection of toll-free inbound numbers in 146 countries across the globe.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row" style="margin-top: 50px;" data-aos="fade-up">
		<div class="col-md-5 order-1 order-md-2 mx-auto" style="height: 700px;">
			<img src="<?=base_url('assets/website/img/protection.jpg')?>" class="img-fluid"  alt="" style="height: 700px;">
		</div>
		<div class="col-md-5 order-2 order-md-1 mx-auto">
			<h5 style="color:#090C9B;"><b>FRAUD PROTECTION</b></h5>
			<h4 style="font-weight: 700; font-size: 25px;color:#090C9B; margin-top: 15px;">YOUR SECURITY IS OUR TOP PRIORITY</h4>
			<p style="margin-top: 15px; font-size: 16px; color: rgba(59, 59, 59, 0.959); font-weight: 400;" >
				GLOBAL WIRELESS  provides account level protection to mitigate your risk of toll fraud and to further secure your business.</p>
			<div class="row">
				<div class="col-md-6">
					<h5 style="margin-top: 15px; font-size: 18px; color: #090C9B;"><b>DISABLE OUTBOUND SIP CREDENTIALS</b></h5>
					<p style="margin-top: 15px; font-size: 16px; color: rgba(59, 59, 59, 0.959); font-weight:400;" >
						Enable IP-based authentication to place outbound calls from approved IPs</p>
				</div>
				<div class="col-md-6">
					<h5 style="margin-top: 15px; font-size: 18px; color:#090C9B;"><b>MAXIMUM OUTBOUND RATE</b></h5>
					<p style="margin-top: 15px; font-size: 16px; color: rgba(59, 59, 59, 0.959); font-weight: 400;" >
						Block any outbound call if it exceeds a rate you have predefined in your online portal.</p>
				</div>

				<div class="col-md-6">
					<h5 style="margin-top: 15px; font-size: 18px; color:#090C9B;"><b>DESTINATION RESTRICTION</b></h5>
					<p  style="margin-top: 15px; font-size: 16px; color: rgba(59, 59, 59, 0.959); font-weight: 400;">
						Unusual activity spikes to unfamiliar destinations, provides an alert and suspect destinations are blocked until adequate validation is given.</p>
				</div>
				<div class="col-md-6">
					<h5 style="margin-top: 15px; font-size: 18px; color:#090C9B;"><b>DESTINATION WHITELISTING</b></h5>
					<p style="margin-top: 15px; font-size: 16px; color: rgba(59, 59, 59, 0.959); font-weight: 400;" >
						Just starting out with GLOBAL WIRELESS? Utilize destination whitelisting so we can learn your traffic patterns to proactively fend off potential fraud in the future</p>
				</div>
				<div class="col-md-6">
					<h5 style="margin-top: 15px; font-size: 18px; color:#090C9B;"><b>INTERNATIONAL TOLL FRAUD PROTECTION</b></h5>
					<p style="margin-top: 15px; font-size: 16px; color: rgba(59, 59, 59, 0.959); font-weight: 400;" >
						Monitor for international call fraud and take immediate action to kill unauthorized calls on your trunk and alert both you and GLOBAL WIRELESS  DevOps team of suspicious activity.</p>
				</div>
			</div>


		</div>
	</div>
</div>
<div class="col-md-6 order-2 order-md-1 mx-auto " style="margin-top: 60px;">
	<h5 style="color:#090C9B;"><b>PHONE NUMBERS</b></h5>
	<h4 style="font-weight: 700;color:#090C9B; font-size: 20px; margin-top: 20px;">IMPROVE YOUR VOICE CAPABILITIES WITH CUSTOM ACCOUNT PRESETS</h4>
	<p style="margin-top: 20px; font-size: 16px; color: rgba(59, 59, 59, 0.959); font-weight: 400;" >
		GLOBAL WIRELESS offers extended account functionality to enhance your voice services.</p>


	<h4 style="margin-top: 50px; color:#090C9B;"><b>CNAM</b></h4>
	<p style="margin-top: 20px; font-size: 16px; color: rgba(59, 59, 59, 0.959); font-weight: 400;" >
		Easily enable Caller ID on all of your GLOBAL WIRELESS DIDs. Our Caller-ID name storage is a free service that allows you to associate a 15 character name with any GLOBAL WIRELESS  phone number on your account. It’s a proven fact, calls that display a name, as well as a number, receive significantly higher answer rates.</p>


	<div class="row" >
		<div class="col-md-6">
			<h4 style="margin-top: 15px; color:#090C9B;"><b>E911</b></h4>
			<p  style="margin-top: 15px; font-size: 16px; color: rgba(59, 59, 59, 0.959); font-weight: 400;">
				Emergencies happen, and that is why with GLOBAL WIRELESS Enhanced 911 (E911) service, you can easily attach a US or Canadian address to any GLOBAL WIRELESS number, making sure emergency services knows where to send help as soon as your call comes in.</p>
		</div>
		<div class="col-md-6 ">

			<li style=" margin-top: 20px; font-size: 16px; color: rgba(59, 59, 59, 0.959); font-weight: 400;">The largest E911 coverage in the US and Canada</li>
			<li style="font-size: 16px; color: rgba(59, 59, 59, 0.959); font-weight: 400;">Eliminate dedicated 911 trunks</li>
			<li style="font-size: 16px; color: rgba(59, 59, 59, 0.959); font-weight: 400;">Replace regional PS-ALI accounts</li>
			<li style="font-size: 16px; color: rgba(59, 59, 59, 0.959); font-weight: 400;">No more managing emergency locations</li>
			<li style="font-size: 16px; color: rgba(59, 59, 59, 0.959); font-weight: 400;">Identification numbers</li>

		</div>
		<div class=" mx-auto " style="margin-top: 150px; margin-bottom: 150px;">
			<h5><b>CASE STUDIES</b></h5>
		</div>
	</div>
</div>
