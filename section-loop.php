<?php

$cs = 0;


if( have_rows('sections') ) {



	while ( have_rows('sections') ) : the_row();

		if (get_row_layout() == 'navigation') {
			
			$content = get_sub_field('content');
			?>
			<section  id="navigation_section">
			<div class="container">
				<?php echo $content; ?>
				</div>
			</section>
			<div id="spacer"></div>

	<?php 
		} elseif (get_row_layout() == 'simple') {
			$id =get_sub_field('id');
			$contenu = get_sub_field('contenu');
			$followup = get_sub_field('followup');
			if(!$followup){$borderclass ="line"; $cs++;} 
			else {$borderclass="";}
			if ($cs %2 != 0) { $backgroundclass = "";} else { $backgroundclass = "greybackground";}
			

			$intro = get_sub_field('intro');
			if ($followup == 1) { $followup = 'followup'; } else { $followup=''; }

			 ?>
			<section id="<?php echo $id; ?>"  class="<?php echo $backgroundclass . ' ' . $borderclass . ' ' . $followup; ?>" <?php if($backgroundclass=="parallaxbackground"){ ?> style="background-image: url(<?php echo get_sub_field('background_image')['url']; ?>);" <?php } ?> >
				<div class="container">
					<?php if($intro){?><div class="intro"><?php if($intro == 1) {echo get_sub_field('fullwidth_intro');} ?></div><?php } ?>
					<?php echo $contenu; ?>
				</div>
			</section>

		<?php }

		elseif (get_row_layout() == 'columns') {

			$id =get_sub_field('id');
			$intro = get_sub_field('intro');
			$conclusion = get_sub_field('conclusion');
			$row_count = count( get_sub_field('colonnes') );
			$followup = get_sub_field('followup');
			
		

			// if FRONT PAGE, THEN MAKE THE CONTAINER FLUID, INSTEAD OF FIXED WIDTH
			$container_class = 'container';
			while ( have_rows('colonnes') ) : the_row(); 
			if (   get_sub_field('column_type') == 'frontpage'    ) {
				$container_class = 'container-fluid';
			}
			endwhile;
			//////////////////////////////


			if ($followup == 1) { $followup = 'followup'; } else { $followup=''; }
			if($row_count == 1){ $col = "col-xs-12"; }
			elseif ($row_count == 2) { $col = "col-sm-6"; }
			elseif ($row_count == 3) { $col = "col-sm-4"; }
			elseif ($row_count == 4) { $col = "col-sm-3"; } 
			elseif ($row_count == 6) { $col = " col-md-2 col-sm-4 col-xs-6 "; } 

			?>

			<?php if(!$followup){$borderclass ="line"; $cs++;} 
			else {$borderclass="";}
			if ($cs %2 != 0) { $backgroundclass = "";} else { $backgroundclass = "greybackground";}
			if ($followup == 1) { $followup = 'followup'; } else { $followup=''; }
			?>

			<section  id="<?php echo $id; ?>" class="<?php echo $backgroundclass . ' ' . $borderclass . ' ' . $followup; ?>" >
				<div class="<?php echo $container_class; ?>">
					<?php if($intro){?><div class="intro"><?php if($intro == 1) {echo get_sub_field('fullwidth_intro');} ?></div><?php } ?>

					<div class="row"> 
						 <?php while ( have_rows('colonnes') ) : the_row(); ?>
						 <?php $column_type = get_sub_field('column_type'); ?>
						 <?php if ($column_type == 'texte') { ?>
						 	<div class="<?php echo $col; ?>"><?php  the_sub_field('texte'); ?></div>
						 <?php } elseif ($column_type == 'image') { ?>
						 	<?php $image = get_sub_field('image'); ?>
						 	<div class="<?php echo $col; ?>">
						 		<img src="<?php echo $image['url']; ?>">
						 	</div>
						 	
						 <?php } elseif ($column_type == 'image + texte') { ?>
						 	<?php $image = get_sub_field('image'); ?>
						 	<?php $texte = get_sub_field('texte'); ?>
						 	<div class="<?php echo $col; ?>">
						 		<div style="background-image: url(<?php echo $image['url']; ?>);" class="sameheightimg"></div>
						 		<div><?php echo $texte; ?></div>
						 	</div>
						 	
						 <?php } elseif ($column_type == 'depliant') { ?>
							 <div class="<?php echo $col; ?>">
							 	<?php while ( have_rows('depliant') ) : the_row(); ?>
								 	<div class="foldies">
								 		<h6><?php the_sub_field('title'); ?></h6>
								 		<div class="foldies_content"><?php the_sub_field('content'); ?></div>
								 	</div>
							 	<?php endwhile ?>
							 </div>


						 <?php  } elseif ($column_type == 'block') { ?>
						 	<?php $image = get_sub_field('image'); ?>
						 	<?php  $link = get_sub_field('link'); ?>
						 	<?php  $lightbox = get_sub_field('lightbox'); ?>
						 	<?php  $texte = get_sub_field('texte'); ?>
 	<div class=" <?php echo $col; ?>">
 		<div class="block" style="background-image: url(<?php echo $image['url']; ?>);">

 	<?php $lightbox_html = ($lightbox) ? ' data-lity ' : ''; ?>
 			<?php if ( $link != ''  ) : ?><a <?php echo $lightbox_html; ?> href="<?php echo $link; ?>"><?php endif; ?> 
 			<?php echo $texte; ?>
 			<?php if ( $link != ''  ) : ?></a><?php endif; ?> 
 		</div>

 	</div>

						 <?php }; ?>
						 <?php endwhile ?>

					</div>
				</div>
			</section>

		<?php }


		elseif (get_row_layout() == 'photo_texte') { 
		$followup = get_sub_field('followup');
		$photo = get_sub_field('photo');
		$texte = get_sub_field('texte');
		$position_photo = get_sub_field('position_photo');
		$proportion_photo = get_sub_field('proportion_photo');

		if(!$followup){$borderclass ="line"; $cs++;} 
			else {$borderclass="";}
			if ($cs %2 != 0) { $backgroundclass = "";} else { $backgroundclass = "greybackground";}
			if ($followup == 1) { $followup = 'followup'; } else { $followup=''; }
	
		?>
		<section  class="<?php echo $followup . ' ' . $backgroundclass . ' ' . $borderclass; ?> " >
			<div class="container">
				<?php if($position_photo == "left"){
					if ($proportion_photo == "six") { ?>
						<div class="row">
							<div class="col-sm-2"><?php if($photo){?><img src="<?php echo $photo['url']; ?>"><?php } ?></div>
							<div class="col-sm-10"><?php echo $texte; ?></div>
						</div>
					<?php }

					elseif ($proportion_photo == "quarter") { ?>
						<div class="row">
							<div class="col-sm-3"><?php if($photo){?><img src="<?php echo $photo['url']; ?>"><?php } ?></div>
							<div class="col-sm-9"><?php echo $texte; ?></div>
						</div>
					<?php }

					elseif ($proportion_photo == "third") { ?>
						<div class="row">
							<div class="col-sm-4"><?php if($photo){?><img src="<?php echo $photo['url']; ?>"><?php } ?></div>
							<div class="col-sm-8"><?php echo $texte; ?></div>
						</div>
					<?php }
					elseif ($proportion_photo == "half") { ?>
						<div class="row">
							<div class="col-sm-6"><?php if($photo){?><img src="<?php echo $photo['url']; ?>"><?php } ?></div>
							<div class="col-sm-6"><?php echo $texte; ?></div>
						</div>
					<?php }
					if ($proportion_photo == "twothirds") { ?>
						<div class="row">
							<div class="col-sm-8"><?php if($photo){?><img src="<?php echo $photo['url']; ?>"><?php } ?></div>
							<div class="col-sm-4"><?php echo $texte; ?></div>
						</div>
					<?php }
				} 



				else {
					if ($proportion_photo == "six") { ?>
						<div class="row">
							<div class="col-sm-2 col-sm-push-10"><?php if($photo){?><img src="<?php echo $photo['url']; ?>"><?php } ?></div>
							<div class="col-sm-10 col-sm-pull-2"><?php echo $texte; ?></div>
						</div>
					<?php }
					elseif ($proportion_photo == "quarter") { ?>
						<div class="row">
							<div class="col-sm-3 col-sm-push-9"><?php if($photo){?><img src="<?php echo $photo['url']; ?>"><?php } ?></div>
							<div class="col-sm-9 col-sm-pull-3"><?php echo $texte; ?></div>
						</div>
					<?php }
					elseif ($proportion_photo == "third") { ?>
						<div class="row">
							<div class="col-sm-4 col-sm-push-8"><?php if($photo){?><img src="<?php echo $photo['url']; ?>"><?php } ?></div>
							<div class="col-sm-8 col-sm-pull-4"><?php echo $texte; ?></div>
						</div>
					<?php }
					elseif ($proportion_photo == "half") { ?>
						<div class="row">
							<div class="col-sm-6 col-sm-push-6"><?php if($photo){?><img src="<?php echo $photo['url']; ?>"><?php } ?></div>
							<div class="col-sm-6 col-sm-pull-6"><?php echo $texte; ?></div>
						</div>
					<?php }
					if ($proportion_photo == "twothirds") { ?>
						<div class="row">
							<div class="col-sm-8 col-sm-push-4"><?php if($photo){?><img src="<?php echo $photo['url']; ?>"><?php } ?></div>
							<div class="col-sm-4 col-sm-pull-8"><?php echo $texte; ?></div>
						</div>
					<?php }
				} ?>
			</div>
				
		</section>

		<?php }

		elseif (get_row_layout() == 'gmap') {
			$id =get_sub_field('id');
			$backgroundclass = "gmap";
			$borderclass = get_sub_field('border');
			$coordinates = strval(get_sub_field('address')); 
			$google_map = '[chilly_map location="' . $coordinates . '"]'; ?>


			<section  id="<?php echo $id; ?>" style="padding:0" class="<?php echo $backgroundclass . ' ' . $borderclass; ?>" >
				<?php echo do_shortcode($google_map); ?>
			</section>

		<?php }

		elseif (get_row_layout() == 'slider') { ?>
		<?php $banner = get_sub_field('banner');  $id =get_sub_field('id'); ?>
		<?php $id =get_sub_field('id'); ?>
			<section id="<?php echo $id; ?>"  class="slider  <?php if($banner){echo 'headerbanner';} ?>">
				<ul class="bxslider">
					<?php while ( have_rows('slide') ) : the_row(); ?>
						 	<?php $image = get_sub_field('image'); ?>
						 	<li>
						 		<div class="slide_image" style="background-image:url(<?php echo $image['url']; ?>);"></div>
						 		<div class="slide_texte">
						 			<div class="container"><?php the_sub_field('text'); ?></div>
						 		</div>
						 	</li>
					<?php endwhile ?>


				</ul>
			</section>

		<?php }
		

		elseif (get_row_layout() == 'gallery') { ?>

		<?php if (get_sub_field('followup') ==1) { $followup = 'followup'; } else { $followup=''; }?>
		<?php 
			$id =get_sub_field('id'); 
			if(!get_sub_field('followup')){$borderclass ="line"; $cs++;} 
			else {$borderclass="";}
			if ($cs %2 != 0) { $backgroundclass = "";} else { $backgroundclass = "greybackground";}
			if ($followup == 1) { $followup = 'followup'; } else { $followup=''; }
		?>

			<section id="<?php echo get_sub_field('reference'); ?>"  class="gallery <?php echo $followup; ?>">
				<div class="container">

					<?php $count=1; ?>
					<?php $i=1; ?>
					<?php $j=1; ?>
					<?php if(count(get_sub_field('album'))>1) { ?>
					<ul class="album_titles">
						<?php while ( have_rows('album') ) : the_row(); ?>
						<li class="<?php echo sanitize_title(get_sub_field('title')); ?> <?php if($count==1){echo 'current_title'; } ?> "><?php the_sub_field('title'); ?></li>
						<?php $count++; ?>
						<?php endwhile ?>
					</ul>
					<?php } ?>
					<?php while ( have_rows('album') ) : the_row(); ?>
					<div class="<?php echo sanitize_title(get_sub_field('title')); ?> album 	<?php if($j==1){echo 'current_album'; } ?>" style="margin-left:0">
						<?php echo get_sub_field('description'); ?>
					</div>

					<?php $j++ ; ?>
					<?php endwhile ?>


					<?php while ( have_rows('album') ) : the_row(); ?>
					<?php $images = get_sub_field('photos'); ?>
					<?php if($images) { ?>
					<div style="margin-left: -20px; margin-right:-20px" class="<?php echo sanitize_title(get_sub_field('title')); ?> album <?php if($i==1){echo 'current_album'; } ?>">
						<ul class="grid">
							<?php foreach( $images as $image ): ?>
				            <li class="grid-item">
				                <a  href="<?php echo $image['url']; ?>">
				                     <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				                </a>

				            </li>	
					        <?php endforeach; ?>
						</ul>
					</div>

					<?php $i++ ; ?>
					<?php } ?>
					<?php endwhile ?>

					

				</div>
				
			</section>

		<?php } elseif (get_row_layout() == 'news') { ?>
		<?php $id =get_sub_field('id'); ?>
			<section id="<?php echo $id; ?>" class="news_slider">
				<div class="container" >
				<?php $fullwidth_intro = get_sub_field('fullwidth_intro'); ?>
				<?php if ($fullwidth_intro != ''){
					echo $fullwidth_intro;
				}; ?>

				<?php $posts = get_posts( 	array('posts_per_page'   => 3)  );  ?>

					<div class="slider" >
						<ul>
						<?php foreach ($posts as $post) : ?>
						<?php setup_postdata( $post ); ?>
							<li class="slide" >
								<div class="row">

							<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
							<div class="col-sm-4 post_thumbnail">
							<a style="border:0" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
							</a></div>
							<?php endif; ?>

							<div class="col-sm-8">
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<p class="meta"><?php the_time('F j, Y'); ?>.</p>
								<?php the_excerpt(); ?>
								</div>
								</div >
							</li>
						<?php endforeach; ?>
						<?php wp_reset_query(); ?>
						</ul>
					</div>
				</div>
			</section>
			



		<?php }; // END OF LAYOUTS




















	endwhile;
}
?>
