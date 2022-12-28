<?php include "header.php" ?>
    <div class="row mt-lg-4 ">
	    <?php include "control_div.php"; ?>
		<div class="col-lg-10 control-div">
            <?php include "alert.php" ?>
			<?php foreach ($papers as $paper): ?>
				<?php if($paper->id == $paper_id): ?>
				<h5 class="pb-2 text-spruce font-weight-bold"><span class="fa fa-users"></span> <?= $paper->page_name ?> - Result Section</h5>
				<?php endif; ?>
				<?php endforeach; ?>
            
                <hr class="mt-1 mb-3"/>

	<div class="row" style="z-index: 999 !important;">
		
		<div class="col-lg-4 p-2" style="z-index: 999 !important;">
			<div class="w3-card p-3 w3-round w3-light-grey" style="height:226px;">
				<img src="<?= base_url('assets/images/paper.png'); ?>" alt="Paper" class="img-fluid mx-auto d-block mb-3" width=40;>
				<?php foreach ($papers as $paper): ?>
				<?php if($paper->id == $paper_id): ?>
				<h4 class="text-center"><?= $paper->page_name ?></h4>
				<?php endif; ?>
				<?php endforeach; ?>
				<h2 class="text-center fw-bold"><?= count($students); ?></h2>
				<p class="text-center font-weight-bold">responses recorded</p>			
			</div>
		</div>
		<div class="col-lg-4 p-2" style="z-index: 999 !important;">
			<div class="w3-card p-3 w3-round w3-light-grey" style="height:226px;">
			<img src="<?= base_url('assets/images/excel.svg'); ?>" alt="Excel" class="img-fluid mx-auto d-block mb-3">
				<div class="mx-auto d-block text-center">
					<h4 class="" style="">Report as Excel</h4>
					<a href="<?= base_url("control_panel/excel_report/$paper_id"); ?>" class="btn spruce text-decoration-none mx-auto text-center" > <span class="fa fa-download"></span> Download</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 p-2" style="z-index: 999 !important;">
			<div class="w3-card p-3 w3-round w3-light-grey" style="height:226px;">
			<img src="<?= base_url('assets/images/pdf.png'); ?>" alt="PDF" class="img-fluid mx-auto d-block mb-3" width=40;>
			<div class="mx-auto d-block text-center">
				<h4>Report as Pdf</h4>
				<a href="<?= base_url("control_panel/pdf_report/$paper_id"); ?>" class="btn spruce text-decoration-none mx-auto text-center" ><span class="fa fa-download"></span> Download</a>
			</div>		
		</div>
		</div>	
		<!-- <div class="row w-100"> -->
			<div class="col-lg-12"> 
					
				<div class="table-responsive my-4 w3-card p-2 w-100 w3-round-large mx-auto d-block">
				<?php foreach ($papers as $paper): ?>
				<?php if($paper->id == $paper_id): ?>
				<h5	 class="fw-bold float-left">Paper : <label class="text-spruce"><?= $paper->page_name ?></label></h5>
				<h5 class="fw-bold float-right">Total Students Appeared : <label class="text-spruce"><?= count($students); ?></label></h5>
				<?php endif; ?>
				<?php endforeach; ?>
				<table class="table table-striped table-inverse w-100">
					<thead class="thead-inverse">
						<tr class="text-spruce">
							<th>Id</th>
							<th>Enrollment No</th>
							<th>Name</th>
							<th>Correct Answers</th>
							<th>Wrong Answers</th>
							<th>Percentage</th>
							<th>Report</th>
							<th>Evaluate</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody class="font-weight-bold">
							<?php if($students): $c=1; foreach($students as $student): ?>
								<tr>
								<td><?= $c++; ?></td>
								<td><?= $student->enrollment_no; ?></td>
								<td><?= $student->student_name ?></td>
								<td><?= $student->correct_answers; ?> </td>
								<td><?= $student->wrong_answers; ?></td>
								<td><?= $student->percentage; ?> %</td>
								<td><a name="" id="" class="btn spruce text-decoration-none w3-btn w3-hover-green" href="<?= base_url("control_panel/print/$paper_id/$student->student_id"); ?>" role="button"><span  class="fa fa-file-pdf text-danger"></span> Pdf</a></td>
								<td>
									<a href="<?= base_url("control_panel/analyze_score/$paper_id/$student->student_id"); ?>" class="btn text-decoration-none spruce w3-btn w3-hover-green"><span class="fa fa-file"></span> Evaluate Paper</a>
								</td>
								<td>
									<a href="<?= base_url("control_panel/delete_result_of_student/$paper_id/$student->student_id"); ?>" class="btn text-decoration-none w3-btn w3-hover-red spruce"><span class="fa fa-trash"></span> Delete</a>
								</td>
							</tr>
							<?php endforeach; else: endif;?>
							
						</tbody>
				</table>
				</div>
			<!-- </div> -->
		</div>		 
	</div>
</div>
	</div>
<?php include 'footer.php'; ?>