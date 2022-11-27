<?php include "header.php" ?>
<div class="container">
	<div class="row">
		  <div class="col-lg-12 paper mt-1">
              <div class="p-2 rounded question">
                <h5 class="text-center pb-1 border-botom fw-bold font-monospace"> <?= $paper_name ?></h5>
                <?php if ($questions): ?>
                <form action="<?= base_url("set_paper"); ?>" method="">
                <?php $j=1; foreach($questions as $question): ?>

                <fieldset class="w3-light-gray p-3 w3-card rounded my-1" id="<?= $question->id; ?>">
                <div class="mb-2 border-bottom border-dark">
                  <p><strong>Q<?= $j++; ?> : <?= $question->question ?></strong></p>
                </div> 
                 <div class="float-end">
                    <a href="#edit_question<?= $question->id ?>" data-bs-toggle="modal" class="btn btn-success"><span class="fa fa-edit"></span></a>
                    <a href="#delete_question<?= $question->id ?>" data-bs-toggle="modal" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                    <div class="modal fade" id="delete_question<?= $question->id ?>">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Delete the Question ? </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">
                           <div class="w3-card p-2 w3-round my-3">
                             <p class="my-0 py-0"><strong>Question</strong></p>
                           <p><?= $question->question ?></p>
                           </div>
                           <p class="text-danger text-center">Are you sure , you want to delete this question?</p>
                          </div>
                          <div class="modal-footer">
                            <a href="<?= base_url("control_panel/delete_question/$question->page_id/$question->id"); ?>" type="button" class="btn btn-danger text-decoration-none"><span class="fa fa-trash"></span> Delete Now</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>

                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!--Edit Question Modal  -->
                    <div class="modal fade" id="edit_question<?= $question->id ?>">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Question ?</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <form action="<?= base_url('control_panel/update_question'); ?>" method="post">
                            <?= form_hidden('id',$question->id); ?>
                            <?= form_hidden('page_id',$question->page_id); ?>
                          <div class="modal-body">
                          <div class="form-group">
                            <label for="">Question</label>
                            
                            <textarea name="question" class="form-control" rows="4" required><?= $question->question ?></textarea>
                          </div>  
                          <div class=" row">
                            <div class="col-lg-6 form-group">
                              <input type="text" placeholder="Answer" name="answer_1" class="form-control" value="<?= set_value('answer_1',$question->answer_1); ?>" required/>
                            </div>
                            <div class="col-lg-6 form-group">
                              <input type="text" placeholder="Answer" name="answer_2" class="form-control" value="<?= set_value('answer_2',$question->answer_2); ?>" required/>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 form-group">
                              <input type="text" placeholder="Answer" name="answer_3" class="form-control" value="<?= set_value('answer_3',$question->answer_3); ?>" required/>
                            </div>
                            <div class="col-lg-6 form-group">
                              <input type="text" placeholder="Answer" name="answer_4" class="form-control" value="<?= set_value('answer_4',$question->answer_4); ?>" required/>
                            </div>

                          </div>
                          
                          <div class="row">
                            <div class="col-lg-12 form-group">
                              <label for="" class="text-success fw-bold">Correct Answer</label>
                              <input type="text" placeholder="Answer" name="correct_answer" class="form-control text-success" value="<?= set_value('correct_answer',$question->correct_answer); ?>" required/>
                            </div>
                          </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Save changes</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                          </div>
                        </form>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                  </div>  
              <div>
                <?php for ($i=1; $i < 5; $i++): ?>
                   <?php $ans = "answer_".$i; ?>
                
                  <div class="form-check">
                <input class="form-check-input" type="radio" name="<?= $question->id ?>" id="flexRadioDefault<?= $i.$question->id; ?>">
                <label class="form-check-label" for="flexRadioDefault<?= $i.$question->id; ?>">
                  <?=  $question->$ans; ?>
                </label>
              </div>
                
            <?php endfor; ?>
              </div>
            </fieldset>
              <?php endforeach; ?>
                <!-- <button type="submit" class="w3-btn w3-teal mx-auto mt-3 d-block"><span class="fa fa-file"></span> Set Paper</button> -->
              
            </form>
            <?php endif; ?>
              </div>
            </div>
           

	</div>
  <div class="paper-buttons position-fixed" style="bottom:10%;right:0%;">
    <div class="control-div btn-group-vertical ">
      <button type="button" data-bs-toggle="modal" data-bs-target="#add_mcq" class="btn w3-card-4 my-1 w3-button w3-teal fw-bold">
        <span class="fa fa-file"></span>
           <br>Add <br><label> Question</label></button>
     </div>
</div>  
<div class="modal fade" id="add_mcq">
            <div class="modal-dialog modal-lg " role="document">
              <div class="modal-content text-center w3-light-gray">
                <div class="modal-header">
                  <h4 class="modal-title">Add Question</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="post" action="<?= base_url("control_panel/add_question"); ?>">
                <div class="modal-body">
                  <div class="form-group">
                    <?php foreach ($papers as $paper): ?>
                    <?php if (($paper->id) == ($selected_paper_id)): ?>
                    <h5 class="text-center"><?= $paper->page_name ?></h5>
                    <?= form_hidden('page_id',$paper->id); ?>
                  <?php else: ?>
                  <?php endif; ?>
                  <?php endforeach; ?>
                   
                  </div>
                  <div class="form-group">
                    <textarea name="question" id="" class="form-control" placeholder="Question"></textarea>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                    <input type="text" name="answer_1" class="form-control" placeholder="Answer 1" required>
                  </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                    <input type="text" name="answer_2" class="form-control" placeholder="Answer 2" required>
                  </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                    <input type="text" name="answer_3" class="form-control" placeholder="Answer 3" required>
                  </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                    <input type="text" name="answer_4" class="form-control" placeholder="Answer 4" required>
                  </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" name="correct_answer" class="form-control" placeholder="Correct Answer" required>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Add Question</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span class="fa fa-times"></span> Cancel</button>
                </div>
              </form>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div>
</div>
<?php include "footer.php" ?>