<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background:#090C9B">
					<h5 class="modal-title" id="exampleModalLabel">Request a Quote</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" action="<?= site_url('user/contact') ?>" id="request_a_quote">
					<div class="modal-body mx-3">
						<p id="required"></p>
						<div class="md-form mb-2">
							<i class="fas fa-user prefix grey-text"> </i> <label data-error="wrong" data-success="right" for="form34"> Name</label>
							<input type="text" id="form34" class="form-control " name="name" required>
						</div>

						<div class="md-form mb-2">
							<i class="fas fa-envelope prefix grey-text"></i> <label data-error="wrong" data-success="right" for="form29"> Email</label>
							<input type="email" id="form29" class="form-control " name="email" required>
						
						</div>

						<div class="md-form mb-2">
							<i class="fas fa-tag prefix grey-text"></i> <label data-error="wrong" data-success="right" for="form32"> Phone</label>
							<input type="number" id="form32" class="form-control " name="phone" required>
						
						</div>

						<div class="md-form mb-2">
							<i class="fa fa-pencil prefix grey-text"></i> <label data-error="wrong" data-success="right" for="form8"> Your message</label>
							<textarea type="text" id="form8" name="message" class="md-textarea form-control" rows="4" required></textarea>
						
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button style="background-color: #090C9B; color: white;" type="button" class="btn btn-unique" id="request-quote">Request</button>
					</div>
				</form>
			</div>

		</div>
	</div>

<!--footer area start-->
<footer class="footer_widgets">
	<div class="footer_top">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="widgets_container contact_us">
						<div class="footer_logo">
							<a href="<?=site_url('user')?>"><img src="<?=base_url('assets/website')?>/img/logo/logo.jpg" alt=""></a>
						</div>
						<div class="footer_contact">
							<p><span>Address : </span> 555 Marriott Dr
								Suite 315,

								Nashville TN 37214

								United states</p>
							<p><span>Mobile: </span><a href="tel:0123456789">888.849.4569</a> </p>
							<p><span>Support: </span><a href="mailto:sales@global-wirelessinc.com">sales@global-wirelessinc.com</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="widgets_container widget_menu">
						<h3>Information</h3>
						<div class="footer_menu">
							<ul>
								<li><a href="<?=site_url('user/blogs')?>">Our Blogs</a></li>
								<li><a href="<?=site_url('user/view/return')?>">Our Return Ploicy</a></li>
								<li><a href="<?=site_url('user/view/faq')?>">FAQ</a></li>
								<li><a href="<?=site_url('user/view/contact')?>">Contact Us</a></li>
								<li><a href="<?=site_url('user/view/products')?>">Latest Products</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="widgets_container widget_menu">
						<h3>My Account</h3>
						<div class="footer_menu">
							<ul>
								<li><a href="<?=(!empty($user)) ? base_url('user/view/profile') : base_url('user/signin');?>"><?=(!empty($user)) ? $user['name'] : "Login";?></a></li>
								<li><a href="<?=site_url('user/view/wishlist')?>">Wish List</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="widgets_container newsletter">
						<h3>Follow Us</h3>
						<div class="footer_social_link">
							<ul>
								<li><a class="facebook" href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
								</li>
								<li><a class="twitter" href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
								</li>
								<li><a class="instagram" href="#" title="instagram"><i
											class="fa fa-instagram"></i></a></li>
								<li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer_bottom">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-6">
					<div class="copyright_area">
						<p class="copyright-text">&copy; Copyright 2021 | <a href="#">GLOBAL WIRELESS. All Rights Reserved</a></p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="footer_payment text-right">
<!--						<a href="#"><img src="--><?//=base_url('assets/website')?><!--/img/icon/payment.png" alt=""></a>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!--footer area end-->



<!-- JS
============================================ -->

<!-- Plugins JS -->
<script src="<?=base_url()?>assets/website/js/plugin.js"></script>

