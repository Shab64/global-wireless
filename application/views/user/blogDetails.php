<style>
	.heading {
		text-align: center;
		color: #454343;
		font-size: 30px;
		font-weight: 700;
		position: relative;
		margin-bottom: 70px;
		text-transform: uppercase;
		z-index: 999;
	}
	.white-heading{
		color: #ffffff;
	}
	.heading:after {
		content: ' ';
		position: absolute;
		top: 100%;
		left: 50%;
		height: 40px;
		width: 180px;
		border-radius: 4px;
		transform: translateX(-50%);
		background: url('<?=base_url()?>/assets/website/img/ooma-telo-air-gray-bg.jpg');
		background-repeat: no-repeat;
		background-position: center;
	}
	.white-heading:after {
		background: url('<?=base_url()?>/assets/website/img/ooma-telo-air-gray-bg.jpg');
		background-repeat: no-repeat;
		background-position: center;
	}

	.heading span {
		font-size: 18px;
		display: block;
		font-weight: 500;
	}
	.white-heading span {
		color: #ffffff;
	}
	/* clearfix */
	.owl-carousel .owl-wrapper:after {
		content: ".";
		display: block;
		clear: both;
		visibility: hidden;
		line-height: 0;
		height: 0;
	}
	/* display none until init */
	.owl-carousel{
		display: none;
		position: relative;
		width: 100%;
		-ms-touch-action: pan-y;
	}
	.owl-carousel .owl-wrapper{
		display: none;
		position: relative;
		-webkit-transform: translate3d(0px, 0px, 0px);
	}
	.owl-carousel .owl-wrapper-outer{
		overflow: hidden;
		position: relative;
		width: 100%;
	}
	.owl-carousel .owl-wrapper-outer.autoHeight{
		-webkit-transition: height 500ms ease-in-out;
		-moz-transition: height 500ms ease-in-out;
		-ms-transition: height 500ms ease-in-out;
		-o-transition: height 500ms ease-in-out;
		transition: height 500ms ease-in-out;
	}
	.owl-carousel .owl-item img{
		max-width: 100%;
	}
	.owl-carousel .item {
		padding: 0 7.5px;
	}
	.owl-carousel .owl-item{
		float: left;
	}
	.owl-controls .owl-page,
	.owl-controls .owl-buttons div{
		cursor: pointer;
	}
	.owl-controls {
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
	}

	/* mouse grab icon */
	.grabbing {
		cursor:url(grabbing.png) 8 8, move;
	}

	/* fix */
	.owl-carousel  .owl-wrapper,
	.owl-carousel  .owl-item{
		-webkit-backface-visibility: hidden;
		-moz-backface-visibility:    hidden;
		-ms-backface-visibility:     hidden;
		-webkit-transform: translate3d(0,0,0);
		-moz-transform: translate3d(0,0,0);
		-ms-transform: translate3d(0,0,0);
	}

	#demo1 .customNavigation, #demo2 .customNavigation {
		top: 50%;
		position: absolute;
		width: 100%;
		left: 0px;
		margin-top: -40px;
	}
	#demo1 .customNavigation .btn, #demo2 .customNavigation .btn {
		padding: 0px;
	}
	#demo1 .customNavigation .btn.prev, #demo2 .customNavigation .btn.prev {
		position: relative;
		left:-76px;
	}
	#demo1 .customNavigation .btn.next, #demo2 .customNavigation .btn.next {
		position: relative;
		right: -70px;
		float: right;
	}
	div#demo1 {
		position: relative;
	}

	.user-blog {
		background: #faf2e8;
		padding: 50px 0 50px;
	}
	.user-blog:before {
		position: absolute;
		top: -100px;
		left: 0;
		content: " ";
		background: url(img/user-blog.png);
		background-size: 100% 100px;
		width: 100%;
		height: 100px;
		float: left;
		z-index: 99;
	}
	div#owl-demo1 .item {
		padding: 0 15px;
	}
	.blog-grid {
		background: #fff;
		box-shadow: 0px 0px 20px #c3c3c3;
		margin: 10px 0;
		border: 1px solid #d6d6d6;
		border-radius: 1px;
	}

	.discretion-blog {
		padding: 15px;
	}

	.discretion-blog p {
		font-size: 15px;
		color: #454343;
	}

	.discretion-blog h4 {
		color: #454343;
		font-size: 16px;
		font-weight: 700;
		text-transform: uppercase;
	}

	.discretion-blog .btn {
		color: #fefeff;
		background: #454343;
		width: 100%;
		text-transform: uppercase;
		border-radius: 0px;
		margin-top: 10px;
		-webkit-transform: perspective(1px) translateZ(0);
		-moz-transform: perspective(1px) translateZ(0);
		-o-transform: perspective(1px) translateZ(0);
		transform: perspective(122px) translateZ(0);
	}


	.discretion-blog .btn:hover {
		color: #ffffff;
	}
	.discretion-blog .btn:before {
		content: "";
		position: absolute;
		z-index: -1;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background: #79b82d;
		-webkit-transform: scaleX(0);
		transform: scaleX(0);
		-webkit-transform-origin: 0 50%;
		transform-origin: 0 50%;
		-webkit-transition-property: transform;
		transition-property: transform;
		-webkit-transition-duration: 0.3s;
		transition-duration: 0.3s;
		-webkit-transition-timing-function: ease-out;
		transition-timing-function: ease-out;
		border: 2px solid #79b82d;
	}

	.discretion-blog .btn:hover:before {
		-webkit-transform: scaleX(1);
		-moz-transform: scaleX(1);
		-o-transform: scaleX(1);
		transform: scaleX(1);
	}
	.date-blog {
		background: #82b53f;
		width: 70px;
		position: absolute;
		bottom: 0;
		left: 15px;
		color: #fff;
		text-align: center;
		padding: 10px 0px;
	}
	.date-blog:after {
		width: 0;
		height: 0;
		content: "";
		border-left: 0 solid transparent;
		border-right: 70px solid transparent;
		border-bottom: 12px solid #82b53f;
		top: -11px;
		position: absolute;
		left: 0;
	}
	.img-date {
		position: relative;
	}
	.user-blog .owl-theme .owl-controls .owl-page span {
		width: 17px;
		height: 17px;
		background: #454343;
		opacity: 1;
	}
	.user-blog .owl-theme .owl-controls .owl-page.active span, .user-blog .owl-theme .owl-controls.clickable .owl-page:hover span {
		background: #82b53f;
	}
	.blog_thumb img{
		width: 100%!important;
	}
	.blog_header img{
		width: 100%!important;
	}
	.height{
		height:200px!important;
	}

