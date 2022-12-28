<?php foreach($student_info as $student): ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $student->name; ?> : Report Card</title>
</head>
<body>
  
<div class="w3-container">
      <h4 class="w3-round-large w3-text-white text-center w3-text-teal w3-center spruce"><b>Student Report Card</b></h4>
      
        <div class="w3-row kye-meh w3-text-white w3-round-large">
          <div class="w3-half w3-container w3-left-align" style="width:40%;">
              <p ><b class="font-weight-bold">Name : </b><?= $student->name; ?></p>
              <p><b class="font-weight-bold">Enrollment No : </b> <?= $student->enrollment_no; ?></p>
              <p><b class="font-weight-bold">Paper : </b> <?php foreach($paper_info as $paper){ echo $paper->page_name; } ?></p>
              
          </div>   
          <div class="w3-half w3-container w3-right-align" style="margin-left:90px;width:40%;">
              <p><b class="font-weight-bold">No of Correct Answers: </b> <label ><?= $correct ?></label></p>
              <p><b class="font-weight-bold">No of Wrong Answers: </b> <label ><?= $wrong ?></label></p>
              <p><b class="font-weight-bold">Percentage: </b> <label ><?= number_format((float)$percentage,2,'.',''); ?>%</label></p>

          </div>           
          </div>
  
  <?php $c = 1; foreach ($questions as $question):
             foreach($responses as $response): 
            if((($question->id) == ($response->question_id)) && ($response->answer)):
              ?>
            <div style="margin:20px 0px 20px 0px" class="w3-panel w3-border w3-round-large">
           
              <h5 style="margin:10px 0px 0px 0px;"><?= $c++; ?> : <?= $question->question ?> </h5>
              <hr/>
                <div class="w3-left-align w3-round-large">
                <p class="w3-round-large">STUDENT ANSWER : <p class=" <?=(($response->answer) == ($question->correct_answer)) ? "w3-text-teal" : "w3-text-red"; ?> "><?= $response->answer; ?></p></p>
                <p class="w3-round-large">CORRECT ANSWER : <p class="w3-text-green"><?= $question->correct_answer; ?></p></p>
            </div>
                

                <div class="w3-right-align result" style="margin:0px 10px 30px 0px">
                  <?php if (($response->answer) == ($question->correct_answer)): ?><p class="w3-btn w3-teal w3-round-large"> Correct Answer</p>
                  <?php else: ?><p class="w3-btn w3-red w3-round-large">Wrong Answer</p>
                  <?php endif; ?>
                </div>   
                  </div>
        <?php else: ?> 
          <?php endif; endforeach; endforeach; ?>
  </div>
<style>
  .cherry-blossom{
    background-image: linear-gradient(25deg,#d64c7f,#ee4758 50%);
    color:white;
    padding:10px;

  }
  .kye-meh{
    background-image: linear-gradient(to right, #8360c3, #2ebf91);

  }
  .list-unstyled{
    list-style-type: unstyled;
  }
  .spruce{
		background-color:#005960 !important;
		color:#fff !important;
	}
	.text-spruce{
		color:#005960 !important;
	}
	.hover-spruce:hover{
		background-color:#005960 !important;
		color:#fff !important;
	}
  .result p{
    font-weight:bold;
  }
  .font-weight-bold{
    font-weight:bold;
  }
</style>

</body>
</html>
<?php  endforeach; ?>