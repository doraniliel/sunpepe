<?php
/**
 * Template: SUN PEPE Landing Page
 * Loaded by sunpepe-landing.php via the template_include filter.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* ── Gather settings (safe defaults match the original hardcoded content) ────── */

$business_name          = sunpepe_get( 'business_name',          'SUN PEPE' );
$phone_display          = sunpepe_get( 'phone_display',          '050-907-7774' );
$phone_tel              = sunpepe_get( 'phone_tel',              '+972509077774' );
$address                = sunpepe_get( 'address',                'הרצל 71, רמת גן' );
$kosher_label           = sunpepe_get( 'kosher_label',           'כשר' );
$waze_url               = sunpepe_get( 'waze_url',               'https://waze.com/ul?ll=32.086202,34.814943&navigate=yes&zoom=16' );
$google_maps_url        = sunpepe_get( 'google_maps_url',        'https://www.google.com/maps?q=32.086202,34.814943' );
$hero_headline          = sunpepe_get( 'hero_headline',          'פיצה חמה, כשרה, עם אופי של SUN PEPE' );
$hero_subheadline       = sunpepe_get( 'hero_subheadline',       'פיצרייה פרימיום ברמת גן — לאכילה במקום ולאיסוף עצמי, עם בצק, גבינה ותוספות שעושות חשק להתקשר עכשיו.' );
$primary_cta_label      = sunpepe_get( 'primary_cta_label',      'התקשרו להזמין כעת' );
$sticky_cta_label       = sunpepe_get( 'sticky_mobile_cta_label','התקשרו כעת' );
$hours_sun_thu          = sunpepe_get( 'hours_sun_thu',          '10:00–00:00' );
$hours_fri              = sunpepe_get( 'hours_fri',              '10:00–15:00' );
$final_cta_headline     = sunpepe_get( 'final_cta_headline',     'הפיצה מוכנה. אתם רק צריכים להתקשר.' );
$final_cta_details      = sunpepe_get( 'final_cta_details',      'SUN PEPE — הרצל 71, רמת גן | כשר | איסוף עצמי וישיבה במקום' );

/* ── Dynamic menu data (falls back to static list when CPT has no items) ─────── */

$grouped_items = Sunpepe_Menu_Post_Type::get_grouped_items();
$use_dynamic_menu = ! empty( $grouped_items );

/* ── Static fallback menu (shown when no CPT items are published yet) ────────── */

$static_menu = [
    'פיצות' => [
        'פיצה קלאסית',
        'פיצה מוצרלה',
        'פיצה שמנת / אלפרדו',
        'פיצה פסטו',
    ],
    'סלטים' => [
        'סלט יווני',
        'סלט טונה',
        'סלט סאן פפה',
    ],
    'מאפים' => [
        'פוקצ׳ה',
        'לחם שום',
        'מלוואח פיצה',
    ],
    'פסטות' => [
        'פסטה שמנת ופטריות',
        'פסטה רוזה',
        'פסטה פסטו',
    ],
    'שתייה' => [
        'בקבוק שתייה',
    ],
    'תוספות' => [
        'תוספת לפיצה',
    ],
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo esc_html( $business_name ); ?> | פיצה כשרה, רמת גן</title>

    <!-- Restaurant structured data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Restaurant",
        "name": <?php echo wp_json_encode( $business_name ); ?>,
        "telephone": <?php echo wp_json_encode( $phone_tel ); ?>,
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "הרצל 71",
            "addressLocality": "רמת גן",
            "addressCountry": "IL"
        },
        "servesCuisine": "Pizza",
        "priceRange": "₪₪",
        "openingHoursSpecification": [
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Sunday","Monday","Tuesday","Wednesday","Thursday"],
                "opens": "10:00",
                "closes": "00:00"
            },
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": "Friday",
                "opens": "10:00",
                "closes": "15:00"
            }
        ]
    }
    </script>

    <?php wp_head(); ?>
    <noscript><style>.sp-layer,.sp-cta-reveal{opacity:1 !important}</style></noscript>
</head>
<body class="sunpepe-landing-page">

