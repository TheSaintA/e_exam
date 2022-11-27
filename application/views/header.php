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
	<!-- Favicon  -->
    <link rel="icon" href="<?= base_url(); ?>assets/images/logo.png">
</head>
<body>
    
    <!-- Navigation -->
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-dark" aria-label="Main navigation">
        <div class="container">

            <!-- Image Logo -->
            <a class="navbar-brand logo-image"  href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/images/logo.png" alt="Logo of QuizO"></a> 

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text" href="<?php //base_url(); ?>">QuizO</a> -->

            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ms-auto navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php base_url(); ?>">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('home/page/privacy'); ?>">Plan</a>
                    </li>
                   <?php if($this->session->userdata('email')): ?>
                   <li class="nav-item">
                       <a class="nav-link" href="<?= base_url('control_panel'); ?>"> Control Panel</a>
                   </li>
                   <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('p/signup'); ?>">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('p/login'); ?>">Login</a>
                    </li>
                   <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Help</a>
                    </li>
                    
                </ul>
                <span class="nav-item social-icons">
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x"></i>
                        </a>
                    </span>
                </span>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->
