<?php include "header.php" ?>
    <div class="row mt-lg-4 ">
	    <?php include "control_div.php"; ?>
		<div class="col-lg-10 control-div">
            <?php include "alert.php" ?>
            <h5 class="pb-2 text-spruce font-weight-bold"><span class="fa fa-university"></span> Department Information</h5>
                <hr class="mt-1 mb-3"/>
                <div class="w3-card w3-round-large p-2 w-100">
                        <?php foreach($school_info as $school): ?>
                            <?php if(($school->email) == ($_SESSION['email'])): ?>
                                <button class="btn spruce float-right w3-card" data-target="#edit_dept_info" data-toggle="modal"><span class="fa fa-edit"></span> Edit</button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="edit_dept_info" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Department Information</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <form action="<?= base_url('control_panel/update_dept_info/update'); ?>" method="post" class="font-weight-bold">
                                            <div class="modal-body">
                            <?= form_hidden('create_date',time()); ?>
                            <?= form_hidden('email',$_SESSION['email']); ?>
                                    <div class="form-group">
                                        <label for="">Department Name</label>
                                        <input type="text" placeholder="Department Name..." name="school_name" class="form-control" value="<?= $school->school_name; ?>" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Department Description</label>
                                        <textarea name="school_description" placeholder="Department Description..." id="" rows="5" class="form-control"  required><?= $school->school_description; ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn spruce w3-btn">Submit</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                <h5 class="text-spruce border-bottom"><?= $school->school_name; ?></h5>
                                <p class="text-spruce font-weight-bold"><?= $school->school_description; ?></p>
                                </div>
                                <?php else: ?>
                                    <form action="<?= base_url('control_panel/update_dept_info/insert'); ?>" method="post" class="font-weight-bold">
                            <?= form_hidden('create_date',time()); ?>
                            <?= form_hidden('email',$_SESSION['email']); ?>
                                    <div class="form-group">
                                        <label for="">Department Name</label>
                                        <input type="text" placeholder="Department Name..." name="school_name" class="form-control" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Department Description</label>
                                        <textarea name="school_description" placeholder="Department Description..." id="" rows="5" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                            <button type="submit" class="btn spruce w3-btn "><span class="fa fa-university"></span> Submit</button>
                                    </div>
                                </form>
                                    <?php endif; ?>
                        <?php endforeach; ?>
                </div>
        </div>
    </div>
<?php include "footer.php" ?>