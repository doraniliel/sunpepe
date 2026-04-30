<?php
/**
 * Native WordPress settings page for SUN PEPE landing page content.
 *
 * Stores all global fields (business info, CTAs, hours, URLs) using the
 * WordPress Settings API. No ACF dependency required — works with ACF Free,
 * ACF Pro, or no ACF at all.
 *
 * Why not ACF Options Page?
 * ACF Options Page requires ACF Pro. This class provides the same result
 * using only WordPress core, so non-technical staff can always edit content
 * regardless of which ACF version is installed.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Sunpepe_Settings_Page {

    const OPTION_NAME = 'sunpepe_landing_options';
    const MENU_SLUG   = 'sunpepe-landing';

    public static function init() {
        add_action( 'admin_menu',    [ __CLASS__, 'add_menu' ] );
        add_action( 'admin_init',    [ __CLASS__, 'register_settings' ] );
        add_action( 'admin_notices', [ __CLASS__, 'acf_notice' ] );
    }

    /* ── Admin menu ──────────────────────────────────────────────────────── */

    public static function add_menu() {
        add_menu_page(
            __( 'SUN PEPE — הגדרות דף הנחיתה', 'sunpepe-landing' ),
            'SUN PEPE',
            'manage_options',
            self::MENU_SLUG,
            [ __CLASS__, 'render_page' ],
            'dashicons-store',
            30
        );
    }

    /* ── Settings registration ───────────────────────────────────────────── */

    public static function register_settings() {
        register_setting(
            self::OPTION_NAME,          // option group
            self::OPTION_NAME,          // option name
            [ 'sanitize_callback' => [ __CLASS__, 'sanitize' ] ]
        );
    }

    public static function sanitize( $input ) {
        $clean = [];

        $text_fields = [
            'business_name', 'phone_display', 'phone_tel', 'address',
            'kosher_label', 'hero_headline', 'primary_cta_label',
            'sticky_mobile_cta_label', 'hours_sun_thu', 'hours_fri',
            'final_cta_headline',
        ];
        $textarea_fields = [ 'hero_subheadline', 'final_cta_details' ];
        $url_fields      = [ 'google_maps_url', 'waze_url' ];

        foreach ( $text_fields as $key ) {
            $clean[ $key ] = isset( $input[ $key ] )
                ? sanitize_text_field( $input[ $key ] )
                : '';
        }
        foreach ( $textarea_fields as $key ) {
            $clean[ $key ] = isset( $input[ $key ] )
                ? sanitize_textarea_field( $input[ $key ] )
                : '';
        }
        foreach ( $url_fields as $key ) {
            $clean[ $key ] = isset( $input[ $key ] )
                ? esc_url_raw( $input[ $key ] )
                : '';
        }

        return $clean;
    }

    /* ── Public getter ───────────────────────────────────────────────────── */

    /**
     * Return a single setting value, falling back to $default if empty.
     *
     * @param string $key     Field key (e.g. 'hero_headline').
     * @param string $default Fallback value shown if field is empty.
     * @return string
     */
    public static function get( $key, $default = '' ) {
        static $options = null;
        if ( $options === null ) {
            $options = get_option( self::OPTION_NAME, [] );
        }
        if ( isset( $options[ $key ] ) && $options[ $key ] !== '' ) {
            return $options[ $key ];
        }
        return $default;
    }

    /* ── Admin notice: ACF missing ───────────────────────────────────────── */

    public static function acf_notice() {
        $screen = get_current_screen();
        if ( ! $screen || strpos( $screen->id, self::MENU_SLUG ) === false ) {
            return;
        }
        if ( ! class_exists( 'ACF' ) ) {
            $install_url = admin_url( 'plugin-install.php?s=advanced+custom+fields&tab=search&type=term' );
            echo '<div class="notice notice-warning is-dismissible"><p>';
            echo '<strong>SUN PEPE:</strong> ';
            printf(
                /* translators: %s: plugin install URL */
                wp_kses(
                    __( 'פלאגין Advanced Custom Fields (ACF) לא מותקן. שדות מחיר פריטי התפריט לא יהיו זמינים. <a href="%s">התקן ACF Free</a> כדי לאפשר עריכת מחירים.', 'sunpepe-landing' ),
                    [ 'a' => [ 'href' => [] ] ]
                ),
                esc_url( $install_url )
            );
            echo '</p></div>';
        }
    }

    /* ── Settings page HTML ──────────────────────────────────────────────── */

    public static function render_page() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }
        $opts = get_option( self::OPTION_NAME, [] );
        ?>
        <div class="wrap" dir="rtl" style="direction:rtl;text-align:right;">
            <h1><?php esc_html_e( 'SUN PEPE — הגדרות דף הנחיתה', 'sunpepe-landing' ); ?></h1>
            <p style="color:#666;margin-bottom:1.5rem;">
                <?php esc_html_e( 'ערוך כאן את תוכן דף הנחיתה. כל שינוי יופיע מיד באתר לאחר שמירה.', 'sunpepe-landing' ); ?>
            </p>

            <form method="post" action="options.php">
                <?php settings_fields( self::OPTION_NAME ); ?>

                <h2 style="border-bottom:1px solid #ddd;padding-bottom:.5rem;">
                    <?php esc_html_e( 'פרטי העסק', 'sunpepe-landing' ); ?>
                </h2>
                <table class="form-table" role="presentation">
                    <?php
                    self::text_row( $opts, 'business_name',  'שם העסק',          'SUN PEPE' );
                    self::text_row( $opts, 'address',         'כתובת',            'הרצל 71, רמת גן' );
                    self::text_row( $opts, 'phone_display',   'טלפון (להצגה)',     '050-907-7774' );
                    self::text_row( $opts, 'phone_tel',       'טלפון (קישור tel:)','+972509077774',
                        'חייב להתחיל ב-+ ולכלול קידומת מדינה, לדוגמה: +972509077774' );
                    self::text_row( $opts, 'kosher_label',    'כיתוב כשרות',      'כשר' );
                    ?>
                </table>

                <h2 style="border-bottom:1px solid #ddd;padding-bottom:.5rem;margin-top:2rem;">
                    <?php esc_html_e( 'שעות פתיחה', 'sunpepe-landing' ); ?>
                </h2>
                <table class="form-table" role="presentation">
                    <?php
                    self::text_row( $opts, 'hours_sun_thu', 'ראשון–חמישי', '10:00–00:00' );
                    self::text_row( $opts, 'hours_fri',      'שישי',        '10:00–15:00',
                        'אין להמציא שעות שבת אם לא סופקו' );
                    ?>
                </table>

                <h2 style="border-bottom:1px solid #ddd;padding-bottom:.5rem;margin-top:2rem;">
                    <?php esc_html_e( 'קישורי ניווט', 'sunpepe-landing' ); ?>
                </h2>
                <table class="form-table" role="presentation">
                    <?php
                    self::url_row( $opts, 'waze_url',       'קישור Waze',        'https://waze.com/ul?ll=32.086202,34.814943&navigate=yes&zoom=16' );
                    self::url_row( $opts, 'google_maps_url', 'קישור Google Maps', 'https://www.google.com/maps?q=32.086202,34.814943' );
                    ?>
                </table>

                <h2 style="border-bottom:1px solid #ddd;padding-bottom:.5rem;margin-top:2rem;">
                    <?php esc_html_e( 'כותרות וכפתורים', 'sunpepe-landing' ); ?>
                </h2>
                <table class="form-table" role="presentation">
                    <?php
                    self::text_row(     $opts, 'hero_headline',          'כותרת ראשית (Hero)',       'פיצה חמה, כשרה, עם אופי של SUN PEPE' );
                    self::textarea_row( $opts, 'hero_subheadline',       'תת-כותרת (Hero)',           'פיצרייה פרימיום ברמת גן — לאכילה במקום ולאיסוף עצמי, עם בצק, גבינה ותוספות שעושות חשק להתקשר עכשיו.' );
                    self::text_row(     $opts, 'primary_cta_label',      'כפתור CTA ראשי',           'התקשרו להזמין כעת' );
                    self::text_row(     $opts, 'sticky_mobile_cta_label','כפתור Sticky (מובייל)',     'התקשרו כעת' );
                    self::text_row(     $opts, 'final_cta_headline',     'כותרת סיום (Final CTA)',    'הפיצה מוכנה. אתם רק צריכים להתקשר.' );
                    self::textarea_row( $opts, 'final_cta_details',      'פרטים תחת כותרת הסיום',    'SUN PEPE — הרצל 71, רמת גן | כשר | איסוף עצמי וישיבה במקום' );
                    ?>
                </table>

                <?php submit_button( 'שמור שינויים' ); ?>
            </form>
        </div>
        <?php
    }

    /* ── Field row helpers ───────────────────────────────────────────────── */

    private static function text_row( $opts, $key, $label, $placeholder, $desc = '' ) {
        $value = isset( $opts[ $key ] ) ? $opts[ $key ] : '';
        $id    = 'sunpepe_' . $key;
        $name  = self::OPTION_NAME . '[' . $key . ']';
        ?>
        <tr>
            <th scope="row">
                <label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label>
            </th>
            <td>
                <input
                    type="text"
                    id="<?php echo esc_attr( $id ); ?>"
                    name="<?php echo esc_attr( $name ); ?>"
                    value="<?php echo esc_attr( $value ); ?>"
                    placeholder="<?php echo esc_attr( $placeholder ); ?>"
                    style="width:100%;max-width:600px;direction:rtl;"
                >
                <?php if ( $desc ) : ?>
                    <p class="description"><?php echo esc_html( $desc ); ?></p>
                <?php endif; ?>
            </td>
        </tr>
        <?php
    }

    private static function textarea_row( $opts, $key, $label, $placeholder ) {
        $value = isset( $opts[ $key ] ) ? $opts[ $key ] : '';
        $id    = 'sunpepe_' . $key;
        $name  = self::OPTION_NAME . '[' . $key . ']';
        ?>
        <tr>
            <th scope="row">
                <label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label>
            </th>
            <td>
                <textarea
                    id="<?php echo esc_attr( $id ); ?>"
                    name="<?php echo esc_attr( $name ); ?>"
                    rows="3"
                    placeholder="<?php echo esc_attr( $placeholder ); ?>"
                    style="width:100%;max-width:600px;direction:rtl;"
                ><?php echo esc_textarea( $value ); ?></textarea>
            </td>
        </tr>
        <?php
    }

    private static function url_row( $opts, $key, $label, $placeholder ) {
        $value = isset( $opts[ $key ] ) ? $opts[ $key ] : '';
        $id    = 'sunpepe_' . $key;
        $name  = self::OPTION_NAME . '[' . $key . ']';
        ?>
        <tr>
            <th scope="row">
                <label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label>
            </th>
            <td>
                <input
                    type="url"
                    id="<?php echo esc_attr( $id ); ?>"
                    name="<?php echo esc_attr( $name ); ?>"
                    value="<?php echo esc_attr( $value ); ?>"
                    placeholder="<?php echo esc_attr( $placeholder ); ?>"
                    style="width:100%;max-width:600px;direction:ltr;"
                >
            </td>
        </tr>
        <?php
    }
}
