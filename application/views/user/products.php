
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?=base_url('user/view/')?>index">home</a></li>
                            <li><a href="<?=base_url('user/view/')?>products">Products</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->


    <!--product area start-->

    <!--shop  area start-->
    <div class="shop_area shop_reverse mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            <div class="widget_list widget_categories">
                                <h2>Categories</h2>
                                <ul>
									<?php if(!empty($all_categories)) { ?>
									<?php foreach ($all_categories as $cat) { ?>
                                    <li><a href="<?=base_url('user/searchByCategory/'.$cat['id'].'/result?'.hash('md5','search'))?>"><?=$cat['name']?></a></li>
									<?php } ?>
									<?php } ?>
									<li><a href="<?=base_url('user/searchByCategory/accessories/result?'.hash('md5','search'))?>">All Accessories</a></li>
                                </ul>
                            </div>

                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip"
                                title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip"
                                title="4"></button>

                            <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip"
                                title="List"></button>
                        </div>
                        
                        <div class="page_amount">
                            <p>Showing <?=(!empty($products)) ? count($products) : 0?> results</p>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <div class="row shop_wrapper">
						<?php if(!empty($products)){ ?>
						<?php foreach ($products as $pro) { ?>
						<?php $img = (!empty($pro['image'])) ? json_decode($pro['image']) : "" ?>
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <article class="single_product">
								<figure>
									<div class="product_thumb">
										<a class="primary_img" href="<?=site_url('user/view/product-details/'.$pro['id'])?>"><img src="<?=(!empty($pro['image'])) ? base_url('uploads/'.$img[0]) : "https://thedailytouristbd.com/uploads/no_image.jpg"?>" class="img-fluid " alt=""></a>
										<a class="secondary_img" href="<?=site_url('user/view/product-details/'.$pro['id'])?>"><img src="<?=(!empty($pro['image'])) ? base_url('uploads/'.$img[0]) : "https://thedailytouristbd.com/uploads/no_image.jpg"?>" class="" alt=""></a>
										<?php if(!empty($pro['product_tag']) and $pro['product_tag'] !== 'no_tag'){ ?>

											<div class="label_product">
											<?php if($pro['qty'] !=0){ ?>
												<span class="label_sale"><?=$pro['product_tag']?></span>
											<?php }else{ ?>
												<span class="label_sale bg-danger">Stock(0)</span>
											<?php } ?>
											</div>
										<?php } ?>
									</div>
									<figcaption class="product_content">
										<div class="price_box">
											<span class="current_price"><?=(!empty($pro) and !empty($pro['d_price'])) ? '<del style="color: grey">$'.$pro['d_price'].'</del> $'.$pro['price'] : '$'.$pro['price']; ?></span>
										</div>
										<h3 class="product_name"><a href="javascript:void(0)"><?=(!empty($pro['basic_detail'])) ? $pro['basic_detail'] : ''?></a></h3>
										<div class="action_links">
											<ul>
												<li class="wishlist"><a href="<?=site_url('user/wishlist/wishlist/'.$pro['id'])?>" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
<!--												<li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="quick view"> <span> <i class="fa fa-eye" aria-hidden="true"></i></span></a></li>-->
											</ul>
										</div>
										<div class="add_to_cart">
											<a href="<?= site_url('user/view/product-details/' . $pro['id']) ?>"
											   title="view details">view product</a>
										</div>
									</figcaption>
								</figure>
                            </article>
                        </div>
						<?php } ?>
						<?php } ?>
                    </div>

<!--                    <div class="shop_toolbar t_bottom">-->
<!--                        <div class="pagination">-->
<!--                            <ul>-->
<!--                                <li class="current">1</li>-->
<!--                                <li><a href="--><?//=base_url('user/view/')?><!--#">2</a></li>-->
<!--                                <li><a href="--><?//=base_url('user/view/')?><!--#">3</a></li>-->
<!--                                <li class="next"><a href="--><?//=base_url('user/view/')?><!--#">next</a></li>-->
<!--                                <li><a href="--><?//=base_url('user/view/')?><!--#">>></a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->


    
    
