<?php
/**
 * The template for displaying content Graffiti in loop.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	  	the_post_thumbnail( 'thumbnail' );
	?>
</article><!-- #post-## -->
