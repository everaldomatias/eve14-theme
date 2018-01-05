<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) :
			// Olhe em templates/parts/loop.php
			get_template_part( 'templates/parts/loop' );
		else :
			// Olhe em templates/content-none.php
			get_template_part( 'templates/parts/content', 'none' );
		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'e14_sidebar' );
get_footer();