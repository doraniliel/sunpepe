<?php
/**
 * Custom Post Type and Taxonomy for SUN PEPE menu items.
 *
 * CPT:      sunpepe_menu_item
 * Taxonomy: sunpepe_menu_category
 *
 * Default category terms are seeded once on first activation so staff
 * can immediately start adding items without manual setup.
 * Prices are managed via ACF fields (class-acf-fields.php).
 * If ACF is not installed, items show with price ₪0.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Sunpepe_Menu_Post_Type {

    const CPT      = 'sunpepe_menu_item';
    const TAXONOMY = 'sunpepe_menu_category';

    public static function init() {
        add_action( 'init', [ __CLASS__, 'register_post_type' ] );
        add_action( 'init', [ __CLASS__, 'register_taxonomy' ] );
        add_action( 'init', [ __CLASS__, 'maybe_seed_terms' ], 20 );
    }

    /* ── CPT registration ────────────────────────────────────────────────── */

    public static function register_post_type() {
        $labels = [
            'name'               => 'פריטי תפריט',
            'singular_name'      => 'פריט תפריט',
            'add_new'            => 'הוסף פריט',
            'add_new_item'       => 'הוסף פריט תפריט חדש',
            'edit_item'          => 'ערוך פריט',
            'new_item'           => 'פריט חדש',
            'view_item'          => 'צפה בפריט',
            'all_items'          => 'כל הפריטים',
            'search_items'       => 'חפש פריטים',
            'not_found'          => 'לא נמצאו פריטים',
            'not_found_in_trash' => 'לא נמצאו פריטים בפח',
            'menu_name'          => 'פריטי תפריט',
        ];

        register_post_type( self::CPT, [
            'labels'       => $labels,
            'public'       => false,   // not publicly queryable as standalone page
            'show_ui'      => true,
            'show_in_menu' => 'sunpepe-landing',  // nest under SUN PEPE admin menu
            'supports'     => [ 'title', 'editor', 'page-attributes' ],
            'taxonomies'   => [ self::TAXONOMY ],
            'has_archive'  => false,
            'rewrite'      => false,
            'menu_icon'    => 'dashicons-food',
            'show_in_rest' => false,
        ] );
    }

    /* ── Taxonomy registration ───────────────────────────────────────────── */

    public static function register_taxonomy() {
        $labels = [
            'name'              => 'קטגוריות תפריט',
            'singular_name'     => 'קטגוריית תפריט',
            'add_new_item'      => 'הוסף קטגוריה חדשה',
            'edit_item'         => 'ערוך קטגוריה',
            'update_item'       => 'עדכן קטגוריה',
            'all_items'         => 'כל הקטגוריות',
            'search_items'      => 'חפש קטגוריות',
            'not_found'         => 'לא נמצאו קטגוריות',
        ];

        register_taxonomy( self::TAXONOMY, self::CPT, [
            'labels'            => $labels,
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'rewrite'           => false,
            'show_in_rest'      => false,
        ] );
    }

    /* ── Default term seeding ────────────────────────────────────────────── */

    /**
     * Create default menu categories once (idempotent — skips if already seeded).
     * Uses explicit English slugs to avoid URL-encoding issues with Hebrew.
     * Option key bumped to v2 so sites with the old 6-category set get the
     * correct 9 categories on next page load. Old empty categories are harmless
     * (hide_empty:true in get_grouped_items keeps them off the frontend).
     */
    public static function maybe_seed_terms() {
        if ( get_option( 'sunpepe_terms_seeded_v2' ) ) {
            return;
        }

        $defaults = [
            'פיצה קלאסית'   => 'pizza-classic',
            'המיוחדות שלנו' => 'pizza-specials',
            'תוספות לפיצה'  => 'pizza-toppings',
            'סלטים'          => 'salads',
            'מאפים'          => 'pastries',
            'פסטות'          => 'pastas',
            'קינוחים'        => 'desserts',
            'שתייה'          => 'drinks',
            'מבצעים שלנו'   => 'specials',
        ];

        foreach ( $defaults as $name => $slug ) {
            if ( ! term_exists( $name, self::TAXONOMY ) ) {
                wp_insert_term( $name, self::TAXONOMY, [ 'slug' => $slug ] );
            }
        }

        update_option( 'sunpepe_terms_seeded_v2', true );
    }

    /* ── Template query helper ───────────────────────────────────────────── */

    /**
     * Return menu items grouped by category, ordered by term_id then menu_order.
     * Returns an empty array if no published items exist (template uses static fallback).
     *
     * @return array[] Each entry: [ 'name' => string, 'items' => WP_Post[] ]
     */
    public static function get_grouped_items() {
        $terms = get_terms( [
            'taxonomy'   => self::TAXONOMY,
            'hide_empty' => true,   // only show categories that have items
            'orderby'    => 'term_id',
            'order'      => 'ASC',
        ] );

        if ( is_wp_error( $terms ) || empty( $terms ) ) {
            return [];
        }

        $grouped = [];

        foreach ( $terms as $term ) {
            $items = get_posts( [
                'post_type'      => self::CPT,
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'tax_query'      => [ [
                    'taxonomy' => self::TAXONOMY,
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                ] ],
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ] );

            if ( ! empty( $items ) ) {
                $grouped[] = [
                    'name'  => $term->name,
                    'items' => $items,
                ];
            }
        }

        return $grouped;
    }
}
