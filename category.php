<?php get_header(); ?>

<div class="container" style="padding-top:120px" >


		<!-- section -->
		<section  >

		<h1 ><?php _e( 'Categories for ', 'html5blank' ); single_cat_title(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->


</div> <!-- END OF CONTAINER -->


<?php get_footer(); ?>