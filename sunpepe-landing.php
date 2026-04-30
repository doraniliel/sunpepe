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

define( 'SUNPEPE_VERSION',      '0.2.0' );
define( 'SUNPEPE_PLUGIN_DIR',   plugin_dir_path( __FILE__ ) );
define( 'SUNPEPE_PLUGIN_URL',   plugin_dir_url( __FILE__ ) );
define( 'SUNPEPE_TEMPLATE_KEY', 'sunpepe-landing' );

/* ── Load includes ─────────────────────────────────────────────────────────── */

require_once SUNPEPE_PLUGIN_DIR . 'includes/class-settings-page.php';
require_once SUNPEPE_PLUGIN_DIR . 'includes/class-menu-post-type.php';

Sunpepe_Settings_Page::init();
Sunpepe_Menu_Post_Type::init();

// ACF fields are only registered when ACF plugin is active.
add_action( 'plugins_loaded', function () {
    if ( class_exists( 'ACF' ) ) {
        require_once SUNPEPE_PLUGIN_DIR . 'includes/class-acf-fields.php';
        Sunpepe_ACF_Fields::init();
    }
} );

/* ── Template + asset hooks ─────────────────────────────────────────────────── */

add_filter( 'theme_page_templates', 'sunpepe_register_page_template' );
add_filter( 'template_include',     'sunpepe_load_page_template' );
add_action( 'wp_enqueue_scripts',   'sunpepe_enqueue_assets' );

/* ── Template helper functions ──────────────────────────────────────────────── */

/**
 * Get a global landing-page setting, with a hard-coded default fallback.
 *
 * @param string $key     Setting key (e.g. 'hero_headline').
 * @param string $default Value shown when the setting is empty.
 * @return string
 */
function sunpepe_get( $key, $default = '' ) {
    return Sunpepe_Settings_Page::get( $key, $default );
}

/**
 * Get a menu item price (ACF field). Returns 0 when ACF is not active.
 *
 * @param int $post_id WP_Post ID of a sunpepe_menu_item.
 * @return int
 */
function sunpepe_get_price( $post_id ) {
    if ( function_exists( 'get_field' ) ) {
        $price = get_field( 'menu_price', $post_id );
        return is_numeric( $price ) ? (int) $price : 0;
    }
    return 0;
}

/**
 * Get a menu item description (ACF field). Returns '' when ACF is not active.
 *
 * @param int $post_id WP_Post ID of a sunpepe_menu_item.
 * @return string
 */
function sunpepe_get_description( $post_id ) {
    if ( function_exists( 'get_field' ) ) {
        $desc = get_field( 'menu_description', $post_id );
        return $desc ? $desc : '';
    }
    return '';
}

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
