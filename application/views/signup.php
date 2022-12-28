

    <!-- Basic -->
    <div class="ex-basic-1 pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h2><span class="fa fa-user-plus"></span> Create an account</h2>
                </div>
                <?php if($msg = $this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible d-block mx-auto">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success!</strong> <?= $msg; ?>
                    </div>
                <?php elseif ($msg = $this->session->flashdata('unsuccess')): ?>
                   <div class="alert alert-danger alert-dismissible d-block mx-auto">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Ohh!</strong> <?= $msg; ?>
                    </div>   
                <?php else: ?>
                <?php endif; ?>
                <div class="col-xl-10 offset-xl-1">
                    <!-- Signup Form -->
                    
                    <form action="<?= base_url("create_account"); ?>" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name..." required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name..." required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="dept_name" placeholder="Department Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="mx-auto text-center d-block btn w3-btn w3-green"><span class="fa fa-user-plus"></span> Sign up for free</button>
                        </div>
                        <div>
                            <p class="p-small">By signing up, you are agreeing to our <a class="text-success font-weight-bold" href="#">Terms & Conditions</a>, <a class="text-success font-weight-bold" href="#">Privacy Policy</a>, <a class="text-success font-weight-bold" href="#">Anti-Spam Policy</a></p>
                        </div>
                    </form>
                    <!-- end of contact form -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->