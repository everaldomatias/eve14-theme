<?php if ( is_singular( 'graffiti' ) ): ?>
	<article data-aos="fade" id="post-<?php the_ID(); ?>" <?php post_class( 'col-xs-12 graffiti' ); ?>>
		<div class="slider">
			aqui
		</div><!-- ./slider -->
	</article><!-- #post-## -->
<?php else: ?>
	<article data-aos="fade" id="post-<?php the_ID(); ?>" <?php post_class( 'col-xs-6 col-sm-3 col-md-2 each-graffiti nopadding' ); ?>>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<span class="desc"><?php the_title(); ?></span>
			<?php the_post_thumbnail( 'thumbnail' ); ?>
		</a>
	</article><!-- #post-## -->
<?php endif ?>

