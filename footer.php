</div> <!-- End of all but footer -->
	

<?php $td = get_template_directory_uri(); ?>



  <!-- FOOTER -->
  <footer id="footer">
 
      <nav>
            <div class="container">
    	<div class="footermenuleft" style="float:left; margin-right:20px;"><?php wp_nav_menu(array('theme_location'  => 'header-menu')); ?></div>
    	<a href="https://www.facebook.com/EcoleMP/?fref=ts" target="_blank" style ="display: inline-block; float: left; font-size: 2.6em; margin: 15px 25px 0 13px; padding:0;"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
    	<div class="fb-share-button" style="float:left; margin: 12px 0;" data-href="https://www.facebook.com/EcoleMP/?fref=ts" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FEcoleMP%2F%3Ffref%3Dts&amp;src=sdkpreparse">Share</a></div>
          </div>
          <div class="clear"></div>
      </nav>
    <div class="container">
    <img src="<?php echo $td; ?>/img/logo-eduqua.png" alt="" />
    <img style="position:relative; top:-11px;" src="<?php echo $td; ?>/img/logo-iso2.png" alt="" />
    <img style="margin-right:13px" src="<?php echo $td; ?>/img/swiss-made-logo.gif" alt="" />
    <img src="<?php echo $td; ?>/img/sfk-logo.png" alt="" />

      <p>&copy; <?php echo date('Y'); ?> ECOLE MICHELLE PASCHOUD, GENÈVE | Website by <a style="color:white;" href="http://webfactor.ch"><span style="font-weight:bold">Web</span>Factor</a></p>
      </div>


  </footer>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
		<?php wp_footer(); ?>


		<script type="text/javascript" src="<?php echo $td; ?>/js/jquery.matchHeight-min.js"></script>
		<script type="text/javascript" src="<?php echo $td; ?>/js/unslider-min.js"></script>
		<script src="https://use.fontawesome.com/c3dd2011f4.js"></script>
<!-- 		<script type="text/javascript" src="<?php echo $td; ?>/js/lity.min.js"></script> -->
		<script type="text/javascript" src="<?php echo $td; ?>/js/featherlight.min.js"></script>
		<script type="text/javascript" src="<?php echo $td; ?>/js/featherlight.gallery.min.js"></script>
<script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script> 

		
		<script type="text/javascript" src="<?php echo $td; ?>/js/scripts.js"></script>

		<!-- analytics -->
		<script>
		// (function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		// (f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		// l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		// })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		// ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		// ga('send', 'pageview');
		</script>

	</body>
</html>
