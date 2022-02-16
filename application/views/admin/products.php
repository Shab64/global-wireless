



    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Product</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=site_url('admin')?>">Home</a></li>

                                <li class="breadcrumb-item">Product</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- customar project  start -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center m-l-0">
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6 text-right">
									<button class="btn btn-primary btn-sm mb-3 btn-round" data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i> Add category</button>
                                    <a href="<?=site_url('admin/view/add-product')?>" class="btn btn-success btn-sm mb-3 btn-round" ><i class="feather icon-plus"></i> Product</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="report-table" class="table mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>name</th>
                                        <th>Category</th>
                                        <th>Added Date</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($all_products)) { ?>
                                    <?php foreach ($all_products as $product) { ?>
									<?php $img = (!empty($product['image'])) ? json_decode($product['image']) : "" ?>
                                    <tr>
                                        <td class="align-middle">
                                            <img src="<?=(!empty($product['image'])) ? base_url('uploads/'.$img[0]) : "https://thedailytouristbd.com/uploads/no_image.jpg"?>" alt="contact-img" title="contact-img" style="width: 60px;height: 50px;" class="rounded mr-3"  />
                                        </td>
                                        <td class="align-middle">
											<?=$product['title']?>
                                        </td>
										<td class="align-middle">
											<?=(!empty($product['cat'])) ?$product['cat'][0]['name']: "-"?>
                                        </td>
                                        <td class="align-middle">
                                            <?=$product['date']?>
                                        </td>
                                        <td class="align-middle">
                                            <?=$product['price']?>
                                        </td>
                                        <td class="align-middle">
                                            <?=($product['qty']==0) ? "<p style='color: red'>out of stock</p>" : $product['qty']?>
                                        </td>
                                        <td class="align-middle">
                                            <span class="badge <?=($product['status']==='published') ? "badge-success" : 'badge-danger' ; ?> "><?=($product['status']==='published') ? $product['status'] : 'not published'; ?></span>
                                        </td>

                                        <td class="table-action">
<!--                                            <a href="product-details.php" class="btn btn-icon btn-outline-primary"><i class="feather icon-eye"></i></a>-->
                                            <a href="<?=site_url('admin/view/add-product/'.$product['id'])?>" class="btn btn-icon btn-outline-success" ><i class="feather icon-edit"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger" onclick="delete_('<?=site_url('admin/delete/products/products/'.$product['id'])?>')"><i class="feather icon-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- customar project  end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?=form_open_multipart('admin/insert/categories/products',array('autocomplete'=>'off'))?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <input type="text" value="" required name="name" class="form-control" placeholder="Category name eg: samsung">
                </div>
				<div class="modal-footer">
					<input type="submit" value="add" class="btn btn-primary btn-sm">
				</div>
            </div>
            <?=form_close() ?>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    </div>


