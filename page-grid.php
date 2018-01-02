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
		
		<?php do_action( 'grid_graffitis' ) ?>
			
	</main><!-- #content -->

<?php
get_footer();