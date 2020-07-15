<section itemscope itemtype="http://schema.org/Person" class="contato">
	<div class="container">
		<div class="col-sm-8">
			<?php
				$form = get_theme_mod( 'form_contato' );
				echo do_shortcode( '[contact-form-7 id="'. $form .'"]' );
			?>	
		</div>
		<div class="col-sm-4 infos">
			<?php if ( $telefone = get_theme_mod( 'telefone' ) ): ?>
				<span itemprop="telephone" class="telefone">
					<span class="glyphicon glyphicon-phone"></span>
					<?php echo $telefone; ?>
				</span><!-- telefone -->
			<?php endif; ?>
			<?php if ( $email = get_theme_mod( 'email' ) ): ?>
				<span class="email">
					<span class="glyphicon glyphicon-envelope"></span>
					<a itemprop="email" href="mailto:<?php echo antispambot( $email ); ?>"><?php echo antispambot( $email ); ?></a>
				</span><!-- email -->
			<?php endif; ?>
			<?php if ( $instagram = get_theme_mod( 'instagram' ) ): ?>
				<span class="instagram">
					<span class="glyphicon glyphicon-camera"></span>
					<a target="_blank" href="<?php echo esc_url( "http://instagram.com/" . $instagram ); ?>"><?php echo "@" . $instagram; ?></a>
				</span><!-- instagram -->
			<?php endif; ?>
		</div><!-- infos -->
	</div><!-- container -->
</section><!-- contato -->