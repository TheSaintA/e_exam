<?php include "header.php" ?>
    <div class="row mt-lg-4 ">
	    <?php include "control_div.php"; ?>
		<div class="col-lg-10 control-div">
            <?php include "alert.php" ?>
            <h5 class="pb-2 text-spruce font-weight-bold"><span class="fa fa-bell"></span> Notices</h5>
                <hr class="mt-1 mb-3"/>
        <div class="p-2 w3-card w3-round-large w-100">
            <button data-target="#add_notice" data-toggle="modal" class="btn w3-btn spruce"><span class="fa fa-bell"></span> Add Notice</button>
          
            
            <!-- Modal -->
            <div class="modal fade" id="add_notice" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold text-spruce"><span class="fa fa-bell"></span> Add Notice</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                </div>
                                <form action="<?= base_url("control_panel/add_notice"); ?>" method="post">
                                    <?= form_hidden("create_date",time()); ?>
                                    <?= form_hidden("email",$_SESSION['email']); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Notice</label>
                                <textarea class="form-control" name="notice" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn spruce"><span class="fa fa-bell"></span> Add Notice</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                        </div>
</form>
                    </div>
                </div>
            </div>
            
            <script>
                $('#exampleModal').on('show.bs.modal', event => {
                    var button = $(event.relatedTarget);
                    var modal = $(this);
                    // Use above variables to manipulate the DOM
                    
                });
            </script>
            <div class="row p-2 table-responsive w-100">
            <table class="table table-striped table-inverse font-weight-bold">
                <thead class="spruce w-100">
                    <tr>
                        <th>#</th>
                        <th>Notice</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; if($notices): foreach($notices as $notice):?>
                        <tr>
                            <td><?= $count++; ?></td>
                            <td class="w-75"><?= $notice->notice ?><td>
                                <button onCLick="window.location.href='<?= base_url("control_panel/delete_notice/$notice->id"); ?>'" class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button>
                            </td>
                        </tr>
                        <?php endforeach; else: endif; ?>
                    </tbody>
            </table>
        </div>
        </div>
        </div>
    </div>
    <?php include "footer.php" ?>