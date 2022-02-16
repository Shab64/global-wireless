<?php

use Stripe\Price;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view('index');
	}
	public function view($page = 'index')
	{
		$admin_login = $this->session->userdata('admin_login');
		if (!empty($admin_login)) {
			$id = $this->uri->segment(4);
			if (!empty($id)) {
				$data['product_id'] = $this->data->fetch('products', array('id' => $id));
			}
			$data['all_products'] =$this->data->myquery("SELECT * FROM `products` ORDER BY `id` DESC");
			if (!empty($data['all_products'])) {
				$total_price = 0;
				foreach ($data['all_products'] as $k => $pro) {
					$x = $this->data->fetch('categories', array('id' => $pro['cat_id']));
					if (!empty($x)) {
						$data['all_products'][$k]['cat'] = $x;
					}
					$total_price += $pro['price'];
				}
				$data['all_products'][0]['avg_price'] = $total_price / count($data['all_products']);
				$data['all_products'][0]['total_earned'] = $total_price;
			}
			$data['all_sliders'] = $this->data->fetch("sliders");
			$data['stripe'] = $this->data->fetch('stripe_config');
			$data['five_products'] = $this->data->myquery("SELECT * FROM `products` ORDER BY `id` LIMIT 5");
			$data['all_users'] = $this->data->fetch('user');
			$data['seller'] = $this->data->fetch('user');
			$data['all_orders'] = $this->data->fetch('orders');
			$data['completed_orders'] = $this->data->fetch('orders', array('status' => 'completed'));
			$data['all_category'] = $this->data->fetch('categories');
			$data['all_orders'] = $this->data->myquery("SELECT * FROM `orders` ORDER BY `id` desc");;
			$data['all_coupon'] = $this->data->fetch('coupon');
			$data['all_clients'] = $this->data->fetch("client");
			$data['plans'] = $this->data->fetch('plans');

			$this->load->view('admin/header', $data);
			$this->load->view('admin/' . $page);
			$this->load->view('admin/footer');
		} else {
			$this->signin();
		}
	}

	public function insert($table, $page)
	{
		$x = $this->input->post();
		if ($table === 'products') {
			if (isset($x['color'])) {
				$color = json_encode($x['color']);
				unset($x['color']);
				$x['color'] = $color;
			}
			if (isset($x['memory'])) {
				$memory = json_encode($x['memory']);
				unset($x['memory']);
				$x['memory'] = $memory;
			}
			$data = $this->uploads(1);
			if (!empty($data)) {
				$x['image'] = json_encode($data);
			}
		}elseif($table === 'sliders'){
			$data = $this->do_upload('image');
			if (!empty($data)) {
				$x['image'] = $data['upload_data']['file_name'];
			}
		}
		elseif ($table === 'plans') {
			//Load Stripe Library
			$skey =  $this->data->fetch('stripe_config'); //passing skey as array to library stripe_library
			$keyData = array('skey'=>$skey[0]['sk']);
			$this->load->library('stripe_library', $keyData);

			//Stripe Creating Plan
			$planData = $this->stripe_library->createProduct($x['plan_name']); //retrieving Plan ID

			if ($planData != null) { //successo
				//Creating Price For Plan
				$price = $this->stripe_library->createPrice($planData['id'], $x['plan_price'], $x['plan_duration']);

				//				$x['stripe_price_id'] = $price['id']; 
				$x['stripe_plan_id'] = $planData['id'];
				$x['plan_details'] = json_encode($x['plan_details']);
				$x['status'] = 'active';

				//				$this->data->insert('plans',$x);

				$this->session->set_flashdata("success", array("Success", "Plan Created Successfully", "success"));
			} else {
				$this->session->set_flashdata("success", array("Error", "Plan Failed To Create", "error"));
			}
		} elseif ($table === 'coupon') {
			$x['status'] = 'active';
		} elseif ($table === 'user') {
			$x['password'] = $x['fname'] . rand();
			md5($x['password']);

			//E-mail
			$config = array(
				'charset' => 'utf-8',
				'wordwrap' => TRUE,
				'mailtype' => 'html'
			);
			$link = site_url('employee');
			$msg = "<a href='" . $link . "'>Link</a>";

			$config['protocol'] = 'mail';
			$config['smtp_host'] = 'mail.global-wirelessinc.com';
			$config['smtp_user'] = 'sales@global-wirelessinc.com';
			$config['smtp_pass'] = 'GlobalTeam321!';
			$config['smtp_port'] = 465;
			$config['mailtype'] = "html";
			//                $this->email->initialize();
			$this->load->library('email', $config);
			$this->email->from('sales@global-wirelessinc.com', 'Global Wireless');
			$this->email->to($x['email']);
			$this->email->set_newline("\r\n");
			$this->email->subject("Global Wireless");
			$this->email->message('<div class="col-md-10"><div class="row inbox-wrapper">
                        <div class="col-lg-12">
                          <div class="card">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-3 email-aside border-lg-right">
                                  
                                </div>
                                <div class="col-lg-9 email-content">
                                  <div class="email-body">
                                    <p>Hello ' . "<strong>" . $x['fname'] . "</strong>" . ',</p>
                                    
                                    <p>Welcome to Global Wireless.</p>
                                    
                                    <p>Enclosed you will find your password for your account.</p>
                                    <p>Please log in promptly via this ' . $msg . ' to access your account.</p>
                                    
                                    <p><strong>Login E-mail:</strong>   ' . $x['email'] . '</p>
                                    <p><strong>Login Password:</strong> ' . $x['password'] . '</p>
                                    
                                    <p><strong>Your Global Wireless Team</strong></p>
                                    
                                    <p><strong>Based in USA</strong></p>
                                  </div>
                                 
                                </div>
                              </div>
                                
                            </div>
                          </div>
                        </div>
                 </div>');
			$this->email->send();
		}
		$x['date'] = date('Y-m-d');
		if ($table === 'stripe_config') {
			$stripe = $this->data->fetch($table);
			if (!empty($stripe)) {
				$this->data->update(array('id' => 1), $table, $x);
				redirect('admin/view/stripe');
			}
		}
		if ($table == "plans") {
			unset($x['date']);
			unset($x['planTable_length']);
		}
		$this->data->insert($table, $x);
		redirect('admin/view/' . $page);
	}

	public function planAction($action)
	{
		$planID = $this->input->post('planID');
		if ($action == "true") {
			$this->data->update(array('id' => $planID), 'plans', array('status' => 'active'));
			echo "active";
		} else if ($action == "false") {
			$this->data->update(array('id' => $planID), 'plans', array('status' => 'inactive'));
			echo "inactive";
		}
	}

	public function uploads($id)
	{
		$data = [];

		$count = count($_FILES['files']['name']);

		for ($i = 0; $i < $count; $i++) {

			if (!empty($_FILES['files']['name'][$i])) {

				$_FILES['file']['name'] = $_FILES['files']['name'][$i];
				$_FILES['file']['type'] = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['files']['error'][$i];
				$_FILES['file']['size'] = $_FILES['files']['size'][$i];

				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size'] = '5000';
				$config['file_name'] = $_FILES['files']['name'][$i];

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
					$data[] = $filename;
				}
			}
		}
		return $data;
	}

	public function order_status()
	{
		$data = $this->input->post();
		$this->data->update(array('id' => $data['id']), "orders", array('status' => 'completed'));
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

	public function sign_up()
	{
		$x = $this->input->post();
		$check = $this->data->fetch('admin', $x);
		if (!empty($check)) {
			$this->session->set_userdata('login', $check);
			redirect("website/paypal");
		} else {
			$this->session->set_flashdata('error', "<div style='text-align: center;margin-top: 230px;margin-left: 600px'><span style='background-color: rgb(255, 63, 63);color: white;padding: 10px;font-size: 18px;margin-bottom:400px;border-radius: 10px ;'>Invalid Credentials</span></div>");
			redirect('website/signin');
		}
	}

	public function do_login()
	{
		$x = html_escape($this->input->post());
		if ($x['remember_me'] === 'on') {
			$cookie = array('name' => 'login', 'value' => $x['email'], 'expire' => '3600', 'secure' => TRUE);
			$this->input->set_cookie($cookie);
		}
		$credentials = array('email' => $x['email'], 'password' => $x['password']);
		$check = $this->data->fetch('admin', $credentials);
		if (!empty($check)) {
			$this->session->set_userdata('admin_login', $check);
			redirect("admin");
		} else {
			$this->session->set_flashdata('error_login', "Invalid Credentials");
			redirect('admin/signin');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('admin_login');
		redirect('admin/signin');
	}

	public function signin()
	{
//		$getCookie = $this->input->cookie('login');
//		if (isset($getCookie)) {
//			$rememberUser = $this->data->fetch('admin', array('email' => $getCookie));
//			if (!empty($rememberUser)) {
//				$this->session->set_userdata('admin_login', $rememberUser);
//				redirect("admin");
//			}
//		}
		$this->load->view('admin/signin');
	}

	public function contact()
	{

		$x = $this->input->post();

		$config = array(
			'charset' => 'utf-8',
			'wordwrap' => TRUE,
			'mailtype' => 'html'
		);
		$msg = "";
		foreach ($x as $k => $v) {
			$msg .= "<p><strong>" . str_replace("_", " ", $k) . " </strong> " . $v . "</p>";
		}
		$this->load->library('email');
		$config['protocol'] = 'sendmail';
		$config['smtp_host'] = 'mail.global-wirelessinc.com';
			$config['smtp_user'] = 'sales@global-wirelessinc.com';
			$config['smtp_pass'] = 'GlobalTeam321!';
		$config['smtp_port'] = 465;
		$config['mailtype'] = "html";
		$this->email->initialize($config);
		$this->email->from('sales@global-wirelessinc.com', 'Zenrolle');
		$this->email->to($x['email']);
		$this->email->set_newline("\r\n");
		$this->email->subject("Zenrolle Contact Form");
		$this->email->message($msg);
		$this->email->send();


		redirect('user');
	}

	public function status($table, $page, $status)
	{
		$this->data->myquery("UPDATE `customer` SET  `status` ='{$status}' WHERE `id` ={$_POST['data']}");
		redirect('admin/view/' . $page);
	}

	public function upload_file()
	{

		//upload file
		$config['upload_path'] = 'uploads/';
		//        $config['allowed_types'] = '*';
		$config['max_filename'] = '255';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = '4096'; //2 MB


		if (isset($_FILES['file']['name'])) {
			move_uploaded_file($_FILES['file']['tmp_name'], $config['upload_path'] . "/" . $_FILES['file']['name']);
		} else {
			echo 'Please choose a file';
		}
	}

	public function delete($table, $page, $id, $customer_id = null)
	{
		$this->data->delete($table, array('id' => $id));
		if ($customer_id != null) {
			redirect('admin/view/' . $page . "/" . $id);
		} else {
			redirect('admin/view/' . $page);
		}
	}
	function delete_product_addons($table, $page)
	{
		$data = $this->input->post();
		$product = $this->data->fetch($table, array('id' => $data['product_id']));
		if (!empty($product)) {
			if ($data['type'] == 'color') {
				$type = $product[0]['color'];
			} else {
				$type = $product[0]['memory'];
			}
			$decode = json_decode($type, true);
			if (!empty($decode)) {
				unset($decode[$data['id']]);
			}
			$new_data = array_values($decode);

			$this->data->update(array('id' => $data['product_id']), $table, array($data['type'] => json_encode($new_data)));
		}
	}

	public function update($table, $page, $id)
	{
		$data = $this->input->post();
		if (!isset($data['status'])) {
			$data['status'] = 'not published';
		}
		$x = $this->do_upload('image');
		if (isset($x['upload_data'])) {
			unset($data['image']);
			$data['image'] = $x['upload_data']['file_name'];
		}
		if ($table === 'products') {
			if (isset($data['color'])) {
				$color = json_encode($data['color']);
				unset($data['color']);
				$data['color'] = $color;
			}
			if (isset($data['memory'])) {
				$memory = json_encode($data['memory']);
				unset($data['memory']);
				$data['memory'] = $memory;
			}
			$pimg = $this->uploads(1);
			if (!empty($pimg)) {
				$data['image'] = json_encode($pimg);
			} else {
				$p = $this->data->fetch($table, array('id' => $id));
				if (!empty($p)) {
					$data['image'] = $p[0]['image'];
				}
			}
		}

		$this->data->update(array('id' => $id), $table, $data);
		if (!empty($id) and $table !== 'user') {
			redirect('admin/view/' . $page . '/' . $id);
		}
		redirect('admin/view/' . $page);
	}

	public function edit($table)
	{
		$data = $this->data->fetch($table, array('id' => $_POST['id']));

		$cat = $this->data->fetch("categories");
		if ($table == 'user') { ?>
			<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<?= form_open_multipart('admin/update/user/employees/' . $data[0]['id']) ?>
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit User</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="floating-label" for="First"><small class="text-danger">* </small>First
											First Name</label>
										<input type="text" class="form-control" name="fname" value="<?= $data[0]['fname'] ?>" id="Name" placeholder="">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="floating-label" for="Last"><small class="text-danger">* </small>Last
											Last Name</label>
										<input type="text" class="form-control" name="lname" value="<?= $data[0]['lname'] ?>" id="Last" placeholder="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label class="floating-label" for="Email"><small class="text-danger">* </small>Email
											Address</label>
										<input type="email" class="form-control" name="email" value="<?= $data[0]['email'] ?>" id="Email" placeholder="">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<label class="d-block mb-2">Status</label>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="customRadioInline10" name="status" value="active" class="custom-control-input" <?= ($data[0]['status'] == 'active') ? "checked" : "" ?>>
										<label class="custom-control-label" for="customRadioInline10">Active</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="customRadioInline20" name="status" value="inactive" class="custom-control-input" <?= ($data[0]['status'] == 'inactive') ? "checked" : "" ?>>
										<label class="custom-control-label" for="customRadioInline20">Inactive</label>
									</div>

								</div>
						
								<div class="col-sm-6">
									<div class="form-group">
										<label class="floating-label" for="address"><small class="text-danger">* </small>Address</label>
										<input type="text" class="form-control" name="address" value="<?= $data[0]['address'] ?>" id="address" placeholder="">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="floating-label" for="phone"><small class="text-danger">* </small>Phone</label>
										<input type="number" class="form-control" name="phone" value="<?= $data[0]['phone'] ?>" id="address" placeholder="">
									</div>
								</div>

							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-primary" value="Edit">
							<button class="btn btn-danger"> No</button>
						</div>
					</div>
					<?= form_close() ?>
				</div>
			</div>
		<?php
		}
		if ($table == 'coupon') { ?>
			<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<?= form_open_multipart('admin/update/user/users/' . $data[0]['id']) ?>
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Coupon Details</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="card user-profile-list">
										<div class="card-body">

											<div class="table-responsive">
												<table id="user-list-table2" class="table">
													<thead class="thead-light">
														<tr>
															<th>Name</th>
															<th>Coupon Code</th>
															<th>Discount %</th>
															<th>Status</th>
														</tr>
													</thead>
													<tbody>
														<?php if (!empty($data)) { ?>
															<?php foreach ($data as $users) { ?>
																<tr>
																	<td>
																		<div class="d-inline-block align-middle">
																			<div class="d-inline-block">
																				<h6 class="m-b-0"><?= $users['title'] ?></h6>
																			</div>
																		</div>
																	</td>
																	<td><?= $users['coupon_code'] ?></td>
																	<td><?= $users['amount'] ?> </td>
																	<td><?= $users['status'] ?></td>
																</tr>
															<?php } ?>
														<?php } ?>

													</tbody>

												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<?= form_close() ?>
				</div>
			</div>

		<?php
		} elseif ($table == 'products') {
		?>
			<div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<?= form_open_multipart('admin/update/products/products/' . $data[0]['id']) ?>
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Product Details</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="floating-label" for="Name">Name</label>
											<input name="title" type="text" class="form-control" id="Name" value="<?= $data[0]['title'] ?>" placeholder="">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label class="floating-label" for="Category">Category</label>
											<select class="form-control" id="Category" name="cat_id">
												<?php if (!empty($cat)) { ?>
													<?php foreach ($cat as $val) { ?>
														<option value="<?= $val['id'] ?>" <?= ($data[0]['cat_id'] === $val['id']) ? "selected" : "" ?>><?= $val['name'] ?></option>
													<?php } ?>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label class="floating-label" for="Price">Product ype</label>
											<select class="form-control" id="type" name="product_type">
												<option value="phone" <?= ($data[0]['product_type'] === 'phone') ? "selected" : "" ?>>Mobile Phone</option>
												<option value="accessory" <?= ($data[0]['product_type'] === 'accessory') ? "selected" : "" ?>>Accessory</option>
												<option value="voip_phones" <?= ($data[0]['product_type'] === 'voip_phones') ? "selected" : "" ?>>Voip phone</option>
												<option value="sip_phones" <?= ($data[0]['product_type'] === 'sip_phones') ? "selected" : "" ?>>Sip phone</option>
											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label class="floating-label" for="Price">Price</label>
											<input type="number" name="price" value="<?= $data[0]['price'] ?>" class="form-control" id="Price" placeholder="">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label class="floating-label" for="Quantity">Quantity</label>
											<input type="number" name="qty" value="<?= $data[0]['qty'] ?>" class="form-control" id="Quantity" placeholder="">
										</div>
									</div>
									<!--									<div class="col-sm-12">-->
									<label class="floating-label" for="Price">Available Color</label>
									<?php $color = json_decode($data[0]['color'], true); ?>
									<?php if (!empty($color)) { ?>
										<?php foreach ($color as $k => $colour) { ?>
											<div class="col-sm-3">
												<div class="form-group">
													<input type="color" name="color[]" value="<?= $colour ?>" class="form-control" id="color" placeholder="">
												</div>
											</div>
										<?php } ?>
									<?php } else {
										echo '<p style="color: gray">No color available</p>';
									} ?>
									<!--									</div>-->
									<!--									<div class="col-sm-12">-->
									<label class="floating-label" for="Quantity">Available Memory</label>
									<?php $memories = json_decode($data[0]['memory'], true); ?>
									<?php if (!empty($memories)) { ?>
										<?php foreach ($memories as $k => $memory) { ?>
											<div class="col-md-3">
												<div class="form-group">
													<input type="number" name="memory[]" value="<?= $memory ?>" class="form-control" id="Quantity" placeholder="">
												</div>
											</div>
										<?php } ?>
									<?php } else {
										echo '<p style="color: gray">No memory available</p>';
									} ?>
									<!--									</div>-->


									<div class="col-sm-12">
										<div class="form-group">
											<label class="floating-label" for="Price">Basic Details</label>
											<textarea class="form-control" id="ckeditor" name="basic_detail">
                                    <?= $data[0]['basic_detail'] ?>
                                </textarea>
											<div class="col-sm-12">
												<div class="form-group">
													<label class="floating-label" for="Price">Description</label>
													<textarea class="form-control" id="ckeditor" name="desc">
                                    <?= $data[0]['desc'] ?>
                                </textarea>

												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group fill">
													<label class="floating-label" for="Icon">Product Image</label>
													<input type="file" name="files[]" class="form-control" id="Icon" multiple>
													<input type="hidden" name="image" value="<?= $data[0]['image'] ?>" class="form-control" id="Icon" placeholder="sdf">
													<?php $images = json_decode($data[0]['image'], true); ?>
													<?php if (!empty($images)) { ?>
														<?php for ($Nimg = 0; $Nimg < count($images); $Nimg++) { ?>
															<img src="<?= base_url('uploads/' . $images[$Nimg]) ?>" class="img-fluid" alt="" width="50">
														<?php } ?>
													<?php } ?>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="custom-control custom-switch">
													<input type="checkbox" class="custom-control-input" name="status" value="published" id="customSwitch5" <?= ($data[0]['status'] === 'published') ? "checked" : "" ?>>
													<label class="custom-control-label" for="customSwitch5">Publish</label>
												</div>
											</div>
											<div class="col-sm-12">
												<input type="submit" class="btn btn-primary" value="Edit">
												<button class="btn btn-danger">Close</button>
											</div>
										</div>
							</form>
						</div>
					</div>
					<?= form_close() ?>
				</div>
			</div>
<?php
		}
	}

	function updatePlanPrice()
	{
	    //Load Library
		$skey =  $this->data->fetch('stripe_config'); //passing skey as array to library stripe_library
		$keyData = array('skey'=>$skey[0]['sk']);
		$this->load->library('stripe_library', $keyData);

		$edit_price = $this->input->post('edit_price');
		$planID = $this->input->post('planID');
		$dec_planID = base64_decode(urldecode($planID));
		$planData = $this->data->fetch('plans', array('id' => $dec_planID));
		// var_dump($planData,$planID,$edit_price);
		// die;
		$price = $this->stripe_library->createPrice($planData[0]['stripe_plan_id'], $edit_price, $planData[0]['plan_duration']);
		if ($price != null) {
			$this->data->update(array('id' => $planData[0]['id']), 'plans', array('plan_price' => $edit_price));
			$this->session->set_flashdata("success", array("Success", "Price Updated Successfully", "success"));
		} else {
			$this->session->set_flashdata("success", array("Error", "Price Failed To Update", "error"));
		}
		return redirect(base_url('admin/view/plan'));
	}
}
