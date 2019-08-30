<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
  <link href='https://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Rubik:300,500,500italic,300italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- Facebook -->

  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <!-- End of Facebook -->

<div class="allbutfooter">
  <header id="header">
    <div class="container">
      <div class="row">
        <ul class="col-md-4 ">
          <li><a href="<?php echo home_url(); ?>"class="branding"><img src="<?php echo get_template_directory_uri();?>/img/logo-ecolemp-new.png" /></a></li>
        </ul>
        <nav class="col-md-8">
          <a href="#" id="show_nav_button">Menu</a>
			<?php wp_nav_menu(array('theme_location'  => 'header-menu')); ?>
          </nav>


      </div>
          <div class="register_container"><a class="button" id="register" href="<?php echo home_url(); ?>/inscription">S'inscrire</a></div>
    </div>
  </header>







