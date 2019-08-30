<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article style="" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


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






		<?php if( is_single()  && false ): ?>
			<p class="meta">
				<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?>. </span>
				<span class="posts_category"><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?>
					<!-- /post details -->
				</p>

			<?php endif; ?>




		</article>
		<!-- /article -->

	<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
