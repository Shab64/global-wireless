<style>
	.star-rating {
		line-height:32px;
		font-size:2em;
	}
	.customerReviews{
		/*margin-bottom: 100px!important;*/
	}

	.star-rating .fa-star{color: #ffe15c;}
	@media only screen and (max-width: 767px) {
		.rating-block{
			padding-top: 100px;
			padding-left: 50px;
			padding-bottom: 50px;
			font-family: 'Poppins', sans-serif;
			color: #090C9B;
			left: 0;
		}
	}
</style>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb_content">
					<ul>
						<li><a href="index.php">home</a></li>
						<li><a href="products.php">Phones</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</div>
<!--breadcrumbs area end-->
<section class="o-centerArm-customerReviews" >
	<div class="customerReviews">
		<h1 class="coverage">SEE WHAT OUR CUSTOMERS ARE SAYING</h1>
		<div class="content">
			<div class="bottomLineRating">
				<div class="row">
					<div class="col-sm-5 rating-block">
						<h2 class="bold padding-bottom-7">
							<?php if(!empty($all_reviews)){ $totalReviewsGet =0;?>
							<?php foreach($all_reviews as $k => $review){ ?>
										<?php $totalReviews = count($all_reviews); ?>
										<?php $totalReviewsGet += $review['rating']; ?>
							<?php } $total = $totalReviewsGet/$totalReviews; echo (number_format($total,1)) . '('.count($all_reviews).' reviews)'; ?>
							<?php } else{ echo 0;} ?>
						</h2>
					</div>
					<div class="col-sm-5">
						<div class="reviewRow" id="distributionRow">
							<div class="distribution-row appendText isActive" role="radio" tabindex="0"
								 aria-checked="false" aria-label="5 star ratings - 3995 reviews">
								<div class="score-value">5 Stars</div>
								<div class="distribution-bar">
									<div class="distribution-bar-score" style="width: 66.15333664513993%;"></div>
								</div>
								<div class="pull-right" style="margin-left:0px;"><?=(!empty($five_star)) ? count($five_star) : 0;?></div>
							</div>
						</div>
						<div class="distribution-row appendText" role="radio" tabindex="0" aria-checked="false"
							 aria-label="4 star ratings - 1004 reviews" style="opacity: 0.4;">
							<div class="score-value">4 Stars</div>
							<div class="distribution-bar">
								<div class="distribution-bar-score" style="width: 16.625269084285478%;">
								</div>
							</div>
							<div class="pull-right"><?=(!empty($four_star)) ? count($four_star) : 0;?></div>
						</div>
						<div class="distribution-row appendText" role="radio" tabindex="0" aria-checked="false"
							 aria-label="3 star ratings - 489 reviews" style="opacity: 0.4;">
							<div class="score-value">3 Stars</div>
							<div class="distribution-bar">
								<div class="distribution-bar-score" style="width: 8.097367113760557%;">
								</div>
							</div>
							<div class="pull-right"><?=(!empty($three_star)) ? count($three_star) : 0;?></div>
						</div>
						<div class="distribution-row appendText" role="radio" tabindex="0" aria-checked="false"
							 aria-label="2 star ratings - 256 reviews" style="opacity: 0.4;">
							<div class="score-value">2 Stars</div>
							<div class="distribution-bar">
								<div class="distribution-bar-score" style="width: 4.239112435833747%;">
								</div>
							</div>
							<div class="pull-right"><?=(!empty($two_star)) ? count($two_star) : 0;?></div>
						</div>
						<div class="distribution-row appendText" role="radio" tabindex="0" aria-checked="false"
							 aria-label="1 star ratings - 295 reviews" style="opacity: 0.4;">
							<div class="score-value">1 Stars</div>
							<div class="distribution-bar">
								<div class="distribution-bar-score" style="width: 4.884914720980295%;">
								</div>
							</div>
							<div class="pull-right"><?=(!empty($one_star)) ? count($one_star) : 0;?></div>
						</div>
					</div>
					<div class="col-2 mt-5">
						<span class="btn btn-sm btn-dark mb-1" id="writeReview" >Write review</span>
						<span class="btn btn-sm btn-dark" id="cancelReview" style="display:none;">Cancel review</span>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-lg-12">
						<div class="review-block">
							<?php if(!empty($all_reviews)){ ?>
							<?php foreach($all_reviews as $review){ ?>
							<div class="row">
								<div class="col-sm-3">
									<div class="review-block-name"><span><?=$review['name']?></span></div>
									<div class="review-block-rate" style="margin-left: 25px;">
										<?php for ($x=0;$x<5;$x++){ ?>
										<?php if($x<(int)$review['rating']){ ?>
										<span><i class="fa fa-star" aria-hidden="true" style="color: #FFD700;"></i></span>
										<?php } else{ ?>
										<span><i class="fa fa-star-o" aria-hidden="true"></i></span>
										<?php }	 ?>
										<?php }	 ?>
									</div>
									<div class="review-block-date"><?=$review['date']?></div>
								</div>
								<div class="col-sm-9">
									<div class="review-block-description"><?=$review['review']?></div>
								</div>
							</div>
							<hr />
							<?php } ?>
							<?php } ?>
						</div>
					</div>
					<div class="col-md-3"></div>
					<div class="col-md-6" style="display: none" id="reviewSection">
						<h3 style="text-align: center;margin: 20px"><strong>Your Review</strong></h3>
						<form action="<?=site_url('user/addReview/reviews/review')?>" method="post">
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="inputEmail4">Display Name<span style="color:red;"> *</span></label>
								<input type="text" name="name" class="form-control" id="inputEmail4" placeholder="name here .." required>
							</div>
							<div class="form-group col-md-12">
								<label for="inputPassword4">E-mail<span style="color:red;"> *</span></label>
								<input type="email" name="email" class="form-control" id="inputPassword4" placeholder="E-mail here .." required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputAddress">Rating<span style="color:red;"> *</span></label>
							<div class="star-rating">
								<span class="fa fa-star-o" data-rating="1"></span>
								<span class="fa fa-star-o" data-rating="2"></span>
								<span class="fa fa-star-o" data-rating="3"></span>
								<span class="fa fa-star-o" data-rating="4"></span>
								<span class="fa fa-star-o" data-rating="5"></span>
								<input type="hidden" name="rating" class="rating-value" value="5">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="inputCity">Your Review<span style="color:red;"> *</span></label>
								<textarea class="form-control" name="review" style="height: 100px!important;" required></textarea>
							</div>
						</div>
						<input type="submit" class="btn btn-dark btn-sm" value="Add Review">
						</form>
					</div>
				</div>
			</div>


<!--			<div class="shop_toolbar t_bottom">-->
<!--				<div class="pagination">-->
<!--					<ul>-->
<!--						<li class="current">1</li>-->
<!--						<li><a href="#">2</a></li>-->
<!--						<li><a href="#">3</a></li>-->
<!--						<li class="next"><a href="#">next</a></li>-->
<!--						<li><a href="#">>></a></li>-->
<!--					</ul>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
</section>
<script>
	var $star_rating = $('.star-rating .fa');

	var SetRatingStar = function() {
		return $star_rating.each(function() {
			if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
				return $(this).removeClass('fa-star-o').addClass('fa-star');
			} else {
				return $(this).removeClass('fa-star').addClass('fa-star-o');
			}
		});
	};

	$star_rating.on('click', function() {
		$star_rating.siblings('input.rating-value').val($(this).data('rating'));
		return SetRatingStar();
	});
	SetRatingStar();
	$(document).ready(function() {

	});

	$("#writeReview").click(function (e){
		$(".customerReviews").css('margin-bottom','600')
		$("#reviewSection").fadeIn(1000).css('display','block')
		$(this).css('display','none')
		$("#cancelReview").css('display','block')
	})
	$("#cancelReview").click(function (e){
		$("#reviewSection").css('display','none')
		$(this).css('display','none')
		$("#writeReview").css('display','block')
	})
</script>
