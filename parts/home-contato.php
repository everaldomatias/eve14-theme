<div class="contato">
	<div class="container">
		<div class="col-sm-6">
			<?php
				$form = get_theme_mod( 'form_contato' );
				echo do_shortcode( '[contact-form-7 id="'. $form .'"]' );
			?>	
		</div>
		<div class="col-sm-6">
			<?php if ( $telefone = get_theme_mod( 'telefone' ) ): ?>
				<span class="telefone">
					<?php echo $telefone; ?>
				</span><!-- telefone -->
			<?php endif; ?>
			<?php if ( $email = get_theme_mod( 'email' ) ): ?>
				<span class="email">
					<a href="mailto:<?php echo antispambot( $email ); ?>"><?php echo antispambot( $email ); ?></a>
				</span><!-- email -->
			<?php endif; ?>
			<?php if ( $instagram = get_theme_mod( 'instagram' ) ): ?>
				<span class="instagram">
					<a target="_blank" href="http://instagram.com/<?php echo esc_url( $instagram ); ?>"><?php echo "@" . $instagram; ?></a>
				</span><!-- instagram -->
			<?php endif; ?>
		</div>		
	</div><!-- container -->
</div><!-- contato -->