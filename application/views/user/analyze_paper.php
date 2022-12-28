
<?php include 'header.php'; ?> 

<div class="container mt-lg-3 p-3 font-weight-bold">
    <div class="row">
        <?php foreach($student_info as $student): ?>
        <div class="col-lg-12 mt-lg-2 border-dashed rounded-3">
        <div class="float-left">
            <p><strong>Name : </strong> <label class="text-spruce"><?= $student->name; ?></p>
            <p><strong>Enrollment No : </strong> <label class="text-spruce"><?= $student->enrollment_no; ?></label></p>
            <p><strong>Paper : </strong> <label class="text-spruce"><?php foreach($paper_info as $paper){ echo $paper->page_name; } ?></label></p>
            
        </div>   
        <div class="float-right">
            <p><strong>No of Correct Answers: </strong> <label class="text-success fw-bold"><?= $correct ?></label></p>
            <p><strong>No of Wrong Answers: </strong> <label class="text-danger fw-bold"><?= $wrong ?></label></p>
            <p><strong>Percentage: </strong> <label class="text-spruce"><?= number_format((float)$percentage,2,'.',''); ?>%</label></p>

        </div>
        </div>
        <?php  endforeach; ?>
        <?php foreach ($questions as $question):
            $c = 1; foreach($responses as $response): 
            if((($question->id) == ($response->question_id)) && ($response->answer)):
             ?>
           
            <div class="col-lg-12 my-2 p-3 w3-card w3-round-large border-dotted w3-hover-opacity-min ">
            <h5><span class="badge spruce"><?= $c++; ?></span> <?= $question->question ?> </h5>
            <hr/>
            <div class="my-1 p-2 w-100">
                <div class="float-left">
                <p class="p-3 rounded-3 w3-card">STUDENT ANSWER : <label class="fw-bold <?=(($response->answer) == ($question->correct_answer)) ? "text-primary" : "text-danger"; ?> "><?= $response->answer; ?></label></p>
                <p class="p-3 rounded-3 w3-card">CORRECT ANSWER : <label class="fw-bold text-success"><?= $question->correct_answer; ?></label></p>
                </div>
                

                <div class="float-right">
                <?php if (($response->answer) == ($question->correct_answer)): ?>
                    <label for="" class="w3-card rounded-3 border-dashed w3-btn p-2 my-2 fw-bold"><span class="fa fa-check-circle text-success fa-2x"></span> <br/> Correct Answer</label>
                <?php else: ?>
                    <label for="" class="w3-card rounded-3 border-dashed w3-btn p-2 my-2 fw-bold"><span class="fa fa-times-circle text-danger fa-2x"></span> <br/>Wrong Answer</label>
                <?php endif; ?>
                </div>   
            </div>
        </div>
        <?php 
    else: 
    endif; 
    endforeach; 
    endforeach;
    ?>
    </div>
</div>
<?php include 'footer.php'; ?>