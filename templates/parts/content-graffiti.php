<?php if ( is_singular( 'graffiti' ) ): ?>
	<article data-aos="fade" id="post-<?php the_ID(); ?>" <?php post_class( 'col-xs-12 graffiti' ); ?>>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- /.entry-content -->
	</article><!-- #post-## -->
<?php else: ?>
	<article data-aos="fade" id="post-<?php the_ID(); ?>" <?php post_class( 'col-xs-6 col-sm-4 each-graffiti nopadding' ); ?>>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail( 'thumbnail' ); ?>
		</a>
	</article><!-- #post-## -->
<?php endif ?>

