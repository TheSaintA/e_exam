<?php if($_SESSION['admin']): ?>
    <?php include "header.php"; ?>
        <div class="container my-3 p-2 w3-round-large w3-card">
        <?php if ($msg = $this->session->flashdata('unsuccess')): ?>
	                   <div class="alert alert-danger mt-3 alert-dismissible d-block mx-auto">
                       <button type="button" class="close" data-dismiss="alert">&times;</button>
	                      <strong>Ohh!</strong> <?= $msg; ?>
	                    </div>   
	                <?php else: ?>
	                <?php endif; ?>
                    <?php if ($msg = $this->session->flashdata('success')): ?>
	                   <div class="alert alert-success mt-3 alert-dismissible d-block mx-auto">
                       <button type="button" class="close" data-dismiss="alert">&times;</button>
	                      <strong>Success!</strong> <?= $msg; ?>
	                    </div>   
	                <?php else: ?>
	                <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <a href="<?= base_url("admin_logout"); ?>" class="btn btn-danger font-weight-bold my-1"><span class="fa fa-power-off"></span> Logout</a>
                <div class="table-responsive">    
                <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                            <tr>
                                <td><?= $user->first_name . " " . $user->last_name;  ?></td>
                                <td><?= $user->email; ?></td>
                                <td><?= $user->dept_name; ?></td>
                                <td><?=(($user->status) == 1) ? "<label class='badge badge-success'>Active</label>" : "<label class='badge badge-danger'>Inactive</label>"; ?></td>
                                <td>
                                <a data-toggle="modal" href="#password_modal<?= $user->id ?>" class="btn w3-btn spruce"><span class="fa fa-edit"></span> Edit Password</a>
                                                <!-- Modal -->
            <div class="modal fade" id="password_modal<?= $user->id ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold text-spruce"><span class="fa fa-key"></span> Edit Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                </div>
                                <form action="<?= base_url("update_password"); ?>" method="post">
                                    <?= form_hidden("email",$user->email); ?>
                        <div class="modal-body">
                        <div class="form-group">
                <input type="password" class="form-control" name="new" id="new"  placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm"  placeholder="Confirm Password" required>
            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn spruce"><span class="fa fa-key"></span> Change Password</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                        </div>
</form>
                    </div>
                </div>
            </div>
                                <?php if($user->status == 0): ?>
                                        <a href="<?= base_url("update_dept_account/$user->id/1"); ?>" class="btn w3-btn spruce"><span class="fa fa-check-circle"></span> Activate</a>
                                        <?php else: ?>
                                            <a href="<?= base_url("update_dept_account/$user->id/0"); ?>" class="btn  btn-warning"><span class="fa fa-info-circle"></span> Deactivate</a>
                                            <?php endif; ?>
                                            <a href="<?= base_url("delete_dept_account/$user->id"); ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Delete</a>
                                        </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    <?php include "footer.php"; ?>
    <?php else: ?>
        <?php 
        $this->sesion->set_flashdata('unsuccess','Please login first');
    redirect('admin_login','refresh');
        ?>
        <?php endif; ?>