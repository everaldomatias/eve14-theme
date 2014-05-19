<?php
/**
 * eve14-theme functions and definitions
 *
 * @package eve14-theme
 * @since eve14-theme 1.0
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since eve14-theme 1.0
 */

if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'eve14_theme_setup' ) ):

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'grid', 300, 300, true );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since eve14-theme 1.0
 */

function eve14_theme_setup() {
	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );
	/**
	 * Custom functions that act independently of the theme templates
	 */

	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );
	/**

	 * Make theme available for translation

	 * Translations can be filed in the /languages/ directory

	 * If you're building a theme based on eve14-theme, use a find and replace

	 * to change 'eve14_theme' to the name of your theme in all the template files

	 */

	load_theme_textdomain( 'eve14_theme', get_template_directory() . '/languages' );



	/**

	 * Add default posts and comments RSS feed links to head

	 */

	add_theme_support( 'automatic-feed-links' );



	/**

	 * Enable support for Post Thumbnails

	 */

	add_theme_support( 'post-thumbnails' );



	/**

	 * This theme uses wp_nav_menu() in one location.

	 */

	register_nav_menus( array(

		'primary' => __( 'Primary Menu', 'eve14_theme' ),

	) );



	/**

	 * Add support for the Aside Post Formats

	 */

	add_theme_support( 'post-formats', array( 'aside', ) );

}

endif; // eve14_theme_setup

add_action( 'after_setup_theme', 'eve14_theme_setup' );



/**

 * Register widgetized area and update sidebar with default widgets
 *
 * @since eve14-theme 1.0
 */

function eve14_theme_widgets_init() {
	register_sidebar( array(

		'name' => __( 'Sidebar', 'eve14_theme' ),

		'id' => 'sidebar-1',

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget' => '</aside>',

		'before_title' => '<h1 class="widget-title">',

		'after_title' => '</h1>',

	) );

}

add_action( 'widgets_init', 'eve14_theme_widgets_init' );



/**

 * Enqueue scripts and styles

 */
function eve14_theme_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}

add_action( 'wp_enqueue_scripts', 'eve14_theme_scripts' );



/**

 * Implement the Custom Header feature

 */

//require( get_template_directory() . '/inc/custom-header.php' );



/* This function attaches the image to the post in the database, add it to functions.php */



function insert_attachment($file_handler,$post_id,$setthumb='false') {



  // check to make sure its a successful upload

  if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();



  require_once(ABSPATH . "wp-admin" . '/includes/image.php');

  require_once(ABSPATH . "wp-admin" . '/includes/file.php');

  require_once(ABSPATH . "wp-admin" . '/includes/media.php');



  $attach_id = media_handle_upload( $file_handler, $post_id );



//  if ($setthumb) update_post_meta($post_id,'_thumbnail_id',$attach_id);

//  return $attach_id;

} 































// Mostra o thumbnail dos anexos no admin da p�gina/post

add_action("admin_init", "images_init");

add_action('save_post', 'save_images_link');

function images_init(){

    	  $post_types = get_post_types();

    	  foreach ( $post_types as $post_type ) {

		add_meta_box("my-images", "Imagens Anexas - Selecione as que deseja publicar", "images_link", $post_type, "normal", "low");

	  }

	}

function images_link(){

	global $post;

	$custom  = get_post_custom($post->ID);

	$link    = $custom["_link"][0];

	$count   = 0;

	echo '<div class="link_header">';

	$query_images_args = array(

		'post_type' => 'attachment',

		'post_parent'    => $post->ID,

		'post_mime_type' =>array(

                		'jpg|jpeg|jpe' => 'image/jpeg',

                		'gif' => 'image/gif',

				'png' => 'image/png',

				),

		'post_status' => 'inherit',

		'posts_per_page' => -1,

		);

	$query_images = new WP_Query( $query_images_args );

	$images = array();

	echo '<div class="frame">';

	$thelinks = explode(',', $link);

	foreach ( $query_images->posts as $file) {

	   if(in_array($images[]= $file->ID, $thelinks)){

	      echo '<label><input type="checkbox" group="images" value="'.$images[]= $file->ID.'" checked /><img src="'.$images[]= $file->guid.'" width="60" height="60" /></label>';

		 }else{

	      echo '<label><input type="checkbox" group="images" value="'.$images[]= $file->ID.'" /><img src="'.$images[]= $file->guid.'" width="60" height="60" /></label>';

		 }

		$count++;

	}

	echo '<br /><br /></div></div>';

	echo '<input type="hidden" name="link" class="field" value="'.$link.'" />';

	echo '<div class="images_count"><span>Quantidade: <b>'.$count.'</b></span> <div class="count-selected"></div></div>';

}

function save_images_link(){

	global $post;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){ return $post->ID; }

	update_post_meta($post->ID, "_link", $_POST["link"]);

}

add_action( 'admin_head-post.php', 'images_css' );

add_action( 'admin_head-post-new.php', 'images_css' );

