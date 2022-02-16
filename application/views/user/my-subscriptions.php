<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?= base_url('user') ?>">home</a></li>
                        <li><a href="<?= base_url('user/view/my-subscriptions') ?>">My Subscription</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--contact map start-->
<!-- <div class="contact_map mt-60">
        <div class="map-area">
            <div id="googleMap"></div>
        </div>
    </div> -->
<!--contact map end-->

<!--contact area start-->

<style>
    table,
    th,
    td {
        border: 1px solid black;
        text-align: center;
    }

    th{
        text-align: center;
        padding: 5px;
    }
</style>

<div class="contact_area">
    <div class="container">
        <div class="row">
            <div style="display: block;">
                <h3>My Subscription</h3>
            </div>
            <div>
                <table id="myTable">
                    <thead>
                        <tr>
                            <th>Plan</th>
                            <th>Duration</th>
                            <th>Charges</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($my_subscriptions)) {
                            foreach ($my_subscriptions as $subscription) { ?>
                                <tr>
                                    <td><?= $subscription['plan_id']['plan_name'] ?></td>
                                    <td><?= $subscription['plan_id']['plan_duration'] ?></td>
                                    <td><?= isset($subscription['stripe_sub_amount']) ? '$' . $subscription['stripe_sub_amount'] : '-' ?></td>
                                    <td><?= isset($subscription['stripe_sub_status']) ? ucfirst($subscription['stripe_sub_status'])  : '-' ?></td>
                                    <td><button class="btn btn-danger" <?= isset($subscription['stripe_sub_status']) ? ($subscription['stripe_sub_status'] === "active" ? '' : 'hidden') : 'hidden' ?> onclick="cancelSubscription('<?= $subscription['stripe_sub_id'] ?>')">Cancel</button></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="col-lg-6 col-md-12">
                    <div class="contact_message content">
                        <ul>
                            <h3>contact us</h3>
                            <li>
								<div class="row">
									<div class="col-md-1"><i class="fa fa-fax"></i></div>
									<div class="col-md-10">Address : Global Wireless 4235, Hillsboro Pike Suite 300, Nashville TN 37215 United states</div>
								</div>
							</li>
                            <li>
								<div class="row">
									<div class="col-md-1"><i class="fa fa-envelope"></i></div>
									<div class="col-md-10">Email: <a href="mailto:demo@example.com">sales@gwidata.com </a></div>
								</div>
                            </li>
                            <li>
								<div class="row">
								<div class="col-md-1"><i class="fa fa-phone"></i></div>
								<div class="col-md-10">Phone:<a href="tel: 0123456789"> 888.849.4569 </a></div>
								</div>
							</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message form">
                        <h3>Tell us your query</h3>
                        <form id="contact-form" method="POST" action="<?= site_url('user/contact') ?>">
                            <p>
                                <input name="name" placeholder="Name" type="text">
                            </p>
                            <p>
                                <input name="email" placeholder="Email" type="email">
                            </p>
                            <p>
                                <input name="subject" placeholder="Subject" type="text" class="form-control">
                            </p>
                            <div class="contact_textarea">
                                <textarea placeholder="Message" name="message" class="form-control2"></textarea>
                            </div>
                            <button type="submit"> Send</button>
                            <p class="form-messege"></p>
                        </form>

                    </div>
                </div> -->
        </div>
    </div>
</div>
<!--contact area end-->
<script>
    function cancelSubscription(stripeSubId){
        window.location.href = '<?= base_url('User/cancelSubscription') ?>/'+stripeSubId;
    }
</script>