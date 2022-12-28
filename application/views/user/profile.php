<?php include "header.php" ?>
    <div class="row mt-lg-4 ">
	    <?php include "control_div.php"; ?>
		<div class="col-lg-10 control-div">
            <?php include "alert.php" ?>
            <?php foreach($settings as $profile): ?>
            <h5 class="pb-2 text-spruce font-weight-bold"><span class="fa fa-user"></span> Profile - <?= $profile->first_name." ".$profile->last_name ?></h5>
                <hr class="mt-1 mb-3"/>
           
           
            <div class="row">
            <div class="col-xl-6">
            <form action="<?= base_url("control_panel/update_profile/basic_information"); ?>" method="post" class="w3-round-xlarge w3-card my-lg-2 p-4 w3-btn w-100">
            <h5 class="w3-left-align text-spruce"><span class="fa fa-info-circle"></span> Basic Information</h5>
            <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="first_name" value="<?= $profile->first_name ?>" placeholder="First Name..." required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="last_name" value="<?= $profile->last_name; ?>" placeholder="Last Name..." required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="<?= $profile->email ?>" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn w3-btn spruce"><span class="fa fa-user"> Update Profile</button>
                        </div>
                        <div>
                           </div>
            </form>
            </div>
            <div class="col-xl-6">
            <form id="validate" action="<?= base_url("control_panel/update_profile/password"); ?>" method="post" class="w3-round-xlarge w3-card my-lg-2 p-4 w3-btn w-100">
            <h5 class="w3-left-align text-spruce"><span class="fa fa-key"></span> Change Password</h5>
            <div class="form-group">
                <input type="password" class="form-control" name="new" id="new"  placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm"  placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn w3-btn spruce"><span class="fa fa-key"> Change Password</button>
            </div>
            <div class="clearfix"></div>
        </form>
            </div>
            </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
<script type="text/javascript">
	$(document).ready(function() {
   		$("#validate").validate({
	      	rules: {
	         	new: 'required',
	         	confirm: 'required',
	         	confirm: {
	            	required: true,
	            	equalTo : "#new",
	         	},
	      	},
	      	messages: {
			   	current: '<label class="text-warning">Current Password is required</label>',
			   	new: '<label class="text-warning">New Password is required</label>',
			   	confirm: {
			   		required : '<label class="text-warning">Confirm Password is required</label>',
			   		equalTo : '<label class="text-danger">Password not matching</label>',
			   	}
			},
	   });
	});
</script>
<?php include "footer.php" ?>
