<?php include "header.php" ?>
<div class="container mt-lg-5">
	<div class="row w3-card">
		<div class="col-lg-12 w3-teal">
			<h3 class="text-light">Instructions</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-9 w3-card">
			<ul class="mt-3">
				<li class="py-1">All questions are compulsory.</li>
				<li class="py-1">Try to submit the paper in available time.</li>
				<li class="py-1">You are allowed to submit only once, make sure that you have correctly attempted all the questions before submission.</li>
				<li class="py-1">Make sure you clicked on submit button to successfully complete the test.</li>
				<li class="py-1">Form will be active for two hours only. For session-I 10.05AM to 12.05PM and for session-II 12.05PM to 2PM.</li>
				<li class="py-1">or any difficulties while appearing the test please contact concerned sir or supervisor of your exam.</li>
			</ul>
			<a href="<?= base_url('student/paper'); ?>" class="btn btn-success mt-lg-5 text-decoration-none mx-auto d-block position-relative" style="top:5%">
				<span class="fa fa-chevron-right"></span> 
				I have read all the instructions carefully and want to proceed for next page
			</a>
		</div>
		<div class="col-lg-3 w3-card w3-round">
			<div>
				<img src="<?= base_url('assets/images/avatar1.png') ?>" alt="Profile Photo" class="img-fluid w3-circle mx-auto w-50 w3-card d-block">
				<hr>
				<?php foreach ($student as $s): ?>
				<ul class="list-unstyled">
					<li class="my-2 fw-bold w3-card p-2">Name : <label for="" class="float-end"><?= $s->name ?></label></li>
					<li class="my-2 fw-bold w3-card p-2">Enrollment No : <label for="" class="float-end"><?= $s->enrollment_no ?></label></li>
					<li class="my-2 fw-bold w3-card p-2">Paper : <label for="" class="float-end"><?= $paper;   ?></label></li>
						
				</ul>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<?php include "footer.php" ?>