<?php get_header(); ?>




<div id="feature_section">
		<h1 class="container">News</h1>
	</div>
		


<div class="container" >
	<div class="row">

		<!-- section -->
		<section class="col-sm-9">




			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->




		<?php get_sidebar(); ?>



	</div> <!-- END OF ROW -->
</div> <!-- END OF CONTAINER -->









<?php get_footer(); ?>
