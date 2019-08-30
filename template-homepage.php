<?php /* Template Name: Homepage Template */ get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="feature_section">
	<?php the_content(); ?>
	<div id="girl">
		<?php include('girl6.php'); ?>
	</div>
	<div id="swirl">
		<?php include('swirl.php'); ?>
	</div>
</div>
<?php endwhile; endif; ?>


<div class="homeslidertop"><?php include('section-loop.php'); ?></div>



		<section id="formation_section">
				<div class="container">
			<h2>Formations</h2>
			<div class="row">
				<?php $formation_loop = new WP_Query(array(
					'post_type' => 'formation',  
					'posts_per_page' => 6,
					'order' => 'ASC'
					)); ?>
					<?php if ($formation_loop->have_posts() ) : while($formation_loop->have_posts()) : $formation_loop->the_post(); ?>
						<?php $link = get_field('link'); ?>
						<?php $image =  wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) )  ; ?>
						<div class="col-md-2 col-sm-4 col-xs-6">
							<div class="block" style="background-image: url(<?php echo $image; ?>);">
								<?php if ( $link != ''  ) : ?><a href="<?php echo $link; ?>"><?php endif; ?> 
								<h4><?php the_title(); ?></h4>
								<?php if ( $link != ''  ) : ?></a><?php endif; ?> 
							</div>

						</div>


					<?php endwhile; endif; ?>

				</div>
							</div>
			</section>
			<?php wp_reset_query(); ?>


<section id="banner_slider" class="slider" style="display:none">
	<ul class="bxslider">
		<?php $banner_loop = new WP_Query(array(
			'post_type' => 'banner',  
			'posts_per_page' => 3,
			'order' => 'ASC'
			)); ?>

			<?php if ($banner_loop->have_posts() ) : while($banner_loop->have_posts()) : $banner_loop->the_post(); ?>

				<li>
					<div class="container">
						<div class="row">
							<div class="col-sm-3">
								<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
									<a style="border:0;" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
									</a>
								<?php endif; ?>
							</div>
							<div class="col-sm-9">
								<h3><?php the_title() ; ?></h3>
								<?php the_content() ; ?>
							</div>
						</div>
					</div>
				</li>

			<?php endwhile; endif; ?>
		</ul>
	</section>
	<?php wp_reset_query(); ?>






			
				<div class="container-fluid" >
				<div class="row">
					<div class="col-sm-6">
					<section id="video_section">
					<h2>Videos</h2>
						<div class="slider">
							
							<ul class="bxslider">
								<?php $video_loop = new WP_Query(array(
									'post_type' => 'video',  
									'posts_per_page' => 2,
									'order' => 'ASC'
									)); ?>
									<?php if ($video_loop->have_posts() ) : while($video_loop->have_posts()) : $video_loop->the_post(); ?>
									<?php $video = get_field('video'); ?>
										<li><div class="video_item">
											<h4><?php the_title() ; ?></h4>
							
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
				<?php $image =  wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) )  ; ?>
				<a style="border:0;" href="<?php echo $video; ?>" data-featherlight-iframe-width="500"  data-featherlight-iframe-height="350"    data-featherlight="iframe"><div style="background-image:url(<?php echo $image; ?>);" class="news_img"></div></a>
				<?php endif; ?>	

										</div></li>

									<?php endwhile; endif; ?>

								</ul>
							</div>
							<a href="<?php echo home_url(); ?>/videos" class="more_button">More videos</a>
						</section>
						</div>
						<?php wp_reset_query(); ?>




						<div class="col-sm-6">
						<section id="news_section">
						<h2>News</h2>
						<div class="slider">
							
							<ul class="bxslider">
						<?php $news_loop = new WP_Query(array(
						'post_type' => 'post',  
						'posts_per_page' => 2,
						'order' => 'ASC'
						)); ?>

						<?php if ($news_loop->have_posts() ) : while($news_loop->have_posts()) : $news_loop->the_post(); ?>
	

						<li>
						<div class="news_item">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
						<?php $image =  wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) )  ; ?>
								<a style="border:0;" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><div style="background-image:url(<?php echo $image; ?>);" class="news_img"></div></a>
							<?php endif; ?>
						</div>
						</li>



							<?php endwhile; endif; ?>


								</ul>
						</div>
						<a href="<?php echo home_url(); ?>/evenements" class="more_button">More news</a>
						</section>
						</div>
						<?php wp_reset_query(); ?>


					</div>
					</div>


			





			<?php get_footer(); ?>
