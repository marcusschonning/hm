<?php

require 'library/cpt-products.php';


/**********************************************
 **********************************************
 * Enqueue scripts and styles and media       *
 **********************************************
 **********************************************/
function hm_scripts() {
	wp_enqueue_style('font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/build/css/main.css');

	wp_enqueue_script('modernizr', get_template_directory_uri() . '/build/js/vendor/modernizr-2.8.3.min.js', array(), '', false);
	wp_enqueue_script('jquery', '//code.jquery.com/jquery-1.11.2.min.js', array(), '', true);
	wp_enqueue_script('script', get_template_directory_uri() . '/build/js/main.min.js', array(), '', true);
}

add_action( 'wp_enqueue_scripts', 'hm_scripts' );

add_theme_support( 'post-thumbnails' );

?>