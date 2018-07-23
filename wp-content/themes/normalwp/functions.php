<?php
add_action( 'after_setup_theme', 'normal_setup' );
function normal_setup() {
	add_theme_support( 'title-tag' );
}

show_admin_bar( false );

function enqueue_theme_scripts() {

	$version = "1";

	// Remove Unnecessary Code
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');


	// CSS

	$fontscss = get_template_directory_uri() . '/fonts/fonts.css';
  wp_register_style('fontscss',$fontscss, false, $version);

	$defaultstyle = get_bloginfo('stylesheet_url');
	wp_register_style('defaultstyle',$defaultstyle, false, $version,'screen');


	// JS

	$themejs = get_template_directory_uri() . '/js/main.js';
	wp_register_script('themejs',$themejs, false, $version);

	// Enqueue

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'themejs',array('jquery'));

	wp_enqueue_style( 'fontscss');
	wp_enqueue_style( 'defaultstyle');

}

add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');
