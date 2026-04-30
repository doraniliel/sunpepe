<?php
/**
 * ACF field group for SUN PEPE menu items.
 *
 * IMPORTANT: This file is loaded only when ACF (Free or Pro) is active.
 * See sunpepe-landing.php → plugins_loaded hook.
 *
 * Fields are registered with acf_add_local_field_group() so they are
 * version-controlled in code and do not rely solely on database entries.
 *
 * ACF Options Page note:
 * acf_add_options_page() requires ACF Pro. Global landing page fields
 * (business name, phone, hours, CTAs) are handled by the native WordPress
 * settings page in class-settings-page.php instead, which works with
 * ACF Free and without any ACF installation at all.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Sunpepe_ACF_Fields {

    public static function init() {
        add_action( 'acf/init', [ __CLASS__, 'register_menu_item_fields' ] );
    }

    /**
     * Register ACF fields for the sunpepe_menu_item CPT.
     *
     * Fields:
     *   menu_price       — number, default 0, min 0
     *   menu_description — textarea, optional
     */
    public static function register_menu_item_fields() {
        if ( ! function_exists( 'acf_add_local_field_group' ) ) {
            return;
        }

        acf_add_local_field_group( [
            'key'      => 'group_sunpepe_menu_item',
            'title'    => 'פרטי פריט תפריט',
            'location' => [ [
                [
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => Sunpepe_Menu_Post_Type::CPT,
                ],
            ] ],
            'menu_order'      => 0,
            'position'        => 'normal',
            'style'           => 'default',
            'label_placement' => 'top',
            'active'          => true,
            'fields'          => [
                [
                    'key'           => 'field_sunpepe_menu_price',
                    'label'         => 'מחיר (₪)',
                    'name'          => 'menu_price',
                    'type'          => 'number',
                    'instructions'  => 'השאר 0 אם המחיר טרם הוחלט. כל הפריטים מתחילים ב-0.',
                    'required'      => 0,
                    'default_value' => 0,
                    'min'           => 0,
                    'max'           => '',
                    'step'          => 1,
                    'prepend'       => '₪',
                    'append'        => '',
                    'wrapper'       => [ 'width' => '30', 'id' => '', 'class' => '' ],
                ],
                [
                    'key'           => 'field_sunpepe_menu_description',
                    'label'         => 'תיאור קצר (אופציונלי)',
                    'name'          => 'menu_description',
                    'type'          => 'textarea',
                    'instructions'  => 'תיאור קצר של הפריט — לא חובה. ישמש בעתיד אם יוצג תיאור בדף.',
                    'required'      => 0,
                    'rows'          => 2,
                    'new_lines'     => 'br',
                    'wrapper'       => [ 'width' => '70', 'id' => '', 'class' => '' ],
                ],
            ],
        ] );
    }
}
