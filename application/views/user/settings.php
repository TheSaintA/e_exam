<?php include "header.php" ?>
    <div class="row mt-lg-4 ">
	    <?php include "control_div.php"; ?>
		<div class="col-lg-10 control-div">
            <?php include "alert.php" ?>
            <h5 class="pb-2 text-spruce font-weight-bold"><span class="fa fa-cog"></span> Settings</h5>
                <hr class="mt-1 mb-3"/>
        <div class="p-2 w3-card w3-round-large w-100">
        <div class="row p-2">
                <?php foreach($subjects as $subject): ?>
                    <div class="col-lg-4">
                        <div class="w3-card w3-round-large spruce w3-btn m-2 w-100">
                            <span class="text-center fa fa-book fa-2x"></span>
                            <h5><?= $subject->page_name; ?></h5>
                            
                            <a class="btn w3-btn w3-round-large w3-teal" href="<?= base_url("control_panel/configure_paper/$subject->id"); ?>" ><span class="fa fa-users"></span> Click Here</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        </div>
    </div>
    <?php include "footer.php" ?>