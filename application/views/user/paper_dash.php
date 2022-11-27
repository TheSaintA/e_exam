<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Paper : Dashboard</title>
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
</head>
<body>
	<?php if ($alert = $this->session->flashdata('unsuccess')): ?>
    <div class="toast position-fixed w3-amber"  style="bottom:5%;right:3%;z-index:999" data-autohide="false">
        <div class="toast-header clearfix w3-amber ">
          <strong class="mr-auto text-warning fw-bold flex-fill text-light"><span class="fa fa fa-exclamation-triangle fa-2x"></span> Alert!</strong>
          <button type="button" class="close btn-close float-end" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body fw-bold" >
          <?= $alert; ?>
        </div>
    </div>
  <?php endif; ?>
  <?php if ($alert = $this->session->flashdata('success')): ?>
    <div class="toast position-fixed w3-teal"  style="bottom:5%;right:3%;z-index: 999 ;" data-autohide="false">
        <div class="toast-header clearfix w3-teal ">
          <strong class="mr-auto text-warning fw-bold flex-fill text-light"><span class="fa fa-check-circle fa-2x"></span> Success</strong>
          <button type="button" class="close btn-close float-end" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body fw-bold" >
          <?= $alert; ?>
        </div>
    </div>
  <?php endif; ?>
	<div class="container mt-3">
		<div class="row">
			<div class="col-lg-12 w3-teal text-light font-weight-bold p-2">
				<?php foreach ($paper as $pap): ?>	
				<p class="font-weight-bold float-left"><?= $pap->page_name; ?></p>
				<?php endforeach ?>
				<label for="" class="float-right"><?= date('jS F,Y',time()); ?></label>
			</div>
			<div class="col-lg-4">
				<div class="stduent_profile container border w3-card p-2 w3-round">
					<img src="<?= base_url('assets/images/avatar1.png'); ?>" alt="Photo" class="img-fluid mx-auto w-50 d-block mt-3 w3-circle w3-card">
					<div class="stduent_info w3-card p-2 w3-round my-2">
							<?php foreach ($student as $s): ?>
								<?php if ($s->id == $_SESSION['student_id']): ?>
									
						<ul class="list-unstyled">
							<li>Name : <label > <?= $s->name ?></label></li>
							<li>Enrollment No : <label ><?= $s->enrollment_no ?></label></li>
							<li>Paper : <label > <?= $pap->page_name ?></label></li>
							<li><button class="btn btn-danger text-center mx-auto d-block" onclick="window.location.href='<?= base_url('student_logout') ?>'"><span class="fa fa-lock"></span> Logout</button></li>
						</ul>
							<?php endif ?>
							<?php endforeach ?>
					</div>
					<hr>
					<div class="p-2">
						<div class="row">
							<div class="col-lg-12">
								<p>Attempted <span class="badge badge-pill badge-success"><?= $count_response ?></span> out of <span class="badge badge-pill badge-danger"><?= $count_questions ?></span></p>
								<hr/>
							</div>
				<?php for($i=1;$i<=$count_questions;$i++): ?>
					<div class="col-lg-1">
						<span class="badge badge-success"><?= $i; ?></span>
					</div>
				<?php endfor; ?>		
				</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				
				<form action="<?= base_url('nextQuestion'); ?>" method="post">
					<?php if ($questions): ?>
						
					<?php foreach ($questions as $question): ?>
								<?= form_hidden('paper_id',$question->page_id); ?>
								<?= form_hidden('student_id',$_SESSION['student_id']); ?>
								<?= form_hidden('question_id',$question->id); ?>
								<div class="question_div w3-card w3-round p-2" style="min-height: 500px;">
									<h4><?= $question->question; ?></h4>
									<hr>
									<div class="row mx-auto text-center">
										<?php for ($i=1; $i < 5; $i++): ?>
										<?php $ans = "answer_".$i; ?> 
											 <div class="col-lg-6 my-4">
											 <label class="form-check-label text-left">
										      <input class="form-check-input" name="answer" value="<?= $question->$ans; ?>" type="checkbox"> <?= $question->$ans ?>
										    </label>
											 </div>

										<?php endfor; ?> 
									</div>
									
								
									<div class="form-group position-relative mx-auto text-center" style="top:200px !important;">
										<button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Save & Continue</button>
										<button type="reset" class="btn btn-warning "><span class="fa fa-refresh"></span> Clear Response</button>
									</div>
								</div>
								
					<?php endforeach; ?>
					<?php else: ?>	
								<div class="w3-card p-2 w3-round my-">
									<h1><span class="fa fa-check-circle fa-2x text-success text-center mx-auto d-block"></span></h1>
									<h5 class="text-center">You have answered all the questions successfully.</h5>
									<p class="text-center">You can logout. We have received your response.</p>
									<p class="text-center">Thank you</p>
								</div>
							<?php endif; ?>
					
			</form>	
			</div>
		</div>
	</div>
</body>
</html>
<script>
	$('.form-check-input').click(function(){
		$('.form-check-input').not(this).prop('checked', false);
	});
</script>
<!-- <div class="col-lg-6 my-4 px-2">
               
            <div class="form-check mx-3">
              <input class="form-check-input" type="radio" name="<?= $question->id ?>" id="flexRadioDefault<?= $i.$question->id; ?>">
              <label class="form-check-label" for="flexRadioDefault<?= $i.$question->id; ?>">
                <?=  $question->$ans; ?>
              </label>
            </div>    
            		</div> -->