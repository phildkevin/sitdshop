		
        </div>

        <a id="back-to-top" class="scrollTop back-to-top" href="javascript:void(0);" style="">
	        <i class="fa fa-chevron-up"></i>    
	    </a>

        <script src="<?php echo $baseurl; ?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo $baseurl; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
	    <script src="<?php echo $baseurl; ?>/assets/js/jquery-ui.js"></script>
		<script src="<?php echo $baseurl; ?>/assets/js/sitdshop.js"></script>
        <script src="<?php echo $baseurl; ?>/assets/js/sweetalert2.all.min.js"></script>
	</body>
</html>
<script type="text/javascript">
	$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('#back-to-top').fadeIn();
            $('#navbar').removeClass('transparent', 300);
        } else {
            $('#back-to-top').fadeOut();
            $('#navbar').addClass('transparent', 300);
        }
    });
    $('#back-to-top').click(function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });

});
</script>