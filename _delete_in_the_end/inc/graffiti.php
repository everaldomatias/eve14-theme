<?php
add_action( 'init', 'graffiti_post_type' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function graffiti_post_type() {
	$labels = array(
		'name'               => _x( 'Graffitis', 'post type general name', 'odin' ),
		'singular_name'      => _x( 'Graffiti', 'post type singular name', 'odin' ),
		'menu_name'          => _x( 'Graffitis', 'admin menu', 'odin' ),
		'name_admin_bar'     => _x( 'Graffiti', 'add new on admin bar', 'odin' ),
		'add_new'            => _x( 'Add New', 'book', 'odin' ),
		'add_new_item'       => __( 'Add New Graffiti', 'odin' ),
		'new_item'           => __( 'New Graffiti', 'odin' ),
		'edit_item'          => __( 'Edit Graffiti', 'odin' ),
		'view_item'          => __( 'View Graffiti', 'odin' ),
		'all_items'          => __( 'All Graffitis', 'odin' ),
		'search_items'       => __( 'Search Graffitis', 'odin' ),
		'parent_item_colon'  => __( 'Parent Graffitis:', 'odin' ),
		'not_found'          => __( 'No books found.', 'odin' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'odin' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'odin' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'graffiti' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'graffiti', $args );
}

function graffiti_metabox() {

    $graffiti_metabox = new Odin_Metabox(
        'graffiti', // Slug/ID of the Metabox (Required)
        'Graffiti', // Metabox name (Required)
        'graffiti', // Slug of Post Type (Optional)
        'normal', // Context (options: normal, advanced, or side) (Optional)
        'high' // Priority (options: high, core, default or low) (Optional)
    );

    $graffiti_metabox->set_fields(
        array(
            /**
             * Default input examples.
             */

            // Text Field.
            array(
                'id'         => 'outros_artistas_text', // Required
                'label'      => __( 'Outros Artistas', 'odin' ), // Required
                'type'       => 'text', // Required
                'description' => __( 'Adicione nome de outros artistas, quando houver, separados por vírgulas.', 'odin' ) // Optional
            ),
            // Image Plupload field.
            array(
                'id'          => 'graffitis_plupload', // Required
                'label'       => __( 'Fotos', 'odin' ), // Required
                'type'        => 'image_plupload', // Required
                // 'default'     => '', // Optional (image attachment ids separated with comma)
                'description' => __( 'Adicione as fotos do Graffiti', 'odin' ), // Optional
            )
        )
    );
}

add_action( 'init', 'graffiti_metabox', 1 );