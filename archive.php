<?php get_header(); ?>



<div id="feature_section">
	<h1 class="container"><?php _e( 'Archives', 'html5blank' ); ?></h1>
	</div>


<div class="container" >

	<!-- section -->
	<section  >

		


		<?php get_template_part('loop'); ?>

		<?php get_template_part('pagination'); ?>

	</section>
	<!-- /section -->




</div> <!-- END OF CONTAINER -->


<?php get_footer(); ?>
