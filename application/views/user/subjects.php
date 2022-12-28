<?php include "header.php" ?>
    <div class="row mt-lg-4 ">
	    <?php include "control_div.php"; ?>
		<div class="col-lg-10 control-div">
            <?php include "alert.php" ?>
            <h5 class="pb-2 text-spruce font-weight-bold"><span class="fa fa-list"></span> Subjects</h5>
                <hr class="mt-1 mb-3"/>
        <div class="p-2 w3-card w3-round-large w-100">
            <button class="btn spruce my-1" data-toggle="modal" data-target="#add_subject"><span class="fa fa-file"></span> Add Subject</button>  
            <!-- Modal -->
            <div class="modal fade" id="add_subject" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Subject</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form action="<?= base_url("control_panel/create_paper"); ?>" method="post">
                        <?= form_hidden("create_date",time()); ?>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label for="">Subject Name</label>
                                    <input type="text" name="page_name" placeholder="Subject Name..." class="form-control" required/>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="">Semester</label>
                                    <select class="form-control" name="semester_class" id="" placeholder="Semester" required>
                                        <option value="1">1st Semester</option>
                                        <option value="2">2nd Semester</option>
                                        <option value="3">3rd Semester</option>
                                        <option value="4">4th Semester</option>
                                        <option value="5">5th Semester</option>
                                        <option value="6">6th Semester</option>
                                        <option value="7">7th Semester</option>
                                        <option value="8">8th Semester</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 form-group">
                                      <label for="">Description</label>
                                      <textarea class="form-control" name="" id="" rows="3" name="description"></textarea>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="">Start Date</label>
                                    <input type="date" name="start_date" placeholder="Start Date" class="form-control" required/>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="">End Date</label>
                                    <input type="date" name="end_date" placeholder="End Date" class="form-control" required/>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="">Start Time</label>
                                    <input type="time" name="start_time" placeholder="Start Time" class="form-control" required/>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="">End Time</label>
                                    <input type="time" name="end_time" placeholder="End Time" class="form-control" required/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn spruce">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <table class="table table-hover border w3-round-large w3-table-all font-weight-bold">
			<thead class="text-spruce">
				<tr>
					<th>#</th>
					<th>Subject</th>
                    <th>Description</th>
					<th>Students Enrolled</th>
					<th>Total Response</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody >
                <?php if($subjects): $count = 1; foreach($subjects as $subject): ?>
                <tr>
                    <td><?= $count++; ?></td>
                    <td><?= $subject->page_name; ?></td>
                    <td><?= $subject->description; ?></td>
                    <td>
                    <?php 
                    $no = 0; foreach ($students_enrolled as $student) {
                    if ($student->paper_id == $subject->id) {
                        $no = $no + 1;
                        }
                    }
                    echo $no; 
                    ?>
                            
                    </td>
                    <td>
                    <?php 
                    $noo = 0; foreach ($total_responses as $response) {
                    if ($response->paper_id == $subject->id) {
                        $noo = $noo + 1;
                        }
                    }
                    echo $noo; 
                    ?> 
                    </td>
                    <td>
                    <?php if($subject->set_unset == 1): ?>
											<label class='badge badge-success p-2'>Active</label>
										<?php else: ?>
											<label class='badge badge-danger p-2'>Inactive</label>
										<?php endif; ?>
                    </td>
                    <td>
                        <button class="btn spruce" data-toggle="modal" data-target="#edit<?= $subject->id ?>"><span class="fa fa-edit"></span> Edit</button>
                        <button class="btn btn-danger" onClick="window.location.href='<?= base_url("control_panel/delete_paper/$subject->id"); ?>'"><span class="fa fa-trash"></span> Delete</button>
                    </td>
                </tr>
                <!-- Modal -->
            <div class="modal fade" id="edit<?= $subject->id ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Subject</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form action="<?= base_url("control_panel/edit_paper"); ?>" method="post">
                        <?= form_hidden("id",$subject->id); ?>
                        <?= form_hidden("create_date",time()); ?>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label for="">Subject Name</label>
                                    <input type="text" name="page_name" placeholder="Subject Name..." value="<?= $subject->page_name ?>" class="form-control" required/>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="">Semester</label>
                                    <select class="form-control" name="semester_class" value="<?= $subject->semester_class ?>" id="" placeholder="Semester" required>
                                        <option value="1">1st Semester</option>
                                        <option value="2">2nd Semester</option>
                                        <option value="3">3rd Semester</option>
                                        <option value="4">4th Semester</option>
                                        <option value="5">5th Semester</option>
                                        <option value="6">6th Semester</option>
                                        <option value="7">7th Semester</option>
                                        <option value="8">8th Semester</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 form-group">
                                      <label for="">Description</label>
                                      <textarea class="form-control" id="" rows="3" name="description"><?= $subject->description ?></textarea>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="">Start Date</label>
                                    <input type="date" name="start_date" value="<?= date('Y-m-d', $subject->start_date); ?>" placeholder="Start Date" class="form-control" required/>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="">End Date</label>
                                    <input type="date" name="end_date" value="<?= date('Y-m-d', $subject->end_date); ?>" placeholder="End Date" class="form-control" required/>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="">Start Time</label>
                                    <input type="time" name="start_time" value="<?= date('h:i', $subject->start_time); ?>" placeholder="Start Time" class="form-control" required/>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="">End Time</label>
                                    <input type="time" name="end_time" value="<?= date('h:i', $subject->end_time); ?>" placeholder="End Time" class="form-control" required/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn spruce"><span class="fa fa-save"></span> Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
                <?php endforeach; else: endif; ?>
            </tbody>
        </table>
        </div>
        </div>
    </div>

<?php include "footer.php" ?>