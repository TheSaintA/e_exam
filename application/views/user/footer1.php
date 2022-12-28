<style>
    .box{
        width: 75%;
    }
    .top-nav{
        width: 5%;
    }
    .border-dashed{
        border:2px solid #000;
        border-style:dashed;
    }
    .border-dotted{
        border:2px solid #000;
        border-style:dotted;
    }
    
    @media screen and (max-width: 768px) {
        .box{
            width: 100% !important;
        }
    }
</style>
    <!-- Back To Top Button -->
    <button onclick="topFunction()" id="myBtn">
        <img src="<?= base_url(); ?>assets/images/up-arrow.png" alt="alternative">
    </button>
    <!-- end of back to top button -->
    	
    <!-- Scripts -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="<?= base_url(); ?>assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="<?= base_url(); ?>assets/js/purecounter.min.js"></script> <!-- Purecounter counter for statistics numbers -->
    <script src="<?= base_url(); ?>assets/js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>