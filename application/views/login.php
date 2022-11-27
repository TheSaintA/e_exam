<?php include 'header.php' ?>

    <!-- Header -->
    <header class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h1><i class="fa fa-user fa-2x"></i> Login</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Basic -->
    <div class="ex-basic-1 pt-5 pb-5">
        <div class="container">
            <div class="row">
        	    	<?php if ($msg = $this->session->flashdata('unsuccess')): ?>
	                   <div class="alert alert-danger alert-dismissible">
	                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	                      <strong>Ohh!</strong> <?= $msg; ?>
	                    </div>   
	                <?php else: ?>
	                <?php endif; ?>
                <div class="col-xl-10 offset-xl-1">
                    <!-- Contact Form -->
                    <form action="<?= base_url('login'); ?>" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control-input" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control-input" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button"><span class="fa fa-user"></span> Login</button>
                        </div>
                        <div>
                            <p><a class="green" href="<?= base_url('p/signup') ?>">Register</a> , if you don't have an account </p>
                        </div>
                    </form>
                    <!-- end of contact form -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->

<?php include 'footer.php' ?>