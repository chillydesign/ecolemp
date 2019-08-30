<?php get_header(); ?>


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





	
<?php get_footer(); ?>
