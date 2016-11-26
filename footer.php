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

	</div><!-- #wrapper -->

	<?php
		$form = get_theme_mod( 'form_contato' );
		if ( !empty( $form ) ) {
			get_template_part( 'parts/home', 'contato' );
		}
	?>

	<?php wp_footer(); ?>
</body>
</html>
