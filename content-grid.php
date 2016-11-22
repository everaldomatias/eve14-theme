<?php
/**
 * The template for displaying content Graffiti in loop.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'nopadding col-sm-3' ); ?>>
	<a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="fancybox" data-fancybox-group="<?php the_ID(); ?>" title="<?php the_title(); ?>">
		<?php the_post_thumbnail( 'thumbnail' ); ?>
	</a>
	<?php
		$graffitis = get_post_meta( get_the_ID(), 'graffitis_plupload', true );
		$rel = "fancybox-group=" . get_the_ID();
		foreach ( explode( ',', $graffitis ) as $image_id ) {
		   //echo wp_get_attachment_image( $image_id, 'full', false, $rel );
		}
	?>	
</article><!-- #post-## -->
