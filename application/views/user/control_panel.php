<?php include 'header.php'; ?>


<div class="container">
	<div class="row">
		<div class="col">
			<ul class="nav nav-tabs  w-100  px-2 pt-2 w3-round justify-content-center">
      <li class="nav-item">
        <a class="nav-link w3-text-teal fw-bold active text-decoration-none" data-bs-toggle="tab" href="#create">Create</a>
      </li>
      <li class="nav-item">
        <a class="nav-link w3-text-teal fw-bold text-decoration-none" data-bs-toggle="tab" href="#configure">Configure</a>
      </li>
      <li class="nav-item">
        <a class="nav-link w3-text-teal fw-bold text-decoration-none" data-bs-toggle="tab" href="#analyze">Analyze</a>
      </li>
      
    </ul>

    <!-- Tab panes -->
    <div class="tab-content ">
      <div class="tab-pane container active w3-animate w3-animate-top w3-light-gray" id="create">
        <?php include "paper_home.php" ?>
      </div>
      <div class="tab-pane container fade" id="configure">
        <?php include "configuration.php"; ?>
      </div>
      <div class="tab-pane container fade" id="analyze">
        <div class="row">
        <?php foreach ($papers as $paper): ?>
        <div class="col-lg-4 p-2" style="z-index: 999 !important;">
          <div class="w3-card p-3 w3-round w3-light-grey">
            <img src="<?= base_url('assets/images/paper.png'); ?>" alt="Paper" class="img-fluid mx-auto d-block">
            <h5 class="text-center"><?= $paper->page_name ?></h5>
            <a href="<?= base_url("control_panel/analyze_paper/$paper->id"); ?>" class="btn w3-btn w3-teal mx-auto d-block text-decoration-none"><span class="fa fa-line-chart"></span> Analyze</a>

          </div>
        </div>
	      <?php endforeach; ?>
        </div>
      </div>
    </div>




		</div>
	</div>
</div>


<style type="text/css">
	.top-nav {
		width: 6% !important;
	}
  @media screen and (max-width: 768px) {
    .top-nav{
      width: 40% !important;
    }
  }
</style>
<script type="text/javascript">
  $(window).resize(function(){
    if($(window).width() <= 768){
      $(".control-div").removeClass('btn-group-vertical');
    }
  });
</script>
<?php include 'footer.php'; ?>