<?php

function e14_setup_theme() {
	load_theme_textdomain( 'e14', get_template_directory() . '/languages' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'e14_setup_theme' );

require 'inc/e14-functions.php';
require 'inc/e14-hooks.php';