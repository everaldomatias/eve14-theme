<?php
/**
 * The template for displaying all pages.
 * Template name: d_letra
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header( 'dletra' ); ?>

	<main id="content" class="<?php echo odin_classes_page_full(); ?>" tabindex="-1" role="main">

		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				if ( function_exists( 'get_field' ) && $slider = get_field( 'slider' ) ) {
			  		echo '<div class="slider">';
			  		echo do_shortcode( get_field( 'slider' ) );
			  		echo '</div><!-- .slider -->';
			  	}

			  	if ( function_exists( 'get_field' ) && $slider = get_field( 'slider_responsivo' ) ) {
			  		echo '<div class="slider-resposivo">';
			  		echo do_shortcode( get_field( 'slider_responsivo' ) );
			  		echo '</div><!-- .slider-resposivo -->';
			  	}

				// Include the page content template.
				get_template_part( 'content', 'page' );

				$images = get_post_meta( get_the_ID(), 'page_plupload', true );

				if ( $images ) {
					echo '<div class="page-gallery">';
					$images_id = explode( ',', $images );

					foreach ( $images_id as $image_id ) {
						$image = wp_get_attachment_image_src( $image_id, 'thumbnail', false );
						$image_full = wp_get_attachment_image_src( $image_id, 'full', false );
						
						echo '<article class="col-sm-3 nopadding">';
						echo '<a href="' . $image_full[0] . '" rel="group" class="fancybox">';
						echo '<img src="' . $image[0] . '">';
						echo '</a>';
						echo '</article><!-- #post-## -->';
					}
					echo '</div><!-- page-gallery -->';
				}

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile;
		?>

	</main><!-- #main -->

<?php
get_footer( 'dletra' );
