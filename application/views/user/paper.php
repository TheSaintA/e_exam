<?php include "header.php" ?>
    <div class="row mt-lg-4 ">
	    <?php include "control_div.php"; ?>
		<div class="col-lg-10 control-div">
            <?php include "alert.php" ?>
            <h5 class="pb-2 text-spruce font-weight-bold"><span class="fa fa-question-circle"></span> Add Questions to <?php foreach($papers as $paper){ if($paper->id == $selected_paper_id){ echo $paper->page_name; }else{}  } ?></h5>
                <hr class="mt-1 mb-3"/>
                <div class="w3-card w3-round-large p-2 w-100 table-responsive">
                  <button class="btn spruce w3-btn" data-target="#add_mcq" data-toggle="modal"><span class="fa fa-question-circle"></span> Add Question</button>
                  <button class="btn spruce w3-btn" data-target="#import_csv" data-toggle="modal"><span class="fas fa-file-csv"></span> Import CSV</button>
                  
          
          <!-- Modal -->
          <div class="modal fade" id="import_csv" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"><span class="fas fa-file-csv"></span> Import CSV</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?= base_url('control_panel/import/questions'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <p class="text-danger"><span class="fa fa-info-circle"></span> Imported file header should be in following format</p>
                  <div class="table-responsive">
                  <table class="table table-small table-striped table-inverse table-responsive">
                    <thead class="border">
                      <tr class="border">
                        <th class="border">question</th>
                        <th class="border">answer_1</th>
                        <th class="border">answer_2</th>
                        <th class="border">answer_3</th>
                        <th class="border">answer_4</th>
                        <th class="border">correct_answer</th>
                        <th class="border">page_id</th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="border"></td>
                          <td class="border"></td>
                          <td class="border"></td>
                          <td class="border"></td>
                          <td class="border"></td>
                          <td class="border"></td>
                          <?php foreach ($papers as $paper): ?>
                    <?php if (($paper->id) == ($selected_paper_id)): ?>
                    <td class="border"><?= $paper->id ?></td>
                  <?php else: ?>
                  <?php endif; ?>
                  <?php endforeach; ?>
                        </tr>
                      </tbody>
                  </table>
                  </div>
                  <div class="form-group">
                    <label for="">Import CSV File</label>
                    <input type="file" name="file"/>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn spruce"><span class="fas fa-file-csv"></span> Import</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal fade" id="add_mcq">
            <div class="modal-dialog modal-lg " role="document">
              <div class="modal-content text-center w3-light-gray">
                <div class="modal-header">
                  <h4 class="modal-title">Add Question</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
                    <textarea name="question" id="" class="form-control" placeholder="Question" required></textarea>
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
                  <select class="form-control" name="correct_answer" id="" required>
                    <option value=""> Choose answer</option>
                    <option value="answer_1">Option 1</option>
                    <option value="answer_2">Option 2</option>
                    <option value="answer_3">Option 3</option>
                    <option value="answer_4">Option 4</option>
                  </select> 
                   </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn spruce w3-btn"><span class="fa fa-question-circle"></span> Add Question</button>
                  <button type="button" class="btn btn-danger w3-btn" data-dismiss="modal"><span class="fa fa-times"></span> Cancel</button>
                </div>
              </form>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div>
                  <table class="table table-striped table-inverse font-weight-bold">
                    <thead class="spruce">
                      <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Correct Answer</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php if($getRows): ?>
                          <?php $count = $this->uri->segment(4); foreach($getRows as $question): ?>
                        <tr>
                          <td><?= ++$count; ?></td>
                          <td><?= $question->question ?></td>
                          <td><?= $question->correct_answer ?></td>
                          <td>
                          <a href="#edit_question<?= $question->id ?>" data-toggle="modal" class="btn w3-btn spruce"><span class="fa fa-edit"></span></a>
                    <a href="#delete_question<?= $question->id ?>" data-toggle="modal" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                    <div class="modal fade" id="delete_question<?= $question->id ?>">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Delete the Question ? </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
                              <label for="" class="text-success fw-bold">Choose the correct option</label>
                                <select class="form-control" name="correct_answer" id="" required/ >
                                  <option value="">Choose The Correct Answer</option>
                                  <option value="answer_1">Option 1</option>
                                  <option value="answer_2">Option 2</option>
                                  <option value="answer_3">Option 3</option>
                                  <option value="answer_4">Option 4</option>
                                </select> 
                             </div>
                          </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn w3-btn spruce"><span class="fa fa-save"></span> Save changes</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                          </div>
                        </form>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->      
                  </td>
                        </tr>
                        <?php endforeach; ?>
                        
                        <?php else: ?>
                          <?php endif; ?>
                      </tbody>
                  </table>
                  <?= $this->pagination->create_links(); ?>
                </div>
    </div>
    </div>
    <?php include "footer.php" ?>