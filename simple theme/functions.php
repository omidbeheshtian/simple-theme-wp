<?php

function custom_theme_assets() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );
function wpb_custom_new_menu() {
    register_nav_menu('my-custom-menu',__( 'omidbeheshtian Theme Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );
add_theme_support( 'post-thumbnails' );