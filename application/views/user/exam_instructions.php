<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Paper : Dashboard</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/w3.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/imagehover/css/imagehover.css') ?>">
	<!-- jQuery library -->
	<script src="<?= base_url('assets/js/jquery4.slim.min.js'); ?>"></script>
	<!-- Popper JS -->
	<script src="<?= base_url('assets/js/popper4.min.js'); ?>"></script>
	<!-- Latest compiled JavaScript -->
	<script src="<?= base_url('assets/js/bootstrap4.bundle.min.js'); ?>"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
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
			<a href="<?= base_url('student/paper/exam'); ?>" class="btn btn-success mt-lg-2 text-decoration-none mx-auto d-block position-relative" style="top:5%">
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
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="<?= base_url(); ?>assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="<?= base_url(); ?>assets/js/purecounter.min.js"></script> <!-- Purecounter counter for statistics numbers -->
    <script src="<?= base_url(); ?>assets/js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>