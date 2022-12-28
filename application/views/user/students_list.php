<?php include "header.php" ?>
    <div class="row mt-lg-4 ">
	    <?php include "control_div.php"; ?>
		<div class="col-lg-10 control-div">
            <?php include "alert.php" ?>
            <h5 class="pb-2 text-spruce font-weight-bold"><span class="fa fa-users"></span> Students of 
			<?php foreach ($paper_details as $subject) {
	            echo $subject->page_name; } ?>
		</h5>
        <hr class="mt-1 mb-3"/>
		<!-- Button trigger modal -->
		<button type="button" class="btn spruce" data-toggle="modal" data-target="#add_user">
		  <span class="fa fa-user-plus"></span>
		  Add Student
		</button>
		<button type="button" class="btn spruce" data-toggle="modal" data-target="#add_in_bulk">
		  <span class="fas fa-file-csv"></span>
		 Upload CSV
		</button>
		<!-- Modal -->
		<div class="modal fade" id="add_in_bulk" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="modal-header">
								<h5 class="modal-title"><span class="fa fa-csv-icon"></span> Add Students in Bulk</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
							</div>
					<form enctype="multipart/form-data" action="<?= base_url("control_panel/import/students") ?>" method="post">
					<div class="modal-body">
								<div class="modal-body">
								<p class="text-danger"><span class="fa fa-info-circle"></span> Imported file header should be in following format</p>
								<p class="text-info">Remember: <code>block_unblock_status</code> has default value 0</p>
								<p class="text-info">Remember: <code>paper_id</code> of this paper is <label class="badge badge-success"><?= $subject->id ?></label></p>
								<div class="table-responsive w-100">
                  <table class="table table-small table-striped table-inverse">
                    <thead class="border">
                      <tr class="border">
                        <th class="border">name</th>
                        <th class="border">enrollment_no</th>
                        <th class="border">paper_id</th>
                        <th class="border">block_unblock_status</th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="border"></td>
                          <td class="border"></td>
                          <td class="border"></td>
                          <td class="border"></td>
                        </tr>
                      </tbody>
                  </table>
                  </div>
                  <div class="form-group">
                    <label for="">Import CSV File</label>
                    <input type="file" name="file"/>
                  </div>
								</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn spruce w3-btn"><span class="fas fa-file-csv"></span> Upload CSV</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
					</div>
			</form>
				</div>
			</div>
		</div>
		
		<script>
			$('#exampleModal').on('show.bs.modal', event => {
				var button = $(event.relatedTarget);
				var modal = $(this);
				// Use above variables to manipulate the DOM
				
			});
		</script>
		<div class="modal fade" id="add_user">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								 <div class="modal-header">
				                  <h4 class="modal-title">Add Student to <?= $subject->page_name; ?></h4>
				                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
				                </div>
				                <form action="<?= base_url('control_panel/add_student'); ?>" method="post">
				                	<?= form_hidden('paper_id',$subject->id); ?>
								<div class="modal-body">
									<div class="form-group">
										<input type="text" name="name" class="form-control" placeholder="Student name..." required>
									</div>
									<div class="form-group">
										<input type="text" name="enrollment_no" class="form-control" placeholder="Student Enrollment No..." required>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn w3-btn spruce"><span class="fa fa-user-plus"></span> Add Student</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
								</div>
								</form>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
		<div class="table-responsive mt-3 p-2 w3-card w3-round-large">
			<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Enrollment No</th>
					<th>Password</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if(count($getRows)): $count = $this->uri->segment(4); foreach ($getRows as $row): ?>
				<tr>
					<td><?= ++$count; ?></td>
					<td><?= $row->name; ?></td>
					<td><?= $row->enrollment_no; ?></td>
					<td><?= $this->encryption->decrypt($row->password); ?></td>
					<td><?= ($row->block_unblock_status == 0)? "<label class='badge badge-success'>Active</label>" : "<label class='badge badge-warning'>Inactive</label>"; ?></td>
					<td>
						<div class="btn-group">
							<?php if ($row->block_unblock_status == 0): ?>
							<a href="<?= base_url("control_panel/udpate_block_unblock_status/show_users/$row->paper_id/$row->id/1"); ?>" class="btn w3-btn mx-1 spruce w3-hover-red w3-round-large text-decoration-none w3-btn"><span class="fa fa-exclamation-triangle"></span> Block</a>
						<?php else: ?>	
							<a href="<?= base_url("control_panel/udpate_block_unblock_status/show_users/$row->paper_id/$row->id/0"); ?>" class="btn w3-btn mx-1 spruce w3-round-large w3-hover-teal text-decoration-none w3-btn"><span class="fa fa-check-circle"></span> Unblock</a>
						<?php endif; ?>
						<a href="#edit_student<?= $row->id ?>" data-toggle="modal" class="btn w3-btn spruce w3-hover-teal w3-round-large text-decoration-none mx-1"><span class="fa fa-edit"></span> Edit</a>
						<a href="<?= base_url("delete_student/$row->paper_id/$row->id"); ?>" class="btn w3-btn spruce w3-round-large w3-hover-yellow text-decoration-none mx-1"><span class="fa fa-trash"></span> Delete</a>
						</div>
					</td>
				</tr>
				<div class="modal fade" id="edit_student<?= $row->id ?>">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							 <div class="modal-header">
			                  <h4 class="modal-title">Edit Student</h4>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
			                </div>
			                <form action="<?= base_url('control_panel/update_student'); ?>" method="post">
			                	<?= form_hidden('id',$row->id) ?>
			                	<?= form_hidden('paper_id',$row->paper_id) ?>
							<div class="modal-body">
								<div class="form-group row">
									<div class="col">
										<label for="">Name</label>
										<input type="text" name="name" placeholder="Name" class="form-control" value="<?= set_value('name',$row->name) ?>" required>
									</div>
									<div class="col">
										<label for="">Enrollment No</label>
										<input type="text" name="enrollment_no" placeholder="Enrollment No" class="form-control" value="<?= set_value('enrollment_no',$row->enrollment_no) ?>" required>
									</div>
								</div>
								<div class="form-group">
									<label for="">Password</label>
									<input type="text" name="password" placeholder="Password" class="form-control" value="<?= set_value('name',$this->encryption->decrypt($row->password)) ?>" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn spruce w3-btn"><span class="fa fa-save"></span> Save changes</button>
								<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span class="fa fa-times"></span> Close</button>
							</div>
						</form>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
				<?php endforeach; endif;	?>	
			</tbody>
		</table>
		<div class="pagination">
			<?= $this->pagination->create_links(); ?>
		</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>