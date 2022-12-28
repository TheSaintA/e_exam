<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/w3.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/imagehover/css/imagehover.css') ?>">
	<!-- jQuery library -->
	<script src="<?= base_url('assets/js/jquery4.slim.min.js'); ?>"></script>
	<!-- Popper JS -->
	<script src="<?= base_url('assets/js/popper4.min.js'); ?>"></script>
	<!-- Latest compiled JavaScript -->
	<script src="<?= base_url('assets/js/bootstrap4.bundle.min.js'); ?>"></script>
	<link rel="stylesheet" href="<?= base_url('assets/css/fontawesome-all.min.css') ?>">
	<title>Quizo : Homepage</title>
	<link rel="icon" href="<?= base_url("assets/images/logo.png"); ?>">
	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body >
<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 mt-xl-2 clearfix">
			<div class="float-left">
				<a href="<?= base_url(); ?>" class="text-decoration-none ml-xl-1"><img src="<?= base_url("assets/images/logo_spruce.png"); ?>" alt="Logo" class="img-fluid w3-text-navy-peony" style="width:30%;"></a>
				<a href="javascript:(void)" id="bars" class="text-decoration-none w3-btn text-spruce w3-round-large"><span class="fa fa-bars fa-2x"></span></a>	
			</div>
				<div class="float-right">
				<button class="btn w3-btn spruce w3-hover-teal" onCLick="window.location.href='<?= base_url("control_panel/u/profile"); ?>'"><span class="fa fa-user"></span> Profile</button>
				<button class="btn w3-btn btn-danger" onClick="window.location.href='<?= base_url("logout"); ?>'"><span class="fa fa-lock"></span> Logout</button>
				</div>
			</div>
		</div>