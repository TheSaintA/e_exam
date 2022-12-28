<div class="container-fluid  mt-2 pt-0 mb-2 w-100  p-3 w3-round ">
	<div class="row">
		<div class="col-lg-12 border">
			<table class="table table-inverse table-hover">
				<thead>
					<tr>
						<th>Grade</th>
						<th>Minimum %</th>
					</tr>
				</thead>
				<form method="post" action="<?= base_url('control_panel/add_grading'); ?>">
					<?php foreach ($papers as $paper): ?>
		            <?php if (($paper->id) == ($selected_paper_id)): ?>
		            <?= form_hidden('page_id',$paper->id); ?>
					<?php endif; ?>
				<?php endforeach; ?>
				<?php if ($get_grading): ?>
				<?php foreach ($get_grading as $grade): ?>
					
					<tbody>
					<tr class="w-100">
						<td class="w-75">
							<div class="form-group">
								<input type="text" name="fail_grade" placeholder="Fail" class="form-control" value="<?= set_value('fail_grade',$grade->fail_grade) ?>" required>
							</div>
						</td>
						<td class='w-25'>
							<div class="form-group">
								<input type="text" name="max_percentage" class="form-control" value="<?= set_value('max_percentage',$grade->max_percentage) ?>" required>
							</div>
						</td>
					</tr>
					<tr>
						<td class="w-75">
							<div class="form-group">
								<input type="text" name="pass_grade" value="<?= set_value('pass_grade',$grade->pass_grade) ?>" placeholder="Pass" class="form-control" required>
							</div>
						</td>
						<td class='w-25'>
							<div class="form-group">
								<input type="text" name="min_percentage" value="<?= set_value('min_percentage',$grade->min_percentage) ?>" class="form-control"  required>
							</div>
						</td>
					</tr>
					<tr class="w-100">
						<td class="w-100">
							<button type="submit" class="btn w3-bn w3-teal">Add Grade</button>
							<br>
							<p class="p-small"> The result and grade can be shown to the respondent by setting the display options within the results tab</p>
						</td>
					</tr>
				</tbody>
				<?php endforeach ?>
			<?php else: ?>
				<tbody>
					<tr class="w-100">
						<td class="w-75">
							<div class="form-group">
								<input type="text" name="fail_grade" placeholder="Fail" class="form-control"  required>
							</div>
						</td>
						<td class='w-25'>
							<div class="form-group">
								<input type="text" name="max_percentage" class="form-control" value="<?= set_value('max_percentage',0) ?>" required>
							</div>
						</td>
					</tr>
					<tr>
						<td class="w-75">
							<div class="form-group">
								<input type="text" name="pass_grade"  placeholder="Pass" class="form-control" required>
							</div>
						</td>
						<td class='w-25'>
							<div class="form-group">
								<input type="text" name="min_percentage" value="<?= set_value('min_percentage',0) ?>" class="form-control"  required>
							</div>
						</td>
					</tr>
					<tr class="w-100">
						<td class="w-100">
							<button type="submit" class="btn w3-bn w3-teal">Add Grade</button>
							<br>
							<p class="p-small"> The result and grade can be shown to the respondent by setting the display options within the results tab</p>
						</td>
					</tr>
				</tbody>
			<?php endif; ?>
				</form>
			</table>
		</div>
	</div>
</div>