<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Latest compiled and minified CSS -->
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
	<title>Quizo :: Homepage</title>
	<link rel="icon" href="<?= base_url("assets/images/logo.png"); ?>">
	 <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    max-height: 300px;
  }
  nav{
  	height: 70px;
  }
  [class^='imghvr-'],[class*=' imghvr-'] {
  	background-color: #bbbbbb !important;
  }
  .green{
  	background-color: #05a660 !important;
  	color: #fff !important;
  }
  </style>
</head>
<body>
	<div class="container-fluid mb-0">
		<div class="row w3-light-grey">
			<div class="col-lg-12">
				<div class="clearfix p-2">
					<div class="float-left">
						<p>Call Us Today! <a href="tel:+919622765774" class="text-decoration-none ">+91-9622765774</a> | <a href="mailto:info@qiuzo.in" class="text-decoration-none ">info@quizo.in</a></p>
					</div>
					<div class="float-right">
						<div class="btn-group">
							<a href="#" class="button"><span class="fa mr-1 fa-facebook-square fa-2x text-primary"></span></a>
							<a href="#"><span class="fa mr-1 fa-twitter-square fa-2x w3-text-cyan"></span></a>
							<a href="#"><span class="fa mr-1 fa-linkedin-square fa-2x w3-text-blue"></span></a>
							<a href="#"><span class="fa mr-1 fa-instagram text-danger fa-2x"></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-sm green w3-card text-light sticky-top mt-0">
	  <a class="navbar-brand" href="#"><img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" class="img-fluid w-50"></a>
	  <ul class="navbar-nav ml-auto mt-0">
	    <li class="nav-item">
	      <a class="nav-link active font-weight-bold" href="#"><span class="fa fa-home"></span> Home</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link font-weight-bold" href="#"><span class="fa fa-list"></span> Features</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link font-weight-bold" href="#"><span class="fa fa-rupee"></span> Plan</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link font-weight-bold" href="#"><span class="fa fa-user-plus"></span> Signup</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link font-weight-bold" href="#"><span class="fa fa-user"></span> Login</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link font-weight-bold" href="#"><span class="fa fa-info"></span> Help</a>
	    </li>
	  </ul>
	</nav>
	<div class="container-fluid px-0">
		<div class="row px-0">
			<div class="col px-0">
				<div id="demo" class="carousel slide" data-ride="carousel">
				  <ul class="carousel-indicators">
				    <li data-target="#demo" data-slide-to="0" class="active"></li>
				    <li data-target="#demo" data-slide-to="1"></li>
				    <li data-target="#demo" data-slide-to="2"></li>
				  </ul>
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img src="<?= base_url(); ?>/assets/images/la.jpg" alt="Los Angeles" width="1100" height="500">
				      <div class="carousel-caption">
				        <h3>Los Angeles</h3>
				        <p>We had such a great time in LA!</p>
				      </div>   
				    </div>
				    <div class="carousel-item">
				      <img src="<?= base_url(); ?>/assets/images/chicago.jpg" alt="Chicago" width="1100" height="500">
				      <div class="carousel-caption">
				        <h3>Chicago</h3>
				        <p>Thank you, Chicago!</p>
				      </div>   
				    </div>
				    <div class="carousel-item">
				      <img src="<?= base_url(); ?>/assets/images/ny.jpg" alt="New York" width="1100" height="500">
				      <div class="carousel-caption">
				        <h3>New York</h3>
				        <p>We love the Big Apple!</p>
				      </div>   
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#demo" data-slide="prev">
				    <span class="carousel-control-prev-icon"></span>
				  </a>
				  <a class="carousel-control-next" href="#demo" data-slide="next">
				    <span class="carousel-control-next-icon"></span>
				  </a>
				</div>
			</div>
		</div>
	</div>
	<div class="container mt-4">
		<div class="row">
			<div class="col-lg-6">
				<h3 class="w3-text-grey">Overview of Our Quizo App</h3>
				<hr/>
				<p class="text-justify">Quzio is a powerful web-based online exam software to give/take online exams in the real and proficient environment with a similar test interface. The SAAS-based Online computer test software is accessible from anywhere at any time.</p>
				<p class="text-justify">Quizo is a straightforward online exam software that automates the entire examination process for schools, colleges, universities, coaching institutes, employers, cooperates, and certification providers for quick and precise exams.</p>
				<p class="text-justify">Quzio is an online examination system; the administrator/ teachers can create, schedule, and analyze online exams, quizzes, and recruitment tests at any point in time. An exam administrator has full freedom to create an online education or online exams for practice at any point in time.</p>
			</div>
			<div class="col-lg-6 pt-lg-5">
				<figure class="imghvr-shutter-in-horiz">	
				<img src="<?= base_url('assets/images/overview.jpg') ?>" alt="Overview Image of Quizo App" class="img-fluid w3-round w3-card ">
				<figcaption class="bg-light">
				    <img src="<?= base_url('assets/images/overview.jpg') ?>" alt="Overview Image of Quizo App" class="img-fluid w3-round w3-card ih-fade-down ih-delay-sm">
				  </figcaption>
				</figure>
			</div>
		</div>
		<hr/>
		<div class="row mt-lg-4">
			<div class="col-lg-6">
				<figure class="imghvr-shutter-in-horiz">	
				<img src="<?= base_url('assets/images/create_exams.jpg') ?>" alt="Create exams of Quizo App" class="img-fluid w3-round w3-card ">
				<figcaption class="bg-light">
				    <img src="<?= base_url('assets/images/create_exams.jpg') ?>" alt="Create exams of Quizo App" class="img-fluid w3-round w3-card ih-fade-down ih-delay-sm">
				  </figcaption>
				</figure>
			</div>
			<div class="col-lg-6">
				<h3 class="w3-text-grey">Create Exams</h3>
				<hr/>
				<p class="text-justify">Create unlimited tests/exams in different formats with our online exam software. The administrator of online exam software can create a test by selecting the questions from the question bank.</p>
				<p class="text-justify">Once the test is ready, it can be scheduled at a defined date and time to make it active. It is effortless to add/import different types of questions from pdf, word, and excel through the best online exam software.</p>
				<p class="text-justify">Our online exam website supports various exam formats like multiple choices, multiple choices with multiple answers, fill in the blanks, true & false, essay, matrix match, match the following, etc.</p>
				<p class="text-justify">One can also get study material in different formats like images, tutorial videos, etc. Questions can be added under different subjects, lessons, and sub lessons; also, random/shuffle questions are also available in test settings. ConductExam also supports questions in multiple languages, and one can take a test in their regional language also.</p>
			</div>
		</div>
		<hr/>
		<div class="row mt-lg-4">
			<div class="col-lg-6">
				<figure class="imghvr-shutter-in-horiz">	
				<img src="<?= base_url('assets/images/schedule_exams.jpg') ?>" alt="Create exams of Quizo App" class="img-fluid w3-round w3-card ">
				<figcaption class="bg-light">
				    <img src="<?= base_url('assets/images/schedule_exams.jpg') ?>" alt="Create exams of Quizo App" class="img-fluid w3-round w3-card ih-fade-down ih-delay-sm">
				  </figcaption>
				</figure>
			</div>
			<div class="col-lg-6">
				<h3 class="w3-text-grey">Share/Schedule Exams</h3>
				<hr/>
				<p class="text-justify">Once the test is ready, you can schedule a defined date and time for registered users and students. The user can log in in the test with their login id and password. The administrator can add/import users under different batches/courses; the standard also sends email/SMS notification for the account creation, forgot password, etc.</p>
				<p class="text-justify">Easily eradicate the chances of cheating with online remote proctoring and face detection. Get auto, live, and ID authentication to quickly verify the student giving the examination. One can also sell question bank and test series online by integrating it with a third party secured online payment gateway. One can also get detailed reports for the number of test series sold online.</p>
			</div>
		</div>
		<hr/>
		<div class="row mt-lg-4">
			<div class="col-lg-6">
				<h3 class="w3-text-grey">Analyze Exams</h3>
				<hr/>
				<p class="text-justify">Easily view/export different types of reports for the conducted online test or exams and analyze each user/students’ performance. Get a detailed analytic for the examination conducted, online test series sold, a student registered, etc.</p>
				<p class="text-justify">Students can compare their performance through various reports like test analysis; the time has taken on each question/topic/section, comparison with topper, question wise solution & explanation, etc. Also, one can check the attempted, left, right, wrong questions, and determine their strengths and weak performance areas.</p>
			</div>
			<div class="col-lg-6">
				<figure class="imghvr-shutter-in-horiz">	
				<img src="<?= base_url('assets/images/analyze_exams.jpg') ?>" alt="Create exams of Quizo App" class="img-fluid w3-round w3-card ">
				<figcaption class="bg-light">
				    <img src="<?= base_url('assets/images/analyze_exams.jpg') ?>" alt="Create exams of Quizo App" class="img-fluid w3-round w3-card ih-fade-down ih-delay-sm">
				  </figcaption>
				</figure>
			</div>
		</div>
		<hr/>
		<div class="row mt-lg-4">
			<div class="col-lg-12">
				<h2 class="w3-text-grey">Important Features :</h2>
				<div class="row">
					<div class="col-lg-12">
						<h4 >1. Question Bank Management</h4>
					</div>
					<div class="col">
						<ul class="list-unstyled">
							<li class="my-2"><span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> Supports various question types

