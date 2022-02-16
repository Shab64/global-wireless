<style>
	.bg-primary{
		background: #123578!important;
	}
</style>
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard sale</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item">Dashboard sale</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- support-section start -->
            <div class="col-xl-12 col-md-12">
                <div class="card flat-card">
                    <div class="row-table">
                        <div class="col-sm-4 d-none d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-user text-primary mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5><?=count($all_clients)?></h5>
                                    <span>Users</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-shopping-cart text-primary mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5><?=count($all_products)?></h5>
                                    <span>Products</span>
                                </div>
                            </div>
                        </div>
						<div class="col-sm-4 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-list text-primary mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5><?=count($all_category)?></h5>
                                    <span>Categories</span>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                    <div class="row-table">-->
<!--                        <div class="col-sm-6 card-body br">-->
<!--                            <div class="row">-->
<!--                                <div class="col-sm-4">-->
<!--                                    <i class="icon feather icon-user text-primary mb-1 d-block"></i>-->
<!--                                </div>-->
<!--                                <div class="col-sm-8 text-md-center">-->
<!--                                    <h5>--><?//=count($seller)?><!--</h5>-->
<!--                                    <span>Seller</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-sm-6 d-none d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">-->
<!--                            <div class="row">-->
<!--                                <div class="col-sm-4">-->
<!--                                    <i class="icon feather icon-user-check text-primary mb-1 d-block"></i>-->
<!--                                </div>-->
<!--                                <div class="col-sm-8 text-md-center">-->
<!--                                    <h5>--><?//=count($support)?><!--</h5>-->
<!--                                    <span>Support</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
                </div>

            </div>

            <!-- support-section end -->
            <!-- customer-section start -->

            <div class="col-xl-12 col-md-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card prod-p-card background-pattern">
                            <div class="card-body">
                                <div class="row align-items-center m-b-0">
                                    <div class="col">
                                        <h6 class="m-b-5">Total Profit</h6>
                                        <h3 class="m-b-0"><?=(!empty($all_products)) ? '$'.number_format($all_products[0]['total_earned'],2) : 0?></h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-money-bill-alt text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card prod-p-card bg-primary background-pattern-white">
                            <div class="card-body">
                                <div class="row align-items-center m-b-0">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Total Orders</h6>
                                        <h3 class="m-b-0 text-white"><?=(!empty($all_orders)) ? count($all_orders) : 0?></h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-database text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card prod-p-card bg-primary background-pattern-white">
                            <div class="card-body">
                                <div class="row align-items-center m-b-0">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Average Price</h6>
                                        <h3 class="m-b-0 text-white"><?=(!empty($all_products)) ? '$'.number_format($all_products[0]['avg_price'],2) : 0?></h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card prod-p-card background-pattern">
                            <div class="card-body">
                                <div class="row align-items-center m-b-0">
                                    <div class="col">
                                        <h6 class="m-b-5">Product Sold</h6>
                                        <h3 class="m-b-0"><?=(!empty($completed_orders)) ? count($completed_orders) : 0?></h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-tags text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-12 col-md-12">

                <div class="card table-card">
                    <div class="card-header">
                        <h5>New Products</h5>
                    </div>
                    <div class="pro-scroll" style="min-height:255px;position:relative;">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0 ">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($five_products)) { ?>
                                    <?php foreach ($five_products as $product) { ?>
                                    <tr>
                                        <td><?=$product['title']?></td>
                                        <td><img src="<?=base_url('uploads/'.$product['image'])?>" alt="" width="80" class="img-fluid img-responsive"></td>
                                        <td>
                                            <div><label class="badge badge-light-warning"><?=$product['status']?></label></div>
                                        </td>
                                        <td><?=$product['price']?></td>
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
            <!-- customer-section end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
</div>