</style>

<!--blog area start-->
<div class="blog_page_section mt-60">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="blog_wrapper">
					<div class="blog_header">
						<?=$blog_id[0]['image']?>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-4" style="padding: 10px">
							<article class="single_blog mb-60" id="description_here">
								<figure>
									<figcaption class="blog_content">
										<span class="post_date">On : <?=date('D, d M Y', strtotime($blog_id[0]['pubDate']));?></span>
										<h3><a href="#" style="color: black!important;"><?=$blog_id[0]['description'];?></a></h3>
										<div class="blog_meta">
										</div>
									</figcaption>
								</figure>
							</article>
						</div>

						<div class="col-md-12">
							<h4>SHARE YOUR THOUGHTS</h4>
							<p>Your email address will not be published. Required fields are marked *</p>
							<?=form_open('user/blog_comments/blog_comments/blogDetails/'.$this->uri->segment(4))?>
								<div class="row">
									<div class="form-group ml-4">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="gridCheck" name="anonymous" value="yes">
											<label class="form-check-label" for="gridCheck">
												comment anonymous?
											</label>
										</div>
									</div>
									<div class="col-md-12 mb-2">
										<textarea required name="comment" class="form-control height" rows="5" placeholder="Comment"></textarea>
									</div>
									<div class="col">
										<input type="text" required name="name" class="form-control" placeholder="name *">
									</div>
									<div class="col">
										<input type="email" required name="email" class="form-control" placeholder="email *">
									</div>
									<div class="col">
										<input type="url" name="website" class="form-control" placeholder="website">
									</div>
									<div class="form-group">
										<div class="form-check">
											<input class="form-control btn btn-sm btn-primary" style="border-radius: 3px" type="submit" value="post comment">
										</div>
									</div>
								</div>
							<?=form_close()?>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="review-block">
							<?php if(!empty($blog_id[0]['comments'])){ ?>
								<?php foreach($blog_id[0]['comments'] as $review){ ?>
									<div class="row">
										<div class="col-sm-3">
											<div class="review-block-name" style="color: #090C9B"><span><?=(!empty($review['anonymous']) AND $review['anonymous'] === 'yes') ? "anonymous" : $review['name'] ?></span></div>
											<div class="review-block-rate" style="margin-left: 25px;">
											</div>
											<div class="review-block-date"><?=$review['date']?></div>
										</div>
										<div class="col-sm-9 text-left">
											<div class="review-block-description"><?=$review['comment']?></div>
										</div>
									</div>
									<hr />
								<?php } ?>
							<?php }else{
								echo 'Be the first to share your thoughts!';
							} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--blog area end-->
<script>
	function init(){
		$("#description_here p:nth-child(4)").remove();
		$("#description_here img").remove();
		$("#description_here a:nth-last-of-type(1)").remove()
	}
	init()
</script>
