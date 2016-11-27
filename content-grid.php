<?php
/**
 * The template for displaying content Graffiti in loop.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-sm-3 nopadding' ); ?>>
	<a href="<?php the_post_thumbnail_url( 'large' ); ?>" class="fancybox" data-id="<?php the_ID(); ?>" title="<?php the_title(); ?>">
		<?php the_post_thumbnail( 'thumbnail' ); ?>
	</a>
</article><!-- #post-## -->
