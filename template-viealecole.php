<?php /* Template Name: Vie à l'école Template */ get_header(); ?>


	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<div id="feature_section">
		<h1 class="container"><?php the_title(); ?></h1>
	</div>

<section class="container">


	<?php $viealecole_loop = new WP_Query(array(
		'post_type' => 'viealecole',  
		'posts_per_page' => -1,
		'order' => 'DSC',
		)); ?>
		<?php if ($viealecole_loop->have_posts() ) : while($viealecole_loop->have_posts()) : $viealecole_loop->the_post(); ?>
		<article>
		<div class="row">
			<div class="col-sm-3 post_thumbnail ">
				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
					<a style="border:0" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
					</a>
				<?php else: ?>
					<div style="height:150px;background:#eee;"></div>
				<?php endif; ?>
				
			</div><!-- /post thumbnail -->


			<div class="col-sm-9">
				<!-- post title -->
				<h3>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h3>
				<!-- /post title -->

				<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>

			</div>

		</div>
		</article>

		<?php endwhile; endif; ?>

	</div><!-- END OF ROW -->

</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>