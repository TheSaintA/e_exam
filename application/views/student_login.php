
    <div class="container" >
        <div class="row">
        <div class="col-xl-10">
                <h3><span class="fa fa-user fa-2x"></span> Student Login</h3>
            </div>    
        <?php if ($msg = $this->session->flashdata('unsuccess')): ?>
                       <div class="alert alert-danger alert-dismissible">
                       <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Ohh!</strong> <?= $msg; ?>
                        </div>   
                    <?php else: ?>
                    <?php endif; ?>
        	<div class="col-lg-6">
                <?php if ($data): ?>
                <?php foreach ($data as $d): ?>
        		<?php if (($d->set_unset == 1) || ((date('d-m-Y',$d->start_date)) == (date('d-m-Y',time())))): ?>
                    <form action="<?= base_url('student_validate'); ?>" method="post">
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
                            <button type="submit" class="w3-btn w3-green btn"><span class="fa fa-user"></span> Login</button>
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