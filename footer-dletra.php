<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

	<footer id="footer" role="contentinfo">
		
	</footer><!-- #footer -->

	<?php
		$form = get_theme_mod( 'form_contato' );
		if ( !empty( $form ) && is_page_template( 'page-grid.php' ) ) {
			get_template_part( 'parts/home', 'contato' );
		}
	?>

	<?php wp_footer(); ?>
</body>
</html>
