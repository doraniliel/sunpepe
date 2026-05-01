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
$hero_headline          = sunpepe_get( 'hero_headline',          'בא לכם פיצה? סאן פפה על זה.' );
$hero_subheadline       = sunpepe_get( 'hero_subheadline',       'פיצה כשרה ברמת גן, חמה ומוכנה לאיסוף עצמי או לאכילה במקום.' );
$primary_cta_label      = sunpepe_get( 'primary_cta_label',      'התקשרו להזמין כעת' );
$sticky_cta_label       = sunpepe_get( 'sticky_mobile_cta_label','התקשרו כעת' );
$hours_sun_thu          = sunpepe_get( 'hours_sun_thu',          '10:00–00:00' );
$hours_fri              = sunpepe_get( 'hours_fri',              '10:00–15:00' );
$final_cta_headline     = sunpepe_get( 'final_cta_headline',     'למה אתם מחכים התקשרו להזמין כעת!' );
$final_cta_details      = sunpepe_get( 'final_cta_details',      'SUN PEPE — הרצל 71, רמת גן | כשר | איסוף עצמי וישיבה במקום' );

/* ── Dynamic menu data (falls back to static list when CPT has no items) ─────── */

$grouped_items = Sunpepe_Menu_Post_Type::get_grouped_items();
$use_dynamic_menu = ! empty( $grouped_items );

/* ── Static fallback menu (shown when no CPT items are published yet) ────────── */

