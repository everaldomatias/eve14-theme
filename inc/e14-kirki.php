<?php

/**
 * Kirki Framework.
 * ==============================================================================
 */

Kirki::add_config( 'kirki_custom_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );


/**
 * Sessões
 * ==============================================================================
 */
Kirki::add_section( 'contatos', array(
    'title'          => __( 'Informações de Contatos' ),
    'panel'          => '', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_section( 'social', array(
    'title'          => __( 'Redes Sociais' ),
    'panel'          => '', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );


/**
 * Campos (separados por Sessões)
 * ==============================================================================
 */

/* Contatos */
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'telefone',
	'label'			=> __( 'Telefone', 'odin' ),
	'section'		=> 'contatos',
	'description'	=> esc_attr__( 'Adicione o número de telefone para contato', 'odin' ),
	'priority'		=> 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'email',
	'label'			=> __( 'E-mail', 'odin' ),
	'section'		=> 'contatos',
	'description'	=> esc_attr__( 'Adicione seu e-mail, ele será exibido no site', 'odin' ),
	'priority'		=> 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'     => 'select',
	'settings' => 'contact_form',
	'label'    => esc_attr__( 'Formulário de Contato', 'odin' ),
	'section'  => 'contatos',
	'default'  => '',
	'priority' => 10,
	'multiple' => 1,
	'choices'  => Kirki_Helper::get_posts(
		array(
			'posts_per_page' => 50,
			'post_type'      => 'wpcf7_contact_form'
		)
	)
) );

/* Redes Sociais */
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'instagram',
	'label'       => __( 'Instagram', 'odin' ),
	'section'		=> 'social',
	'description'	=> esc_attr__( 'Adicione o nome de usuário do perfil no Instagram', 'odin' ),
	'priority'		=> 10,
) );