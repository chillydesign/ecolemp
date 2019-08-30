<?php get_header(); ?>

<div class="page_title">
	<h1 class="container"><?php _e( 'Tag Archive: ', 'html5blank' ); echo single_tag_title('', false); ?></h1>
</div>



<div class="container" >
	<div class="row">

		<!-- section -->
		<section id="main_col" class="col-lg-8 col-lg-push-2 col-sm-6 col-sm-push-3">
			<div id="main_article">



			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>
			</div>
		</section>
		<!-- /section -->





		

		<?php get_sidebar(); ?>
		<?php get_template_part('sidebar_right'); ?>


	</div> <!-- END OF ROW -->
</div> <!-- END OF CONTAINER -->


<?php get_footer(); ?>