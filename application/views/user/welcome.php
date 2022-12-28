<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="This is a online exam conducted app for students at college level and university level.">
    <meta name="author" content="Wani">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Quizo -- Online Exam Application</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/swiper.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/styles.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/w3.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- Favicon  -->
    <link rel="icon" href="<?= base_url(); ?>assets/images/logo.png">
</head>

<body>

<body class="w3-pale-green">
<div class="container">
	<div class="row  w3-card mx-auto w3-round-xlarge p-4 w3-white box" style="margin-top: 10%;">
		<div class="col-lg-12">
			<h3 class="text-center">What type of quiz would you like to create?</h3>
		</div>

		<div class="col-12 col-md-6 p-2">
			<div class="border w3-card rounded-3 border-secondary w-75 p-2 mx-auto d-block">
				<img src="<?= base_url('assets/images/classic-quiz-select.png'); ?>" alt="Classic Quiz" class="img-fluid">
				<p class="text-center p-small">Create any type of quiz, test or exam for learners to take independently during a set time frame</p>
				<button onclick="window.location.href='<?= base_url('control_panel'); ?>'" class="btn btn-primary mx-auto d-block">   Classic Quiz</button>
			</div>
		</div>
		<div class="col-12 col-md-6 p-2">
			<div class="border w3-card rounded-3 border-secondary w-75 p-2 mx-auto d-block">
				<img src="<?= base_url('assets/images/live-event-select.png'); ?>" alt="Live Event Quiz" class="img-fluid">
				<p class="text-center p-small">Create any type of quiz, test or exam for learners to take independently during a set time frame</p>
				<button class="btn btn-primary mx-auto d-block">Upload Exam Paper</button>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>