function images_css() {

	echo '<style type="text/css">

        #my-images .inside{padding:0px !important;margin:0px !important;}

	.frame{

		width:100%;

		height:320px;

		overflow:auto;

                background:#e5e5e5;

		padding-bottom:10px;

		}

	.field{width:800px;}

	#results {

		width:100%;

		overflow:auto;

                background:#e5e5e5;

		padding:0px 0px 10px 0px;

		margin:0px 0px 0px 0px;

		}

	#results img{

		border:solid 5px #FDD153;

		-moz-border-radius:3px;

		margin:10px 0px 0px 10px;

		}

	.frame label{

		margin:10px 0px 0px 10px;

		padding:5px;

		background:#fff;

		-moz-border-radius:3px;

		border:solid 1px #B5B5B5;

		height:60px;

		display:block;

		float:left;

		overflow:hidden;

		}

	.frame label:hover{

		background:#74D3F2;

		}

	.frame label.checked{background:#FDD153 !important;}

	.frame label input{

		opacity:0.0;

		position:absolute;

		top:-20px;

		}

	.images_count{

		font-size:10px;

		color:#666;

		text-transform:uppercase;

		background:#f3f3f3;

		border-top:solid 1px #ccc;

		position:relative;

		}

	.selected_title{border-top:solid 1px #ccc;}

	.images_count span{

		color:#666;

		padding:10px 6px 6px 12px;

		display:block;

		}

	.count-selected{

		font-size:9px;

		font-weight:bold;

		text-transform:normal;

		position:absolute;

		top:10px;

		right:10px;

		}

		</style>';

}

add_action( 'admin_head-post.php', 'images_js' );

add_action( 'admin_head-post-new.php', 'images_js' );

function images_js(){?>

<script type="text/javascript">

jQuery(document).ready(function($){

  $('.frame input').change(function() {

	var values = new Array();

        $("#results").empty();

	var result = new Array();

	$.each($(".frame input:checked"), function() {

		result.push($(this).attr("value"));

		$(this).parent().addClass('checked');

	});

	$('.field').val(result.join(','));

	$('.count-selected').text('Selecionadas: '+result.length);

	$.each($(".frame input:not(:checked)"), function() {

		$(this).parent().removeClass('checked');

	});

  });

	var result = new Array();

	$.each($(".frame input:checked"), function() {

		result.push($(this).attr("value"));

		$(this).parent().addClass('checked');

	});

	$('.field').val(result.join(','));

	$('.count-selected').text('Selecionadas: '+result.length);

	$.each($(".frame input:not(:checked)"), function() {

		$(this).parent().removeClass('checked');

	});

});

</script>

<?php }

function wps_thumbnails_list(){

	   global $post;

	   $image = get_post_meta($post->ID, '_link', true);

	   $image = explode(",", $image);

	   foreach($image as $images){

		$url = wp_get_attachment_image_src($images, 1, 1);

	        echo '<a href="';

		echo $url[0];

		echo '" class="lightbox">';

		echo wp_get_attachment_image($images,'thumbnail', 1, 1);

		echo '</a>';

		}

}













// Mostra a quantidade de anexos na listagem de p�gina/post

add_filter('manage_pages_columns', 'pages_columns_attachment_count', 5);

add_action('manage_pages_custom_column', 'pages_custom_columns_attachment_count', 5, 2);

function pages_columns_attachment_count($defaults){

    $defaults['wps_page_attachments'] = __('Anexos');

    return $defaults;

}

function pages_custom_columns_attachment_count($column_name, $id){

	if($column_name === 'wps_page_attachments'){

	$attachments = get_children(array('post_parent'=>$id));

	$count = count($attachments);

	if($count !=0){

		echo $count . " anexos";

		}

	else echo "Nenhum";

    }

}



//////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////





if ( function_exists( 'add_image_size' ) ) { 

    add_image_size( 'galeria', 800, 500, true );

}



function load_caroufredsel() {

    wp_register_script( 'caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.1.0-packed.js', array( 'jquery' ), '6.1.0', true );

    wp_enqueue_script( 'caroufredsel_pre', get_template_directory_uri() . '/js/caroufredsel_pre.js', array( 'caroufredsel' ), '', true );

}

add_action( 'wp_enqueue_scripts', 'load_caroufredsel' );













    add_action( 'init', 'register_cpt_tarefa' );

    function register_cpt_tarefa() {

    $labels = array(

    'name' => _x( 'Tarefas', 'tarefa' ),

    'singular_name' => _x( 'Tarefa', 'tarefa' ),

    'add_new' => _x( 'Adicionar Novo', 'tarefa' ),

    'add_new_item' => _x( 'Adicionar Nova Tarefa', 'tarefa' ),

    'edit_item' => _x( 'Editar Tarefa', 'tarefa' ),

    'new_item' => _x( 'Nova Tarefa', 'tarefa' ),

    'view_item' => _x( 'Ver Tarefa', 'tarefa' ),

    'search_items' => _x( 'Procurar Tarefas', 'tarefa' ),

    'not_found' => _x( 'Nenhuma Tarefa Encontrada', 'tarefa' ),

    'not_found_in_trash' => _x( 'Nenhuma Tarefa no Lixo', 'tarefa' ),

    'parent_item_colon' => _x( 'Tarefa:Pai', 'tarefa' ),

    'menu_name' => _x( 'Tarefas', 'tarefa' ),

    );

    $args = array(

    'labels' => $labels,

    'hierarchical' => true,

    'description' => 'Tarefas',

    'supports' => array( 'title', 'editor', 'thumbnail' ),

    'taxonomies' => array( 'category' ),

    'public' => true,

    'show_ui' => true,

    'show_in_menu' => true,

    'menu_position' => 5,

    'show_in_nav_menus' => true,

    'publicly_queryable' => true,

    'exclude_from_search' => false,

    'has_archive' => true,

    'query_var' => true,

    'can_export' => true,

    'rewrite' => true,

    'capability_type' => 'page'

    );

    register_post_type( 'tarefa', $args );

    } 
	

function url_tema($url = '') {
	//echo get_bloginfo('template_url').'/'.$url;
	echo get_stylesheet_directory_uri('template_url').'/'.$url;
}








?>