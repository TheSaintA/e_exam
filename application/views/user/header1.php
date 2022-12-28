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
    <nav class="navbar w3-card navbar-expand-sm w3-teal sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand top-nav" href="<?= base_url(); ?>"><img src="<?= base_url("assets/images/logo.png"); ?>" alt="Logo" class="img-fluid"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse w-auto" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('control_panel'); ?>"><i class="fa fa-tachometer"></i> Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('u/users'); ?>"><i class="fa fa-users"></i> Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa fa-users"></i> Groups</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa fa-file"></i> Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('u/settings'); ?>"><i class="fa fa-cog"></i> Settings</a>
        </li>
      </ul>
    </div>
    <button onclick="window.location.href='<?= base_url('logout'); ?>'" class="w3-btn p-2 btn-danger w3-round float-right "><span class="fa fa-power-off"></span> Logout</button>
  </div>
</nav>
<?php if ($alert = $this->session->flashdata('unsuccess')): ?>
    <div class="toast position-fixed w3-amber"  style="bottom:5%;right:3%;z-index:999" data-autohide="false">
        <div class="toast-header clearfix w3-amber ">
          <strong class="mr-auto text-warning fw-bold flex-fill text-light"><span class="fa fa fa-exclamation-triangle fa-2x"></span> Alert!</strong>
          <button type="button" class="close btn-close float-end" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body fw-bold" >
          <?= $alert; ?>
        </div>
    </div>
  <?php endif; ?>
  <?php if ($alert = $this->session->flashdata('success')): ?>
    <div class="toast position-fixed w3-teal"  style="bottom:5%;right:3%;z-index: 999 ;" data-autohide="false">
        <div class="toast-header clearfix w3-teal ">
          <strong class="mr-auto text-warning fw-bold flex-fill text-light"><span class="fa fa-check-circle fa-2x"></span> Success</strong>
          <button type="button" class="close btn-close float-end" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body fw-bold" >
          <?= $alert; ?>
        </div>
    </div>
  <?php endif; ?>
  

  <script>
    $(document).ready(function(){
      $('.toast').toast('show');
    });
  </script>
