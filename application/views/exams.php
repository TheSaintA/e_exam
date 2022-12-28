
<div class="container my-3">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Available Exams</h2>
            <hr/>
        </div>
<?php if($papers): ?>
    <?php foreach($papers as $paper): ?>
        <?php if (($paper->set_unset == 1) || ((date('d-m-Y',$paper->start_date)) == (date('d-m-Y',time())))): ?>
        <?php if((date('d-m-Y',$paper->end_date)) <= (date('d-m-Y',time()))): ?>
        <div class="col-lg-3 p-1">
    <div class="w3-card w3-round-xlarge p-2 w3-btn">
				<img src="<?= base_url('assets/images/clock.png'); ?>" alt="Clock" class="img-fluid w-50 mx-auto d-block  ">
                    <div>
                        <h5 class="text-center w3-text-teal font-weight-bold"><?= $paper->page_name ?></h5>
                        <p class="p-1 text-center"><?= $paper->description; ?></p>
                        <button onclick="window.location.href='<?= base_url("student_login/$paper->id"); ?>'" class="btn spruce w3-round-large btn-block mx-auto d-block">Start Your Exam</button>
                    </div> 
				</div>
    </div>
    <?php else: ?>   
    <?php endif; ?>
    <?php else: ?>   
    <?php endif; ?>
    <?php endforeach; ?>
    <?php else: ?>
        <div class="col-lg-12">
            <h3 class="text-center">404 Not Found</h3>
        </div>
    <?php endif; ?>
    </div>
</div>


