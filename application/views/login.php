
   



    <!-- Basic -->
    <div class="ex-basic-1 pt-5 pb-5">
        <div class="container">
            <div class="row">
        	    	<?php if ($msg = $this->session->flashdata('unsuccess')): ?>
	                   <div class="alert alert-danger alert-dismissible d-block mx-auto">
                       <button type="button" class="close" data-dismiss="alert">&times;</button>
	                      <strong>Ohh!</strong> <?= $msg; ?>
	                    </div>   
	                <?php else: ?>
	                <?php endif; ?>
                <div class="col-xl-10 offset-xl-1">
                    <!-- Nav pills -->
<ul class="nav nav-tabs mx-auto text-center">
  <li class="nav-item">
    <a class="nav-link active font-weight-bold" data-toggle="pill" href="#menu1">Department Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link font-weight-bold" data-toggle="pill" href="#menu2">Admin Login</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active p-2" id="menu1">
    
                    <!-- Login Form -->
                    <form action="<?= base_url('login'); ?>" method="post" class="w3-round-large p-2 w3-card">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control w3-btn spruce"><span class="fa fa-user"></span> Department Login</button>
                        </div>
                        <div>
                            <p><a class="text-decoration-none text-spruce font-weight-bold" href="<?= base_url('p/signup') ?>">Register</a> , if you don't have an account </p>
                        </div>
                    </form>
  </div>
  <div class="tab-pane container fade p-2" id="menu2">
  <?php if($admin_exists): ?>
  <form class="w3-card w3-round-large p-2 mx-auto d-block" action="<?= base_url("validate_admin"); ?>" method="post">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" id="" class="form-control" placeholder="Username..." required/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="Password..." required/>
                </div>
                <div class="input-group mb-3">
                  <button class="btn spruce mx-auto d-block font-weight-bold w3-btn" type="submit"><span class="fa fa-user"></span> Admin Login</button>
                </div>
            </form>
            
            <?php else: ?>
                <form class="w3-card w3-round-large p-2 mx-auto d-block" action="<?= base_url("create_admin"); ?>" method="post">
                <h3 class="text-danger font-weight-bold text-center"><span class="fa fa-user-plus fa-2x"></span> Create Account</h3>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Name..." required/>
                </div>
                <div class="row">
                <div class="form-group col-lg-6">
                    <label for="">Username</label>
                    <input type="text" name="username" id="" class="form-control" placeholder="Username..." required/>
                </div>
                <div class="form-group col-lg-6">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="Password..." required/>
                </div>
                </div>
                <div class="input-group mb-3">
                  <button class="btn spruce mx-auto d-block font-weight-bold w3-btn" type="submit"><span class="fa fa-user-plus"></span> Create Account</button>
                </div>
            </form>
                <?php endif; ?>
  </div>
</div>
                    <!-- end of contact form -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->