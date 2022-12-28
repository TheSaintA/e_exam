<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Paper : Dashboard</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/w3.css') ?>">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>0 -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link rel="stylesheet" href="<?= base_url('assets/css/TimeCircles.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/imagehover/css/imagehover.css') ?>">
	<!-- jQuery library -->
	<!-- <script src="<?php // base_url('assets/js/jquery4.slim.min.js'); ?>"></script> -->
	<!-- Popper JS -->
	<script src="<?= base_url('assets/js/popper4.min.js'); ?>"></script>
	<!-- Latest compiled JavaScript -->
	<script src="<?= base_url('assets/js/TimeCircles.js'); ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.bundle4.min.js'); ?>"></script>
	<link rel="stylesheet" href="<?= base_url('assets/css/fontawesome-all.min.css') ?>">
</head>
<body>
<?php foreach ($configuration as $config): ?>
		<?php if ($config->set_theme): ?>
			<style>
				body, div{
					background-color: <?= $config->set_theme; ?> !important;
					color: #fff;
				}
			</style>
		<?php else: ?>	
		<?php endif; ?>
	<div class="container mt-3">
		<div class="row">
		<?php if ($config->allow_copy == 'on'): ?>
			<div class="col-lg-12 spruce text-light font-weight-bold p-2 w3-round-large" onCopy="return false">
			<?php elseif ($config->allow_paste == "on"): ?>
			<div class="col-lg-12 spruce text-light font-weight-bold p-2 w3-round-large" onPaste="return false">
			<?php elseif ($config->allow_paste == "on"): ?>
			<div class="col-lg-12 spruce text-light font-weight-bold p-2 w3-round-large" onPaste="return false">
			<?php elseif ($config->allow_cut == "on"): ?>
			<div class="col-lg-12 spruce text-light font-weight-bold p-2 w3-round-large" onCut="return false">	
			<?php else: ?>
			<div class="col-lg-12 spruce text-light font-weight-bold p-2 w3-round-large">	    
			<?php endif ?>
			<?php if ($config->allow_right_mouse_click == 'on'): ?>
		<script>
			$(document).bind("contextmenu",function(e){
  			return false;
    	});
		</script>	
	<?php endif; ?>
			<?php endforeach; ?>
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
								<div width="82%" data-date="<?php echo date('Y-m-d H:i:s',$pap->end_time); ?>" data-timer="900" id="count-down"></div>
								<?php if ($questions): ?>
								<script>
								    $(function () {
								        $("#count-down").TimeCircles({
									time:{
										Days:{
											show:false
										}
									}
								});
								setInterval(function(){
									var remaining_seconds = $('#count-down').TimeCircles().getTime();
									if(remaining_seconds < 1){
										alert("Exam time is over \nYour paper will be auto-submit \nThank You");
										window.location.href="<?= base_url('student/paper/time_over'); ?>";
										// window.location.href="<?php // base_url('student_logout'); ?>";
									}
								},1000);
							 });
						
								</script>
								<?php else: ?>
									<script>
										$(function (){
											$("#count-down").TimeCircles({
												time:{
													Days:{
														show:false
													}
												},
												count_past_zero: false
											}) 
										});
									</script>
									<?php endif; ?>
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
	<style>
	.spruce{
		background-color:#005960 !important;
		color:#fff !important;
	}
	.text-spruce{
		color:#005960 !important;
	}
	.hover-spruce:hover{
		background-color:#005960 !important;
		color:#fff !important;
	}
</style>
<script>
	$('.form-check-input').click(function(){
		$('.form-check-input').not(this).prop('checked', false);
	});
</script>
</body>
</html>

