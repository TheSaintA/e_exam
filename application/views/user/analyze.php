<?php include 'header.php'; ?>
<div class="container">
	<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="position-absolute" style="left:0px;">
		<path fill="#00cba9" fill-opacity="1" d="M0,0L60,10.7C120,21,240,43,360,85.3C480,128,600,192,720,192C840,192,960,128,1080,85.3C1200,43,1320,21,1380,10.7L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
	</svg> -->
	<div class="row" style="z-index: 999 !important;">
		
		<div class="col-lg-4 p-2" style="z-index: 999 !important;">
			<div class="w3-card p-3 w3-round w3-light-grey" style="height:226px;">
				<img src="<?= base_url('assets/images/paper.png'); ?>" alt="Paper" class="img-fluid mx-auto d-block">
				<?php foreach ($papers as $paper): ?>
				<?php if($paper->id == $paper_id): ?>
				<h4 class="text-center"><?= $paper->page_name ?></h4>
				<?php endif; ?>
				<?php endforeach; ?>
				<h2 class="text-center fw-bold"><?= $responses; ?></h2>
				<p class="text-center fw-bold">responses recorded</p>			
			</div>
		</div>
		<div class="col-lg-4 p-2" style="z-index: 999 !important;">
			<div class="w3-card p-3 w3-round w3-light-grey" style="height:226px;">
			<img src="<?= base_url('assets/images/excel.svg'); ?>" alt="Excel" class="img-fluid mx-auto d-block">
				<div class="mx-auto d-block text-center position-relative" style="top:40px;">
					<h4 class="" style="">Report in Excel</h4>
					<a href="<?= base_url("control_panel/excel_report/$paper_id"); ?>" class="btn btn-success text-decoration-none d-block mx-auto text-center" >Download</a>
				</div>
			</div>
		</div>
		<div class="col-lg-4 p-2" style="z-index: 999 !important;">
			<div class="w3-card p-3 w3-round w3-light-grey" style="height:226px;">
			<img src="<?= base_url('assets/images/pdf.png'); ?>" alt="PDF" class="img-fluid mx-auto d-block">
			<div class="mx-auto d-block text-center position-relative" style="top:40px;">
				<h4>Report in Excel</h4>
				<a href="<?= base_url("control_panel/pdf_report/$paper_id"); ?>" class="btn btn-success text-decoration-none d-block mx-auto text-center" >Download</a>
			</div>		
		</div>
		</div>	
		<div class="row">
			<div class="col-lg-12">

				<div class="table-responsive my-4 w3-card p-2">
				<?php foreach ($papers as $paper): ?>
				<?php if($paper->id == $paper_id): ?>
				<p class="fw-bold float-start">Paper : <label class="text-success"><?= $paper->page_name ?></label></p>
				<p class="fw-bold float-end">Total Students Appeared : <label class="text-success"><?= $responses; ?></label></p>
				<?php endif; ?>
				<?php endforeach; ?>
				<table class="table table-striped table-inverse">
					<thead class="thead-inverse">
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Result</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
							<?php if($students): $c=1; foreach($students as $student): ?>
								<tr>
								<td><?= $c++; ?></td>
								<td><?= $student->name ?></td>
								<td><span class="fa fa-check-circle text-success"></span> Pass</td>
								<td>
									<a href="javascript:void(0)" class="btn text-decoration-none btn-success">Score</a>
								</td>
							</tr>
							<?php endforeach; else: endif;?>
							
						</tbody>
				</table>
				</div>
			</div>
		</div>		
	</div>
</div>
<?php include 'footer.php'; ?>