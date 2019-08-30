<?php /* Template Name: Videos Template */ get_header(); ?>


<div id="feature_section">
	<h1 class="container"><?php the_title(); ?></h1>
</div>

<section class="container">

	<div class="row">

	<?php $video_loop = new WP_Query(array(
		'post_type' => 'video',  
		'posts_per_page' => -1,
		'order' => 'DESC'
		)); ?>
		<?php $v= 0; ?>

		<?php if ($video_loop->have_posts() ) : while($video_loop->have_posts()) : $video_loop->the_post(); ?>
			<?php $video = get_field('video'); ?>


			<div class="col-sm-4">
				<div class="video_item">
				<h4><?php the_title() ; ?></h4>

				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
					<?php $image =  wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) )  ; ?>
					<a style="border:0;" href="<?php echo $video; ?>" data-featherlight-iframe-width="500"  data-featherlight-iframe-height="350"    data-featherlight="iframe"><div style="background-image:url(<?php echo $image; ?>);" class="news_img"></div></a>
				<?php endif; ?>	<br/>
				<?php the_content(); ?>

			</div>
			</div>

			<?php if ($v % 3 == 2 ) echo '</div><!-- END OF ROW --><div class="row">' ?>
			<?php $v++; ?>

		<?php endwhile; endif; ?>

	</div><!-- END OF ROW -->

</section>

<?php wp_reset_query(); ?>







<?php get_footer(); ?>
