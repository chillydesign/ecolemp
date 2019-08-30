<?php /* Template Name: Specialisations Template */ get_header(); ?>


	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<div id="feature_section">
		<h1 class="container"><?php the_title(); ?></h1>
	</div>

	<div class="container">
		<?php the_content(); ?>
	</div>
	<?php endwhile; endif; ?>

	<article style="margin:0" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php $category = get_field('category'); ?>
		<?php include('section-loop.php'); ?>

	</article>
	<!-- /article -->



<section class="container">

	<div class="row">

	<?php $specialisation_loop = new WP_Query(array(
		'post_type' => 'specialisation',  
		'posts_per_page' => -1,
		'order' => 'ASC',
		'orderby' => 'menu_order'
		)); ?>
		<?php $v= 0; ?>

		<?php if ($specialisation_loop->have_posts() ) : while($specialisation_loop->have_posts()) : $specialisation_loop->the_post(); ?>

			<div class="col-sm-3 formation_img">
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
					<?php $image =  wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) )  ; ?>
					<a style="border:0;" href="<?php the_permalink(); ?>" ><div style="background-image:url(<?php echo $image; ?>); border:double #ddd;" class="news_img"></div></a>
				<?php endif; ?>	<br/>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title() ; ?></a></h4>
				<?php the_content(); ?>

			</div>

			<?php if ($v % 4 == 3 ) echo '</div><!-- END OF ROW --><div class="row">' ?>
			<?php $v++; ?>

		<?php endwhile; endif; ?>

	</div><!-- END OF ROW -->

</section>

<?php wp_reset_query(); ?>







<?php get_footer(); ?>
