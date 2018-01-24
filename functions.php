<?php

/**
 * Content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 768;
}

if ( ! function_exists( 'e14_setup_theme' ) ) {
	function e14_setup_theme() {
		load_theme_textdomain( 'e14', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );

		/* HTML 5 */
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
	}

	add_action( 'after_setup_theme', 'e14_setup_theme' );
}

if ( ! function_exists( 'e14_enqueue_scripts' ) ) {
	function e14_enqueue_scripts() {

		$e14_theme_url = get_template_directory_uri();

		wp_enqueue_style( 'e14-style', $e14_theme_url . '/assets/css/style.css', array(), null, 'all' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'main', $e14_theme_url . '/assets/js/main.min.js', array( 'jquery' ) );

		if ( is_singular( 'graffiti' ) ) {
			wp_enqueue_script( 'unslider', $e14_theme_url . '/assets/js/libs/unslider-min.js', array( 'jquery' ) );
			wp_enqueue_style( 'unslider', $e14_theme_url . '/assets/js/libs/unslider.css', array(), null, 'all' );
			wp_enqueue_script( 'masonry', $e14_theme_url . '/assets/js/libs/masonry.pkgd.min.js', array( 'jquery' ) );
		}
		
	}

	add_action( 'wp_enqueue_scripts', 'e14_enqueue_scripts', 1 );
}

if ( class_exists( 'Kirki' ) ) {
	require 'inc/e14-kirki.php';
}
require 'inc/e14-metabox.php';
require 'inc/e14-cpts.php';
require 'inc/e14-functions.php';
require 'inc/e14-hooks.php';