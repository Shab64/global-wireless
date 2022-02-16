

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
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
    <div class="contact_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message content">
                        <h3>contact us</h3>
                        <ul>
                            <li>
								<div class="row">
									<div class="col-md-1"><i class="fa fa-fax"></i></div>
									<div class="col-md-10">Address : 555 Marriott Dr Suite 315, Nashville TN 37214 United States</div>
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
                        <form id="contact-form" method="POST" action="<?=site_url('user/contact')?>">
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
                </div>
            </div>
        </div>
    </div>

    <!--contact area end-->
