
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $paper_name ?> : Result List</title>
</head>
<body>
  
<div class="w3-container">
      <h4 class="w3-round-large w3-text-white text-center w3-text-teal w3-center spruce"><b>Result of <?= $paper_name ?></b></h4>  
    <table class="w3-table-all ">
    <thead>
      <tr class="w3-round-large">
        <th class="spruce">#</th>
        <th class="spruce w3-small">Enrollment No</th>
        <th class="spruce w3-small">Name</th>
        <th class="spruce w3-small">Correct Answers</th>
        <th class="spruce w3-small">Wrong Answers</th>
        <th class="spruce w3-small">Percentage</th>
      </tr>
    </thead>
    <?php $c=1; foreach($data as $result): ?>
    <tr class="w3-round-large">
      <td><?= $c++; ?></td>
      <td><?= $result->enrollment_no ?></td>
      <td><?= $result->student_name ?></td>
      <td><?= $result->correct_answers ?></td>
      <td><?= $result->wrong_answers ?></td>
      <td><?= $result->percentage ?> %</td>
    </tr>
    <?php endforeach; ?>
  </table>
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