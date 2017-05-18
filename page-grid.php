<?php
/**
 * The main template file.
 * Template name: Grid all Graffitis
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Odin
 * @since 2.2.0
 */

get_header( 'grid' ); ?>

	<main id="content" class="<?php echo odin_classes_page_full(); ?> nopadding" tabindex="-1" role="main">

			<?php
				$args =	array(
					'post_type' => 'graffiti',
					'posts_per_page' => '-1'
				);
				
				// Query
				$graffiti = new WP_Query( $args );

				if ( $graffiti->have_posts() ) :
					// Start the Loop.
					while ( $graffiti->have_posts() ) : $graffiti->the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', 'grid' );

					endwhile;

					// Post navigation.
					odin_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;

			?>
			
	</main><!-- #content -->

<?php
get_footer();
