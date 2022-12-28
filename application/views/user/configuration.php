<div class="container-fluid  mt-2 pt-0 mb-2 w-100  p-3 w3-round ">
	<div class="row">
		<?php if ($paper_selected): ?>
		<?php include "control_div.php" ?>
		<div class="col-lg-10 font-weight-bold">
		<h5 class="pb-2 text-spruce font-weight-bold"><span class="fa fa-cog"></span> Settings</h5>
                <hr class="mt-1 mb-3"/>
				<?php include "alert.php" ?>
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
							<?= form_hidden('paper_id',$config->page_id); ?>
				    			<input type="text" class="form-control w-25 float-right" id="quiz_name" name="page_name" value='<?= $paper->page_name; ?>' placeholder="Quiz name..." muted>
							<?php else: ?>
							<?php endif; ?>	
						<?php endforeach; ?>
			    		</div>
			    	</div>
			    	<div class="display_settings form-group row">
			    		<div class="col">
			    			<div class="row">
			    					<div class="col-sm-12">
			    						<div class="float-left">
											<label class="" for="inlineCheckbox1">Quiz Name</label>
											<?=($config->show_quiz_name == 'on') ? "<label class='mx-2 p-2 w3-round-large btn-success'>Enabled</label>" : "<label class=' mx-2 p-2 w3-round-large btn-danger'>Disabled</label>"; ?>
										</div>
										<div class="form-group float-right">
										<select name="show_quiz_name" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Show</option>
											<option value="off">Hide</option>
										</select>
										</div>
							</div>
							<div class="col-sm-12">
										<div class="float-left">
											<label class="form-check-label" for="inlineCheckbox1">Page Titles</label>
											<?=($config->show_page_title == 'on') ? "<label class='mx-2 p-2 w3-round-large btn-success'>Enabled</label>" : "<label class=' mx-2 p-2 w3-round-large btn-danger'>Disabled</label>"; ?>
										</div>
										<div class="form-group float-right">
										<select name="show_page_title" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Show</option>
											<option value="off">Hide</option>
										</select>
										</div>
							</div>
							<div class="col-sm-12 clearfix">
										<div class="float-left">
											<label class="form-check-label" for="inlineCheckbox1">Logo</label>
											<?=($config->show_logo == 'on') ? "<label class='mx-2 p-2 w3-round-large btn-success'>Enabled</label>" : "<label class=' mx-2 p-2 w3-round-large btn-danger'>Disabled</label>"; ?>
										</div>
										<div class="form-group float-right">
										<select name="show_logo" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Show</option>
											<option value="off">Hide</option>
										</select>
										</div>
			    					</div>
			    			</div>
			    		</div>
			    	</div>
			    	
			    	<div class="schedule form-group row">
			    		<div class="col">
			    			<div class="row">
			    				<div class="col-sm-12 my-2 border-bottom">
			    					<h4 for="" class="fw-bold"> Allow edit commands</h4>
									
			    				</div>
			    				<div class="col-sm-12">
			    					<div class="float-left">
										<p class="form-check-label" for="inlineCheckbox5">Allow Cut
										<?=($config->allow_cut == 'on') ? "<label class='mx-2 p-2 w3-round-large btn-success'>Enabled</label>" : "<label class=' mx-2 p-2 w3-round-large btn-danger'>Disabled</label>"; ?>
										</p>
									</div>
									<div class="float-right form-group">
									<select name="allow_cut" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Enable</option>
											<option value="off">Disable</option>
										</select>
									</div>
							</div>
							<div class="col-sm-12">
			    					<div class="float-left">
										<p class="form-check-label" for="inlineCheckbox5">Enable Copy
										<?=($config->allow_copy == 'on') ? "<label class='mx-2 p-2 w3-round-large btn-success'>Enabled</label>" : "<label class=' mx-2 p-2 w3-round-large btn-danger'>Disabled</label>"; ?>
										</p>
									</div>
									<div class="float-right form-group">
									<select name="allow_copy" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Enable</option>
											<option value="off">Disable</option>
										</select>
									</div>
							</div>
							<div class="col-sm-12">
			    					<div class="float-left">
										<p class="form-check-label" for="inlineCheckbox5">Allow Paste
										<?=($config->allow_paste == 'on') ? "<label class='mx-2 p-2 w3-round-large btn-success'>Enabled</label>" : "<label class=' mx-2 p-2 w3-round-large btn-danger'>Disabled</label>"; ?>
										</p>
									</div>
									<div class="float-right form-group">
									<select name="allow_paste" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Enable</option>
											<option value="off">Disable</option>
										</select>
									</div>
							</div>
							<div class="col-sm-12">
			    					<div class="float-left">
										<p class="form-check-label" for="inlineCheckbox5">Allow Right Mouse Click
										<?=($config->allow_right_mouse_click == 'on') ? "<label class='mx-2 p-2 w3-round-large btn-success'>Enabled</label>" : "<label class=' mx-2 p-2 w3-round-large btn-danger'>Disabled</label>"; ?>
										</p>
									</div>
									<div class="float-right form-group">
									<select name="allow_right_mouse_click" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Enable</option>
											<option value="off">Disable</option>
										</select>
									</div>
							</div>
							<div class="col-sm-12">
			    					<div class="float-left">
										<p class="form-check-label" for="inlineCheckbox5">Allow Print
										<?=($config->allow_print == 'on') ? "<label class='mx-2 p-2 w3-round-large btn-success'>Enabled</label>" : "<label class=' mx-2 p-2 w3-round-large btn-danger'>Disabled</label>"; ?>
										</p>
									</div>
									<div class="float-right form-group">
									<select name="allow_print" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Enable</option>
											<option value="off">Disable</option>
										</select>
									</div>
							</div>
							<div class="col-sm-10">
			    			<label for="" class="fw-bold">Select Theme :</label>
			    		</div>
			    		
			    		<div class="col-sm-2 ">
			    			<div class="form-group justify-center w-100">
			    				<input type="color" value="<?= set_value('set_theme',$config->set_theme) ?>" class="form-control " name="set_theme"  required>
			    			</div>
			    		</div>
			    			</div>
			    		</div>
			    	</div>
			    	<hr>
			    	<div class="submit mx-auto d-block text-center">
			    		<div class="form-group w-100 ">
			    			<button type="submit" class="w3-btn btn spruce"> <span class="fa fa-cog"></span> Update Configuration</button>
			    		</div>
			    	</div>
			    </form>
			    </div>

			   
			  </div>
				<?php else: ?>		
				<?php endif; ?>	
				<?php endforeach ?>

			<?php else: ?>
				<div class="tab-content" id="v-pills-tabContent">
			    <div class="tab-pane fade show active py-3" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
			    	<form method="post" action="<?= base_url('control_panel/set_configuration'); ?>">
			    	<div class="form-group row">
			    		<label for="quiz_name" class="col-sm-2 form-control-label fw-bold">Quiz Name</label>
			    		<div class="col-sm-10">
			    			<?php foreach ($papers as $paper): ?>
		                    <?php if (($paper->id) == ($paper_selected)): ?>
		                    <?= form_hidden('page_id',$paper->id); ?>
				    			<input type="text" class="form-control" id="quiz_name" name="page_name" value='<?= $paper->page_name; ?>' placeholder="Quiz name..." disabled>
							<?php else: ?>
								<?php endif; ?>	
						<?php endforeach; ?>
			    		</div>
			    	</div>
			    	<div class="display_settings form-group row">
			    		<div class="col">
			    			<div class="row">
			    					<div class="col-sm-12">
			    						<div class="float-left">
											<label class="" for="inlineCheckbox1">Quiz Name</label>
											</div>
										<div class="form-group float-right">
										<select name="show_quiz_name" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Show</option>
											<option value="off">Hide</option>
										</select>
										</div>
							</div>
							<div class="col-sm-12">
										<div class="float-left">
											<label class="form-check-label" for="inlineCheckbox1">Page Titles</label>
											</div>
										<div class="form-group float-right">
										<select name="show_page_title" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Show</option>
											<option value="off">Hide</option>
										</select>
										</div>
							</div>
							<div class="col-sm-12 clearfix">
										<div class="float-left">
											<label class="form-check-label" for="inlineCheckbox1">Logo</label>
											</div>
										<div class="form-group float-right">
										<select name="show_logo" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Show</option>
											<option value="off">Hide</option>
										</select>
										</div>
			    					</div>
			    			</div>
			    		</div>
			    	</div>
			    	
			    	<div class="schedule form-group row">
			    		<div class="col">
			    			<div class="row">
			    				<div class="col-sm-12 my-2 border-bottom">
			    					<h4 for="" class="fw-bold"> Allow edit commands</h4>
									
			    				</div>
			    				<div class="col-sm-12">
			    					<div class="float-left">
										<p class="form-check-label" for="inlineCheckbox5">Allow Cut</p>
										</div>
									<div class="float-right form-group">
									<select name="allow_cut" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Enable</option>
											<option value="off">Disable</option>
										</select>
									</div>
							</div>
							<div class="col-sm-12">
			    					<div class="float-left">
										<p class="form-check-label" for="inlineCheckbox5">Enable Copy</p>
										</div>
									<div class="float-right form-group">
									<select name="allow_copy" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Enable</option>
											<option value="off">Disable</option>
										</select>
									</div>
							</div>
							<div class="col-sm-12">
			    					<div class="float-left">
										<p class="form-check-label" for="inlineCheckbox5">Allow Paste</p>
										</div>
									<div class="float-right form-group">
									<select name="allow_paste" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Enable</option>
											<option value="off">Disable</option>
										</select>
									</div>
							</div>
							<div class="col-sm-12">
			    					<div class="float-left">
										<p class="form-check-label" for="inlineCheckbox5">Allow Right Mouse Click</p>
										</div>
									<div class="float-right form-group">
									<select name="allow_right_mouse_click" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Enable</option>
											<option value="off">Disable</option>
										</select>
									</div>
							</div>
							<div class="col-sm-12">
			    					<div class="float-left">
										<p class="form-check-label" for="inlineCheckbox5">Allow Print</p>
										</div>
									<div class="float-right form-group">
									<select name="allow_print" class="form-control" required>
											<option>Choose Action</option>
											<option value="on">Enable</option>
											<option value="off">Disable</option>
										</select>
									</div>
							</div>
							<div class="col-sm-2">
			    			<label for="" class="fw-bold">Select Theme :</label>
			    		</div>
			    		
			    		<div class="col-sm-10 ">
			    			<div class="form-group justify-center w-100">
			    				<input type="color" value="#047623" class="form-control mx-auto d-block" style="height: 100px;" name="set_theme"  required>
			    			</div>
			    		</div>
			    			</div>
			    		</div>
			    	</div>
			    	<hr>
			    	<div class="submit mx-auto d-block text-center">
			    		<div class="form-group w-100 ">
			    			<button type="submit" class="w3-btn btn spruce"> <span class="fa fa-cog"></span> Set Configuration</button>
			    		</div>
			    	</div>
			    </form>
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
			<?php endif; ?>
		</div>
	</div>
</div>