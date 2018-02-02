		
			</div><!-- /.col-full -->
		</div><!-- /.content -->
	</div><!-- hfeed site -->

	<footer id="footer" itemscope itemtype="http://schema.org/Person" class="contato" role="contentinfo">
		<div class="container">
			<div class="col-sm-8">
				<?php
					$form = get_theme_mod( 'contact_form' );
					echo do_shortcode( '[contact-form-7 id="'. $form .'"]' );
				?>	
			</div>
			<div class="col-sm-4 infos">
				<?php if ( $telefone = get_theme_mod( 'telefone' ) ): ?>
					<span itemprop="telephone" class="telefone">
						<?php echo $telefone; ?>
					</span><!-- telefone -->
				<?php endif; ?>
				<?php if ( $email = get_theme_mod( 'email' ) ): ?>
					<span class="email">
						<a itemprop="email" href="mailto:<?php echo antispambot( $email ); ?>"><?php echo antispambot( $email ); ?></a>
					</span><!-- email -->
				<?php endif; ?>
				<?php if ( $instagram = get_theme_mod( 'instagram' ) ): ?>
					<span class="instagram">
						<a target="_blank" href="<?php echo esc_url( "http://instagram.com/" . $instagram ); ?>"><?php echo "@" . $instagram; ?></a>
					</span><!-- instagram -->
				<?php endif; ?>
			</div><!-- infos -->
		</div><!-- container -->
	</footer><!-- #footer -->

	<?php wp_footer(); ?>
</body>
</html>