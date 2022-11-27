<?php include 'header.php'; ?>
<div class="container">
<div class="row">
	<div class="col-lg-12 pt-lg-3 mt-lg-3">
		<ol class="breadcrumb w3-light-gray p-2 w3-rounded">
			<li class="breadcrumb-item "><a class="text-decoration-none text-dark" href="<?= base_url("u/users"); ?>"> Users</a></li>
			<li class="breadcrumb-item">Student Table</li>
			<?php foreach ($paper_details as $paper_detail): ?>
				<?php if (($_SESSION['paper_id']) == $paper_detail->id): ?>
					<li class="breadcrumb-item active "><?= $paper_detail->page_name ?></li>
				<?php else: ?>
				<?php endif; ?>
			<?php endforeach ?>
			
		</ol>
		<div class="table-responsive mt-lg-3">
			<table class="table table-hover table-dark table-striped">
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
					<td><?= ($row->block_unblock_status == 0)? "Active" : "Inactive"; ?></td>
					<td>
						<div class="btn-group">
							<?php if ($row->block_unblock_status == 0): ?>
							<a href="<?= base_url("control_panel/udpate_block_unblock_status/$row->paper_id/$row->id/1"); ?>" class="btn w3-red text-decoration-none w3-btn"><span class="fa fa-exclamation-triangle"></span> Block</a>
						<?php else: ?>	
							<a href="<?= base_url("control_panel/udpate_block_unblock_status/$row->paper_id/$row->id/0"); ?>" class="btn w3-teal text-decoration-none w3-btn"><span class="fa fa-check-circle"></span> Unblock</a>
						<?php endif; ?>
						<a href="#edit_student<?= $row->id ?>" data-bs-toggle="modal" class="btn w3-btn btn-success text-decoration-none"><span class="fa fa-edit"></span> Edit</a>
						<a href="<?= base_url("delete_student/$row->paper_id/$row->id"); ?>" class="btn w3-btn btn-danger text-decoration-none"><span class="fa fa-trash"></span> Delete</a>
						</div>
					</td>
				</tr>
				<div class="modal fade" id="edit_student<?= $row->id ?>">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							 <div class="modal-header">
			                  <h4 class="modal-title">Edit Student</h4>
			                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
								<button type="submit" class="btn btn-primary">Save changes</button>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
</div>
<?php include 'footer.php'; ?>