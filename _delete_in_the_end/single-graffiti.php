<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header( 'grid' ); ?>

	<main id="content" class="<?php echo odin_classes_page_full(); ?> nopadding" tabindex="-1" role="main">
		
		<?php do_action( 'single_graffitis' ) ?>
			
	</main><!-- #content -->

<?php
get_footer();