<?php include 'header.php' ?>

    <!-- Header -->
    <header class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h1><i class="fa fa-user-plus fa-2x"></i> Create your account</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Basic -->
    <div class="ex-basic-1 pt-5 pb-5">
        <div class="container">
            <div class="row">
                <?php if($msg = $this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Success!</strong> <?= $msg; ?>
                    </div>
                <?php elseif ($msg = $this->session->flashdata('unsuccess')): ?>
                   <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      <strong>Ohh!</strong> <?= $msg; ?>
                    </div>   
                <?php else: ?>
                <?php endif; ?>
                <div class="col-xl-10 offset-xl-1">
                    <!-- Contact Form -->
                    
                    <form action="<?= base_url("create_account"); ?>" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control-input" name="first_name" placeholder="First Name..." required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control-input" name="last_name" placeholder="Last Name..." required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control-input" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button"><span class="fa fa-user"></span> Sign up for free</button>
                        </div>
                        <div>
                            <p class="p-small">By signing up, you are agreeing to our <a class="green" href="#">Terms & Conditions</a>, <a class="green" href="#">Privacy Policy</a>, <a class="green" href="#">Anti-Spam Policy</a></p>
                        </div>
                    </form>
                    <!-- end of contact form -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->

<?php include 'footer.php' ?>