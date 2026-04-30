<?php
/**
 * Plugin Name:  SUN PEPE Landing Page
 * Description:  Hebrew RTL landing page for SUN PEPE kosher pizzeria, Ramat Gan.
 * Version:      0.1.0
 * Author:       SUN PEPE
 * Text Domain:  sunpepe-landing
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'SUNPEPE_VERSION',      '0.1.0' );
define( 'SUNPEPE_PLUGIN_DIR',   plugin_dir_path( __FILE__ ) );
define( 'SUNPEPE_PLUGIN_URL',   plugin_dir_url( __FILE__ ) );
define( 'SUNPEPE_TEMPLATE_KEY', 'sunpepe-landing' );

add_filter( 'theme_page_templates', 'sunpepe_register_page_template' );
add_filter( 'template_include',     'sunpepe_load_page_template' );
add_action( 'wp_enqueue_scripts',   'sunpepe_enqueue_assets' );

function sunpepe_register_page_template( $templates ) {
    $templates[ SUNPEPE_TEMPLATE_KEY ] = __( 'SUN PEPE Landing Page', 'sunpepe-landing' );
    return $templates;
}

function sunpepe_load_page_template( $template ) {
    if ( ! is_page() ) {
        return $template;
    }
    $meta = get_post_meta( get_the_ID(), '_wp_page_template', true );
    if ( SUNPEPE_TEMPLATE_KEY !== $meta ) {
        return $template;
    }
    $plugin_template = SUNPEPE_PLUGIN_DIR . 'templates/page-sunpepe-landing.php';
    return file_exists( $plugin_template ) ? $plugin_template : $template;
}

function sunpepe_enqueue_assets() {
    if ( ! is_page() ) {
        return;
    }
    $meta = get_post_meta( get_the_ID(), '_wp_page_template', true );
    if ( SUNPEPE_TEMPLATE_KEY !== $meta ) {
        return;
    }

    wp_enqueue_style(
        'sunpepe-heebo',
        'https://fonts.googleapis.com/css2?family=Heebo:wght@400;600;700;900&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'sunpepe-landing',
        SUNPEPE_PLUGIN_URL . 'assets/css/sunpepe-landing.css',
        [ 'sunpepe-heebo' ],
        SUNPEPE_VERSION
    );

    wp_enqueue_script(
        'sunpepe-landing',
        SUNPEPE_PLUGIN_URL . 'assets/js/sunpepe-landing.js',
        [],
        SUNPEPE_VERSION,
        true
    );
}
