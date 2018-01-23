<article data-aos="fade" id="post-<?php the_ID(); ?>" <?php post_class( 'col-xs-6 col-sm-3 col-md-2 nopadding each-graffiti nopadding' ); ?>>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<span class="desc"><?php the_title(); ?></span>
		<?php the_post_thumbnail( 'thumbnail' ); ?>
	</a>
</article><!-- #post-## -->