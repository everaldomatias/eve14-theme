<?php
/**
 * Aplica inline style no Header.
 */
function e14_header_styles() {
	if ( is_singular( 'graffiti' ) && has_post_thumbnail() ) {
		$is_header_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	} else {
		$is_header_image = get_header_image();	
	}
	
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

/**
 * Retorna o Custom Logo.
 */
function e14_get_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	
	if ( ! is_home() || ! is_front_page() ) {
		echo '<a class="title-logo" href="' . esc_url( home_url() ) . '">';
	}
		
		echo '<div data-aos="fade-down" class="wrap-logo">';
			if ( has_custom_logo() ) {
			        echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
			} else {
			        echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
			}
		echo '<div><!-- .wrap-logo -->';

	if ( ! is_home() || ! is_front_page() ) {
		echo '</a>';
	}
}

/**
 * Abre a div .row.
 */
function e14_open_row() {
	echo '<div class="row">';
}

/**
 * Fecha a div .row.
 */
function e14_close_row() {
	echo '</div><!-- row -->';
}

/**
 * Define o loop exibido na Home.
 *
 * @see  inc/e14-hooks.php
 */
function e14_grid_graffiti( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) {
        /* Tipo de Post */
        $query->set( 'post_type', 'graffiti' );
        /* Quantidade de Posts */
        $query->set( 'posts_per_page', 12 );
    }
}