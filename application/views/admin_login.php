<?php include "header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <?php if ($msg = $this->session->flashdata('unsuccess')): ?>
	                   <div class="alert alert-danger mt-3 alert-dismissible d-block mx-auto">
                       <button type="button" class="close" data-dismiss="alert">&times;</button>
	                      <strong>Ohh!</strong> <?= $msg; ?>
	                    </div>   
	                <?php else: ?>
	                <?php endif; ?>
                    <?php if ($msg = $this->session->flashdata('success')): ?>
	                   <div class="alert alert-success mt-3 alert-dismissible d-block mx-auto">
                       <button type="button" class="close" data-dismiss="alert">&times;</button>
	                      <strong>Success!</strong> <?= $msg; ?>
	                    </div>   
	                <?php else: ?>
	                <?php endif; ?>
                    <?php if($admin_exists): ?>
            <form class="w3-card w-50 w3-round-large p-2 my-5 mx-auto d-block" action="<?= base_url("validate_admin"); ?>" method="post">
                <h3 class="text-danger font-weight-bold text-center"><span class="fa fa-user fa-2x"></span> Admin Login</h3>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" id="" class="form-control" placeholder="Username..." required/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="Password..." required/>
                </div>
                <div class="input-group mb-3">
                  <button class="btn spruce mx-auto d-block font-weight-bold w3-btn" type="submit"><span class="fa fa-user"></span> Login</button>
                </div>
            </form>
            <?php else: ?>
                <form class="w3-card w-50 w3-round-large p-2 my-5 mx-auto d-block" action="<?= base_url("create_admin"); ?>" method="post">
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
</div>
<?php include "footer.php"; ?>