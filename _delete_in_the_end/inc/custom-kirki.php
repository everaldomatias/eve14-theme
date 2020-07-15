<?php

/**
 * Kirki Framework.
 */
include_once( get_template_directory() . '/inc/kirki/kirki.php' );

/**
 * Configuration sample for the Kirki Customizer
 */
function kirki_config() {
	/**
	 * If you need to include Kirki in your theme,
	 * then you may want to consider adding the translations here
	 * using your textdomain.
	 *
	 * If you're using Kirki as a plugin then you can remove these.
	 */
	$strings = array(
		'background-color' => __( 'Cor do background', 'odin' ),
		'background-image' => __( 'Imagem de background', 'odin' ),
		'no-repeat' => __( 'Não repetir', 'odin' ),
		'repeat-all' => __( 'Repetir X e Y', 'odin' ),
		'repeat-x' => __( 'Repetir Horizontal', 'odin' ),
		'repeat-y' => __( 'Repeat Vertically', 'odin' ),
		'inherit' => __( 'Inherit', 'odin' ),
		'background-repeat' => __( 'Repetição do background', 'odin' ),
		'cover' => __( 'Cobrir', 'odin' ),
		'contain' => __( 'Conter', 'odin' ),
		'background-size' => __( 'Tamanho do background', 'odin' ),
		'fixed' => __( 'Fixo', 'odin' ),
		'scroll' => __( 'Scroll', 'odin' ),
		'background-attachment' => __( 'Background Attachment', 'odin' ),
		'left-top' => __( 'Left Top', 'odin' ),
		'left-center' => __( 'Left Center', 'odin' ),
		'left-bottom' => __( 'Left Bottom', 'odin' ),
		'right-top' => __( 'Right Top', 'odin' ),
		'right-center' => __( 'Right Center', 'odin' ),
		'right-bottom' => __( 'Right Bottom', 'odin' ),
		'center-top' => __( 'Center Top', 'odin' ),
		'center-center' => __( 'Center Center', 'odin' ),
		'center-bottom' => __( 'Center Bottom', 'odin' ),
		'background-position' => __( 'Background Position', 'odin' ),
		'background-opacity' => __( 'Background Opacity', 'odin' ),
		'ON' => __( 'ON', 'odin' ),
		'OFF' => __( 'OFF', 'odin' ),
		'all' => __( 'All', 'odin' ),
		'cyrillic' => __( 'Cyrillic', 'odin' ),
		'cyrillic-ext' => __( 'Cyrillic Extended', 'odin' ),
		'devanagari' => __( 'Devanagari', 'odin' ),
		'greek' => __( 'Greek', 'odin' ),
		'greek-ext' => __( 'Greek Extended', 'odin' ),
		'khmer' => __( 'Khmer', 'odin' ),
		'latin' => __( 'Latin', 'odin' ),
		'latin-ext' => __( 'Latin Extended', 'odin' ),
		'vietnamese' => __( 'Vietnamese', 'odin' ),
		'serif' => _x( 'Serif', 'font style', 'odin' ),
		'sans-serif' => _x( 'Sans Serif', 'font style', 'odin' ),
		'monospace' => _x( 'Monospace', 'font style', 'odin' ),
	);
	$args = array(
		'description'  => '',
		//'color_accent' => '#496849',
		'color_back'   => '#FFF',
		'textdomain'   => 'odin',
		'i18n'         => $strings,
		'url_path'     => get_template_directory_uri() . '/inc/kirki'
	);
	return $args;
}
add_filter( 'kirki/config', 'kirki_config' );

/**
 * Create the customizer panels and sections
 */
function kirki_add_panel( $wp_customize ) {
	// Add sections
	// This section will be inside the "typography" panel
	$wp_customize->add_section( 'contatos', array(
		'title'       => __( 'Contatos', 'odin' ),
		'priority'    => 20,
	) );
	$wp_customize->add_section( 'graffiti_grid', array(
		'title'       => __( 'Graffiti Grid', 'odin' ),
		'priority'    => 20,
	) );
	$wp_customize->add_section( 'analytics', array(
		'title'       => __( 'Analytics', 'odin' ),
		'priority'    => 10,
	) );
}
add_action( 'customize_register', 'kirki_add_panel' );

/**
 * Campos das Opções
 */
function kirki_fields( $fields ) {
	
	/* Graffiti Grid */
	$fields[] = array(
	    'type'        => 'text',
	    'settings'    => 'telefone',
	    'label'       => __( 'Telefone', 'odin' ),
	    'section'     => 'contatos',
	    'default'     => '',
	    'priority'    => 10,
	);
	$fields[] = array(
	    'type'        => 'text',
	    'settings'    => 'email',
	    'label'       => __( 'E-mail', 'odin' ),
	    'section'     => 'contatos',
	    'default'     => '',
	    'priority'    => 10,
	);
	$fields[] = array(
	    'type'        => 'text',
	    'settings'    => 'instagram',
	    'label'       => __( 'Instagram', 'odin' ),
	    'section'     => 'contatos',
	    'default'     => '',
	    'priority'    => 10,
	);
	$fields[] = array(
	    'type'        => 'text',
	    'settings'    => 'form_contato',
	    'label'       => __( 'ID do Formulário de Contato (CF7)', 'odin' ),
	    'section'     => 'graffiti_grid',
	    'default'     => '',
	    'priority'    => 10,
	);

	return $fields;
}
add_filter( 'kirki/fields', 'kirki_fields' );