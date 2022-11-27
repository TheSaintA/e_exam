<div class="container-fluid  mt-0 pt-0 mb-2 w-100  p-3 w3-round ">
          <div class="row mt-0 pt-1 ">
            <div class="col-lg-12 d-flex justify-content-end mt-3">
              <button data-bs-toggle="modal" data-bs-target="#new_paper" class="btn btn-outline-success fw-bold position-fixed" style="bottom:10px;right:10px;"><span class="fa fa-file"></span> New Paper</button>
              <div class="modal fade" id="new_paper">
                <div class="modal-dialog modal-" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h4 class="modal-title">Create New Paper</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                    <form method="post" action="<?= base_url("control_panel/create_paper"); ?>">
                    <div class="modal-body">
                      <?= form_hidden('create_date',time()); ?>
                      <div class="form-group">
                        <textarea name="page_name" id="" class="form-control" placeholder="Enter the name of new paper" rows="3" required></textarea>
                      </div>
                      <div class="form-group">
                        <textarea name="description" id="" class="form-control" placeholder="Paper description" rows="3" required></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </div>
            <div class="col-lg-12">
               <?php if ($papers): ?>
                  <div class="form-responsive w-100">
                    <table class="table table-inverse table-hover">
                      <thead class="w3-teal w3-round-large">
                        <tr class="text-center">
                          <th>#</th>
                          <th>Paper</th>
                          <th>Description</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($papers as $paper): ?>
                        <tr class="text-center">
                          <td><?= $paper->id ?></td>
                          <td><a class="text-decoration-none text-dark" href="<?= base_url("control_panel/getQuestions?page_id=$paper->id"); ?>"><?= $paper->page_name ?></a>
                            </td>
                            <td><?= $paper->description ?></td>
                            <td>
                              <?php if ($paper->set_unset == 0): ?>
                                <label class="text-danger" for="" ><span class="fa fa-check-circle text-warning"></span> Down</label>
                              <?php else: ?>          
                              <label for="" class="text-success"><span class="fa fa-check-circle text-success"></span> Live</label>                      
                              <?php endif; ?>
                            </td>
                          <td>
                            <div class="btn-group">
                              <?php if ($paper->set_unset == 0): ?>
                                <a href="<?= base_url("control_panel/paper_status/$paper->id/1"); ?>" class="btn btn-primary text-decoration-none"><span class="fa fa-file"></span> Publish</a>
                              <?php else: ?>
                              <a href="<?= base_url("control_panel/paper_status/$paper->id/0"); ?>" class="btn btn-warning text-decoration-none"><span class="fa fa-file"></span> Remove</a>  
                              <?php endif ?>
                              <a href="#" class="btn btn-success text-decoration-none" data-bs-toggle="modal" data-bs-target="#modal_edit<?= $paper->id ?>"><span class="fa fa-edit"></span> Edit</a>
                              <a href="#" class="btn btn-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#modal_close<?= $paper->id ?>"><span class="fa fa-trash"></span> Delete</a>
                            </div>
                          </td>
                        </tr>
                        <!-- Edit Modal -->
                    <div class="modal fade" id="modal_edit<?= $paper->id ?>">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content text-center w3-light-gray">
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Paper ?</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <form action="<?= base_url('control_panel/rename_paper'); ?>" method="get">
                            <?= form_hidden('id',$paper->id); ?>
                            <div class="form-group">
                            </div>
                             <div class="modal-body ">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Page name..." value="<?= set_value('page_name',$paper->page_name)?>" name="page_name" required>
                            </div>
                            <div class="form-group">
                              <textarea class="form-control" placeholder="Page description..." rows="10" name="description" required><?= $paper->description ?></textarea>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><span class="fa fa-edit"></span> Rename</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span class="fa fa-times"></span> Cancel</button> 
                          </div>
                        </form>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- Edit Modal Ends -->
                    <!-- Delete Page Modal -->
                    <div class="modal fade" id="modal_close<?= $paper->id ?>">
                      <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content text-center w3-light-gray">
                          <div class="modal-header">
                            <h4 class="modal-title"> Delete <?= $paper->page_name ?> Paper ?</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body ">
                            <p >You are about to delete this paper.</p>
                            <p >All questions and content on this page will be deleted</p>
                            <p >Are you sure would like to delete this paper?</p>
                            <p ><strong>The data cannot be recovered</strong></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" onclick="window.location.href='<?= base_url("control_panel/delete_paper/$paper->id"); ?>'" class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button>
                            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal"><span class="fa fa-times"></span> Cancel</button>
                            
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- Delete Page Modal Ends -->
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                   <?php else: ?>
                   <?php endif; ?>
            </div>
          </div> 
        </div>