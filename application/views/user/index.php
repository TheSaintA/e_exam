
	<?php include "header.php"; ?>
		<div class="row mt-lg-4 ">
			<?php include "control_div.php"; ?>

			<div class="col-lg-10 control-div">
				<?php include "alert.php"; ?>
				<div class="w-100">
					<h5 class="pb-2 text-spruce font-weight-bold"><span class="fa fa-home"></span> Dashboard</h5>
					<hr class="my-0"/>
					<div class="row  pb-2">
						
						<div class="col-lg-4 my-2">
								<a href="javascript:(void)" class="text-decoration-none w-100 w3-round-large p-2 spruce w3-btn">
									<div class="float-left pl-5"><span class="fa fa-file w3-text-teal fa-4x ml-5 mt-2"></span></div>
									<div class="float-right pr-3 pb-1 w3-left-align">
										<p class="fa-2x m-0 p-0 "><?= $count_response; ?></p><p class="p-0 m-0 font-weight-bold">Responses</p>
									</div>	
								</a>
						</div>

						<div class="col-lg-4 my-2">
								<a href="javascript:(void)" class="text-decoration-none w-100 w3-round-large p-2 spruce w3-btn">
									<div class="float-left pl-5"><span class="fa fa-align-justify w3-text-red fa-4x ml-5 mt-2"></span></div>
									<div class="float-right pr-3 pb-1 w3-left-align">
										<p class="fa-2x m-0 p-0"><?= count($papers); ?></p><p class="p-0 m-0 font-weight-bold ">Subjects</p>
									</div>	
								</a>
						</div>

						<div class="col-lg-4 my-2">
								<a href="javascript:(void)" class="text-decoration-none w-100 w3-round-large p-2 spruce w3-btn">
									<div class="float-left pl-5"><span class="fa fa-users w3-text-cyan fa-4x ml-5 mt-2"></span></div>
									<div class="float-right pr-3 pb-1 w3-left-align">
										<p class="fa-2x m-0 p-0 "><?= $count_students; ?></p><p class="p-0 m-0 font-weight-bold">Students</p>
									</div>	
								</a>
						</div>

						<div class="col-lg-4 my-2">
								<a href="javascript:(void)" class="text-decoration-none w-100 w3-round-large p-2 spruce w3-btn">
									<div class="float-left pl-5"><span class="fa fa-book w3-text-lime fa-4x ml-5 mt-2"></span></div>
									<div class="float-right pr-3 pb-1 w3-left-align">
										<p class="fa-2x m-0 p-0 "><?= count($papers); ?></p><p class="p-0 m-0 font-weight-bold">Examinations</p>
									</div>	
								</a>
						</div>

						<div class="col-lg-4 my-2">
								<a href="javascript:(void)" class="text-decoration-none w-100 w3-round-large p-2 spruce w3-btn">
									<div class="float-left pl-5"><span class="fa fa-file w3-text-green fa-4x ml-5 mt-2"></span></div>
									<div class="float-right pr-3 pb-1 w3-left-align">
										<p class="fa-2x m-0 p-0 "><?= $count_live_papers; ?></p><p class="p-0 m-0 font-weight-bold">Live Papers</p>
									</div>	
								</a>
						</div>

						<div class="col-lg-4 my-2">
								<a href="javascript:(void)" class="text-decoration-none w-100 w3-round-large p-2 spruce w3-btn">
									<div class="float-left pl-5"><span class="fa fa-bell w3-text-red fa-4x ml-5 mt-2"></span></div>
									<div class="float-right pr-3 pb-1 w3-left-align">
										<p class="fa-2x m-0 p-0 "><?= $notices; ?></p><p class="p-0 m-0 font-weight-bold">Notices</p>
									</div>	
								</a>
						</div>
						
					</div>
					<hr class="my-0"/>
					<div class="row">
						<div class="col-lg-12 my-2 ">
							<div class="table-responsive w3-round-large w3-card p-2">
							<form class="w-25">
								<div class="input-group my-1">
									<div class="input-group-prepend">
										<span class="input-group-text border-0 spruce" id="basic-addon1">Search</span>
									</div>
									<input type="text" class="form-control spruce" style="width:5px !important;" placeholder="Search here..." aria-label="entries" aria-describedby="basic-addon1">
									
								</div>
							</form>
							<table class="table table-hover border w3-table-all">
								<thead class="text-spruce">
								<tr>
									<th>#</th>
									<th>Exam</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								<?php //if($papers): ?>
									<?php  if(count($getRows)): $count = $this->uri->segment(2); foreach ($getRows as $row): ?>
								<tr class="font-weight-bold">
									<td><?= ++$count; ?></td>
									<td ><?= $row->page_name ?></td>
									<td><?= date('d-m-Y', $row->start_date); ?> 
										at <?= date('h:m a', $row->start_time); ?>
										</td>
									<td><?= date('d-m-Y', $row->end_date); ?>
										at <?= 
		                                date('h:m a', $row->end_time); ?>
								</td>
									
									<td>
										<?php if($row->set_unset == 1): ?>
											<label class='badge badge-success p-2'>Active</label>
										<?php else: ?>
											<label class='badge badge-danger p-2'>Inactive</label>
										<?php endif; ?>
										</td>
									<td>
									<form method="post" id="form_submit" action="javascript:(void)">
									<?php if($row->set_unset == 1): ?>
										<a class="btn btn-danger text-decoration-none" href="<?= base_url("control_panel/paper_status/$row->id/0"); ?>">
											<span class="fa fa-info-circle"></span>
											Deactivate
										</a>
									<?php else: ?>
										<a class="btn btn-success text-decoration-none" href="<?= base_url("control_panel/paper_status/$row->id/1"); ?>">
										<span class="fa fa-info-circle"></span>
											Activate
										</a>
									<?php endif; ?>
									</form>
										
									</td>
								</tr>
								<?php endforeach; ?>
								<?php else: ?>
									<?php endif; ?>
								</tbody>
							</table>
							<ul class="pagination float-right">
									<?= $this->pagination->create_links(); ?>
							<!-- <li class="page-item"><a class="page-link w3-light-grey w3-btn w3-round-large" href="#">Previous</a></li>
								<li class="page-item"><a class="page-link w3-light-grey w3-btn w3-round-large" href="#">1</a></li>
								<li class="page-item"><a class="page-link w3-light-grey w3-btn w3-round-large" href="#">Next</a></li> -->
							</ul>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>	
<?php include "footer.php" ?>