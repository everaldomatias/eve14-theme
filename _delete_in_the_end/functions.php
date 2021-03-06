<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 960;
}

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
// require_once get_template_directory() . '/core/classes/class-shortcodes-menu.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
// require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
// require_once get_template_directory() . '/core/classes/class-post-type.php';
// require_once get_template_directory() . '/core/classes/class-taxonomy.php';
require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';
// require_once get_template_directory() . '/core/classes/class-post-status.php';
// require_once get_template_directory() . '/core/classes/class-term-meta.php';
require_once get_template_directory() . '/inc/graffiti.php';

/**
 * Hooks.
 */
require_once get_template_directory() . '/inc/hooks.php';

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since 2.2.0
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' )
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );
		/**
		 * Seta o thumbnail em 400 x 400 pixels.
		 */
		set_post_thumbnail_size( 400, 400, true );
		add_image_size( 'slider-dletra', 1600, 500, array( 'center', 'center' ) );
		add_image_size( 'slider-dletra-responsive', 768, 500, array( 'center', 'center' ) );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );

		/**
		 * Support The Excerpt on pages.
		 */
		// add_post_type_support( 'page', 'excerpt' );

		/**
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for custom logo.
		 *
		 *  @since Odin 2.2.10
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );
	}	
}

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since 2.2.0
 */
function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'odin_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since 2.2.0
 */
function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since 2.2.0
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Fonts
 	wp_enqueue_style( 'droid-sans', "https://fonts.googleapis.com/css?family=Droid+Sans", array(), null, 'all' );

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// Html5Shiv
	wp_enqueue_script( 'html5shiv', $template_url . '/assets/js/html5.js' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	// Fancybox
	wp_enqueue_style( 'fancybox', $template_url . '/assets/js/libs/fancybox/jquery.fancybox.css', array(), null, 'all' );
	wp_enqueue_script( 'fancybox', $template_url . '/assets/js/libs/fancybox/jquery.fancybox.pack.js', array(), null, true );

	// Main jQuery.
	wp_register_script( 'odin-main', $template_url . '/assets/js/main.js', array(), null, true );	

	// Localize
	wp_localize_script( 'odin-main', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

	// Main jQuery.
	wp_enqueue_script( 'odin-main' );

	// Grunt watch livereload in the browser.
	// wp_enqueue_script( 'odin-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular( 'graffiti' ) ) {
		wp_enqueue_style( 'bootstrap-min', $template_url . '/assets/css/bootstrap.min.css', array(), null, 'all' );
		wp_enqueue_style( 'full-slider', $template_url . '/assets/css/full-slider.css', array(), null, 'all' );
		wp_enqueue_script( 'bootstrap-min', $template_url . '/assets/js/bootstrap/bootstrap.bundle.min.js', array(), null, true );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function odin_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}

add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );

/**
 * Query WooCommerce activation
 *
 * @since  2.2.6
 *
 * @return boolean
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/*
 * Kirki Framework
 */
require_once get_template_directory() . '/inc/custom-kirki.php';

/**
 * WooCommerce compatibility files.
 */
if ( is_woocommerce_activated() ) {
	add_theme_support( 'woocommerce' );
	require get_template_directory() . '/inc/woocommerce/hooks.php';
	require get_template_directory() . '/inc/woocommerce/functions.php';
	require get_template_directory() . '/inc/woocommerce/template-tags.php';
}

/* WooCommerce Hooks */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

function graffiti_gallery_callback() {
	if ( ! isset( $_REQUEST[ 'post_id' ] ) ) {
		wp_die( 'nao enviou o post id' );
	}
	// cria um array pra conter todos urls de imagens
	$all_images = array();
	// pega o post id que vai ser enviado junto no ajax
	$post_id = intval( $_REQUEST[ 'post_id' ] );
	// pega o campo de imagens do odin
	$images = get_post_meta( $post_id, 'graffitis_plupload', true );
	// verifica se ele retornou certo
	if ( $images ) {
		// o odin deixa as imagens numa string separadas por virgula, entao precisamos dividir com explode em um array
		$images_id = explode( ',', $images );
		// percorre o array que acabamos de dividir acima
		foreach ( $images_id as $image_id ) {
			// essa função vai nos retornar a URL da imagem, junto com o width e o height;
			$image = wp_get_attachment_image_src( $image_id, 'full', false );
			// colocamos o URL da imagem dentro do array criado para conter todas imagens
			$all_images[] = $image[0];
		}
	}
	// transforma o array com todas imagens em JSON, pra poder ser lido no JS
	echo json_encode( $all_images );
	// mata a requisição.. sem esse cara no final o WP poe um 0 maldito no meio da resposta, rs
	wp_die();
}
add_action( 'wp_ajax_graffiti_gallery', 'graffiti_gallery_callback' );
add_action( 'wp_ajax_nopriv_graffiti_gallery', 'graffiti_gallery_callback' );

function page_metabox() {

    $page_metabox = new Odin_Metabox(
        'page_metabox', // Slug/ID of the Metabox (Required)
        'Galeria de Imagens', // Metabox name (Required)
        'page', // Slug of Post Type (Optional)
        'normal', // Context (options: normal, advanced, or side) (Optional)
        'high' // Priority (options: high, core, default or low) (Optional)
    );

    $page_metabox->set_fields(
        array(
            /**
             * Default input examples.
             */

            // Image Plupload field.
            array(
                'id'          => 'page_plupload', // Required
                'label'       => __( 'Fotos', 'odin' ), // Required
                'type'        => 'image_plupload', // Required
                // 'default'     => '', // Optional (image attachment ids separated with comma)
                'description' => __( 'Adicione as imagens para a sua galeria de imagens.', 'odin' ), // Optional
            )
        )
    );
}

add_action( 'init', 'page_metabox', 1 );

/* Funcao para Debugar Hook's */
function hook_debug( $hook ) {
	global $wp_filter;
	echo '<pre>';
	var_dump( $wp_filter[ $hook ] );
	echo '</pre>';
}

/**
 * Set image size when theme is activated
 * Testado em WP 4.7.*
 */
if ( ! function_exists( 'e14_theme_activated' ) ) {
    function e14_theme_activated() {
        // set thumbnail size in settings > media
        update_option( 'thumbnail_size_w', 400 );
        update_option( 'thumbnail_size_h', 400 );
        // set medium size in settings > media
        update_option( 'medium_size_w', 800 );
        update_option( 'medium_size_h', 800 );
        // set large size in settings > media
        update_option( 'large_size_w', 1280 );
        update_option( 'large_size_h', 1280 );
    }
    add_action( 'after_switch_theme', 'e14_theme_activated' );
}

if ( ! function_exists( 'e14_get_grid_graffitis' ) ) {

	/**
	 * Hooked in grid_graffitis
	 * See: hooks.php
	 */
	function e14_get_grid_graffitis() {
		get_template_part( 'parts/grid', 'graffitis' );
	}

}

if ( ! function_exists( 'e14_get_single_graffitis' ) ) {

	/**
	 * Hooked in single_graffitis
	 * See: hooks.php
	 */
	function e14_get_single_graffitis() {
		get_template_part( 'parts/single', 'graffitis' );
	}
}