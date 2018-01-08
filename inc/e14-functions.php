<?php
/**
 * Aplica inline style no Header .
 */
function e14_header_styles() {
	$is_header_image = get_header_image();
	$header_bg_image = '';
	if ( $is_header_image ) {
		$header_bg_image = 'url(' . esc_url( $is_header_image ) . ')';
	}
	$styles = array();
	if ( '' !== $header_bg_image ) {
		$styles['background-image'] = $header_bg_image;
	}
	$styles = apply_filters( 'e14_header_styles', $styles );
	foreach ( $styles as $style => $value ) {
		echo esc_attr( $style . ': ' . $value . '; ' );
	}
}

function e14_get_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	
	if ( ! is_home() || ! is_front_page() ) {
		echo '<a class="title-logo" href="' . esc_url( home_url() ) . '">';
	}	
	
		if ( has_custom_logo() ) {
		        echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
		} else {
		        echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
		}

	if ( ! is_home() || ! is_front_page() ) {
		echo '</a>';
	}

}