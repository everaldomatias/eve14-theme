<?php

// Include the Odin_Metabox class.
require_once get_template_directory() . '/inc/classes/class-metabox.php';

function e14_metabox() {

    $gallery_metabox = new Odin_Metabox(
        'gallery', // Slug/ID of the Metabox (Required)
        'Imagens do Graffiti', // Metabox name (Required)
        'graffiti', // Slug of Post Type (Optional)
        'normal', // Context (options: normal, advanced, or side) (Optional)
        'high' // Priority (options: high, core, default or low) (Optional)
    );

    $gallery_metabox->set_fields(
        array(
            /**
             * Default input examples.
             */

            // Slider Plupload field.
            array(
                'id'          => 'slider_image_plupload', // Required
                'label'       => __( 'Slider', 'odin' ), // Required
                'type'        => 'image_plupload', // Required
                // 'default'     => '', // Optional (image attachment ids separated with comma)
                'description' => __( 'Adicione as imagens que deseja exibir no slider do Graffiti.', 'odin' ), // Optional
            ),
            // Image Plupload field.
            array(
                'id'          => 'gallery_image_plupload', // Required
                'label'       => __( 'Galeria', 'odin' ), // Required
                'type'        => 'image_plupload', // Required
                // 'default'     => '', // Optional (image attachment ids separated with comma)
                'description' => __( 'Adicione as imagens que deseja exibir na galeria de fotos do Graffiti.', 'odin' ), // Optional
            ),
        )
    );
}

add_action( 'init', 'e14_metabox', 1 );