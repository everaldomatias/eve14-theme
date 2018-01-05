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
	echo "Logo aqui";
}