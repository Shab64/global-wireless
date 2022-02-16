
    <div class="pc-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Order</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=site_url('amin')?>">Home</a></li>

                                <li class="breadcrumb-item">Order</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- customar project  start -->
                <div class="col-12">
					<?php if(!empty($all_orders)){ ?>
					<?php foreach ($all_orders as $order){
						$order_details = json_decode($order['order_data'],true);
						$billing_details = json_decode($order['billing_details'],true); ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center justify-contact-between">
                                <div class="col">
                                    <div class="btn btn-primary">
                                        <?='#'.$order['id']?>
                                    </div>
                                </div>
                                <div class="col text-right">
									<?php if($order['status'] ==='pending'){ ?>
                                    <button class="btn btn-outline-primary" onclick="change_status(<?=$order['id']?>)">
                                        <i class="feather icon-edit"></i> Mark as Delivered
                                    </button>
									<?php } else{ echo "<h5 style='color:#7267EF;'>Delivered</h5>";} ?>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table m-0 mt-3">
                                    <tr>
                                        <td class="align-middle">
                                            <div class="m-0 d-inline-block align-middle font-16">
                                                <a href="#!" class="text-body">
													<?php $total =0; ?>
													<?php foreach ($order_details as $od){  ?>
                                                    <h6 class="d-inline-block"><?=$od['name'];$total+=$od['price']*$od['qty']; ?></h6>
														<br>
													<?php } ?>
                                                </a>
                                                <br />

                                            </div>
                                        </td>
                                        <td>
                                            <h5><?='$'.$total?></h5>
                                        </td>
                                        <td class="text-right">
                                            <div class="text-left d-inline-block">
                                                <h6 class="my-0" style="color: <?=($order['status'] === 'completed') ? 'green' : '#7267EF'?>"><?=ucfirst($order['status'])?></h6>
                                                <strong class="text-muted"><?=(!empty($billing_details['note'])) ? $billing_details['note'] : ""?></strong>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <hr class="mt-0">
                            <div class="row align-items-center justify-contact-between">
                                <div class="col">
                                    <span class="text-muted">Ordered On</span>
                                    <strong><?=$order['date']?></strong>
                                </div>
                                <div class="col text-right">

                                    <span class="text-muted">Ordered Amount</span>
                                    <strong style="color:#7267EF;"><?='$'.$total?></strong>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php } ?>
					<?php } ?>
                </div>
                <!-- customar project  end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

    <!-- [ Main Content ] end -->
    </div>

    <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?=form_open_multipart('seller/insert/order/order')?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select name="order_status" class="form-control">
                                        <option>Pending</option>
                                        <option>Completed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?=form_close() ?>
        </div>
    </div>



    <script>
        function change_status(id){
            $.post("<?=site_url('admin/order_status')?>",{id},function(e){
                location.reload()
            })
        }
    </script>
