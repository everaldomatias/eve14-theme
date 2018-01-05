<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	do_action( 'e14_single_post_top' );
	do_action( 'e14_single_post' );
	do_action( 'e14_single_post_bottom' );
	?>

</article><!-- #post-## -->