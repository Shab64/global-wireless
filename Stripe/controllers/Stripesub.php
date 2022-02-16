<?php


class Stripesub extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('stripe_library');
		$this->userID = 2; //By Default is 2 we get this userID by SESSION
	}

	function index()
	{
		$data = array();

		$data['products'] = $this->data->fetch('stripe_products');

		if (empty($data['products'])) {
			$productNames = array('Bronze Product', 'Silver Product', 'Gold Product');
			$productPrices = array(20, 50, 100);
			$productIntervals = array('day', 'month', 'year');
			for ($i = 0; $i < sizeof($productNames); $i++) {
				//Create Product For Stripe and Price Of that Product & add into stripe_products one by one
				$product = $this->stripe_library->createProduct($productNames[$i]);
				if ($product) {
					$price = $this->stripe_library->createPrice($product['id'], $productPrices[$i], $productIntervals[$i]);
					if ($price) {
						$dat = array(
							'stripe_product_id' => $product['id'],
							'stripe_price_id' => $price['id']
						);
						$this->data->insert('stripe_products', $dat);
					}
				}
			}
		}

		//if payment is submitted with token
		if ($this->input->post('stripeToken')) {
			//Retrieve Stripe Token and User Info from the Posted form Data
			$postData = $this->input->post();

			//Make Payment
			$paymentID = $this->payment($postData);

			//If Payment Successful
			if ($paymentID) {
//				redirect('subscription/payment_status/' . $subData);
//				$this->load->view('stripeSubscription/payment_status', $subData);
				redirect('stripesub/paymentDetails/'.$paymentID);
			} else {
				$apiError = !empty($this->stripe_library->api_error) ? '(' . $this->stripe_library->api_error . ')' : '';
				$data['error_msg'] = 'Transaction has been Failed!' . $apiError;
			}
		}

		if (!empty($data['products'])) {
			for ($i = 0; $i < sizeof($data['products']); $i++) {
				$data['productInfo'][$i] = $this->stripe_library->retrieveStripeProduct($data['products'][$i]['stripe_product_id']);
				$priceInfo = $this->stripe_library->retrieveStripePrice($data['products'][$i]['stripe_price_id']);
				$data['productInfo'][$i]['price'] = $priceInfo['unit_amount'] / 100;
				$data['productInfo'][$i]['interval'] = $priceInfo['recurring']['interval'];
				$data['productInfo'][$i]['price_id'] = $priceInfo['id'];
			}
		}

		$this->load->view('stripeSubscription/index', $data);
	}

	function payment($postData)
	{
		//if postData is not empty
		if (!empty($postData)) {
			//Retrieve Stripe info and user info data from the submitted form data
//			$name = $postData['name'];
//			$email = $postData['email'];
			$stripePriceID = $this->input->post('selected_price');
			$token = $postData['stripeToken'];

			$subscriptionExist = $this->data->fetch('stripe_user_subscription', array('user_id' => $this->userID));

			if (empty($subscriptionExist)) {
				//Add Customer To Stripe
				$customer = $this->stripe_library->createCustomer($token);
				if ($customer) {
					$subscription = $this->stripe_library->createSubscription($customer['id'], $stripePriceID);
					if ($subscription) {
						$priceId = $subscription['items']['data'][0]['plan']['id'];
						$productId = $subscription['items']['data'][0]['plan']['product'];
						$price = ($subscription['items']['data'][0]['plan']['amount'] / 100);
						$currency = $subscription['items']['data'][0]['plan']['currency'];
						$interval = $subscription['items']['data'][0]['plan']['interval'];
						$intervalCount = $subscription['items']['data'][0]['plan']['interval_count'];
						$current_period_start = date("y-m-d H:i:s", $subscription['current_period_start']);
						$current_period_end = date("y-m-d H:i:s", $subscription['current_period_end']);
						$status = $subscription['status'];
						$created = date("y-m-d H:i:s", $subscription['created']);

						$subscriptionData = array(
							'user_id' => $this->userID,
							'stripe_subscription_id' => $subscription['id'],
							'stripe_customer_id' => $subscription['customer'],
							'stripe_price_id' => $priceId,
							'stripe_product_id' => $productId,
							'plan_amount' => $price,
							'plan_amount_currency' => $currency,
							'plan_interval' => $interval,
							'plan_interval_count' => $intervalCount,
							'plan_period_start' => $current_period_start,
							'plan_period_end' => $current_period_end,
							'created' => $created,
							'status' => $status,
							'payer_email' => 'email@.com'//Email Here From Session
						);
						$this->data->insert('stripe_user_subscription', $subscriptionData);
						return $subscription['id'];
					}
				}
				return false;
			} else {
				//update Subscription and Add into database
//				$updateSubscription = $this->stripe_library->updateSubscription($subscriptionExist[0]['stripe_subscription_id'],$stripePriceID);
				//Cancel Subscription and Recreate Subscription
				$this->stripe_library->cancelSubscription($subscriptionExist[0]['stripe_subscription_id']);
				$subscription = $this->stripe_library->createSubscription($subscriptionExist[0]['stripe_customer_id'], $stripePriceID);
				if ($subscription) {
					$priceId = $subscription['items']['data'][0]['plan']['id'];
					$productId = $subscription['items']['data'][0]['plan']['product'];
					$price = ($subscription['items']['data'][0]['plan']['amount'] / 100);
					$currency = $subscription['items']['data'][0]['plan']['currency'];
					$interval = $subscription['items']['data'][0]['plan']['interval'];
					$intervalCount = $subscription['items']['data'][0]['plan']['interval_count'];
					$current_period_start = date("y-m-d H:i:s", $subscription['current_period_start']);
					$current_period_end = date("y-m-d H:i:s", $subscription['current_period_end']);
					$status = $subscription['status'];
					$created = date("y-m-d H:i:s", $subscription['created']);

					$subscriptionData = array(
						'user_id' => $this->userID,
						'stripe_subscription_id' => $subscription['id'],
						'stripe_customer_id' => $subscription['customer'],
						'stripe_price_id' => $priceId,
						'stripe_product_id' => $productId,
						'plan_amount' => $price,
						'plan_amount_currency' => $currency,
						'plan_interval' => $interval,
						'plan_interval_count' => $intervalCount,
						'plan_period_start' => $current_period_start,
						'plan_period_end' => $current_period_end,
						'created' => $created,
						'status' => $status,
						'payer_email' => 'email@.com'//Email Here From Session
					);
					$this->data->update(array('user_id' => $this->userID), 'stripe_user_subscription', $subscriptionData);
					return $subscription['id'];
				}
				return false;
			}
		}
	}

	function paymentDetails($paymentID){
		$subData['subscription'] = $this->stripe_library->retrieveSubscription($paymentID);
        $this->load->view('stripeSubscription/payment_status',$subData);
	}
}
