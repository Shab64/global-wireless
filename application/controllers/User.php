<?php

use Stripe\Charge;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	private $skey;
	public function __construct()
	{
		parent::__construct();
		$stripeConfig = $this->data->fetch('stripe_config');
		$this->skey	= $stripeConfig[0]['sk']; //set skey to globally
		//Load Stripe Library
		$data = array('skey' => $this->skey); //passing skey as array to library stripe_library
		$this->load->library('stripe_library', $data);
	}

	public function index()
	{
		$this->view('index');
	}
	function test2(){
		$this->load->view('pi');
	}

	public function view($page = 'index')
	{
		$id = $this->uri->segment(4);

		$check = $this->session->userdata('client_login');
		if (!empty($check)) {
			$data['my_profile'] = $this->data->fetch('client', array('email' => $check['email']));
			if (!empty($data['my_profile'])) {
				$data['wishlist'] = $this->data->fetch("wishlist", array('client_id' => $data['my_profile'][0]['id']));
				if (!empty($data['wishlist'])) {
					foreach ($data['wishlist'] as $k => $list) {
						$products = $this->data->fetch('products', array('id' => $list['product_id']));
						$data['wishlist'][$k]['products'] = $products;
					}
				}
				$data['order_history'] = $this->data->fetch("orders", array('client_id' => $data['my_profile'][0]['id']));

				$data['my_subscriptions'] = $this->data->fetch("subscribers", array('client_id' => $data['my_profile'][0]['id']), null, 'id');
				if (!empty($data['my_subscriptions'])) {
					foreach ($data['my_subscriptions'] as $k => $mySubscription) {
						$plan = $this->data->fetch("plans", array('id' => $mySubscription['plan_id']));
						if (!empty($plan)) {
							$data['my_subscriptions'][$k]['plan_id'] = $plan[0];
							$stripeSubData = $this->stripe_library->retrieveSubscription($mySubscription['stripe_sub_id']);
							if ($stripeSubData != false) {
								$data['my_subscriptions'][$k]['stripe_sub_details'] = $stripeSubData;
								$data['my_subscriptions'][$k]['stripe_sub_amount'] = ($data['my_subscriptions'][$k]['stripe_sub_details']->items->data[0]->plan->amount_decimal / 100);
								$data['my_subscriptions'][$k]['stripe_sub_status'] = $data['my_subscriptions'][$k]['stripe_sub_details']->status;
								// $chargeAmount = ($data['my_subscriptions'][$k]['stripe_sub_details']->items->data[0]->plan->amount_decimal / 100);
								// $subscriptionStatus = $data['my_subscriptions'][$k]['stripe_sub_details']->status;
							} else {
								$this->session->set_flashdata("success", array("Error", "Error to get Subscription", "error"));
							}
						}
					}
				}
			}
			$data['cart_data'] = $this->data->fetch("cart", array('client_id' => $check['id']));
			$data['my_plans'] = $this->data->fetch("subscribers", array('client_id' => $check['id']));
			if (!empty($data['my_plans'])) {
				foreach ($data['my_plans'] as $k => $myPlan) {
					$subscription = $this->stripe_library->retrieveSubscription($myPlan['stripe_sub_id']);
					$data['my_plans'][$k]['status'] = $subscription->status;
				}
			}
		}
		$data['three_plans'] = $this->data->fetch("plans", array('status' => 'active'), 3);
		$data['stripe'] = $this->data->fetch("stripe_config");
		$data['all_clients'] = $this->data->fetch("client");
		$data['all_reviews'] = $this->data->fetch("reviews");
		$data['all_sliders'] = $this->data->fetch("sliders");
		$data['five_star'] = $this->data->fetch("reviews", array('rating' => 5));
		$data['four_star'] = $this->data->fetch("reviews", array('rating' => 4));
		$data['three_star'] = $this->data->fetch("reviews", array('rating' => 3));
		$data['two_star'] = $this->data->fetch("reviews", array('rating' => 2));
		$data['one_star'] = $this->data->fetch("reviews", array('rating' => 1));
		$data['all_categories'] = $this->data->fetch("categories");
		$data['product_id'] = $this->data->fetch("products", array('id' => $id));
		$data['blog_id'] = $this->data->fetch("blogs", array('id' => $id));
		if (!empty($data['blog_id'])) {
			foreach ($data['blog_id'] as $k => $comments) {
				$blogComments = $this->data->fetch("blog_comments", array('blog_id' => $comments['id']));
				if (!empty($blogComments)) {
					$data['blog_id'][$k]['comments'] = $blogComments;
				}
			}
		}


		if ($page == "plan-details") {
			$planID = base64_decode(urldecode($this->uri->segment(4)));
			$plan = $this->data->fetch('plans', array('id' => $planID));
			$data['plan'] = $plan[0];
		}

		if (!empty($data['product_id'])) {
			foreach ($data['product_id'] as $k => $pro) {
				$x = $this->data->fetch('categories', array('id' => $pro['cat_id']));
				if (!empty($x)) {
					$data['product_id'][$k]['cat'] = $x;
				}
			}
		}

		// if ($page === "my-subscriptions") {
		// 	if (!empty($check)) {
		// 		$data['my_subscriptions'] = $this->data->fetch("subscribers", array('client_id' => $check['id']), null, 'id');
		// 		if (!empty($data['my_subscriptions'])) {
		// 			foreach ($data['my_subscriptions'] as $k => $mySubscription) {
		// 				$plan = $this->data->fetch("plans", array('id' => $mySubscription['plan_id']));
		// 				if (!empty($plan)) {
		// 					$data['my_subscriptions'][$k]['plan_id'] = $plan[0];
		// 					$stripeSubData = $this->stripe_library->retrieveSubscription($mySubscription['stripe_sub_id']);
		// 					if ($stripeSubData != false) {
		// 						$data['my_subscriptions'][$k]['stripe_sub_details'] = $stripeSubData;
		// 						$data['my_subscriptions'][$k]['stripe_sub_amount'] = ($data['my_subscriptions'][$k]['stripe_sub_details']->items->data[0]->plan->amount_decimal / 100);
		// 						$data['my_subscriptions'][$k]['stripe_sub_status'] = $data['my_subscriptions'][$k]['stripe_sub_details']->status;
		// 						// $chargeAmount = ($data['my_subscriptions'][$k]['stripe_sub_details']->items->data[0]->plan->amount_decimal / 100);
		// 						// $subscriptionStatus = $data['my_subscriptions'][$k]['stripe_sub_details']->status;
		// 					} else {
		// 						$this->session->set_flashdata("success", array("Error", "Error to get Subscription", "error"));
		// 					}
		// 				}
		// 			}
		// 		}
		// 	} else {
		// 		return redirect(base_url('user/signin'));
		// 	}
		// }

		$data['all_products'] = $this->data->fetch("products", array('product_type' => 'phone'));
		$data['products'] = $this->data->myquery("SELECT * FROM `products` ORDER BY `id` DESC");
		$data['all_accessories'] = $this->data->fetch("products", array('product_type' => 'accessory'));
		$data['residential_plans'] = $this->data->fetch('plans', array('status' => 'active', 'plan_category' => "Residential"), null);
		$data['business_plans'] = $this->data->fetch('plans', array('status' => 'active', 'plan_category' => "Business"), null);

		$this->load->view('user/header', $data);
		$this->load->view('user/' . $page);
		$this->load->view('user/footer');
	}


	public function update($table, $page, $id = null)
	{
		$data = html_escape($this->input->post());
		if ($table === 'client') {
			$this->data->update(array('id' => $id), $table, $data);
			$client = $this->data->fetch($table, array('id' => $id));
			if (!empty($client)) {
				$this->session->set_userdata('client_login', $client[0]);
			}
			redirect('user/view/' . $page);
		}
	}

	public function addtocart()
	{
		$data = html_escape($this->input->post());
		//delete plans from cart
		$userdata = $this->session->userdata('client_login');
		$checkPlan = $this->data->fetch('cart', array('client_id' => $userdata['id'], 'type' => 'plan'));
		if(!empty($checkPlan)){
		 $this->data->delete('cart', array('client_id' => $userdata['id'], 'type' => 'plan'));   
		}
		$product = $this->data->fetch('products', array('id' => $data['id']));
		$img = (!empty($product[0]['image'])) ? json_decode($product[0]['image']) : "";
		$cart = array(
			'id' => $product[0]['id'],
			'name' => $product[0]['title'],
			'price' => $product[0]['price'],
			'qty' => ($data['qty'] <= $product[0]['qty']) ? $data['qty'] : $product[0]['qty'],
			'options' => (isset($data['memory']) and isset($data['color'])) ? array('image' => $img[0], 'memory' => $data['memory'], 'color' => $data['color']) : array('image' => $img[0])
		);
		$this->session->set_flashdata('item_added', $product[0]['title']);
		$this->cart->insert($cart);
		$this->show_cart();
		redirect('user/view/cart');
	}

	public function addplantocart($e_pID)
	{
		$client = $this->session->userdata('client_login');

		if (!empty($client)) {
			$x = html_escape($this->input->post());
			$d_pId = base64_decode(urldecode($e_pID));
			$plan = $this->data->fetch('plans', array('id' => $d_pId));
			$this->cart->destroy();
			$this->data->delete('cart', array('client_id' => $client['id'], 'type' => 'product'));
			$this->data->insert('cart', array(
				'client_id' => $client['id'],
				'product_id' => $d_pId,
				'product_title' => $plan[0]['plan_name'],
				'product_price' => $plan[0]['plan_price'],
				'quantity' => $x['qty'],
				'type' => 'plan'
			));
			return redirect(base_url('user/view/cart'));
		} else {
			$this->signin();
		}
	}

	function remove_from_cart($row_id)
	{
		$this->cart->remove($row_id);
		redirect('user/view/cart');
	}

	public function contact()
	{
		$data = html_escape($this->input->post());
		$img = base_url('images/logo.png');
		$msg = '
			<div style="font-family:Arial; width: 800px; margin: 0 auto; border:2px solid #dddddd;">
			<div style="padding: 10px 25px;">
			<div>
			<img src="' . $img . '" alt="" style="width: 175px;height: 60px; margin: 0 auto; display: block">
			</div>
			<div style="font-size: 25px; text-align: center; margin-top: 30px;text-transform: capitalize; color: #337BBF; padding-top: 20px; border-top: 1px solid #337BBF; padding-bottom: 10px; ">
				Web Link :<a href="http://webx24service.com/demo/gwidata/robert/" style="text-decoration: none;color: #337BBF">Gwidata.com</a> 
			</div>
			<div style="font-size: 18px; margin: 30px 0 5px; font-weight:bold; ">
			User Name :  <span style="color: #337BBF; font-size: 18px; font-weight: bold; text-transform: capitalize">' . ucfirst($data['name']) . '</span>
			</div>
			<div style="font-size: 18px; margin: 30px 0 5px; font-weight:bold; ">
			User E-mail :  <span style="color: #337BBF; font-size: 18px; font-weight: bold; text-transform: capitalize">' . ucfirst($data['email']) . '</span>
			</div><div style="font-size: 18px; margin: 30px 0 5px; font-weight:bold; ">
			User Subject :  <span style="color: #337BBF; font-size: 18px; font-weight: bold; text-transform: capitalize">' . ucfirst($data['subject']) . '</span>
			</div><div style="font-size: 18px; margin: 30px 0 5px; font-weight:bold; ">
			User Message :  <span style="color: #337BBF; font-size: 18px; font-weight: bold; text-transform: capitalize">' . ucfirst($data['message']) . '</span>
			</div>
			<div>
			
			</div>
			</div>
					
				
				';
		//E-mail
		//send email when survey form is submitted ..
		$config = array(
			'charset' => 'utf-8',
			'wordwrap' => TRUE,
			'mailtype' => 'html'
		);
		$config['protocol'] = 'mail';
		$config['smtp_host'] = 'mail.global-wirelessinc.com';
		$config['smtp_user'] = 'sales@global-wirelessinc.com';
		$config['smtp_pass'] = 'GlobalTeam321!';
		$config['smtp_port'] = 465;
		$config['mailtype'] = "html";
		//                $this->email->initialize();
		$this->load->library('email', $config);
		$this->email->from('sales@global-wirelessinc.com', 'Global Wireless');
		$this->email->to($data['email']);
		$this->email->set_newline("\r\n");
		$this->email->subject('Request a Quote');
		$this->email->message($msg);
		$this->email->set_mailtype("html");
		$this->email->send();
		$this->session->set_flashdata("email_msg", "Email Send Successfully");
		redirect('user/view/contact');
	}

	public function show_cart()
	{
		if (!empty($this->cart->contents())) {
			foreach ($this->cart->contents() as $cart) { ?>
				<li>
					<div class="single-shop-cart-wrapper">
						<div class="shop-cart-img">
							<a href="#"><img src="<?= base_url('uploads/' . $cart['options']['image']) ?>" alt="Image of Product"></a>
						</div>
						<div class="shop-cart-info">
							<h5>
								<a href="<?= site_url('user/view/single-product/' . $cart['id']) ?>"><?= $cart['name'] ?></a>
							</h5>
							<span class="price">€<?= $cart['price'] ?></span>
							<span class="quantaty"> Qty: <?= $cart['qty'] ?></span>
							<span class="cart-remove"><a href="#"><i class="fa fa-times"></i></a></span>
						</div>
					</div>

				</li>
			<?php } ?>
			<li>
				<div class="shop-cart-total">
					<p>Subtotal: <span class="pull-right">€<?= $cart['subtotal'] * $cart['qty'] ?></span></p>
				</div>
			</li>
			<li>
				<div class="shop-cart-btn">
					<a href="<?= site_url('user/view/checkout') ?>">Checkout</a>
					<a href="<?= site_url('user/view/cart') ?>" class="pull-right">View Cart</a>
				</div>
			</li>
		<?php } else echo "Empty Cart";
	}

	public function count_cart()
	{
		echo count($this->cart->contents());
	}

	public function order()
	{
		//		require_once('application/libraries/stripe-php/init.php');
		$check = $this->session->userdata('client_login');
		if (!empty($check)) {
			$client = $this->data->fetch('client', array('email' => $check['email']));
			$cart_data = $this->cart->contents();
			$data = html_escape($this->input->post());

			if (!empty($cart_data) and $data) {

				$stripe = $this->data->fetch("stripe_config");

				$x['client_id'] = $client[0]['id'];
				$order['billing_details'] =
					array(
						'fname' => $data['fname'],
						'lname' => $data['lname'],
						'email' => $data['email'],
						'phone' => $data['phone'],
						'country' => $data['country'],
						'city' => $data['city'],
						'state' => $data['state'],
						//						'zip' => $data['zip'],
						'address' => $data['address'],
						'note' => $data['note'],
					);

				$x['billing_details'] = json_encode($order['billing_details']);
				$x['order_data'] = json_encode($cart_data);
				$x['date'] = date('Y-m-d');
				$x['status'] = 'pending';
				$x['payment_type'] = 'card';
				$this->data->insert("orders", $x);
				\Stripe\Stripe::setApiKey((!empty($stripe[0]['sk'])) ? $stripe[0]['sk'] : "");
				$total = 0;
				foreach ($cart_data as $val) {
					$total += $val['price'];
				}
				$stripe = \Stripe\Charge::create([
					"amount" => $total * 100,
					"currency" => "usd",
					"source" => $data['stripeToken'],
					"description" => "Gwidata",
					//					"name"=>$data['fname'] .' '.$data['lname'],
					//					"email"=>$data['email'],
				]);

				//E-mail
				$config = array(
					'charset' => 'utf-8',
					'wordwrap' => TRUE,
					'mailtype' => 'html'
				);

				$config['protocol'] = 'mail';
				$config['smtp_host'] = 'mail.global-wirelessinc.com';
		        $config['smtp_user'] = 'sales@global-wirelessinc.com';
		        $config['smtp_pass'] = 'GlobalTeam321!';
				$config['smtp_port'] = 465;
				$config['mailtype'] = "html";
				$this->load->library('email', $config);
				$this->email->from('sales@global-wirelessinc.com', 'Global Wireless');
				$this->email->to($data['email']);
				$this->email->set_newline("\r\n");
				$this->email->subject("Order");
				$this->email->message("Hello " . $data['fname'] . ' ' . $data['lname'] . "!<br>" . " Your order is confirmed");
				$this->email->send();
				$this->cart->destroy();
				$this->load->view('user/header');
				$this->load->view('user/thanks');
				$this->load->view('user/footer');
			} else {

				redirect('user');
			}
		} else {
			redirect('user/signin');
		}
	}
	function getPaymentHistory()
	{
		$check = $this->session->userdata('client_login');
		if (!empty($check)) {
			$client = $this->data->fetch("subscriber", array('id' => $check['client_id']));
			if (!empty($client)) {
				$stripe = new \Stripe\StripeClient(
					'sk_test_zRvzNsNdBFgkXff5FteCafkU00HR2OKoXH'
				);
				$customer = $stripe->customers->retrieve(
					'cus_JQZpdYV83EEZeJ',
					[]
				);
				var_dump($customer);
			}
		}
	}

	public function subscribePlan($plan_id)
	{
		$userdata = $this->session->userdata('client_login');
		if (!empty($userdata)) {
			//Subscribe Perform Here
			$d_planID = base64_decode(urldecode($plan_id));
			$plan = $this->data->fetch('plans', array('id' => $d_planID));
		} else {
			return redirect(base_url('user/signin'));
		}
	}

	public function recurring_order()
	{
		$x = html_escape($this->input->post());
		$client = $this->session->userdata('client_login');

		//Create Subscription On Stripe For user With Stripe Token
		//check does user already customer
		$subscriber = $this->data->fetch('subscribers', array('client_id' => $client['id']));

		//Load Stripe Library
		$data = array('skey' => $this->skey); //passing skey as array to library stripe_library
		$this->load->library('stripe_library', $data);

		if ($subscriber != null) {
			$stripe_cust_id = $subscriber[0]['stripe_customer_id'];
		} else {
			$customer = $this->stripe_library->createCustomer($x['stripeToken']);
			if ($customer != false) {
				$stripe_cust_id = $customer['id'];
			}
		}

		if (!empty($stripe_cust_id)) {

			$total_amount = (float)0.00;

			//getting All Cart Products
			if (!empty($x['cartIDS'])) {
				foreach ($x['cartIDS'] as $cID) {

					//get plan ids from cart
					$cart = $this->data->fetch('cart', array('cart_id' => $cID));

					if (!empty($cart)) {
						//get plans using product_id or plan_id
						$plans = $this->data->fetch('plans', array('id' => $cart[0]['product_id']));

						//create stripe price
						$stripe_plan_id = $plans[0]['stripe_plan_id'];
						$amount = (float)$cart[0]['product_price'] * (int)$cart[0]['quantity'];
						$total_amount += $amount;
						$interval = $plans[0]['plan_duration'];

						//create price of each plan and get price id
						$stripe_price_id = $this->stripe_library->createPrice($stripe_plan_id, $amount, $interval);

						//create subscription for each plan
						$subscription = $this->stripe_library->createSubscription($stripe_cust_id, $stripe_price_id['id']);

						//insert each subscribed plan to database
						$this->data->insert('subscribers', array(
							'client_id' => $client['id'],
							'plan_id' => $plans[0]['id'],
							'stripe_sub_id' => $subscription['id'],
							'stripe_customer_id' => $stripe_cust_id,
						));
					}
				}

				//delete cart data of this client after all plan subscribe
				$this->data->delete('cart', array('client_id' => $client['id']));

				//send email or redirect to thank you page
				$this->sendMail($x['email'], null, $client['name']);

				//Billing Information
				$data['billing_info'] = array(
					'first_name' => $x['fname'],
					'last_name' => $x['lname'],
					'country' => $x['country'],
					'address' => $x['address'],
					'city' => $x['city'],
					'phone' => $x['phone'],
					'email' => $x['email'],
					'total_amount' => $total_amount,
					'shipping' => 'Free Shipping',
				);


				$this->load->view('user/header', $data);
				$this->load->view('user/thanks');
				$this->load->view('user/footer');
			}
		} else {
			echo 'Error in Creating Subscription';
		}
	}
	function shippingCharges($total,$street=null,$city=null,$region=null,$zipCode=null){
		// Include the AvaTaxClient library
		require './vendor/autoload.php';
		// Create a new client
		$client = new Avalara\AvaTaxClient('shab', '2.0', 'localhost', 'sandbox');
		$client->withSecurity('accounts@gwidata.com', 'GlobalTeam321');
		// Now, let's create a more complex transaction!
		$tb = new Avalara\TransactionBuilder($client, "DEFAULT", Avalara\DocumentType::C_SALESINVOICE, 'ABC');
		$t = $tb->withAddress('ShipFrom', '301 S perimeter park Dr suite 100', null, null, 'Nashville', 'TN', '37211', 'US')
				->withAddress('ShipTo', $street, null, null, $city, $region, $zipCode, 'US')
				->withLine($total, 1, null, "P0000000")
				->create();
		if(!empty($t->totalTax)){
			echo $t->totalTax;
		}else{
			echo 'Please check your address';
		}
	}

	function sendMail($to, $link, $name)
	{
		//E-mail
		$config = array(
			'charset' => 'utf-8',
			'wordwrap' => TRUE,
			'mailtype' => 'html'
		);
		$config['protocol'] = 'mail';
		$config['smtp_host'] = 'mail.global-wirelessinc.com';
		        $config['smtp_user'] = 'sales@global-wirelessinc.com';
		        $config['smtp_pass'] = 'GlobalTeam321!';
		$config['smtp_port'] = 465;
		$config['mailtype'] = "html";
		//                $this->email->initialize();
		$this->load->library('email', $config);
		$this->email->from('sales@global-wirelessinc.com', 'Global Wireless');
		$this->email->to((!empty($to) ? $to : ""));
		$this->email->set_newline("\r\n");
		$this->email->subject("Order Confirmation");
		$this->email->message(
			'<table align="center"  border="0" cellspacing="0" cellpadding="0" class="em_main_table" style="width:70vw; height: 500px; " >
              <tr style="color:#000000; height: 300px; text-align: center; width: 80%; margin: 0 auto; " >
                <th style="padding: 20px 220px; ">
                
                    <div style="border: 1px solid #0000001c;  padding: 30px; text-align: center">
                        <div style="display: flex; margin-top: 20px;">
                            <div style="width: 260px; margin: 0 auto;">
                                <img src="' . base_url('logo.png') . '" style="border-radius: 6px; width: 100%; height: 70px; margin-bottom: 20px ;padding:10px; background-color:#922f5e " alt=""/>
                            </div>
                        </div>
                        <div style="text-transform: uppercase;  font-weight: normal; line-height: 40px;  ">
                            <h2 style="width: 100%; height: 50px; color: #922f5e ; margin-top : 10px; padding: 3px; padding-top: 10px; font-family: cursive; " >Thank You ' . ucfirst($name) . ' For Shopping With Us</h2>
                            <p style="width: 100%; height: 40px; color: #922f5e ; margin-top : 10px; padding: 3px; padding-top: 10px; font-family: cursive; " >Your Order Placed Successfully.</p>
                        </div>
                    </div>
                </th>
               </tr>
            </table>'
		);
		$this->email->send();
	}

	public function blogs()
	{
		$data['blogs'] = simplexml_load_file('https://www.tmonews.com/feed/', 'SimpleXMLElement', LIBXML_NOCDATA) or die("Error: Cannot create object");
		foreach ($data['blogs']->channel->item as $item) {
			$data_['title'] = $item->title;
			//			$data_['link'] = $item->link;
			$data_['description'] = $item->description;
			$img = explode('>', $item->description);
			$data_['image'] = $img[1];
			$postDate = $item->pubDate;
			$data_['pubDate'] = date('Y-m-d', strtotime($postDate));
			$blogs = $this->data->fetch("blogs", array('title' => $data_['title']));
			if (empty($blogs)) {
				$this->data->insert("blogs", $data_);
			}
		}
		$result['blogs'] = $this->data->fetch("blogs");
		$this->load->view('user/header');
		$this->load->view('user/blogs', $result);
		$this->load->view('user/footer');
	}
	public function checkout()
	{
		$check = $this->session->userdata('client_login');
		if (!empty($check)) {
		    $data['stripe'] = $this->data->fetch("stripe_config");
		    $data['wishlist'] = $this->data->fetch("wishlist", array('client_id' => $check['id']));
		    $data['cart_data'] = $this->data->fetch("cart", array('client_id' => $check['id']));
			$this->load->view('user/header', $data);
			$this->load->view('user/checkout');
			$this->load->view('user/footer');
		} else {
			$this->signin();
		}
	}

	function search_data()
	{
		$data = html_escape($this->input->post());
		$result = $this->data->myquery("SELECT * FROM `products` WHERE `title` LIKE '%{$data['search']}%'");
		if (!empty($result)) { ?>
			<?php foreach ($result as $p) { $img =json_decode($p['image'],true) ?>
				<li style="padding: 10px 15px; color: #000;">
					<a style="text-decoration: none" href="<?= site_url('user/view/product-details/' . $p['id']) ?>" title="<?= $p['title'] ?>">
						<div class="row">
							<div class="col-md-3">
								<img src="<?=(!empty($img[0])) ? base_url('uploads/'.$img[0]) : "";?>" width="100%" height="100px" class="img-fluid">
							</div>
							<div class="col-md-9">
								<?php echo $p['title']; ?>
							</div>
						</div>

					</a>
				</li>
			<?php } ?>
		<?php } else { ?>
			<li style="padding: 10px 15px; color: #000;">
				<?php echo "No product found for " . "<b>" . $data['search'] . "</b>"; ?>
			</li>
		<?php
		}
	}

	function searchByCategory($id)
	{
		$data['all_categories'] = $this->data->fetch("categories");
		if ($id == 'accessories') {
			$data['products'] = $this->data->myquery("SELECT * FROM `products` WHERE `product_type` = 'accessory'");
		} else {
			$data['products'] = $this->data->myquery("SELECT * FROM `products` WHERE `cat_id` = '{$id}'");
		}
		$this->load->view('user/header', $data);
		$this->load->view('user/products');
		$this->load->view('user/footer');
	}

	public function apply_coupon()
	{
		$coupon = $this->data->fetch('coupon', array('coupon_code' => $_POST['coupon']));
		if (!empty($coupon)) {
			$this->session->set_userdata('coupon', $coupon);
			echo 'yes';
		} else {
			echo '';
		}
	}

	public function do_upload($file_name)
	{
		$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "*",
		);
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($file_name)) {
			$data = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data());
		}
		return $data;
	}

	function stripe()
	{


		require 'vendor/autoload.php';

		// This is a sample test API key. Sign in to see examples pre-filled with your key.
		\Stripe\Stripe::setApiKey('sk_test_zRvzNsNdBFgkXff5FteCafkU00HR2OKoXH');


		function calculateOrderAmount(array $items): int
		{
			// Replace this constant with a calculation of the order's amount
			// Calculate the order total on the server to prevent
			// customers from directly manipulating the amount on the client
			return 1400;
		}

		header('Content-Type: application/json');

		try {
			// retrieve JSON from POST body
			$json_str = file_get_contents('php://input');
			$json_obj = json_decode($json_str);

			$paymentIntent = \Stripe\PaymentIntent::create([
				'amount' => calculateOrderAmount($json_obj->items),
				'currency' => 'usd',

			]);

			$output = [
				'clientSecret' => $paymentIntent->client_secret,
			];

			echo json_encode($output);
		} catch (Error $e) {
			http_response_code(500);
			echo json_encode(['error' => $e->getMessage()]);
		}
	}

	public function do_reg()
	{
		$data = html_escape($this->input->post());
		$data['password'] = md5($data['password']);
		$data['date'] = date('Y-m-d');
		$client = $this->data->fetch('client', array('email' => $data['email']));
		if (empty($client)) {
			$this->data->insert("client", $data);
			$client = $this->data->fetch('client', array('email' => $data['email']));
			$this->session->set_userdata('client_login', $client[0]);
			$this->session->set_flashdata('client_success', "Account created");
		} else {
			$this->session->set_flashdata('client_error', "Email already taken");
		}
		redirect('user');
	}

	public function wishlist($page, $id)
	{
		$data = html_escape($this->input->post());
		$check = $this->session->userdata('client_login');
		if (isset($check)) {
			$client = $this->data->fetch('client', array('email' => $check['email']));
			$data['client_id'] = $client[0]['id'];
			$data['product_id'] = $id;
			$pro = $this->data->fetch('wishlist', $data);
			$data['date'] = date('Y-m-d');
			if (empty($pro)) {
				$this->data->insert("wishlist", $data);
				$this->session->set_userdata('wishlist', 'Added to wishlist');
			} else {
				$this->session->set_userdata('error', 'Already in wishlist');
			}
			redirect('user/view/' . $page . '/' . $id);
		} else {
			redirect('user/signin');
		}
	}
	public function blog_comments($table, $page, $blog_id)
	{
		$data = html_escape($this->input->post());

		$data['date'] = date('Y-m-d');
		$data['blog_id'] = $blog_id;
		$this->data->insert($table, $data);
		redirect('user/view/' . $page . '/' . $blog_id);
	}

	public function quickView($table, $page, $id)
	{ ?>
		<?php $product = $this->data->fetch($table, array('id' => $id)); ?>
		<?php if (!empty($product)) { ?>
			<?php $img = (!empty($product[0]['image'])) ? json_decode($product[0]['image']) : "" ?>
			<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<div class="modal_body">
							<div class="container">
								<form action="<?= site_url('user/addtocart') ?>" method="post">
									<input value="<?= $product[0]['id'] ?>" type="hidden" name="id">
									<div class="row">
										<div class="col-lg-5 col-md-5 col-sm-12">
											<div class="modal_tab">
												<div class="tab-content product-details-large">
													<!--										images loop here later-->
													<div class="tab-pane fade show active" id="tab1" role="tabpanel">
														<div class="modal_tab_img">
															<a href="#"><img src="<?= (!empty($product[0]['image'])) ? base_url('uploads/' . $img[0]) : "https://thedailytouristbd.com/uploads/no_image.jpg" ?>" alt=""></a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-7 col-md-7 col-sm-12">
											<div class="modal_right">
												<div class="modal_title mb-10">
													<h2><?= (!empty($product[0]['title'])) ? $product[0]['title'] : "" ?></h2>
												</div>
												<div class="modal_price mb-10">
													<span class="new_price"><?= (!empty($product[0]['price'])) ? $product[0]['price'] . '$' : "" ?></span>
												</div>
												<div class="modal_description mb-15">
													<p><?= (!empty($product[0]['basic_detail'])) ? $product[0]['basic_detail'] : "" ?></p>
												</div>
												<div class="variants_selects">
													<?php if (!empty($product[0]['memory'])) {
														$memory = json_decode($product[0]['memory'], true); ?>
														<div class="variants_size">
															<h2>Memory</h2>
															<select class="select_option form-control" name="memory">
																<?php foreach ($memory as $k => $memo) { ?>
																	<option selected value="<?= $memo ?>"><?= $memo . ' GB' ?></option>
																<?php } ?>
															</select>
														</div>
													<?php } ?>

													<?php if (!empty($product[0]['color'])) {
														$color = json_decode($product[0]['color'], true); ?>
														<div class="variants_color">
															<h2>Color</h2>
															<select class="select_option form-control" name="color">
																<?php foreach ($color as $k => $colour) { ?>
																	<option value="<?= $colour ?>" style="color:<?= $colour ?>;font-weight: 500"><?= $colour ?></option>
																<?php } ?>
															</select>
														</div>
													<?php } ?>
													<div class="modal_add_to_cart">
														<input min="0" max="100" value="1" type="number" name="qty">
														<input type="submit" class="btn btn-dark btn-sm" value="add to cart">
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
<?php }

	public function do_login()
	{
		$x = html_escape($this->input->post());
		$x['password'] = md5($x['password']);
		$check = $this->data->fetch('client', $x);
		if (!empty($check)) {
			$this->session->set_userdata('client_login', $check[0]);

			redirect("user/view/cart");
		} else {
			$this->session->set_flashdata('error_login', "<p style='color: red'>Invalid Credentials</p>");
			redirect('user/signin');
		}
	}

	public function addReview($table, $page)
	{
		$x = html_escape($this->input->post());
		$x['date'] = date('Y-m-d');
		$this->data->insert($table, $x);
		$this->session->set_flashdata('success', "<p style='color: green'>Review Added</p>");
		redirect("user/view/" . $page);
	}

	public function sign_up($table, $page)
	{
		$x = html_escape($this->input->post());
		$check = $this->data->fetch($table, $x);
		if (!empty($check)) {
			$this->session->set_userdata('login', $check[0]);
			$this->session->set_flashdata('success', "Success");
			if ($page === 'searchEvent' or $page === 'user') {
				redirect('user/');
			} else {
				redirect('user/view/' . $page);
			}
		} else {
			$this->session->set_flashdata('error', "<div style='text-align: center';><span style='background-color: rgb(255, 63, 63);color: white;padding: 10px;font-size: 18px;margin-bottom:400px;border-radius: 10px ;'>Invalid Credentials</span></div>");
			$this->signin();
		}
	}
	public function updateCart(){
		$data = $this->input->post();
		$cart = $this->cart->contents();
		$product = $this->data->fetch('products', array('id' => $cart[$data['rowid']]['id']));
		$this->cart->update(array(
				'qty'=>($data['qty'] <= $product[0]['qty']) ? $data['qty'] : $product[0]['qty'],
				'rowid'=>$data['rowid']
				)
		);
		redirect('user/view/cart');
	}

	public function logout()
	{
		$this->session->unset_userdata('client_login');
		redirect('user/');
	}

	public function signin()
	{
		$this->load->view('user/login');
	}

	public function signup()
	{
		$this->load->view('user/signup');
	}

	public function delete($table, $page, $id)
	{
		$client = $this->session->userdata('client_login');
		if (!empty($client)) {
			$this->data->delete($table, array('id' => $id));
			return redirect(base_url('user/view/') . $page);
		}
		$this->signin();
	}

	public function delete_cart_product($e_cartID)
	{
		$client = $this->session->userdata('client_login');
		if (!empty($client)) {
			$cartID = base64_decode(urldecode($e_cartID));
			$this->data->delete('cart', array('cart_id' => $cartID));
			return redirect(base_url('user/view/cart'));
		}
		$this->signin();
	}

	public function cancelSubscription($stripeSubId)
	{
		$client = $this->session->userdata('client_login');
		if (!empty($client)) {
			//Load Stripe Library
			$data = array('skey' => $this->skey); //passing skey as array to library stripe_library
			$this->load->library('stripe_library', $data);
			$canceled = $this->stripe_library->cancelSubscription($stripeSubId);
			if ($canceled != false) {
				$this->data->update(array('stripe_sub_id' => $stripeSubId), 'subscribers', array('is_canceled' => 'Yes'));
				$this->session->set_flashdata('success', array("Success", 'Subscription Canceled Successfully', "success"));
			} else {
				$this->session->set_flashdata('success', array("Error", 'Subscription Canceled Failed', 'error'));
			}
			return redirect(base_url('user/view/my-subscriptions'));
		} else {
			$this->signin();
		}
	}
}
