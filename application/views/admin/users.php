
    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5>User List</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="#!">user</a></li>
                                <li class="breadcrumb-item">User list</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->

            <div class="d-flex mt-5 px-5">
                <div class="ml-auto">
                    <!--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i>New User</button>-->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card user-profile-list">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="user-list-table2" class="table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Join Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($all_clients)) { ?>
                                    <?php foreach ($all_clients as $users) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-inline-block align-middle">
                                                <div class="d-inline-block">
                                                    <h6 class="m-b-0"><?=$users['name']?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?=$users['email']?></td>
                                        <td><?=$users['phone']?> </td>
                                        <td><?=$users['address']?></td>
                                        <td><?=$users['date']?></td>
                                        <td>
                                            <div class="overlay-edit">
                                                <button type="button" class="btn btn-icon btn-danger" onclick="delete_('<?=site_url('admin/delete/client/users/'.$users['id'])?>')"><i class="feather icon-trash-2"></i></button>
                                            </div>
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
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

    <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <?=form_open_multipart('admin/insert/user/employees')?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="First"><small class="text-danger">* </small>First Name</label>
                                <input type="text" class="form-control" name="fname" id="Name" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Last"><small class="text-danger">* </small>Last Name</label>
                                <input type="text" class="form-control" name="lname" id="Last" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label" for="Email"><small class="text-danger">* </small>Email Address</label>
                                <input type="email" class="form-control" name="email" id="Email" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label class="d-block mb-2">Status</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="status"  value="active" class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadioInline1" >Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="status" value="inactive" class="custom-control-input" >
                                <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <label class="d-block mb-2 mt-3">User Type</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline3" name="type" value="seller" class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadioInline3">Seller</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline4" name="type" value="supporter" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline4">Supporter</label>
                            </div>

                        </div>

<!--                        <div class="col-sm-4">-->
<!--                            <label class="d-block mb-2">Send Email Notification</label>-->
<!--                            <div class="custom-control custom-switch">-->
<!--                                <input type="checkbox" class="custom-control-input" id="customSwitch1">-->
<!--                                <label class="custom-control-label" for="customSwitch1"><Yes></Yes></label>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label class="floating-label" for="Note">User Note</label>
                                <textarea class="form-control" name="note" id="Note" rows="6" spellcheck="false"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Save">
                    <button class="btn btn-danger"> Clear </button>
                </div>
            </div>
            <?=form_close()?>
        </div>
    </div>





    <!-- [ Main Content ] end -->
    </div>

