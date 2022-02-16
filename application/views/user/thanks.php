<style>
	.thank-box {
		padding: 15px;
		border: 1px solid #233295;
		box-shadow: 2px 10px 5px #4D59A7;
	}
</style>


<section style="padding-top: 50px; padding-bottom: 50px;">

	<div class="container">
		<div class="thank-box">
			<?php if (isset($total_amount)):
				$client = $this->session->userdata('client_login'); ?>
				<h2 class="text-center">Thank You <?= ucfirst($client['name']) ?> For Shopping With Us.</h2>

				<p>Total Amount: $<?= $total_amount ?></p>
				<p>Shipping: <?= ucfirst($billing_info['shipping']) ?></p>

				<h3>Billing Details</h3>
				<p>Name: <?= ucfirst($billing_info['first_name']) . " " . ucfirst($billing_info['last_name']) ?></p>
				<p>Address: <?= ucfirst($billing_info['address']) ?></p>
				<p>City: <?= ucfirst($billing_info['city']) ?></p>
				<p>Country: <?= ucfirst($billing_info['country']) ?></p>
				<p>Phone #: <?= ucfirst($billing_info['phone']) ?></p>
				<p>Email: <?= ucfirst($billing_info['email']) ?></p>
				<p class="text-center">Our team will reach you soon.</p>
			<?php else: ?>
				<h2 class="text-center">Thank You For Shopping With Us.</h2>
				<p class="text-center">Our team will reach you soon.</p>
			<?php endif; ?>
		</div>
	</div>

</section>


