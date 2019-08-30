<?php get_header(); ?>
<div id="feature_section">
	<h1 class="container"><?php the_title(); ?></h1>
</div>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<section class="container">
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
				<?php echo the_content(); ?>

			</div>

		</div>
	</article>
</section>
<?php endwhile;   endif; ?>


<?php get_footer(); ?>