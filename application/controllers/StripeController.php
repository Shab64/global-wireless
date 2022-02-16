<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
//
//class Welcome extends CI_Controller {
//
//	/**
//	 * Index Page for this controller.
//	 *
//	 * Maps to the following URL
//	 * 		http://example.com/index.php/welcome
//	 *	- or -
//	 * 		http://example.com/index.php/welcome/index
//	 *	- or -
//	 * Since this controller is set as the default controller in
//	 * config/routes.php, it's displayed at http://example.com/
//	 *
//	 * So any other public methods not prefixed with an underscore will
//	 * map to /index.php/welcome/<method_name>
//	 * @see https://codeigniter.com/user_guide/general/urls.html
//	 */
//	public function index()
//	{
////		$this->page("index");
//		$this->get_html_dom();
//	}
//
////	public function page($page)
////	{
////		$this->load->view('header');
////		$this->load->view($page);
////		$this->load->view('footer');
////	}
//    public function get_html_dom()
//    {
//        $url = "http://play.google.com/";
//        $html = file_get_html($url);
//        $data =  $html->find('.top-list-container');
//
//        if(isset($data[0]))
//        {
//            echo $data[0]->children(1)->children(1);
//        }
//    }
//
//}
class StripeController extends CI_Controller
{


    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->helper('url');
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index()
    {
        $this->load->view('stripe/credit_card');
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function stripePost()
    {
		require_once('application/libraries/stripe-php/init.php');

		$check = $this->session->userdata('client_login');
		if(!empty($check)){
			$client = $this->data->fetch('client',array('email'=>$check['email']));
			$cart_data= $this->cart->contents();
			$data = html_escape($this->input->post());
			if(!empty($cart_data) AND $data) {
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
				$x['payment_type'] = 'cod';
				$this->data->insert("orders", $x);
				\Stripe\Stripe::setApiKey((!empty($stripe[0]['sk'])) ? $stripe[0]['sk'] : "");
				$total = 0;
				foreach ($cart_data as $val) {
					$total+= $val['price'];
				}
				$stripe = \Stripe\Charge::create ([
					"amount" => (int)($total),
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
				$config['smtp_host'] = 'mail.webx24service.com';
				$config['smtp_user'] = 'shahab@webx24service.com';
				$config['smtp_pass'] = 'engineering_64';
				$config['smtp_port'] = 465;
				$config['mailtype'] = "html";
				$this->load->library('email',$config);
				$this->email->from('shahab@webx24service.com', 'Gwidata');
				$this->email->to($data['email']);
				$this->email->set_newline("\r\n");
				$this->email->subject("Order");
				$this->email->message("Hello ". $data['fname'].' '.$data['lname']."!<br>" ." Your order is confirmed");
				$this->email->send();
				$this->cart->destroy();
				$this->load->view('user/header');
				$this->load->view('user/thanks');
				$this->load->view('user/footer');
			}else{
				redirect('user');
			}
		}else{redirect('user/signin');}




//
//            $data['user_id'] = $val['options']['order_details']['user_id'];
//            $data['order_data'] = json_encode($val);
//            $data['date'] =date('Y-m-d');
//            $this->data->insert("order",$data);
//        }
//
//        $this->session->set_flashdata('success_order', 'PAYMENT MADE SUCCESSFULLY');
//        redirect('user');
    }
}
