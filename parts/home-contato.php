<div class="contato">
	<div class="container">
		<?php
			$form = get_theme_mod( 'form_contato' );
			echo do_shortcode( '[contact-form-7 id="'. $form .'"]' );
		?>
	</div><!-- container -->
</div><!-- contato -->