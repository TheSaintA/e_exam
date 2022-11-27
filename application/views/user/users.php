<?php include 'header.php'; ?>

<div class="container">
	
	<div class="row mt-lg-5">

		<?php if (isset($_SESSION['paper_id'])): ?>
		<h3 class="text-center fw-bold">Add Students for paper 
				<?php foreach ($papers_of_user as $paper): ?>
					<?php if (($paper->id) == $_SESSION['paper_id']): ?>
						<?php echo $paper->page_name; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</h3>
		<?php else: ?>
		<h3 class="text-center fw-bold">Choose Paper to add students</h3>	
		<?php endif; ?>
		<ol class="breadcrumb w3-light-gray p-2 w3-rounded">
			<li class="breadcrumb-item "><a href="<?= base_url("control_panel"); ?>"> Dashboard</a></li>
			<li class="breadcrumb-item active ">Users</li>
		</ol>
			<hr/>
		<div class="col-lg-3 mt-lg-5">
			<h5 class="fw-bold text-center">Choose Paper</h5>
			<ul class="list-unstyled w3-card">
				<?php foreach ($papers_of_user as $paper): ?>
					<li class=" w-100 border w3-round text-left">
						<a href="<?= base_url("control_panel/getUsers/?paper_id=$paper->id"); ?>" class="left p-3 text-decoration-none fw-bold w3-text-teal w3-btn w-100">
							<span class="fa fa-file"></span>
							<?= $paper->page_name ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if (isset($_SESSION['paper_id'])): ?>
			<h5 class="fw-bold text-center">Registered Students</h5>
			<ul class="list-unstyled w3-card">
				<li class="p-2 w3-btn w-100 p-3 border w3-round ">
					<a href="<?= base_url("control_panel/show_users/".$_SESSION['paper_id']); ?>"  class="text-decoration-none fw-bold w3-text-teal"><span class="fa fa-users"></span> Get Students</a>
				</li>
			</ul>
		<?php else: ?>
			<?php endif; ?>
			
		</div>
		<div class="col-lg-9">
	<?php if (!isset($_SESSION['paper_id'])): ?>
		<div class="col">
			<img src="<?= base_url('assets/images/geometry.png'); ?>" alt="Image" class="img-fluid mx-auto d-block w-50">
				
		</div>
	<?php else: ?>
		<div class="col mt-lg-5">
			
			<div class="row">
				<div class="col-lg-6 col-lg-offset-4">
					<a href="#add_user" data-bs-toggle="modal" class="text-decoration-none">
					<div class="py-5 w3-round w3-card w3-teal w3-btn w-100">
						<label class="mx-auto d-block text-center"><span class="fa fa-user-plus fa-4x"></span></label><br/>
						<p class="fw-bold text-center w3-text-white">Add Users Individually</p>
						<h3 class="fw-bold text-center w3-text-white"> Click Here</h3>
					</div>
					</a>
					<div class="modal fade" id="add_user">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								 <div class="modal-header">
				                  <h4 class="modal-title">Add Respondent</h4>
				                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				                </div>
				                <form action="<?= base_url('control_panel/add_student'); ?>" method="post">
				                	<?= form_hidden('paper_id',$_SESSION['paper_id']); ?>
								<div class="modal-body">
									<div class="form-group">
										<input type="text" name="name" class="form-control" placeholder="Student name..." required>
									</div>
									<div class="form-group">
										<input type="text" name="enrollment_no" class="form-control" placeholder="Student Enrollment No..." required>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary"><span class="fa fa-user-plus"></span> Add Student</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</form>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
				</div>
				<div class="col-lg-6">
					<a href="#add_users" data-bs-toggle="modal" class="text-decoration-none">
					<div class="py-5 w3-round w3-card w3-teal w3-btn w-100">
						<label class="mx-auto d-block text-center"><span class="fa fa-users fa-4x"></span></label><br/>
						<p class="fw-bold text-center w3-text-white">Add Users By Group</p>
						<h3 class="fw-bold text-center w3-text-white"> Click Here</h3>
					</div>
					</a>
					<div class="modal fade" id="add_users">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								 <div class="modal-header">
				                  <h4 class="modal-title">Add Respondants</h4>
				                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				                </div>
				                <form action="<?= base_url('control_panel/group/'); ?>" method="get">
								<div class="modal-body">
									<div class="form-group">
										<input type="number" name="of" class="form-control" placeholder="Number of Students" required>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary"><span class="fa fa-users"></span> Submit</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</form>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
	</div>
</div>

<?php include 'footer.php'; ?>