</li>
							<li class="my-2"><span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> Single choice (Partial Mark Support)</li>
							<li class="my-2"><span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> Multiple choices (Partial Mark Support)</li>
						</ul>
					</div>
					<div class="col">
						<ul class="list-unstyled">
							<li class="my-2"><span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> True & False

</li>
							<li class="my-2"><span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> Matrix Match (Partial Mark Support)</li>
							<li class="my-2"><span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> Match the following</li>
						</ul>
					</div>
					<div class="col">
						<ul class="list-unstyled">
							<li class="my-2"><span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> Fill in the blanks (Support range answer)

</li>
							<li class="my-2">
								<span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> 
								Descriptive (Text, attachment & URL based test)</li>
						</ul>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<h4 >2. Test/Exam Management</h4>
					</div>
					<div class="col">
						<ul class="list-unstyled">
							<li class="my-2"><span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> Supports various question types

</li>
							<li class="my-2"><span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> Single choice (Partial Mark Support)</li>
							<li class="my-2"><span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> Multiple choices (Partial Mark Support)</li>
						</ul>
					</div>
					<div class="col">
						<ul class="list-unstyled">
							<li class="my-2"><span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> True & False

</li>
							<li class="my-2"><span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> Matrix Match (Partial Mark Support)</li>
							<li class="my-2"><span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> Match the following</li>
						</ul>
					</div>
					<div class="col">
						<ul class="list-unstyled">
							<li class="my-2"><span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> Fill in the blanks (Support range answer)