$static_menu = [
    [
        'name'  => 'פיצה קלאסית',
        'items' => [
            [ 'name' => 'משולש',       'price' => '₪12', 'desc' => '' ],
            [ 'name' => 'אישית',       'price' => '₪25', 'desc' => '' ],
            [ 'name' => 'משפחתית',     'price' => '₪45', 'desc' => '' ],
            [ 'name' => 'ענקית',       'price' => '₪55', 'desc' => '' ],
        ],
    ],
    [
        'name'  => 'המיוחדות שלנו',
        'items' => [
            [
                'name'  => 'פיצה אננס מוצרלה זיתים',
                'price' => '',
                'desc'  => 'אישית ₪45 · משפחתית ₪59 · ענקית ₪75',
            ],
            [
                'name'  => 'פיצה מוצרלה',
                'price' => '',
                'desc'  => "עגבניות שרי, בזיליקום / ברוקולי ופרמזן\nמשולש ₪15 · אישית ₪35 · משפחתית ₪52 · ענקית ₪65",
            ],
            [
                'name'  => 'פיצה שמנת / אלפרדו',
                'price' => '',
                'desc'  => "עם פטריות טריות\nמשולש ₪17 · אישית ₪39 · משפחתית ₪65 · ענקית ₪79",
            ],
            [
                'name'  => 'פיצה פסטו',
                'price' => '',
                'desc'  => "עגבניות שרי מבושלות ופרמזן\nמשולש ₪17 · אישית ₪35 · משפחתית ₪59 · ענקית ₪75",
            ],
        ],
    ],
    [
        'name'  => 'תוספות לפיצה',
        'items' => [
            [
                'name'  => 'תוספות רגילות',
                'price' => '₪4 / ₪8',
                'desc'  => 'תירס, זיתים ירוקים, זיתים שחורים, פלפל חריף, פלפל שיפקה, עגבנייה טרייה, עגבניות שרי, בצל לבן, בצל סגול, פלפל אדום, פלפל צהוב',
            ],
            [
                'name'  => 'תוספות מיוחדות',
                'price' => '₪5 / ₪10',
                'desc'  => 'פטריות טריות, טונה, אנשובי, בולגרית, אקסטרה גבינה, מוצרלה, אננס, בטטה, חציל קלוי',
            ],
        ],
    ],
    [
        'name'  => 'סלטים',
        'items' => [
            [
                'name'  => 'סלט יווני',
                'price' => '₪40',
                'desc'  => 'חסה, מלפפון, עגבנייה, בצל, זיתים שחורים וגבינה בולגרית',
            ],
            [
                'name'  => 'סלט טונה',
                'price' => '₪40',
                'desc'  => 'חסה, עגבניות שרי, מלפפון, תירס, פטריות טריות וטונה',
            ],
            [
                'name'  => 'סלט סאן פפה',
                'price' => '₪40',
                'desc'  => 'חסה, עלי בזיליקום, מלפפון, עגבניות שרי, בצל, תירס, פטריות ופלפל חריף',
            ],
        ],
    ],
    [
        'name'  => 'מאפים',
        'items' => [
            [
                'name'  => 'זיווה אישית / ענקית',
                'price' => '₪38',
                'desc'  => 'כולל תוספת אחת לבחירה',
            ],
            [
                'name'  => 'לחם שום מיוחד עם גבינה',
                'price' => '₪35',
                'desc'  => '',
            ],
            [
                'name'  => 'מלאווח מגולגל',
                'price' => '₪28',
                'desc'  => 'טחינה, רסק וביצה',
            ],
            [
                'name'  => 'מלאווח פיצה',
                'price' => '₪28',
                'desc'  => '',
            ],
        ],
    ],
    [
        'name'  => 'פסטות',
        'items' => [
            [
                'name'  => 'פסטה שמנת',
                'price' => '₪42',
                'desc'  => 'ופטריות טריות',
            ],
            [
                'name'  => 'פסטה רוזה',
                'price' => '₪42',
                'desc'  => 'עגבניות ופרמזן',
            ],
            [
                'name'  => 'פסטה פסטו',
                'price' => '₪42',
                'desc'  => 'בזיליקום, עגבניות שרי ופרמזן',
            ],
            [
                'name'  => 'תוספת הקרמה',
                'price' => '₪10',
                'desc'  => 'צהובה / עמק / מוצרלה / טבעונית',
            ],
        ],
    ],
    [
        'name'  => 'קינוחים',
        'items' => [
            [ 'name' => 'פנקוטה',           'price' => '₪15', 'desc' => '' ],
            [ 'name' => 'מלבי שמנת',        'price' => '₪15', 'desc' => '' ],
            [ 'name' => 'מוס שוקולד / לבן', 'price' => '₪15', 'desc' => '' ],
            [ 'name' => 'קרם בוואריה',       'price' => '₪15', 'desc' => '' ],
            [ 'name' => 'קדאיף',            'price' => '₪15', 'desc' => '' ],
            [ 'name' => 'עוגת גבינה',        'price' => '₪15', 'desc' => '' ],
        ],
    ],
    [
        'name'  => 'שתייה',
        'items' => [
            [ 'name' => 'בקבוק 1.5 ליטר',                'price' => '₪14',          'desc' => '' ],
            [ 'name' => 'בקבוק קטן זכוכית / פלסטיק',     'price' => '₪10',          'desc' => '' ],
            [ 'name' => 'פחית 330 מ"ל',                  'price' => '₪9',           'desc' => '' ],
            [ 'name' => 'טרופית',                         'price' => '₪3',           'desc' => '' ],
            [ 'name' => 'ברד קטן / גדול / ענק',           'price' => '₪5 / ₪7 / ₪9', 'desc' => '' ],
            [ 'name' => 'אייס קפה קטן / גדול / ענק',      'price' => '₪7 / ₪10 / ₪15', 'desc' => '' ],
            [ 'name' => 'מיץ טבעי 350 / 500 מ"ל',        'price' => '₪15 / ₪22',   'desc' => '' ],
        ],
    ],
    [
        'name'  => 'מבצעים שלנו',
        'items' => [
            [
                'name'  => '2 מגשים משפחתיים + שתייה 1.5 ליטר + קינוח',
                'price' => '₪99',
                'desc'  => '',
            ],
            [
                'name'  => 'מגש ענק + 2 תוספות + לחם שום + 2 קינוחים + שתייה',
                'price' => '₪99',
                'desc'  => '',
            ],
        ],
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

<!-- ── Skip link — visible on keyboard focus only ────────────────────────── -->
<a class="sp-skip-link" href="#sunpepe-main">דלגו לתוכן המרכזי</a>

<!-- ── Fixed top-center CTA (desktop + mobile, always visible) ───────────── -->
<div class="sp-fixed-cta" role="complementary" aria-label="כפתור חיוג מהיר">
    <a href="tel:<?php echo esc_attr( $phone_tel ); ?>"
       class="sp-fixed-cta__btn"
       aria-label="חייגו לסאן פפה: <?php echo esc_attr( $phone_display ); ?>">
        <img class="sp-fixed-cta__img"
             src="<?php echo esc_url( SUNPEPE_PLUGIN_URL . 'assets/images/call-now-button.webp' ); ?>"
             alt="התקשרו כעת"
             loading="eager"
             decoding="async">
    </a>
    <span class="sp-fixed-cta__phone" dir="ltr"><?php echo esc_html( $phone_display ); ?></span>
</div>

<!-- ── Site-wide brand watermark — fixed behind all content ──────────────── -->
<div class="sp-bg-watermark" aria-hidden="true"></div>

<div class="sunpepe-landing" role="main" id="sunpepe-main" dir="rtl" lang="he">

    <!-- ═══════════════════════════════════════════════════════════════════════
         SECTION 1 — STORYTELLING (Phase 8: hero + animation unified)
         Desktop: hero text in inline-start (RTL: right) column; large pizza
                  on inline-end (RTL: left); full-screen sticky stage;
                  GSAP scrubs pizza layers as user scrolls.
         Mobile:  hero text → pizza → beat panels stacked vertically.
         Reduced-motion: CSS shows all layers, no GSAP runs.
         No-JS: noscript style in <head> makes all layers visible.
         ═══════════════════════════════════════════════════════════════════════ -->
    <section class="sunpepe-landing__animation" aria-label="SUN PEPE — ספר הפיצה">
        <div class="sunpepe-landing__animation-scene">

            <!-- ── Hero panel: brand intro
                    Desktop: inline-start column, absolutely positioned.
                    Mobile:  full-width, stacks before the pizza stage.  ──── -->
            <div class="sp-story-hero-panel">

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

            </div><!-- /.sp-story-hero-panel -->

            <!-- ── Pizza stage (CSS sticky on desktop) ──────────────────────── -->
            <div class="sunpepe-landing__animation-stage" aria-hidden="true">
                <div class="sunpepe-landing__pizza-wrap">

                    <div class="sp-pizza-stack" role="img" aria-label="פיצה של SUN PEPE">

                        <!-- Beat 1: Raw dough -->
                        <img class="sp-layer sp-layer--dough"
                             src="<?php echo esc_url( SUNPEPE_PLUGIN_URL . 'assets/images/pizza-dough.webp' ); ?>"
                             alt="בצק פיצה" width="1254" height="1254"
                             loading="eager" decoding="async">

                        <!-- Beat 3: Dough + sauce -->
                        <img class="sp-layer sp-layer--sauce"
                             src="<?php echo esc_url( SUNPEPE_PLUGIN_URL . 'assets/images/pizza-sauce.webp' ); ?>"
                             alt="רוטב עגבניות" width="1254" height="1254"
                             loading="lazy" decoding="async">

                        <!-- Beat 4: Dough + sauce + mozzarella -->
                        <img class="sp-layer sp-layer--mozz"
                             src="<?php echo esc_url( SUNPEPE_PLUGIN_URL . 'assets/images/pizza-mozz.webp' ); ?>"
                             alt="מוצרלה" width="1254" height="1254"
                             loading="lazy" decoding="async">

                        <!-- Beat 5: Dough + sauce + mozz + toppings -->
                        <img class="sp-layer sp-layer--toppings"
                             src="<?php echo esc_url( SUNPEPE_PLUGIN_URL . 'assets/images/pizza-toppings.webp' ); ?>"
                             alt="תוספות ירקות" width="1254" height="1254"
                             loading="lazy" decoding="async">

                        <!-- Beat 6: Complete baked pizza -->
                        <img class="sp-layer sp-layer--complete"
                             src="<?php echo esc_url( SUNPEPE_PLUGIN_URL . 'assets/images/pizza-complete.webp' ); ?>"
                             alt="פיצה מוכנה" width="1254" height="1254"
                             loading="lazy" decoding="async">

                    </div><!-- /.sp-pizza-stack -->

                </div><!-- /.pizza-wrap -->

                <!-- Mascot near pizza — decorative brand element, outside pizza stack -->
                <img class="sp-scene-mascot--pizza"
                     src="<?php echo esc_url( SUNPEPE_PLUGIN_URL . 'assets/images/mascot-pizza.webp' ); ?>"
                     alt="" aria-hidden="true"
                     width="1254" height="1254"
                     loading="lazy" decoding="async">

            </div><!-- /.animation-stage -->

            <!-- ── Scroll copy panels ────────────────────────────────────────── -->
            <div class="sunpepe-landing__animation-panels">

                <div class="sunpepe-landing__animation-panel" data-beat="1">
                    <p class="sunpepe-landing__animation-copy">מתחילים בבצק טרי</p>
                </div>

                <div class="sunpepe-landing__animation-panel" data-beat="2">
                    <p class="sunpepe-landing__animation-copy">רוטב עשיר נמרח בדיוק כמו שצריך</p>
                </div>

                <div class="sunpepe-landing__animation-panel" data-beat="3">
                    <p class="sunpepe-landing__animation-copy">מוצרלה נמסה מעל הכול</p>
                </div>

                <div class="sunpepe-landing__animation-panel" data-beat="4">
                    <p class="sunpepe-landing__animation-copy">שמים את התוספות שאתם אוהבים</p>
                </div>

            </div><!-- /.animation-panels -->

        </div><!-- /.animation-scene -->
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════════
         SECTION 3 — MENU
         Shows CPT items when published via WordPress admin → פריטי תפריט.
         Falls back to $static_menu (real prices) when no CPT items are published.
         ═══════════════════════════════════════════════════════════════════════ -->
    <section class="sunpepe-landing__menu" id="sunpepe-menu" aria-label="תפריט">
        <div class="sunpepe-landing__container">

            <h2 class="sunpepe-landing__section-title">התפריט שלנו</h2>

            <!-- Mascot near menu — decorative brand element -->
            <img class="sp-menu-mascot"
                 src="<?php echo esc_url( SUNPEPE_PLUGIN_URL . 'assets/images/mascot-action.webp' ); ?>"
                 alt="" aria-hidden="true"
                 width="1254" height="1254"
                 loading="lazy" decoding="async">

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

                <?php foreach ( $static_menu as $group ) : ?>
                    <div class="sunpepe-landing__menu-category">
                        <h3 class="sunpepe-landing__menu-category-title">
                            <?php echo esc_html( $group['name'] ); ?>
                        </h3>
                        <ul class="sunpepe-landing__menu-items" role="list">
                            <?php foreach ( $group['items'] as $item ) : ?>
                            <li class="sunpepe-landing__menu-item">
                                <span class="sunpepe-landing__menu-item-name">
                                    <?php echo esc_html( $item['name'] ); ?>
                                    <?php if ( ! empty( $item['desc'] ) ) : ?>
                                        <span class="sunpepe-landing__menu-item-desc">
                                            <?php echo esc_html( $item['desc'] ); ?>
                                        </span>
                                    <?php endif; ?>
                                </span>
                                <?php if ( ! empty( $item['price'] ) ) : ?>
                                <span class="sunpepe-landing__menu-item-price" dir="ltr">
                                    <?php echo esc_html( $item['price'] ); ?>
                                </span>
                                <?php endif; ?>
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
         SECTION 4 — LOCATION & HOURS
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
            </div>

        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════════
         SECTION 6 — FINAL CTA
         ═══════════════════════════════════════════════════════════════════════ -->
    <section class="sunpepe-landing__final-cta" aria-label="צרו קשר">
        <div class="sunpepe-landing__container">

            <!-- Mascot near final CTA — decorative brand element -->
            <img class="sp-cta-mascot"
                 src="<?php echo esc_url( SUNPEPE_PLUGIN_URL . 'assets/images/mascot-main.webp' ); ?>"
                 alt="" aria-hidden="true"
                 width="1254" height="1254"
                 loading="lazy" decoding="async">

            <h2 class="sunpepe-landing__final-cta-headline">
                <?php echo esc_html( $final_cta_headline ); ?>
            </h2>

            <a href="tel:<?php echo esc_attr( $phone_tel ); ?>"
               class="sunpepe-landing__final-cta-btn"
               aria-label="חייגו אלינו: <?php echo esc_attr( $phone_display ); ?>">
                <img src="<?php echo esc_url( SUNPEPE_PLUGIN_URL . 'assets/images/call-now-button.webp' ); ?>"
                     alt="התקשרו כעת"
                     class="sunpepe-landing__final-cta-img"
                     loading="lazy"
                     decoding="async">
            </a>

            <p class="sunpepe-landing__phone-display" dir="ltr"><?php echo esc_html( $phone_display ); ?></p>

            <p class="sunpepe-landing__final-cta-details">
                <?php echo esc_html( $final_cta_details ); ?>
            </p>

        </div>
    </section>

    <!-- ── Footer: accessibility statement link ─────────────────────────── -->
    <footer class="sunpepe-landing__footer" role="contentinfo">
        <a class="sunpepe-landing__a11y-link"
           href="<?php echo esc_url( SUNPEPE_PLUGIN_URL . 'assets/accessibility.html' ); ?>"
           target="_blank"
           rel="noopener noreferrer">
            הצהרת נגישות
        </a>
    </footer>

</div><!-- /.sunpepe-landing -->

<?php wp_footer(); ?>
</body>
</html>