<!-- Main JS -->
<script src="<?=base_url()?>assets/website/js/main.js"></script>
<script src="<?=base_url()?>assets/website/js/index.js"></script>
<script src="<?=base_url()?>assets/website/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/website/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/toast/jquery.toast.js"></script>
<?php $flashdata = $this->session->flashdata('item_added'); ?>

<script>
	window.addEventListener('load', ()=>{
		const preload = document.querySelector('.loading-1');
		preload.classList.add('finish-loading');
	})
	function search_() {
		let search = $("#search_data").val();
		if (search.length > 0) {
			$.post("<?=site_url('user/search_data')?>", {search
			}, function(e) {
				$("#searchResult").css('display', 'block')
				$("#searchResult").html(e)
			})
		} else {
			$("#searchResult").css('display', 'none')
			$("#search_data").html('<p style="color: red">Write something to search .. </p>');
		}

	}

	$("#request-quote").click(function(e) {
			e.preventDefault();
			var formObj = {};
			var inputs = $('#request_a_quote').serializeArray()
			console.log(inputs)
			$.each(inputs, function(i, input) {
				formObj[input.name] = input.value;
			});
			console.log(formObj)
			if (formObj.name.length > 0 && formObj.email.length > 0 && formObj.phone.length > 0 && formObj.message.length > 0) {
				$.post("<?= site_url('user/contact/quote') ?>", {
					ajaxform: formObj
				}, function(e) {
					$("#request_a_quote").submit();
				})
			} else {
				$("#required").html('All fields are required');
			}
		})
	// show toast on addtocart
	<?php if(!empty($flashdata)){ ?>
	$.toast({
		heading: '<?=$flashdata?>',
		text: 'added to your cart',
		icon: 'info',
		loader: true,        // Change it to false to disable loader
		loaderBg: '#fff', // To change the background
		position: 'top-right'

	})
	<?php } ?>

	function addtocart(id){
		var qty = $("#qty").val();
		if(qty == null){
			qty =1;
		}
		$.post("<?=site_url('user/addtocart')?>" , {qty ,id},function (e){
		$("#card_data").html(e)
		//window.location.href='<?//=site_url('user/view/cart')?>//';
		})
	}

	$( document ).ready(function() {
		$.post("<?=site_url('user/show_cart')?>" , function (e){
			$("#card_data").html(e)
		})
		setInterval(function (){
			$.post("<?=site_url('user/count_cart')?>" ,function (e){
				$("#card_total").html(parseInt(e))
			})
		},1000)
	});
	
</script>
<script>
//   (function (p, l, u, t, i, o) {
//     p[t] = p[t] || function () {
//       (p[t].q = p[t].q || []).push(arguments);
//     };
//     o = l.getElementsByTagName('head')[0];
//     i = l.createElement('script');
//     i.async = 1;
//     i.src = u;
//     o.appendChild(i);
//   })(window, document, 'https://cdn.plutio.com/messenger/main.js', '$plutio_msg');

//   $plutio_msg('j7uQvsp3xovJek8xF', { });
</script>
<chat-widget
            style="--chat-widget-primary-color: #188bf6; --chat-widget-active-color:#188bf6 ;--chat-widget-bubble-color: #188bf6"
            location-id="SYSLSH2Q8P7VOdjzFmpb"
            prompt-avatar="https://widgets.leadconnectorhq.com/chat-widget/assets/defaultAvatar.png"
            
      ></chat-widget>
       <script src="https://widgets.leadconnectorhq.com/loader.js"
          data-resources-url="https://widgets.leadconnectorhq.com/chat-widget/loader.js" ></script>
<script>
    function toast(type, text, icon) {
        $.toast({
            heading: type,
            text: text,
            showHideTransition: 'slide',
            position: "top-right",
            icon: icon
        })
    };
</script>

<?php
$popUp = $this->session->flashdata('success');
if (isset($popUp)) {
    ?>
    <script>
        toast('<?=$popUp[0]?>', '<?=$popUp[1]?>', '<?=$popUp[2]?>')
    </script>
<?php } ?>
</body>
</html>
