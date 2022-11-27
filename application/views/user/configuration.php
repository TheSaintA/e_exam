<div class="container  mt-2 pt-0 mb-2 w-100  p-3 w3-round ">
	<div class="row">
		<?php if ($paper_selected): ?>
		<div class="col-lg-3">
			<div class="d-flex align-items-start">
			  <div class="nav flex-column nav-pills  w-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			    <button class="nav-link active w3-btn w3-teal w3-block my-1" id="v-pills-general-tab" data-bs-toggle="pill" data-bs-target="#v-pills-general" type="button" role="tab" aria-controls="v-pills-general" aria-selected="true"><span class="fa fa-home"></span> General</button>
			    <button class="nav-link w3-btn w3-teal w3-block my-1" id="v-pills-grading-tab" data-bs-toggle="pill" data-bs-target="#v-pills-grading" type="button" role="tab" aria-controls="v-pills-grading" aria-selected="false"><span class="fa fa-list"></span> Grading</button>
			    <button class="nav-link w3-btn w3-teal w3-block my-1" id="v-pills-results-tab" data-bs-toggle="pill" data-bs-target="#v-pills-results" type="button" role="tab" aria-controls="v-pills-results" aria-selected="false"><span class="fa fa-file"></span> Results</button>
			    <button class="nav-link w3-btn w3-teal w3-block my-1" id="v-pills-certicates-tab" data-bs-toggle="pill" data-bs-target="#v-pills-certicates" type="button" role="tab" aria-controls="v-pills-certicates" aria-selected="false"><span class="fa fa-certificate"></span> Certificate</button>
			    <button class="nav-link w3-btn w3-teal w3-block my-1" id="v-pills-notifications-tab" data-bs-toggle="pill" data-bs-target="#v-pills-notifications" type="button" role="tab" aria-controls="v-pills-notifications" aria-selected="false"><span class="fa fa-bell"></span> Notifications</button>
			    <button class="nav-link w3-btn w3-teal w3-block my-1" id="v-pills-themes-tab" data-bs-toggle="pill" data-bs-target="#v-pills-themes" type="button" role="tab" aria-controls="v-pills-themes" aria-selected="false"><span class="fa fa-eye-dropper"></span> Themes</button>
			  </div>
			  
			</div>
		</div>
		<div class="col-lg-9 ">
			
				<?php if ($get_config): ?>
				<?php foreach ($get_config as $config): ?>
				<?php if ($config->page_id == $paper_selected): ?>
					<div class="tab-content" id="v-pills-tabContent">
			    <div class="tab-pane fade show active py-3" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
			    	<form method="post" action="<?= base_url('control_panel/update_paper_configuation'); ?>">
			    	<div class="form-group row">
			    		<label for="quiz_name" class="col-sm-2 form-control-label fw-bold">Quiz Name</label>
			    		<div class="col-sm-10">
			    			<?php foreach ($papers as $paper): ?>
		                    <?php if (($paper->id) == ($paper_selected)): ?>
		                    <?= form_hidden('id',$config->id); ?>
				    			<input type="text" class="form-control" id="quiz_name" name="page_name" value='<?= $paper->page_name; ?>' placeholder="Quiz name..." disabled>
							<?php else: ?>
								<!-- <input type="text" class="form-control" id="quiz_name" name="page_name"   placeholder="Quiz name..."> -->
							<?php endif; ?>	
						<?php endforeach; ?>
			    		</div>
			    	</div>
			    	<div class="display_settings form-group row">
			    		<div class="col">
			    			<div class="form-group row">
			    				<div class="col-sm-2 "><label class="fw-bold">Display</label></div>
			    					<div class="col-sm-10">
			    						<div class="form-check form-check-inline">
										  <input class="form-check-input" name="show_quiz_name" type="checkbox" id="inlineCheckbox1"  <?= ($config->show_quiz_name == 'yes')?" value='yes' checked":" value='no' "; ?>>
										  <label class="form-check-label" for="inlineCheckbox1">Quiz Name</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" name="show_page_title" type="checkbox" id="inlineCheckbox2" <?= ($config->show_page_title == 'yes')?"value='yes' checked":"value='no' "; ?>>
										  <label class="form-check-label" for="inlineCheckbox2">Page Titles</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" name="show_logo" type="checkbox" id="inlineCheckbox3" <?= ($config->show_logo == 'yes')?"value='yes' checked":"value='no' "; ?>>
										  <label class="form-check-label" for="inlineCheckbox3">Logo</label>
										</div>
			    					</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div class="save_continue form-group row">
			    		<div class="col">
			    			<div class="form-group row">
			    				<div class="col-sm-2 border-right">
			    					<label for="" class="fw-bold"> Save and Continue Later</label>
			    				</div>
			    				<div class="col-sm-10">
			    					<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="save_continue_later" id="inlineCheckbox2" value="yes" <?= ($config->save_continue_later == 'yes')?"checked":" "; ?>>
										<label class="form-check-label" for="inlineCheckbox4">Allow save and continue later</label>
									</div>
									<p class="text-disabled small">Respondents will have the option to return and complete the quiz at a later time. After clicking save and continue the quiz taker will be allowed to request an email containing the quiz link</p>
								
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div class="time_limit form-group row">
			    		<div class="col">
			    			<div class="form-group row">
			    				<div class="col-sm-2">
			    					<label for="" class="fw-bold"> Time limit</label>
			    				</div>
			    				<div class="col-sm-10">
			    					<div class="form-check form-check-inline">
										<input class="form-check-input" name="set_paper_timer" type="checkbox" id="inlineCheckbox2" value="yes" <?= ($config->set_paper_timer == 'yes')?"checked":" "; ?>>
										<label class="form-check-label" for="inlineCheckbox4">Allow Timer for paper</label>
									</div>
									<input type="time" name="paper_time" class="form-control" placeholder="hh:mm" <?= ($config->paper_time)?"value=$config->paper_time":" "; ?>>
									<p class="small text-muted">Respondents will only have the set time to complete the whole quiz. The time limit is entered in the format hours:minutes (hh:mm)</p>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<!-- <div class="time_limit_per_question form-group row">
			    		<div class="col">
			    			<div class="form-group row">
			    				<div class="col-sm-2">
			    					<label for="" class="fw-bold"> Page Time limits</label>
			    				</div>
			    				<div class="col-sm-10">
			    					<button type="button" class="btn btn-success">Set time limits</button>
									<p class="small text-muted">Set individual time limits for each page within your quiz</p>
			    				</div>
			    			</div>
			    		</div>
			    	</div> -->
			    	<div class="questions_per-page form-group row">
			    		<div class="col">
			    			<div class="form-group row">
			    				<div class="col-sm-2">
			    					<label for="" class="fw-bold"> Questions per page</label>
			    				</div>
			    				<div class="col-sm-10">
			    					<div class="row">
			    						<div class="col">
			    							<div class="form-check form-check-inline">
												<input class="form-check-input" name="set_questions_per_page" type="checkbox" id="inlineCheckbox2" value="yes" <?= ($config->set_questions_per_page == 'yes')?"checked":" "; ?>>
												<input type="number" name="questions_per_page" class="form-control" placeholder="No. of questions" <?= ($config->questions_per_page)?"value=$config->questions_per_page":" "; ?>>
												<label class="form-check-label" for="inlineCheckbox4">Questions</label>
											</div>
			    						</div>
			    						<div class="col">
			    							
			    						</div>
			    					</div>
									<p class="small text-muted">If selected this will override the page setup on the Create screen so that when the quiz is taken each page will contain the set number of questions.</p>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div class="schedule form-group row">
			    		<div class="col">
			    			<div class="form-group row">
			    				<div class="col-sm-2">
			    					<label for="" class="fw-bold"> Schedule</label>
			    				</div>
			    				<div class="col-sm-10">
			    					<div class="row">
			    						<div class="col">
			    							<div class="form-check form-check-inline">
												<input class="form-check-input" name="set_exam_schedule" type="checkbox" id="inlineCheckbox2" value="yes" <?= ($config->set_exam_schedule == 'yes')?"checked":" "; ?>>
											</div>
			    						</div>
			    					</div>
			    					<div class="row">
			    						<label for="" class="fw-bold">From :</label>
			    						<div class="col form-group">
			    							<label for="">Date</label>
			    							<input name="from_date" type="date" class="form-control" <?= ($config->from_date)?"value=$config->from_date":" "; ?>>
			    						</div>
			    						<div class="col form-group">
			    							<label>Time</label>
			    							<input name="from_time" type="time" class="form-control" <?= ($config->from_time)?"value=$config->from_time":" "; ?>>
			    						</div>
			    					</div>
			    					<div class="row">
			    						<label for="" class="fw-bold">To :</label>
			    						<div class="col form-group">
			    							<label for="">Date</label>
			    							<input name="to_date" type="date" class="form-control" <?= ($config->to_date)?"value=$config->to_date":" "; ?>>
			    						</div>
			    						<div class="col form-group">
			    							<label>Time</label>
			    							<input name="to_time" type="time" class="form-control" <?= ($config->to_time)?"value=$config->to_time":" "; ?>>
			    						</div>
			    					</div>
									<p class="small text-muted">Set a schedule for when your quiz will automatically open and then close based on the timezone for your account. Your current time zone is (GMT-05:30) Indian Standard Time</p>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div class="schedule form-group row">
			    		<div class="col">
			    			<div class="form-group row">
			    				<div class="col-sm-2">
			    					<label for="" class="fw-bold"> Allow edit commands</label>
			    				</div>
			    				<div class="col-sm-10">
			    					<div class="form-check form-check-inline">
										<input class="form-check-input" name="allow_cut" type="checkbox" id="inlineCheckbox5" value="yes" <?= ($config->allow_cut == 'yes')?"checked":" "; ?>>
										<label class="form-check-label" for="inlineCheckbox5">Cut</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="allow_copy" id="inlineCheckbox6" value="yes" <?= ($config->allow_copy == 'yes')?"checked":" "; ?>>
										<label class="form-check-label" for="inlineCheckbox6">Copy</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="allow_paste" id="inlineCheckbox7" value="yes" <?= ($config->allow_paste == 'yes')?"checked":" "; ?>>
										<label class="form-check-label" for="inlineCheckbox7">Paste</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="allow_right_mouse_click" id="inlineCheckbox8" value="yes" <?= ($config->allow_right_mouse_click == 'yes')?"checked":" "; ?>>
										<label class="form-check-label" for="inlineCheckbox8">Right Mouse Click Menu</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" name="allow_print" type="checkbox" id="inlineCheckbox9" value="yes" <?= ($config->allow_print == 'yes')?"checked":" "; ?>>
										<label class="form-check-label" for="inlineCheckbox9">Print</label>
									</div>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<hr>
			    	<div class="submit">
			    		<div class="form-group">
			    			<button type="submit" class="w3-btn w3-teal "> Submit</button>
			    		</div>
			    	</div>
			    </form>
			    </div>
			    <div class="tab-pane fade" id="v-pills-grading" role="tabpanel" aria-labelledby="v-pills-grading-tab">
			    	<?php include 'grading.php'; ?>
			    </div>
			    <div class="tab-pane fade" id="v-pills-results" role="tabpanel" aria-labelledby="v-pills-results-tab">
			    	<p>this is results div</p>
			    </div>
			    <div class="tab-pane fade" id="v-pills-certicates" role="tabpanel" aria-labelledby="v-pills-certicates-tab">
			    	<p>this is certificates div</p>
			    </div>
			    <div class="tab-pane fade" id="v-pills-notifications" role="tabpanel" aria-labelledby="v-pills-notifications-tab">
			    	<p>this is for notifications div</p>
			    </div>
			    <div class="tab-pane fade" id="v-pills-themes" role="tabpanel" aria-labelledby="v-pills-themes-tab">
			    	<div class="row">
			    	<form action="<?= base_url('control_panel/set_theme'); ?>" method="post">
			    		<?php foreach ($papers as $paper): ?>
		                    <?php if (($paper->id) == ($selected_paper_id)): ?>
		                    <?= form_hidden('id',$config->id); ?>
		                    <?php endif; ?>
		                 <?php endforeach; ?>
			    		<div class="col-sm-2">
			    			<label for="" class="fw-bold">Select Theme :</label>
			    		</div>
			    		
			    		<div class="col-sm-10 ">
			    			<div class="form-group justify-center w-100">
			    				<input type="color" value="<?= set_value('set_theme',$config->set_theme) ?>" class="form-control mx-auto d-block" style="height: 100px;" name="set_theme"  required>
			    			</div>
			    		</div>
			    		<div class="col-sm-12">
			    			<button type="submit" class="w3-btn w3-teal btn mx-auto d-block">Select Theme</button>
			    		</div>
			    	</form>
			    	</div>
			    </div>
			  </div>
				<?php else: ?>		
				<?php endif; ?>	
				<?php endforeach ?>

			<?php else: ?>
				<div class="tab-content" id="v-pills-tabContent">
			    <div class="tab-pane fade show active py-3" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
			    	<form method="post" action="<?= base_url('control_panel/configure_paper'); ?>">
			    	<div class="form-group row">
			    		<label for="quiz_name" class="col-sm-2 form-control-label fw-bold">Quiz Name</label>
			    		<div class="col-sm-10">
			    			<?php foreach ($papers as $paper): ?>
		                    <?php if (($paper->id) == ($paper_selected)): ?>
		                    <?= form_hidden('page_id',$paper->id); ?>
				    			<input type="text" class="form-control" id="quiz_name" name="page_name" value='<?= $paper->page_name; ?>' placeholder="Quiz name..." disabled>
							<?php else: ?>
								<!-- <input type="text" class="form-control" id="quiz_name" name="page_name"   placeholder="Quiz name..."> -->
							<?php endif; ?>	
						<?php endforeach; ?>
			    		</div>
			    	</div>
			    	<div class="display_settings form-group row">
			    		<div class="col">
			    			<div class="form-group row">
			    				<div class="col-sm-2 "><label class="fw-bold">Display</label></div>
			    					<div class="col-sm-10">
			    						<div class="form-check form-check-inline">
										  <input class="form-check-input" name="show_quiz_name" type="checkbox" id="inlineCheckbox1" value="yes">
										  <label class="form-check-label" for="inlineCheckbox1">Quiz Name</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" name="show_page_title" type="checkbox" id="inlineCheckbox2" value="yes">
										  <label class="form-check-label" for="inlineCheckbox2">Page Titles</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" name="show_logo" type="checkbox" id="inlineCheckbox3" value="yes">
										  <label class="form-check-label" for="inlineCheckbox3">Logo</label>
										</div>
			    					</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div class="save_continue form-group row">
			    		<div class="col">
			    			<div class="form-group row">
			    				<div class="col-sm-2 border-right">
			    					<label for="" class="fw-bold"> Save and Continue Later</label>
			    				</div>
			    				<div class="col-sm-10">
			    					<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="save_continue_later" id="inlineCheckbox2" value="yes">
										<label class="form-check-label" for="inlineCheckbox4">Allow save and continue later</label>
									</div>
									<p class="text-disabled small">Respondents will have the option to return and complete the quiz at a later time. After clicking save and continue the quiz taker will be allowed to request an email containing the quiz link</p>
								
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div class="time_limit form-group row">
			    		<div class="col">
			    			<div class="form-group row">
			    				<div class="col-sm-2">
			    					<label for="" class="fw-bold"> Time limit</label>
			    				</div>
			    				<div class="col-sm-10">
			    					<div class="form-check form-check-inline">
										<input class="form-check-input" name="set_paper_timer" type="checkbox" id="inlineCheckbox2" value="yes">
										<label class="form-check-label" for="inlineCheckbox4">Allow Timer for paper</label>
									</div>
									<input type="time" name="paper_time" class="form-control" placeholder="hh:mm">
									<p class="small text-muted">Respondents will only have the set time to complete the whole quiz. The time limit is entered in the format hours:minutes (hh:mm)</p>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<!-- <div class="time_limit_per_question form-group row">
			    		<div class="col">
			    			<div class="form-group row">
			    				<div class="col-sm-2">
			    					<label for="" class="fw-bold"> Page Time limits</label>
			    				</div>
			    				<div class="col-sm-10">
			    					<button type="button" class="btn btn-success">Set time limits</button>
									<p class="small text-muted">Set individual time limits for each page within your quiz</p>
			    				</div>
			    			</div>
			    		</div>
			    	</div> -->
			    	<div class="questions_per-page form-group row">
			    		<div class="col">
			    			<div class="form-group row">
			    				<div class="col-sm-2">
			    					<label for="" class="fw-bold"> Questions per page</label>
			    				</div>
			    				<div class="col-sm-10">
			    					<div class="row">
			    						<div class="col">
			    							<div class="form-check form-check-inline">
												<input class="form-check-input" name="set_questions_per_page" type="checkbox" id="inlineCheckbox2" value="yes">
												<input type="number" name="questions_per_page" class="form-control" placeholder="No. of questions">
												<label class="form-check-label" for="inlineCheckbox4">Questions</label>
											</div>
			    						</div>
			    						<div class="col">
			    							
			    						</div>
			    					</div>
									<p class="small text-muted">If selected this will override the page setup on the Create screen so that when the quiz is taken each page will contain the set number of questions.</p>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div class="schedule form-group row">
			    		<div class="col">
			    			<div class="form-group row">
			    				<div class="col-sm-2">
			    					<label for="" class="fw-bold"> Schedule</label>
			    				</div>
			    				<div class="col-sm-10">
			    					<div class="row">
			    						<div class="col">
			    							<div class="form-check form-check-inline">
												<input class="form-check-input" name="set_exam_schedule" type="checkbox" id="inlineCheckbox2" value="yes">
											</div>
			    						</div>
			    					</div>
			    					<div class="row">
			    						<label for="" class="fw-bold">From :</label>
			    						<div class="col form-group">
			    							<label for="">Date</label>
			    							<input name="from_date" type="date" class="form-control">
			    						</div>
			    						<div class="col form-group">
			    							<label>Time</label>
			    							<input name="from_time" type="time" class="form-control">
			    						</div>
			    					</div>
			    					<div class="row">
			    						<label for="" class="fw-bold">To :</label>
			    						<div class="col form-group">
			    							<label for="">Date</label>
			    							<input name="to_date" type="date" class="form-control">
			    						</div>
			    						<div class="col form-group">
			    							<label>Time</label>
			    							<input name="to_time" type="time" class="form-control">
			    						</div>
			    					</div>
									<p class="small text-muted">Set a schedule for when your quiz will automatically open and then close based on the timezone for your account. Your current time zone is (GMT-05:30) Indian Standard Time</p>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div class="schedule form-group row">
			    		<div class="col">
			    			<div class="form-group row">
			    				<div class="col-sm-2">
			    					<label for="" class="fw-bold"> Allow edit commands</label>
			    				</div>
			    				<div class="col-sm-10">
			    					<div class="form-check form-check-inline">
										<input class="form-check-input" name="allow_cut" type="checkbox" id="inlineCheckbox5" value="yes">
										<label class="form-check-label" for="inlineCheckbox5">Cut</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="allow_copy" id="inlineCheckbox6" value="yes">
										<label class="form-check-label" for="inlineCheckbox6">Copy</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="allow_paste" id="inlineCheckbox7" value="yes">
										<label class="form-check-label" for="inlineCheckbox7">Paste</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="allow_right_mouse_click" id="inlineCheckbox8" value="yes">
										<label class="form-check-label" for="inlineCheckbox8">Right Mouse Click Menu</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" name="allow_print" type="checkbox" id="inlineCheckbox9" value="yes">
										<label class="form-check-label" for="inlineCheckbox9">Print</label>
									</div>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<hr>
			    	<div class="submit">
			    		<div class="form-group">
			    			<button type="submit" class="w3-btn w3-teal "> Submit</button>
			    		</div>
			    	</div>
			    </form>
			    </div>
			    <div class="tab-pane fade" id="v-pills-grading" role="tabpanel" aria-labelledby="v-pills-grading-tab">
			    	<?php include 'grading.php'; ?>
			    </div>
			    <div class="tab-pane fade" id="v-pills-results" role="tabpanel" aria-labelledby="v-pills-results-tab">
			    	<p>this is results div</p>
			    </div>
			    <div class="tab-pane fade" id="v-pills-certicates" role="tabpanel" aria-labelledby="v-pills-certicates-tab">
			    	<p>this is certificates div</p>
			    </div>
			    <div class="tab-pane fade" id="v-pills-notifications" role="tabpanel" aria-labelledby="v-pills-notifications-tab">
			    	<p>this is for notifications div</p>
			    </div>
			    <div class="tab-pane fade" id="v-pills-themes" role="tabpanel" aria-labelledby="v-pills-themes-tab">
			    	<div class="row">
			    	<form action="<?= base_url('control_panel/set_theme'); ?>" method="post">
			    		<?php foreach ($papers as $paper): ?>
		                    <?php if (($paper->id) == ($selected_paper_id)): ?>
		                    <?= form_hidden('page_id',$paper->id); ?>
		                    <?php endif; ?>
		                 <?php endforeach; ?>
			    		<div class="col-sm-2">
			    			<label for="" class="fw-bold">Select Theme :</label>
			    		</div>
			    		
			    		<div class="col-sm-10 ">
			    			<div class="form-group justify-center w-100">
			    				<input type="color" value="#047623" class="form-control mx-auto d-block" style="height: 100px;" name="set_theme"  required>
			    			</div>
			    		</div>
			    		<div class="col-sm-12">
			    			<button type="submit" class="w3-btn w3-teal btn mx-auto d-block">Select Theme</button>
			    		</div>
			    	</form>
			    	</div>
			    </div>
			  </div>

			<?php endif; ?>
