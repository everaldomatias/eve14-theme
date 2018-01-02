<?php
		/*
		 * The WordPress Query class.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
		 */

		if ( is_singular( 'graffiti' ) ) {
			$post__not_in = get_the_ID();
			$posts_per_page = 16;
		} else {
			$post__not_in = null;
			$posts_per_page = 100;
		}

		$args = array(
			'post__not_in' => $post__not_in,
			'posts_per_page' => $posts_per_page,
	
			// Type & Status Parameters
			'post_type'   => 'graffiti',
			'post_status' => 'publish',
	
			// Order & Orderby Parameters
			'order'               => 'DESC',
			'orderby'             => 'date',
	
		);
	
	$query = new WP_Query( $args );
	
?>

<section itemscope itemtype="" class="grid-graffitis">
	<?php if ( $query->have_posts() ) :		
		while ( $query->have_posts() ) : $query->the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<a href="<?php the_post_thumbnail_url( 'full' ); ?>" class="fancybox" data-id="<?php the_ID(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
				</a>
			</article><!-- #post-## -->
		<?php endwhile;
	endif; ?>
</section><!-- /.grid-graffitis -->