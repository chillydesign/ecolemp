<?php /* Template Name: Formations Template */ get_header(); ?>


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
	<?php
// $count_posts = wp_count_posts('page_formation');
// $postnum = $count_posts->publish; //
// $postnum = $postnum -1;
// echo $postnum;

?>

	<div class="row">
		

	<?php $formation_loop = new WP_Query(array(
		'post_type' => 'page_formation',  
		'posts_per_page' => -1,
		'order' => 'ASC',
		'orderby' => 'menu_order'
		)); ?>
		<?php $v= 0; ?>
		<?php $specialisationslink = home_url() . '/page_formation/specialisations/'; ?>
		<?php if ($formation_loop->have_posts() ) : while($formation_loop->have_posts()) : $formation_loop->the_post(); ?>

			<div class="col-sm-3 formation_img">
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
					<?php $image =  wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) )  ; ?>
					
					<?php if(get_permalink() == $specialisationslink){$link = home_url() . '/specialisations' ;} else {$link = get_permalink(); } ?>
					<a style="border:0;" href="<?php echo $link; ?>" ><div style="background-image:url(<?php echo $image; ?>); border:double #ddd;" class="news_img"></div></a>
				<?php endif; ?>	<br/>
				<h4><a href="<?php echo $link ?>"><?php the_title() ; ?></a></h4>
				<?php the_content(); ?>
			</div>


			<?php if ($v % 4 == 3 ) echo '</div><!-- END OF ROW --><div class="row">' ?>
			<?php $v++; ?>

		<?php endwhile; endif; ?>

	</div><!-- END OF ROW -->

</section>

<?php wp_reset_query(); ?>







<?php get_footer(); ?>
