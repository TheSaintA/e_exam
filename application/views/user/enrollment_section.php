<?php include "header.php" ?>
    <div class="row mt-lg-4 ">
	    <?php include "control_div.php"; ?>
		<div class="col-lg-10 control-div">
            <?php include "alert.php" ?>
            <h5 class="pb-2 text-spruce font-weight-bold"><span class="fa fa-users"></span> Enrollment Numbers</h5>
                <hr class="mt-1 mb-3"/>
                <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
        <div class="p-2 w3-card w3-round-large w-100">
            <div class="table-responsive">
            <div class="form-group w-25 my-1 float-right">
            
            <input id="myInput" type="text" class="form-control spruce" placeholder="Search..">
            </div>
            <table class="table table-striped table-inverse font-weight-bold">
                <thead class="spruce w3-round-large">
                    <tr class="w3-round-large">
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Enrollment No</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php $count = 1; foreach($enrolled_students as $students): ?>
                        <tr>
                            <td scope="row"><?= $count++; ?></td>
                            <td><?= $students->name; ?></td>
                            <td><?= $students->enrollment_no; ?></td>
                            <td><?php foreach ($subjects as $subject) {
                                if (($students->paper_id) == ($subject->id)) {
                                    echo $subject->page_name;
                                } else {
                                }
                            }
                             ?></td>
                            <td><?= (($students->block_unblock_status)== 0)?"<label class='badge badge-success'>Active</label>":"<label class='badge badge-danger'>Blocked</label>"; ?></td>
                            <td>
                            <?php if(($students->block_unblock_status)== 0){ ?>
                                <a href='<?= base_url("control_panel/udpate_block_unblock_status/enrollment_section/$students->paper_id/$students->id/1") ?>' class="btn text-decoration-none w3-btn btn-danger">
                                <span class='fa fa-power-off'></span> 
                                Block
                            </a>
                            <?php }else{ ?>
                                <a href='<?= base_url("control_panel/udpate_block_unblock_status/enrollment_section/$students->paper_id/$students->id/0") ?>' class='btn text-decoration-none w3-btn spruce'>
                                <span class='fa fa-power-off'></span> 
                                Unblock
                            </a>
                            <?php } ?>
                                
                               </td>
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    <?php include "footer.php" ?>