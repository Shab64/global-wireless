<?php


class stripe_library
{
	var $CI;
	var $api_error;
	private $stripe;

	function __construct()
	{
		require_once 'vendor/autoload.php';
		$this->api_error = "";
		$this->CI =& get_instance();
		$this->CI->load->config('stripe');
		$this->stripe = new Stripe\StripeClient('sk_test_51Io2yoBdGjyOgRznxDGQL342fSieKXZFxQB6ncKRmIQlDFBLNcxFh0S5jAnXBZGt2giXUdETTbzxmz2SCilkAWAO00vOqLOOKb');
	}

	function createProduct($name)
	{
		try {
			$product = $this->stripe->products->create(
				array('name' => $name)
			);
			return $product;
		} catch (Exception $e) {
			$this->api_error = $e->getMessage();
			var_dump($this->api_error);
			return false;
		}
	}

	function createPrice($productID, $amount, $interval)
	{
		try {
			$cents = $amount * 100; //dollars into cents
			$price = $this->stripe->prices->create(
				array(
					'unit_amount' => $cents,
					'currency' => 'usd',
					'recurring' => array(
						'interval' => $interval
					),
					'product' => $productID
				)
			);
			return $price;
		} catch (Exception $e) {
			$this->api_error = $e->getMessage();
			var_dump($this->api_error);
			return false;
		}
	}

	function retrieveStripeProduct($productID)
	{
		try {
			$productInfo = $this->stripe->products->retrieve($productID);
			return $productInfo;
		} catch (Exception $e) {
			$this->api_error = $e->getMessage();
			var_dump($this->api_error);
			return false;
		}
	}

	function retrieveStripePrice($priceID)
	{
		try {
			$priceInfo = $this->stripe->prices->retrieve($priceID);
			return $priceInfo;
		} catch (Exception $e) {
			$this->api_error = $e->getMessage();
			var_dump($this->api_error);
			return false;
		}
	}

	function createCustomer($token)
	{
		try {
			$customer = $this->stripe->customers->create(
				array(
					'source' => $token
				)
			);
			return $customer;
		} catch (Exception $e) {
			$this->api_error = $e->getMessage();
			var_dump($this->api_error);
			return false;
		}
	}

	function createSubscription($stripe_customer_id, $stripe_price_id)
	{
		try {
			$subscription = $this->stripe->subscriptions->create(
				array(
					'customer' => $stripe_customer_id,
					'items' => array(
						array('price' => $stripe_price_id)
					)
				)
			);
			return $subscription;
		} catch (Exception $e) {
			$this->api_error = $e->getMessage();
			var_dump("Subscription", $this->api_error);
			return false;
		}
	}

	function updateSubscription($stripeSubscriptionID, $stripePriceID)
	{
		try {
			$subscription = $this->stripe->subscriptions->update(
				$stripeSubscriptionID,
				array(
					'items' => array(
						array('plan' => $stripePriceID)
					)
				)
			);
			return $subscription;
		} catch (Exception $e) {
			$this->api_error = $e->getMessage();
			var_dump("Update Subscription", $this->api_error);
			return false;
		}
	}

	function retrieveSubscription($subID)
	{
		try {
			$subInfo = $this->stripe->subscriptions->retrieve($subID);
			return $subInfo;
		} catch (Exception $e) {
			$this->api_error = $e->getMessage();
			var_dump($this->api_error);
			return false;
		}
	}

	function cancelSubscription($subID)
	{
		try {
			$subInfo = $this->stripe->subscriptions->cancel($subID);
			return $subInfo;
		} catch (Exception $e) {
			$this->api_error = $e->getMessage();
			var_dump($this->api_error);
			return false;
		}
	}
}
