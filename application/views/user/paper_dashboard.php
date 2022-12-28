

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Paper : Dashboard</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/w3.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/imagehover/css/imagehover.css') ?>">
	<!-- jQuery library -->
	<script src="<?= base_url('assets/js/jquery4.slim.min.js'); ?>"></script>
	<!-- Popper JS -->
	<script src="<?= base_url('assets/js/popper4.min.js'); ?>"></script>
	<!-- Latest compiled JavaScript -->
	<script src="<?= base_url('assets/js/bootstrap4.bundle.min.js'); ?>"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	 <style>
		.mySlides {display:none}

    body {
      -webkit-user-select: none !important;
      -webkit-touch-callout: none !important;
      -moz-user-select: none !important;
      -ms-user-select: none !important;
      user-select: none !important;
     }
</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 my-3 p-2 w2-card ">
				<div class="clearfix">
					<div class="float-left">
						<ul class="list-unstyled font-weight-bold">
							<?php foreach ($paper as $pap): ?>
								<li><p>Paper: <?= $pap->page_name ?></p></li>								
								<li><p>Semester: <?= $pap->semester_class ?><sup>th</sup></p></li>
							<?php endforeach ?>
							<li><button class="btn btn-danger" onclick="window.location.href='<?= base_url('student_logout') ?>'">Logout</button></li>
						</ul>
					</div>
					<div class="float-right">
						<ul class="list-unstyled font-weight-bold">
							<li><p>Date : <?= date('jS F,Y',time()) ?></p></li>
							<li><div >Time left : <label class="text-danger" id="time"></label> </div></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<?php foreach ($configuration as $config): ?>
		<?php if ($config->set_theme): ?>
			<style>
				body, div{
					background-color: <?= $config->set_theme; ?> !important;
					color: #fff;
				}
			</style>
		<?php else: ?>	
		<?php endif; ?>
	<div class="container w3-card w3-round w3-light-grey">
		<div class="row">
			<?php if ($config->allow_copy == 'no'): ?>
			<div class="col" onCopy="return false">
			<?php elseif ($config->allow_paste == "no"): ?>
			<div class="col" onPaste="return false">
			<?php elseif ($config->allow_paste == "no"): ?>
			<div class="col" onPaste="return false">
			<?php elseif ($config->allow_cut == "no"): ?>
			<div class="col" onCut="return false">	
			<?php else: ?>
			<div class="col">	    
			<?php endif ?>		
				<?php $count = 1; foreach ($questions as $question): ?>
				<d  iv class="w3-content w-100 questions_div">
			  <div class="mySlides p-3" style="width:100% !important;height:300px">
			  	<p class="font-weight-bold"> Q<?= $count++ ?>: <?= $question->question ?> </p>
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
			</div>
		<?php endforeach; ?>

			<div class="w3-center">
			  <div class="w3-section">
			    <button class="w3-button w3-teal" onclick="plusDivs(-1)">❮ Prev</button>
			    <button class="w3-button w3-teal" onclick="plusDivs(1)">Next ❯</button>
			  </div>
			</div>
			</div>
		</div>
	</div>

	<?php if ($config->allow_right_mouse_click == 'no'): ?>
		<script>
			$(document).bind("contextmenu",function(e){
  			return false;
    	});
		</script>	
	<?php endif; ?>
	<?php if ($config->allow_copy == 'no'): ?>
		<script>
			$(document).ready(function(){
				$(this).onCopy(function(){
					return false;
				});
			});
		</script>	
	<?php endif; ?>
<?php endforeach ?>

<script>
	function logTabsForWindows(windowInfoArray) {
  for (const windowInfo of windowInfoArray) {
    console.log(`Window: ${windowInfo.id}`);
    console.log(windowInfo.tabs.map((tab) => tab.url));
  }
}

function onError(error) {
  console.error(`Error: ${error}`);
}

browser.browserAction.onClicked.addListener((tab) => {
  browser.windows
    .getAll({
      populate: true,
      windowTypes: ["normal"],
    })
    .then(logTabsForWindows, onError);
});

$(document).click(function(){
  window.print();
  return false;
});
</script>

<script>
	document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
};
$(document).keypress("u",function(e) {
  if(e.ctrlKey)
  {
return false;
}
else
{
return true;
}
});
</script>

<script>
	// Script code for questions slide
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
<script>

// Set the time down counter
	<?php 
	foreach ($configuration as $config):
		if ($config->set_paper_timer == 'yes'):
			$date = date('Y-m-d',strtotime($config->from_date));
			$h = date('h',strtotime($config->paper_time));
			$m = date('m',strtotime($config->paper_time));
			$s = date('s',strtotime($config->paper_time));
		endif;
	endforeach;
	?>
// Set the date we're counting down to
var countDownDate =   <?php 
// $date = date('Y-m-d');
// $h = 14;
// $m = 24;
// $s = 34;
echo strtotime("$date $h:$m:$s" ) ?> * 1000;
var now = <?php echo time() ?> * 1000;
//new Date("Jan 5, 2024 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("time").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("time").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
</body>
</html>
