<?php include "header.php" ?>

   <!-- Header -->
    <header class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h1><i class="fa fa-user fa-2x"></i> Student Login</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->

<div class="ex-basic-1 pt-5 pb-5">
    <div class="container" >
        <div class="row">
            <?php if ($msg = $this->session->flashdata('unsuccess')): ?>
                       <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                          <strong>Ohh!</strong> <?= $msg; ?>
                        </div>   
                    <?php else: ?>
                    <?php endif; ?>
        	<div class="col-lg-6">
                <?php if ($data): ?>
                <?php foreach ($data as $d): ?>
        		<?php if ($d->set_unset == 1): ?>
                    <form style="margin-top:15%;" action="<?= base_url('student_validate'); ?>" method="post">
                        <?= form_hidden('id',$d->id); ?>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 form-control-label">Paper</label>
                        <div class="col-sm-10">
                            <input type="text"  value="<?= $d->page_name; ?>" class="form-control" id="inputEmail3" placeholder="Paper" required disabled>
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 form-control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 form-control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success"><span class="fa fa-user"></span> Login</button>
                        </div>
                    </div>
                    </form>
                <?php else: ?>   
                    <div class="alert alert-warning" role="alert">
                        <h4>404 Not Found !!!</h4>
                    </div>
                <?php endif ?>
                <?php endforeach; ?>
            <?php else: ?>
                <h3 class="text-center w3-text-teal fw-bold">404 Not Found</h3>
            <?php endif; ?>
        	</div>
        	<div class="col-lg-6">
        		<img src="<?= base_url("assets/images/geometry.png"); ?>" alt="wallpaper" class="img-fluid mx-auto text-center d-block w-50">
        	</div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>