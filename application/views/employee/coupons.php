

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Coupons</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=site_url('employee')?>">Home</a></li>
                                
                                <li class="breadcrumb-item">Coupons</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row justify-content-center">
                <!-- liveline-section start -->
                <div class="col-sm-12 text-right mb-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i>New Coupon</button>
                </div>
                <?php if(!empty($all_coupon)) { ?>
                <?php foreach ($all_coupon as $k=>$coupon)  { ?>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="<?=base_url()?>assets/images/pages/gift-card.svg" alt="" class="img-fluid w-50">
                            <h5 class="mt-3"><?=$coupon['amount']?>% off</h5>
                            <hr>
                            <div class="row align-items-center m-l-0">
                                <div class="col-sm-6 text-left">
                                    <button type="button" class="btn  btn-icon btn-outline-danger" onclick="delete_('<?=site_url('employee/delete/coupon/coupons/'.$coupon['id'])?>')"><i class="feather icon-trash-2"></i></button>
                                    <button type="button" class="btn  btn-icon btn-outline-primary" onclick="edit('<?=$coupon['id']?>','<?=site_url('employee/edit/coupon/'.$coupon['id'])?>')"><i class="feather icon-eye"></i></button>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1<?=$k?>" <?=($coupon['published'] === 'Published') ? "checked" : ""?>>
                                        <label class="custom-control-label" for="customSwitch1">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
                <!-- liveline-section end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <?=form_open_multipart('employee/insert/coupon/coupons')?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name"><small class="text-danger">* </small>Name</label>
                                <input type="text" class="form-control" id="Name" name="title" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Code"><small class="text-danger">* </small>Coupon Code</label>
                                <input type="text" readonly value="<?='vape'.rand(0,1000)?>" class="form-control" id="Code" name="coupon_code" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
<!--                        <div class="col-sm-6">-->
<!--                            <div class="form-group">-->
<!--                                <label class="floating-label" for="Apply"><small class="text-danger">* </small>Apply to Product</label>-->
<!--                                <select class="form-control" id="Apply">-->
<!--                                    <option value=""></option>-->
<!--                                    <option value="2">Product 1</option>-->
<!--                                    <option value="3">Product 2</option>-->
<!--                                    <option value="4">Product 3</option>-->
<!--                                    <option value="5">Product 4</option>-->
<!--                                    <option value="1">Product 5</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Discount">Discount Amount</label>
                                <input type="number" name="amount" class="form-control" id="Discount" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="d-block mb-2">Published</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="published" value="Published" class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadioInline1">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="published" value="No" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                    <button class="btn btn-danger"> Clear </button>
                </div>
            </div>
            <?=form_close() ?>
        </div>
    </div>



    </div>
