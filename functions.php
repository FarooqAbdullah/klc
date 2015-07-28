<?php

function theme_styles() {

    // Register Style Sheets
    wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css', array(), '', '');
    wp_register_style( 'general-css', get_stylesheet_directory_uri().'/css/styles_general.css', array('bootstrap'), '', '');
    wp_register_style( 'styles-css', get_stylesheet_directory_uri().'/css/styles.css', array('bootstrap'), '', '');
    wp_register_style( 'theme-responsive', get_stylesheet_directory_uri().'/css/theme_responsive.css', array('bootstrap'), '', '');

    // Enqueue Style Sheets
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('general-css');
    wp_enqueue_style('styles-css');
//    wp_enqueue_style('theme-responsive');
}

function theme_scripts() {

    // Register Scripts
    wp_register_script('jquery', get_stylesheet_directory_uri().'/js/jquery-1.11.3.min.js', array(), '', true);
    wp_register_script('bootstrap', get_stylesheet_directory_uri().'/js/bootstrap.min.js', array('jquery'), '', true);
    wp_register_script('theme-javascript', get_stylesheet_directory_uri().'/js/theme.js', array('jquery', 'bootstrap'), '', true);

    // Enqueue Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('theme-javascript');
}
function theme_styles_scripts() {
    theme_styles();
    theme_scripts();
}
add_action( 'wp_enqueue_scripts', 'theme_styles_scripts');