<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'e14_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'e14_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner" style="<?php e14_header_styles(); ?>">
	<div class="site-header blurred-image" style="<?php e14_header_styles(); ?>"></div>
		<div class="col-full">

			<?php do_action( 'e14_header' ); ?>

		</div>
	</header><!-- #masthead -->

	<?php
	do_action( 'e14_before_content' ); ?>

	<div id="content" data-aos="fade-up" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		do_action( 'e14_content_top' );