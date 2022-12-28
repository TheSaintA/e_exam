
	<div class="container-fluid mb-0">
    <div class="row green">
        <div class="col-lg-12">
            <div class="clearfix p-2">
                <div class="float-left">
                    <p class="pt-2">Call Us Today! <a href="tel:+919622765774" class="text-decoration-none ">+91-9622765774</a> | <a href="mailto:info@qiuzo.in" class="text-decoration-none ">info@quizo.in</a></p>
                </div>
                <div class="float-right">
                <div id="google_translate_element"></div>
 
 <script type="text/javascript">
     function googleTranslateElementInit() {
         new google.translate.TranslateElement(
             {pageLanguage: 'en'},
             'google_translate_element'
         );
     }
 </script>

 <script type="text/javascript"
         src=
"https://translate.google.com/translate_a/element.js?
cb=googleTranslateElementInit">
 </script>
                    <div class="btn-group">
                        <a href="#" class="button"><span class="fa mr-1 fa-facebook-square fa-2x text-primary"></span></a>
                        <a href="#"><span class="fa mr-1 fa-twitter-square fa-2x w3-text-cyan"></span></a>
                        <a href="#"><span class="fa mr-1 fa-linkedin-square fa-2x w3-text-blue"></span></a>
                        <a href="#"><span class="fa mr-1 fa-instagram text-danger fa-2x"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-sm spruce w3-card text-light sticky-top mt-0">
  <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" class="img-fluid w-25"></a>
  <ul class="navbar-nav ml-auto mt-0">
    <li class="nav-item">
      <a class="nav-link active font-weight-bold" href="<?= base_url(); ?>"><span class="fa fa-home"></span> Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link font-weight-bold" href="<?= base_url("p/features"); ?>"><span class="fa fa-list"></span> Features</a>
    </li>
    <li class="nav-item">
      <a class="nav-link font-weight-bold" href="<?= base_url('p/exams'); ?>"><span class="fa fa-link"></span> Exams</a>
    </li>
    <?php if($this->session->userdata('email')): ?>
      <li class="nav-item">
      <a class="nav-link font-weight-bold" href="<?= base_url('control_panel'); ?>""><span class="fa fa-cog"></span> Control Panel</a>
    </li>
      <?php else: ?>
        <li class="nav-item">
      <a class="nav-link font-weight-bold" href="<?= base_url('p/signup'); ?>""><span class="fa fa-user-plus"></span> Signup</a>
    </li>
    <li class="nav-item">
      <a class="nav-link font-weight-bold" href="<?= base_url('p/login'); ?>""><span class="fa fa-user"></span> Login</a>
    </li>
        <?php endif; ?>
        <li class="nav-item">
      <a class="nav-link font-weight-bold" href="#"><span class="fa fa-info"></span> Help</a>
    </li>
  </ul>
</nav>