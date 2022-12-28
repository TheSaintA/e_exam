<?php include "header.php" ?>
<?php include "navbar.php" ?>
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
				      <img src="<?= base_url(); ?>/assets/images/library.jpg" alt="Los Angeles" width="1100" height="600">
				      <div class="carousel-caption">
				        <h3>Library</h3>
				        <p>We had such a great time in Library!</p>
				      </div>   
				    </div>
				    <div class="carousel-item">
				      <img src="<?= base_url(); ?>/assets/images/convocation.jpg" alt="Chicago" width="1100" height="600">
				      <div class="carousel-caption">
				        <h3>Convocation Complex, UoK</h3>
				        <p>Thank you, University of Kashmir!</p>
				      </div>   
				    </div>
				    <div class="carousel-item">
				      <img src="<?= base_url(); ?>/assets/images/iqbal_library.jpg" alt="New York" width="1100" height="600">
				      <div class="carousel-caption">
				        <h3>Iqbal Library, UoK</h3>
				        <p>We love the Big Building!</p>
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
		<div class="row">
			<div class="col-lg-12">
				<marquee onmouseover="this.stop();" onmouseout="this.start();" class="p-2 spruce text-light font-weight-bold"><?php foreach($notices as $notice): ?><label> <span class="fa fa-bell fa-2x text-danger"></span> <?= $notice->notice ?> </label> : <?php endforeach; ?></marquee>
			</div>
		</div>
	</div>
	<div class="container mt-4">
		<?php if($papers): ?>
		<div class="row">
			<div class="col-lg-12">
				<h2 class="text-center">Exams</h2>
				<hr/>
			</div>
			<?php foreach ($papers as $paper): ?>
            <?php if (($paper->set_unset == 1) || ((date('d-m-Y',$paper->start_date)) == (date('d-m-Y',time())))): ?>
			<?php if((date('d-m-Y',$paper->end_date)) <= (date('d-m-Y',time()))): ?>
				<div class="col-lg-3 p-1">
					
				<div class="w3-card w3-round-xlarge p-2 w3-btn ">
				<img src="<?= base_url('assets/images/clock.png'); ?>" alt="Clock" class="img-fluid w-50 mx-auto d-block  ">
                    <div>
                        <h5 class="text-center w3-text-teal font-weight-bold"><?= $paper->page_name ?></h5>
                        <p class="p-1 text-center"><?= $paper->description; ?></p>
                     
						<button onclick="window.location.href='<?= base_url("student_login/$paper->id"); ?>'" class="btn spruce w3-round-large btn-block mx-auto d-block w3-btn">Start Your Exam</button>
                    </div> 
				</div>
			</div>
			<?php else: ?>   
            <?php endif; ?>
			<?php else: ?>   
            <?php endif; ?>
            <?php endforeach; ?>
		</div>
		<?php else: ?>
		<?php endif; ?>
		<hr/>
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

		<?php include "features.php" ?>
		<hr/>
	</div>
	<div class="container-fluid spruce p-3">
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
	<div class="container-fluid spruce w3-card my-2 py-2">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="text-center font-weight-bold">Quizo Is The Best Computer Based Online Exam Web Portal!</h3>
				<h5 class="text-center">Quizo Exam web portal to take online tests, online quiz test in the real, simple, proficient.</h5>
				<button onClick="window.location.href='<?= base_url("p/signup") ?>'" class="w3-btn w3-round-large w3-white w3-large mx-auto d-block">Try It</button>
			</div>
		</div>
	</div>
	<?php include "footer.php" ?>