</li>
							<li class="my-2">
								<span class="fa fa-chevron-circle-right w3-xlarge text-success"></span> 
								Descriptive (Text, attachment & URL based test)</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<hr/>
	</div>
	<div class="container-fluid bg-primary p-3">
		<div class="row">
			<div class="col-lg-3">
				<button class="w3-btn w3-block w3-round-large w3-white w3-large">TAKE A TOUR</button>
			</div>
			<div class="col-lg-3">
				<button class="w3-btn w3-block w3-round-large w3-white w3-large">CHECK OUT FEATURES</button>
			</div>
			<div class="col-lg-3">
				<button class="w3-btn w3-block w3-round-large w3-white w3-large">LEAVE US MESSAGE</button>
			</div>
			<div class="col-lg-3">
				<button class="w3-btn w3-block w3-round-large w3-white w3-large">WHY CHOOSE US</button>
			</div>
		</div>
	</div>
		<hr/>
	<div class="container-fluid green text-light py-2">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="text-center font-weight-bold">Quizo Is The Best Computer Based Online Exam Web Portal!</h3>
				<h5 class="text-center">Quizo Exam web portal to take online tests, online quiz test in the real, simple, proficient.</h5>
				<button class="w3-btn w3-round-large w3-white w3-large mx-auto d-block">Try It</button>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<div class="container-fluid bg-dark text-light">
		<div class="row">
			<div class="col-lg-3">
				<p class="text-center fa-2x">ABOUT</p>
				<hr/>
				<h1 class="text-center font-weight-bold">Quizo</h1>
				<p class="text-justify">Quizo Exam is a well known education software product based and startup recognize innovation company. So, now from here, you can get the best online examination web portal. Now, you can get an Online exam practice free demo 24*7 using our web portal <a href="#" class="text-success">[...]</a></p>
				<ul class="list-unstyled">
					<li class="border-bottom pb-3 pt-2"><a href="#" class="text-decoration-none text-light"><span class="fa fa-chevron-right"></span> Home</a></li>
					<li class="border-bottom pb-3 pt-2"><a href="#" class="text-decoration-none text-light"><span class="fa fa-chevron-right"></span> Features</a></li>
					<li class="border-bottom pb-3 pt-2"><a href="#" class="text-decoration-none text-light"><span class="fa fa-chevron-right"></span> Plan</a></li>
					<li class="border-bottom pb-3 pt-2"><a href="#" class="text-decoration-none text-light"><span class="fa fa-chevron-right"></span> Help</a></li>
				</ul>
			</div>
			<div class="col-lg-3"></div>
			<div class="col-lg-3"></div>
			<div class="col-lg-3">
				<p class="text-center fa-2x">CONTACT US</p>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-lg-12 clearfix">
				<div class="float-left">
					<p>&copy; Copyright <?= date('Y'); ?> - by Zakir Ahmad Wani | All Rights Reserved | Pioneered By Quizo</p>
				</div>
				<div class="float-right">
						<div class="btn-group">
							<a href="#" class="button"><span class="fa mr-1 fa-facebook-square fa-2x text-primary"></span></a>
							<a href="#"><span class="fa mr-1 fa-twitter-square fa-2x w3-text-cyan"></span></a>
							<a href="#"><span class="fa mr-1 fa-linkedin-square fa-2x w3-text-blue"></span></a>
							<a href="#"><span class="fa mr-1 fa-instagram text-danger fa-2x"></span></a>
						</div>
					</div>
			</div>
		</div>
	</div>
</body>
</html>