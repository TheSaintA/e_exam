<?php include 'header.php'; ?>
      
    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="text-light">Powerful<br> Online Test and <br> Quiz Maker</h1>
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="button-container">
                        <a class="btn-solid-lg page-scroll" href="<?= base_url('p/login'); ?>"><i class="fa fa-user"></i> Login</a>
                        <a class="btn-outline-lg page-scroll" href="<?= base_url('p/signup'); ?>"><i class="fa fa-user-plus"></i> Signup</a>
                    </div> <!-- end of button-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Introduction -->
    <div id="intro" class="basic-1 bg-gray">
        <div class="container">
                <?php if ($papers): ?>
            <div class="row my-3">
                <div class="col-lg-12">
                    <h2 class="text-center">Your Exams</h2>
                </div>
                <hr/>
                <?php foreach ($papers as $paper): ?>
                <?php if ($paper->set_unset == 1): ?>
                    <div class="col-lg-3 p-2">
                    <div class="w3-card w3-light-gray w3-round">
                        <img src="<?= base_url('assets/images/clock.png'); ?>" alt="Clock" class="img-fluid w-50 mx-auto d-block ">
                        <div>
                            <h5 class="text-center w3-text-teal fw-bold"><?= $paper->page_name ?></h5>
                            <p class="p-1 text-center"><?= $paper->description; ?></p>
                            <button onclick="window.location.href='<?= base_url("student_login/$paper->id"); ?>'" class="btn btn-success btn-block mx-auto d-block">Start Your Exam</button>
                        </div> 
                    </div>
                </div>
                 <?php else: ?>   
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
        <?php endif; ?>
            <div class="row">
                <div class="col-lg-6">
                    <h1>Powerful Online Test and Quiz Maker</h1>
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <p><strong>Create</strong> Quickly create great looking tests using multiple question types and formatting options.</p>
                        <p><strong>Publish</strong> Tests can either be published privately to a select group or open them up to everyone with a single link and registration page.</p>
                        <p><strong>Analyze</strong> QuizO instantly marks and grades your tests. Powerful reports then allow you to perform in-depth analysis across all responses.</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of introduction -->


    <!-- Project 1 -->
    <div id="projects" class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5">
                    <div class="text-container">
                        <h2><img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo" class="img-fluid w-25"> IS A POWERFUL ONLINE TEST GENERATOR</h2>
                        <p>Build your own online tests and assessments with FlexiQuiz for free.</p>
                        <a class="read-more no-line green" href="<?= base_url('p/signup'); ?>">Get Started for Free <span class="fas fa-long-arrow-alt-right"></span></a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6 col-xl-7">
                    <div class="image-container">
                        <img class="img-fluid" src="<?php base_url(); ?> assets/images/online_exam.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of project 1 -->

    <!-- Services -->
    <div id="services" class="cards-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading text-center">Awesome Features</h2>
                    <hr>
                </div>
                <div class="col-lg-4">
                    <h4><i class="fa fa-globe fa-2x"></i> Access Anywhere</h4>
                    <hr>
                    <p class="text-center">Being online allows you and your respondents to access, administer and take your quizzes from anywhere at anytime.</p>
                </div>
                <div class="col-lg-4">
                    <h4><i class="fa fa-lock fa-2x"></i> Secured with SSL</h4>
                    <hr>
                    <p class="text-center">With SSL encryption and utilising our advanced cloud infrastructure you can be sure your tests will always be secure.</p>
                </div>
                <div class="col-lg-4">
                    <h4><i class="fa fa-check fa-2x"></i> Auto Grading</h4>
                    <hr>
                    <p class="text-center">QuizO can automatically mark and grade your assessments, saving you the time to concentrate on whats important.</p>
                </div>
                <div class="col-lg-4">
                    <h4><i class="fa fa-clock fa-2x"></i> Timed Tests</h4>
                    <hr>
                    <p class="text-center">With QuizO it is easy to set a time limit or allow your learners an unlimited amount of time to complete your assessment.</p>
                </div>
                <div class="col-lg-4">
                    <h4><i class="fa fa-flash fa-2x"></i> Custom Branding</h4>
                    <hr>
                    <p class="text-center">Customize your tests by adding your own branding with your school or companies logo.</p>
                </div>
                <div class="col-lg-4">
                    <h4><i class="fa fa-eye fa-2x"></i> Public & Private Quizzes</h4>
                    <hr>
                    <p class="text-center">Tests can either be published privately to a select group or open them up to everyone with a single link and registration page.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Why choose <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo" class="w-25"></h2>
                    <hr>
                    <!-- <p class="p-heading">Smile spoke total few great had never their too. Amongst moments do in arrived at my replied. Fat weddings servants but man believed having said that prospect companions</p> -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row text-center">
                <div class="col-6 col-lg-3">
                    <div>
                        <h1><i class="fa fa-font green"></i></h1>
                        <h5>Auto Grading</h5>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div>
                        <h1><i class="fa fa-file   green"></i></h1>
                        <h5>Powerful Reports</h5>
                    </div>
                    </div>
                <div class="col-6 col-lg-3">
                    <div>
                        <h1><i class="fa fa-calendar green"></i></h1>
                        <h5>Schedule your tests</h5>
                    </div>
                    </div>
                <div class="col-6 col-lg-3">
                    <div>
                        <h1><i class="fa fa-eye green"></i></h1>
                        <h5>Public & Private Tests</h5>
                    </div>
                    </div>
                <div class="col-6 col-lg-3">
                    <div>
                        <h1><i class="fa fa-image green"></i></h1>
                        <h5>Include Images</h5>
                    </div>
                    </div>
                <div class="col-6 col-lg-3">
                    <div>
                        <h1><i class="fa  green">$</i></h1>
                        <h5>Free Plan Option</h5>
                    </div>
                    </div>
                <div class="col-6 col-lg-3">
                    <div>
                        <h1><i class="fa fa-mobile green"></i></h1>
                        <h5>Mobile Ready</h5>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div>
                        <h1><i class="fa fa-file green"></i></h1>
                        <h5>PDF Reports</h5>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div>
                        <h1><i class="fa fa-lock green"></i></h1>
                        <h5>Secured with SSL Certificate</h5>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div>
                        <h1><i class="fa fa-list green"></i></h1>
                        <h5>Multiple Question Types</h5>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div>
                        <h1><i class="fa fa-globe green"></i></h1>
                        <h5>Access Anywhere</h5>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div>
                        <h1><i class="fa fa-cog green"></i></h1>
                        <h5>Advanced Configuration Options</h5>
                    </div>
                </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    <!-- end of cards-1 -->
    <!-- end of services -->


    <!-- About -->
    <div id="about" class="counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Why should you work with us</h2>
                    <hr class="hr-heading">
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-xl-6">
                    <ul class="list-unstyled">
                        <li class="d-flex">
                            <h5 class="number">1.</h5>
                            <div class="flex-grow-1">
                                <h5>Expertise in digital products</h5>
                                <div class="text">Civil those mrs enjoy shy fat merry. You greatest jointure saw horrible. He private he on be how the words look imagine suppose</div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <h5 class="number">2.</h5>
                            <div class="flex-grow-1">
                                <h5>Highly skilled team of experts</h5>
                                <div class="text">Blind there if every no so at. Own neglected you preferred way sincerity delivered his attempted. To of message more now cottage</div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <h5 class="number">3.</h5>
                            <div class="flex-grow-1">
                                <h5>Partnerships with marketing agencies</h5>
                                <div class="text">Be at miss or each good play home they. It leave taste mr in it fancy. She son lose does fond bred gave lady get. Sir her company</div>
                            </div>
                        </li>
                    </ul>
                </div> <!-- end of col -->
                <div class="col-xl-6">
                    
                    <!-- Counter -->
                    <div class="counter-container">
                        <div class="counter-cell">
                            <div data-purecounter-start="0" data-purecounter-end="231" data-purecounter-duration="3" class="purecounter">1</div>
                            <div class="counter-info">Happy Customers</div>
                        </div> <!-- end of counter-cell -->
                        <div class="counter-cell">
                            <div data-purecounter-start="0" data-purecounter-end="385" data-purecounter-duration="1.5" class="purecounter">1</div>
                            <div class="counter-info">Issues Solved</div>
                        </div> <!-- end of counter-cell -->
                        <div class="counter-cell">
                            <div data-purecounter-start="0" data-purecounter-end="159" data-purecounter-duration="3" class="purecounter">1</div>
                            <div class="counter-info">Good Reviews</div>
                        </div> <!-- end of counter-cell -->
                        <div class="counter-cell">
                            <div data-purecounter-start="0" data-purecounter-end="128" data-purecounter-duration="3" class="purecounter">1</div>
                            <div class="counter-info">Case Studies</div>
                        </div> <!-- end of counter-cell -->
                    </div> <!-- end of counter-container -->
                    <!-- end of counter -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of counter -->
    <!-- end of about -->


    <!-- Testimonials -->
    <div class="slider-1">
        <img class="quotes-decoration" src="<?php base_url(); ?> assets/images/quotes.svg" alt="alternative">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">
                                
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <img class="testimonial-image" src="<?php base_url(); ?> assets/images/avatar1.png" alt="alternative">
                                    <p class="testimonial-text">Create fun social quizzes that you can post on your website, blog or other social media site. If you prefer privacy the advanced email options allow you to quickly send private quizzes to your friends. The review feature allows your friends to review their answers after they have completed the quiz.</p>
                                    <div class="testimonial-author">Individuals</div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
        
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <img class="testimonial-image" src="<?php base_url(); ?> assets/images/avatar2.png" alt="alternative">
                                    <p class="testimonial-text">Quickly create courses or online tests for your students. You can make your test public or just publish it for your class or school with our private test options. The premium account will allow you to upload media and have unlimited questions. The auto-grading function will save you time and allow you to concentrate on what's important.</p>
                                    <div class="testimonial-author">Teachers</div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
        
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <img class="testimonial-image" src="<?php base_url(); ?> assets/images/avatar3.jpg" alt="alternative">
                                    <p class="testimonial-text">Create online training and assessments to ensure your staff are always up to date with the right skills. The powerful reporting allows you to track your staff participation and progress. FlexiQuiz implements SSL encryption and offers public and private options so you can be sure your assessments are always secure.</p>
                                    <div class="testimonial-author">Businesses</div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
        
                            </div> <!-- end of swiper-wrapper -->
        
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->
        
                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of card slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-1 -->
    <!-- end of testimonials -->


    <!-- Team -->
    <div class="cards-2 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Specialized team members</h2>
                    <p class="p-heading">It as announcing it me stimulated frequently continuing. Least their she you now above going stand forth. He set this new record pretty future afraid should genius spirit on</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?php base_url(); ?> assets/images/avatar1.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Member 1</h5>
                            <p class="card-text">Business Developer</p>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-linkedin-in fa-stack-1x"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?php base_url(); ?> assets/images/avatar1.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Member 2</h5>
                            <p class="card-text">Software Engineer</p>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-linkedin-in fa-stack-1x"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?php base_url(); ?> assets/images/avatar1.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Member 3</h5>
                            <p class="card-text">Online Marketer</p>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-linkedin-in fa-stack-1x"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="<?php base_url(); ?> assets/images/avatar1.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Member 5</h5>
                            <p class="card-text">Product Manager</p>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-linkedin-in fa-stack-1x"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    <!-- end of card -->
    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of team -->


    <!-- Contact -->
    <div id="contact" class="form-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Let us know about your interest</h2>
                    <p class="p-heading">Of will at sell well at as. Too want but tall nay like old removing yourself today</p>
                    <ul class="list-unstyled li-space-lg">
                        <li><i class="fas fa-map-marker-alt"></i> &nbsp;University of Kashmir, Jammu & Kashmir, India</li>
                        <li><i class="fas fa-phone"></i> &nbsp;<a href="tel:9622765774">+91 9622765774</a></li>
                        <li><i class="fas fa-envelope"></i> &nbsp;<a href="mailto:wanizakir073@gmail.com">wanizakir073@gmail.com</a></li>
                    </ul>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    
                    <!-- Contact Form -->
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control-input" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control-textarea" placeholder="Message" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">Submit</button>
                        </div>
                    </form>
                    <!-- end of contact form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of contact -->

<?php include 'footer.php' ?>