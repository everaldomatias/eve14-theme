<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-sm-3 nopadding each-graffiti nopadding' ); ?>>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php the_post_thumbnail( 'thumbnail' ); ?>
	</a>
</article><!-- #post-## -->