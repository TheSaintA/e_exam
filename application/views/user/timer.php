<?php

$from_time = strtotime($_SESSION['start_time']);
$to_time = strtotime($_SESSION['end_time']);
$difference_time = $to_time - $from_time;
echo "<p class=' font-weight-bold text-center text-spruce'> Time Left : <label class='text-danger'>".gmdate("H:i:s",$difference_time)."</label></p>";




?>