</div>
<?php else: ?>
	<div class="col-lg-12 w-75 mx-auto d-block">
		<div class="row">
			<?php foreach($papers as $paper): ?>
			<div class="col-lg-4 p-2">
				<form action="<?= base_url("control_panel"); ?>" method="get" class="w3-card w3-btn w-100 w3-light-gray w3-round p-2">
				<?= form_hidden('paper_id',$paper->id); ?>
				<img src="<?= base_url("assets/images/paper.png"); ?>" alt="Paper" class="img-fluid mx-auto d-block">
				<p class="text-center w3-text-teal fw-bold"><?= $paper->page_name; ?></p>
				<button class=" mx-auto d-block btn-block w3-block w3-btn btn w3-teal" type="submit">Select</button>
				</form>
			</div>
			<?php endforeach; ?>
		</div>
			<!-- <div class="w3-card m-5 p-5 w3-round">
				<img src="<?php // base_url("assets/images/paper.png"); ?>" alt="Paper" class="img-fluid">
				<h3 class="text-center">Select Paper</h3>
				<form action="<?php //base_url("control_panel"); ?>" method="get">
					<div class="form-group">
						<select name="paper_id" class="form-control">
							<option value="">Select Paper</option>
							<?php //foreach($papers as $paper): ?>
							<option value="<?php // $paper->id ?>"><?= $paper->page_name ?></option>
							<?php //endforeach; ?>
						</select>
					</div>
					<button class="btn btn-success mx-auto d-block" type="submit">Submit</button>
				</form>
			</div> -->	
			<?php endif; ?>
		</div>
	</div>
</div>