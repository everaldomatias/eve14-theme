<?php if ( is_singular( 'graffiti' ) ): ?>
	<article data-aos="fade" id="post-<?php the_ID(); ?>" <?php post_class( 'col-xs-12 graffiti' ); ?>>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php $slider = get_post_meta( get_the_ID(), 'slider_image_plupload', true ) ?>
		<?php if ( ! empty( $slider ) ) : ?>
			<div class="slider">
				<ul>
					<?php
						
						foreach ( explode( ',', $slider ) as $image_id ) {
						    $image_src = wp_get_attachment_image_src( $image_id, 'full' );

						    echo '<li class="each">';
						    echo '<a href="' . esc_url( $image_src[0] ) . '">';
						    echo '<img src="' . esc_url( $image_src[0] ) . '"><br>';
						    echo '</a>';
						    echo '</li>';
						}
					?>
				</ul>
			</div><!-- /.slider -->
		<?php endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- /.entry-content -->

		<?php $gallery = get_post_meta( get_the_ID(), 'gallery_image_plupload', true ) ?>
		<?php if ( ! empty( $gallery ) ) : ?>
			<div class="gallery grid">
				<?php
					$count = 0;
					foreach ( explode( ',', $gallery ) as $image_id ) {
					    $image_src = wp_get_attachment_image_src( $image_id );
					    $image_src_full = wp_get_attachment_image_src( $image_id, 'full' );
					    $count++;

					    if ( $count == 5 ) {
					    	$class = "grid-item--width2";
					    	$count = 0;
					    } else {
					    	$class = "grid-item";
					    }

					    echo '<a href="' . esc_url( $image_src_full[0] ) . '">';
					    echo '<img class="' . $class . '" src="' . esc_url( $image_src[0] ) . '"><br>';
					    echo '</a>';
					}
				?>
			</div><!-- /.gallery -->
		<?php endif; ?>

	</article><!-- #post-## -->
<?php else: ?>
	<article data-aos="fade" id="post-<?php the_ID(); ?>" <?php post_class( 'col-xs-6 col-sm-3 col-md-2 each-graffiti nopadding' ); ?>>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<span class="desc"><?php the_title(); ?></span>
			<?php the_post_thumbnail( 'thumbnail' ); ?>
		</a>
	</article><!-- #post-## -->
<?php endif ?>

