<?php

// Define theme version constant
define('YOUR_THEME_VERSION', '2.0.0');

// Enqueue styles
function custom_theme_assets() {
    wp_enqueue_style('style', get_stylesheet_uri(), array(), YOUR_THEME_VERSION);
}
add_action('wp_enqueue_scripts', 'custom_theme_assets');

// Register custom navigation menu
function wpb_custom_new_menu() {
    register_nav_menu('my-custom-menu', __('Omid Beheshtian Theme Menu', 'your-text-domain'));
}
add_action('init', 'wpb_custom_new_menu');

// Add support for post thumbnails
add_theme_support('post-thumbnails');

// Add Elementor support
function my_theme_add_elementor_support() {
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'my_theme_add_elementor_support');

// Add WooCommerce support
function my_theme_add_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'my_theme_add_woocommerce_support');

// Enqueue styles and scripts for WooCommerce
// Replace 'custom-woocommerce-style' and '/css/woocommerce-style.css' with your actual stylesheet handle and path.
if (class_exists('WooCommerce')) {
    function my_theme_enqueue_woocommerce_styles() {
        wp_enqueue_style('custom-woocommerce-style', get_stylesheet_directory_uri() . '/css/woocommerce-style.css');
    }
    add_action('wp_enqueue_scripts', 'my_theme_enqueue_woocommerce_styles');
}

// Load theme text domain for translation (Need to be completed!)
function load_theme_textdomain() {
    load_theme_textdomain('your-text-domain', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'load_theme_textdomain');

// Custom login page in WordPress
function wpb_login_logo() {
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url('https://omidbeheshtian.com/assets/img/omidbeheshtianlogotransparent.png');
        height: 285px;
        width: auto;
        margin-top: -100px;
        background-size: cover;
        background-repeat: no-repeat;
        padding-bottom: 10px;
        z-index: 9999;
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'wpb_login_logo');

// Change logo link in login page
function wpb_login_logo_url() {
    return 'https://omidbeheshtian.com/';
}
add_filter('login_headerurl', 'wpb_login_logo_url');

function wpb_login_logo_url_title() {
    return 'Omid Beheshtian Website';
}
add_filter('login_headertitle', 'wpb_login_logo_url_title');

// Read custom CSS page for WP login
function my_custom_login_stylesheet() {
    wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/css/style-login.css');
}
add_action('login_enqueue_scripts', 'my_custom_login_stylesheet');

// Error login page
function login_error_override() {
    return 'Incorrect Data.';
}
add_filter('login_errors', 'login_error_override');