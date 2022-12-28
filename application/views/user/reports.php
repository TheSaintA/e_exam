<?php include "header.php"; ?>
<div class="row mt-lg-4 ">
	<?php include "control_div.php"; ?>
	<div class="col-lg-10 control-div">
        <?php include "alert.php" ?>
        <h5 class="pb-2 text-spruce font-weight-bold"><span class="fa fa-file"></span> Reports</h5>
        <hr class="mt-1 mb-3"/>
        <div class="row">
        <div class="col-lg-12">
        <ul class="nav nav-tabs mx-auto text-center">
  <li class="nav-item">
    <a class="nav-link active font-weight-bold" data-toggle="pill" href="#menu1"><span class="fa fa-file-pdf text-danger"></span> Pdf Reports</a>
  </li>
  <li class="nav-item">
    <a class="nav-link font-weight-bold " data-toggle="pill" href="#menu2"><span class="fa fa-file-excel text-success"></span> Excel Reports</a>
  </li>
</ul>
<div class="tab-content">
    <!-- PDF Reports -->
    <div class="tab-pane container active p-2" id="menu1">
        <form class="my-2 p-2 w3-card w3-round-large" action="<?= base_url("control_panel/report_pdf/") ?>" method="post">
            <div class="form-group">
                <label for="">Select Subject</label>
                <select name="page_id" id="" class="form-control" required/>
                    <option value="" >Select Paper</option>
                    <?php if($subjects):  foreach($subjects as $subject): ?>
                    <option value="<?= $subject->id ?>"><?= $subject->page_name ?></option>
                    <?php endforeach; else: endif; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn w3-btn spruce font-weight-bold mx-auto d-block" ><span class="fa fa-file-pdf text-danger"></span> Download PDF</button>
            </div>
        </form>
        <hr/>
        <form class="my-2 p-2 w3-card w3-round-large" action="<?= base_url("control_panel/student_report_pdf/") ?>" method="post">
            <div class="row">
            <div class="form-group col-lg-6">
                <label for="">Select Subject</label>
                <select name="page_id" id="" class="form-control" required/>
                    <option value="">Select Paper</option>
                    <?php if($subjects):  foreach($subjects as $subject): ?>
                    <option value="<?= $subject->id ?>"><?= $subject->page_name ?></option>
                    <?php endforeach; else: endif; ?>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="">Select Student</label>
                <select name="student_id" id="" class="form-control" required/>
                    <option value="">Select Paper</option>
                    <?php if($enrolled_students):  foreach($enrolled_students as $student): ?>
                    <option value="<?= $student->id ?>"><?= $student->enrollment_no ?></option>
                    <?php endforeach; else: endif; ?>
                </select>
            </div>
            </div>
            <div class="form-group">
            <button type="submit" class="btn w3-btn spruce font-weight-bold mx-auto d-block" ><span class="fa fa-file-pdf text-danger"></span> Download PDF</button>
            </div>
        </form>
    </div>

<!--Excel Reports -->
    <div class="tab-pane container fade p-2" id="menu2">
    <form class="my-2 p-2 w3-card w3-round-large" action="<?= base_url("control_panel/subject_report_excel/") ?>" method="post">
            <div class="form-group">
                <label for="">Select Subject</label>
                <select name="page_id" id="" class="form-control" required/>
                    <option value="">Select Paper</option>
                    <?php if($subjects):  foreach($subjects as $subject): ?>
                    <option value="<?= $subject->id ?>"><?= $subject->page_name ?></option>
                    <?php endforeach; else: endif; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn w3-btn spruce font-weight-bold mx-auto d-block" ><span class="fa fa-file-excel text-success"></span> Download Excel</button>
            </div>
        </form>
        <hr/>
        <form class="my-2 p-2 w3-card w3-round-large" action="<?= base_url("control_panel/report_student_excel") ?>" method="post">
            <div class="row">
            <div class="form-group col-lg-6">
                <label for="">Select Subject</label>
                <select name="page_id" id="" class="form-control" required/>
                    <option value="">Select Paper</option>
                    <?php if($subjects):  foreach($subjects as $subject): ?>
                    <option value="<?= $subject->id ?>"><?= $subject->page_name ?></option>
                    <?php endforeach; else: endif; ?>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="">Select Student</label>
                <select name="student_id" id="" class="form-control" required/>
                    <option value="">Select Paper</option>
                    <?php if($enrolled_students):  foreach($enrolled_students as $student): ?>
                    <option value="<?= $student->id ?>"><?= $student->enrollment_no ?></option>
                    <?php endforeach; else: endif; ?>
                </select>
            </div>
            </div>
            <div class="form-group">
            <button type="submit" class="btn w3-btn spruce font-weight-bold mx-auto d-block" ><span class="fa fa-file-excel text-success"></span> Download Excel</button>
            </div>
        </form>    
    </div>
</div>
</div>
                
</div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>