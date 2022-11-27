<?php include 'header.php'; ?>

<body class="w3-pale-green">
<div class="container">
	<div class="row  w3-card mx-auto w3-round-xlarge p-4 w3-white box" style="margin-top: 10%;">
		<div class="col-lg-12">
			<h3 class="text-center">What type of quiz would you like to create?</h3>
		</div>

		<div class="col-12 col-md-6 p-2">
			<div class="border border-dark rounded w-75 p-2 mx-auto d-block">
				<img src="<?= base_url('assets/images/classic-quiz-select.png'); ?>" alt="Classic Quiz" class="img-fluid">
				<p class="text-center p-small">Create any type of quiz, test or exam for learners to take independently during a set time frame</p>
				<button onclick="window.location.href='<?= base_url('control_panel'); ?>'" class="btn btn-primary mx-auto d-block">   Classic Quiz</button>
			</div>
		</div>
		<div class="col-12 col-md-6 p-2">
			<div class="border border-dark rounded w-75 p-2 mx-auto d-block">
				<img src="<?= base_url('assets/images/live-event-select.png'); ?>" alt="Live Event Quiz" class="img-fluid">
				<p class="text-center p-small">Create any type of quiz, test or exam for learners to take independently during a set time frame</p>
				<button class="btn btn-primary mx-auto d-block">Upload Exam Paper</button>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>