<!-- ── Sticky mobile CTA (visible only on mobile, fixed to bottom) ─────────── -->
<div class="sunpepe-landing-sticky-cta" role="complementary" aria-label="כפתור חיוג מהיר">
    <a href="tel:<?php echo esc_attr( $phone_tel ); ?>"
       class="sunpepe-landing-sticky-cta__btn"
       aria-label="חייגו אלינו עכשיו: <?php echo esc_attr( $phone_display ); ?>">
        <?php echo esc_html( $sticky_cta_label ); ?>
    </a>
</div>

<div class="sunpepe-landing" dir="rtl" lang="he">

    <!-- ═══════════════════════════════════════════════════════════════════════
         SECTION 1 — HERO
         ═══════════════════════════════════════════════════════════════════════ -->
    <section class="sunpepe-landing__hero" aria-label="עמוד הבית">
        <div class="sunpepe-landing__container">

            <div class="sunpepe-landing__logo" aria-label="לוגו <?php echo esc_attr( $business_name ); ?>">
                <span class="sunpepe-landing__logo-text"><?php echo esc_html( $business_name ); ?></span>
            </div>

            <h1 class="sunpepe-landing__headline">
                <?php echo esc_html( $hero_headline ); ?>
            </h1>

            <p class="sunpepe-landing__subheadline">
                <?php echo esc_html( $hero_subheadline ); ?>
            </p>

            <div class="sunpepe-landing__badges" role="list">
                <span class="sunpepe-landing__badge" role="listitem"><?php echo esc_html( $kosher_label ); ?></span>
                <span class="sunpepe-landing__badge" role="listitem">ישיבה במקום</span>
                <span class="sunpepe-landing__badge" role="listitem">איסוף עצמי</span>
                <span class="sunpepe-landing__badge" role="listitem"><?php echo esc_html( $address ); ?></span>
            </div>

            <div class="sunpepe-landing__hero-ctas">
                <a href="tel:<?php echo esc_attr( $phone_tel ); ?>"
                   class="sunpepe-landing__cta-primary"
                   aria-label="חייגו אלינו: <?php echo esc_attr( $phone_display ); ?>">
                    <?php echo esc_html( $primary_cta_label ); ?>
                </a>
                <p class="sunpepe-landing__phone-inline" dir="ltr"><?php echo esc_html( $phone_display ); ?></p>
            </div>

            <div class="sunpepe-landing__hero-secondary-ctas">
                <a href="<?php echo esc_url( $waze_url ); ?>"
                   class="sunpepe-landing__nav-btn sunpepe-landing__nav-btn--waze"
                   target="_blank" rel="noopener noreferrer"
                   aria-label="נווט אלינו ב-Waze">
                    נווטו ב-Waze
                </a>
                <a href="<?php echo esc_url( $google_maps_url ); ?>"
                   class="sunpepe-landing__nav-btn sunpepe-landing__nav-btn--maps"
                   target="_blank" rel="noopener noreferrer"
                   aria-label="נווט אלינו ב-Google Maps">
                    Google Maps
                </a>
                <a href="#sunpepe-menu"
                   class="sunpepe-landing__nav-btn sunpepe-landing__nav-btn--menu"
                   aria-label="צפייה בתפריט שלנו">
                    צפייה בתפריט
                </a>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════════
         SECTION 2 — SCROLL ANIMATION (Phase 6)
         Desktop: stage is CSS-sticky; GSAP scrubs pizza layers on scroll.
         Mobile: pizza shown static; panels fade in via IntersectionObserver.
         Reduced-motion: CSS shows all layers, no GSAP runs.
         No-JS: noscript style in <head> makes all layers visible.
         ═══════════════════════════════════════════════════════════════════════ -->
    <section class="sunpepe-landing__animation" aria-label="על הפיצה שלנו">
        <div class="sunpepe-landing__animation-scene">

            <!-- ── Pizza stage (CSS sticky on desktop) ──────────────────────── -->
            <div class="sunpepe-landing__animation-stage" aria-hidden="true">
                <div class="sunpepe-landing__pizza-wrap">

                    <svg class="sp-pizza-svg"
                         viewBox="0 0 300 300"
                         xmlns="http://www.w3.org/2000/svg"
                         role="img"
                         aria-label="פיצה של SUN PEPE">

                        <!-- Beat 6: Glow ring (completes the pizza) -->
                        <circle class="sp-layer sp-layer--glow"
                                cx="150" cy="150" r="145"
                                fill="none"
                                stroke="rgba(255,209,102,0.40)"
                                stroke-width="16"/>

                        <!-- Beat 1: Dough / crust -->
                        <g class="sp-layer sp-layer--dough">
                            <circle cx="150" cy="150" r="138" fill="#e2b86e"/>
                            <circle cx="150" cy="150" r="126" fill="#d4a038" opacity="0.45"/>
                            <circle cx="150" cy="150" r="115" fill="#c08828" opacity="0.28"/>
                        </g>

                        <!-- Beat 3: Tomato sauce -->
                        <circle class="sp-layer sp-layer--sauce"
                                cx="150" cy="150" r="110"
                                fill="#b83020"/>

                        <!-- Beat 4: Mozzarella blobs -->
                        <g class="sp-layer sp-layer--mozz">
                            <ellipse cx="118" cy="130" rx="30" ry="22" fill="#f6f1e8"/>
                            <ellipse cx="178" cy="120" rx="26" ry="20" fill="#ede8db"/>
                            <ellipse cx="150" cy="170" rx="28" ry="22" fill="#f6f1e8"/>
                            <ellipse cx="105" cy="168" rx="20" ry="16" fill="#ede8db"/>
                            <ellipse cx="190" cy="162" rx="23" ry="18" fill="#f6f1e8"/>
                            <ellipse cx="157" cy="110" rx="18" ry="14" fill="#ede8db"/>
                        </g>

                        <!-- Beat 5: Vegan vegetable toppings -->
                        <g class="sp-layer sp-layer--toppings">
                            <!-- Spinach / basil (green) -->
                            <circle cx="132" cy="116" r="9"  fill="#2a8c2a"/>
                            <circle cx="170" cy="150" r="8"  fill="#38aa38"/>
                            <circle cx="122" cy="158" r="7"  fill="#2a8c2a"/>
                            <!-- Cherry tomatoes (red) -->
                            <circle cx="176" cy="124" r="10" fill="#e83838"/>
                            <circle cx="147" cy="111" r="8"  fill="#c82020"/>
                            <!-- Bell peppers (orange / yellow) -->
                            <ellipse cx="162" cy="168" rx="12" ry="7" fill="#e67e22"
                                     transform="rotate(-20,162,168)"/>
                            <ellipse cx="116" cy="144" rx="11" ry="6" fill="#f0b020"
                                     transform="rotate(15,116,144)"/>
                            <!-- Olives -->
                            <circle cx="191" cy="140" r="7" fill="#38382a"/>
                            <circle cx="191" cy="140" r="3" fill="#787858"/>
                        </g>

                        <!-- Beat 2: Red pepper mascot placeholder (SUN PEPE character).
                             All coordinates are absolute (no transform attribute) so the
                             reduced-motion CSS rule "transform:none !important" cannot
                             displace this element from its intended position. -->
                        <g class="sp-layer sp-layer--mascot">
                            <!-- Stem (absolute coords: local origin was translate(222,44)) -->
                            <rect x="217" y="28" width="9" height="16" rx="3"
                                  fill="#27ae60"/>
                            <rect x="226" y="22" width="7" height="12" rx="3"
                                  fill="#27ae60"/>
                            <!-- Body -->
                            <ellipse cx="222" cy="72" rx="26" ry="36"
                                     fill="#e03838"/>
                            <!-- Shine -->
                            <ellipse cx="213" cy="56" rx="7" ry="10"
                                     fill="rgba(255,255,255,0.22)"/>
                            <!-- Eyes -->
                            <circle cx="213" cy="64" r="5"   fill="white"/>
                            <circle cx="231" cy="64" r="5"   fill="white"/>
                            <circle cx="214" cy="65" r="2.5" fill="#1a1a1a"/>
                            <circle cx="232" cy="65" r="2.5" fill="#1a1a1a"/>
                            <circle cx="216" cy="64" r="1"   fill="white"/>
                            <circle cx="234" cy="64" r="1"   fill="white"/>
                            <!-- Smile -->
                            <path d="M 212 77 Q 222 86 232 77"
                                  stroke="#1a1a1a" stroke-width="2.5"
                                  fill="none" stroke-linecap="round"/>
                        </g>

                    </svg><!-- /.sp-pizza-svg -->

                </div><!-- /.pizza-wrap -->
            </div><!-- /.animation-stage -->

            <!-- ── Scroll copy panels ────────────────────────────────────────── -->
            <div class="sunpepe-landing__animation-panels">

                <div class="sunpepe-landing__animation-panel" data-beat="1">
                    <span class="sp-beat-label">01</span>
                    <p class="sunpepe-landing__animation-copy">מתחילים בבצק טרי</p>
                </div>

                <div class="sunpepe-landing__animation-panel" data-beat="2">
                    <span class="sp-beat-label">02</span>
                    <p class="sunpepe-landing__animation-copy"><?php echo esc_html( $business_name ); ?> נכנס לעניינים</p>
                </div>

                <div class="sunpepe-landing__animation-panel" data-beat="3">
                    <span class="sp-beat-label">03</span>
                    <p class="sunpepe-landing__animation-copy">רוטב עשיר נמרח בדיוק כמו שצריך</p>
                </div>

                <div class="sunpepe-landing__animation-panel" data-beat="4">
                    <span class="sp-beat-label">04</span>
                    <p class="sunpepe-landing__animation-copy">מוצרלה נמסה מעל הכול</p>
                </div>

                <div class="sunpepe-landing__animation-panel" data-beat="5">
                    <span class="sp-beat-label">05</span>
                    <p class="sunpepe-landing__animation-copy">תוספות ירקות צבעוניות בלבד</p>
                </div>

                <div class="sunpepe-landing__animation-panel" data-beat="6">
                    <span class="sp-beat-label">06</span>
                    <p class="sunpepe-landing__animation-copy">הפיצה מוכנה — עכשיו רק להתקשר</p>
                    <a href="tel:<?php echo esc_attr( $phone_tel ); ?>"
                       class="sunpepe-landing__cta-primary sp-cta-reveal">
                        <?php echo esc_html( $primary_cta_label ); ?>
                    </a>
                </div>

            </div><!-- /.animation-panels -->

        </div><!-- /.animation-scene -->
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════════
         SECTION 3 — MENU
         Shows CPT items when staff have added them; static fallback otherwise.
         All prices start at ₪0 and are edited in WordPress admin → פריטי תפריט.
         ═══════════════════════════════════════════════════════════════════════ -->
    <section class="sunpepe-landing__menu" id="sunpepe-menu" aria-label="תפריט">
        <div class="sunpepe-landing__container">

            <h2 class="sunpepe-landing__section-title">התפריט שלנו</h2>
            <p class="sunpepe-landing__section-note">המחירים יעודכנו בקרוב</p>

            <div class="sunpepe-landing__menu-categories">

            <?php if ( $use_dynamic_menu ) : ?>

                <?php foreach ( $grouped_items as $group ) : ?>
                    <div class="sunpepe-landing__menu-category">
                        <h3 class="sunpepe-landing__menu-category-title">
                            <?php echo esc_html( $group['name'] ); ?>
                        </h3>
                        <ul class="sunpepe-landing__menu-items" role="list">
                            <?php foreach ( $group['items'] as $item ) :
                                $price = sunpepe_get_price( $item->ID );
                                $desc  = sunpepe_get_description( $item->ID );
                            ?>
                            <li class="sunpepe-landing__menu-item">
                                <span class="sunpepe-landing__menu-item-name">
                                    <?php echo esc_html( $item->post_title ); ?>
                                    <?php if ( $desc ) : ?>
                                        <span class="sunpepe-landing__menu-item-desc">
                                            <?php echo esc_html( $desc ); ?>
                                        </span>
                                    <?php endif; ?>
                                </span>
                                <span class="sunpepe-landing__menu-item-price" dir="ltr">
                                    ₪<?php echo esc_html( $price ); ?>
                                </span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>

            <?php else : /* Static fallback — shown before staff add CPT items */ ?>

                <?php foreach ( $static_menu as $category_name => $item_names ) : ?>
                    <div class="sunpepe-landing__menu-category">
                        <h3 class="sunpepe-landing__menu-category-title">
                            <?php echo esc_html( $category_name ); ?>
                        </h3>
                        <ul class="sunpepe-landing__menu-items" role="list">
                            <?php foreach ( $item_names as $item_name ) : ?>
                            <li class="sunpepe-landing__menu-item">
                                <span class="sunpepe-landing__menu-item-name">
                                    <?php echo esc_html( $item_name ); ?>
                                </span>
                                <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

            </div><!-- /.menu-categories -->
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════════
         SECTION 4 — WHY SUN PEPE
         ═══════════════════════════════════════════════════════════════════════ -->
    <section class="sunpepe-landing__why" aria-label="למה SUN PEPE">
        <div class="sunpepe-landing__container">
            <h2 class="sunpepe-landing__section-title">למה <?php echo esc_html( $business_name ); ?>?</h2>
            <div class="sunpepe-landing__why-grid">

                <div class="sunpepe-landing__why-card">
                    <span class="sunpepe-landing__why-icon" aria-hidden="true">✡</span>
                    <h3><?php echo esc_html( $kosher_label ); ?></h3>
                    <p>פיצה כשרה, חמה ומדויקת</p>
                </div>

                <div class="sunpepe-landing__why-card">
                    <span class="sunpepe-landing__why-icon" aria-hidden="true">⌂</span>
                    <h3>לאיסוף וישיבה במקום</h3>
                    <p>בלי סיבוכים, פשוט מגיעים או מתקשרים</p>
                </div>

                <div class="sunpepe-landing__why-card">
                    <span class="sunpepe-landing__why-icon" aria-hidden="true">◎</span>
                    <h3>במרכז רמת גן</h3>
                    <p><?php echo esc_html( $address ); ?>, קרוב ונגיש למרכז ישראל</p>
                </div>

                <div class="sunpepe-landing__why-card">
                    <span class="sunpepe-landing__why-icon" aria-hidden="true">★</span>
                    <h3>תוספות ירקות טריות</h3>
                    <p>צבע, טעם ואופי בכל מגש</p>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════════
         SECTION 5 — LOCATION & HOURS
         ═══════════════════════════════════════════════════════════════════════ -->
    <section class="sunpepe-landing__location" aria-label="מיקום ושעות">
        <div class="sunpepe-landing__container">

            <h2 class="sunpepe-landing__section-title">מיקום ושעות פתיחה</h2>

            <address class="sunpepe-landing__address">
                <?php echo esc_html( $address ); ?>
            </address>

            <dl class="sunpepe-landing__hours">
                <dt>ראשון–חמישי</dt>
                <dd><?php echo esc_html( $hours_sun_thu ); ?></dd>
                <dt>שישי</dt>
                <dd><?php echo esc_html( $hours_fri ); ?></dd>
            </dl>

            <div class="sunpepe-landing__location-ctas">
                <a href="<?php echo esc_url( $waze_url ); ?>"
                   class="sunpepe-landing__nav-btn sunpepe-landing__nav-btn--waze"
                   target="_blank" rel="noopener noreferrer">
                    נווטו עם Waze
                </a>
                <a href="<?php echo esc_url( $google_maps_url ); ?>"
                   class="sunpepe-landing__nav-btn sunpepe-landing__nav-btn--maps"
                   target="_blank" rel="noopener noreferrer">
                    פתחו ב-Google Maps
                </a>
                <a href="tel:<?php echo esc_attr( $phone_tel ); ?>"
                   class="sunpepe-landing__nav-btn sunpepe-landing__nav-btn--call">
                    התקשרו להזמין
                </a>
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════════
         SECTION 6 — FINAL CTA
         ═══════════════════════════════════════════════════════════════════════ -->
    <section class="sunpepe-landing__final-cta" aria-label="צרו קשר">
        <div class="sunpepe-landing__container">

            <h2 class="sunpepe-landing__final-cta-headline">
                <?php echo esc_html( $final_cta_headline ); ?>
            </h2>

            <a href="tel:<?php echo esc_attr( $phone_tel ); ?>"
               class="sunpepe-landing__cta-primary sunpepe-landing__cta-large">
                <?php echo esc_html( $primary_cta_label ); ?>
            </a>

            <p class="sunpepe-landing__phone-display" dir="ltr"><?php echo esc_html( $phone_display ); ?></p>

            <p class="sunpepe-landing__final-cta-details">
                <?php echo esc_html( $final_cta_details ); ?>
            </p>

        </div>
    </section>

</div><!-- /.sunpepe-landing -->

<?php wp_footer(); ?>
</body>
</html>
