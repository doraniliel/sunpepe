<?php
/**
 * Template: SUN PEPE Landing Page
 * Loaded by sunpepe-landing.php via the template_include filter.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUN PEPE | פיצה כשרה, רמת גן</title>

    <!-- Restaurant structured data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Restaurant",
        "name": "SUN PEPE",
        "telephone": "+972509077774",
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
</head>
<body class="sunpepe-landing-page">

<!-- ── Sticky mobile CTA (visible only on mobile, fixed to bottom) ─────────── -->
<div class="sunpepe-landing-sticky-cta" role="complementary" aria-label="כפתור חיוג מהיר">
    <a href="tel:+972509077774"
       class="sunpepe-landing-sticky-cta__btn"
       aria-label="חייגו אלינו עכשיו: 050-907-7774">
        התקשרו כעת
    </a>
</div>

<div class="sunpepe-landing" dir="rtl" lang="he">

    <!-- ═══════════════════════════════════════════════════════════════════════
         SECTION 1 — HERO
         ═══════════════════════════════════════════════════════════════════════ -->
    <section class="sunpepe-landing__hero" aria-label="עמוד הבית">
        <div class="sunpepe-landing__container">

            <div class="sunpepe-landing__logo" aria-label="לוגו SUN PEPE">
                <span class="sunpepe-landing__logo-text">SUN PEPE</span>
            </div>

            <h1 class="sunpepe-landing__headline">
                פיצה חמה, כשרה, עם אופי של SUN PEPE
            </h1>

            <p class="sunpepe-landing__subheadline">
                פיצרייה פרימיום ברמת גן — לאכילה במקום ולאיסוף עצמי, עם בצק, גבינה ותוספות שעושות חשק להתקשר עכשיו.
            </p>

            <div class="sunpepe-landing__badges" role="list">
                <span class="sunpepe-landing__badge" role="listitem">כשר</span>
                <span class="sunpepe-landing__badge" role="listitem">ישיבה במקום</span>
                <span class="sunpepe-landing__badge" role="listitem">איסוף עצמי</span>
                <span class="sunpepe-landing__badge" role="listitem">הרצל 71, רמת גן</span>
            </div>

            <div class="sunpepe-landing__hero-ctas">
                <a href="tel:+972509077774"
                   class="sunpepe-landing__cta-primary"
                   aria-label="חייגו אלינו: 050-907-7774">
                    התקשרו להזמין כעת
                </a>
                <p class="sunpepe-landing__phone-inline" dir="ltr">050-907-7774</p>
            </div>

            <div class="sunpepe-landing__hero-secondary-ctas">
                <a href="https://waze.com/ul?ll=32.086202,34.814943&navigate=yes&zoom=16"
                   class="sunpepe-landing__nav-btn sunpepe-landing__nav-btn--waze"
                   target="_blank" rel="noopener noreferrer"
                   aria-label="נווט אלינו ב-Waze">
                    נווטו ב-Waze
                </a>
                <a href="https://www.google.com/maps?q=32.086202,34.814943"
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
         SECTION 2 — SCROLL ANIMATION
         Structure is ready for Phase 6 GSAP ScrollTrigger.
         Stage becomes sticky; panels scroll past it.
         ═══════════════════════════════════════════════════════════════════════ -->
    <section class="sunpepe-landing__animation" aria-label="על הפיצה שלנו">
        <div class="sunpepe-landing__animation-scene">

            <!-- Pizza stage — will be pinned/sticky in Phase 6 -->
            <div class="sunpepe-landing__animation-stage" aria-hidden="true">
                <!-- Phase 6: SVG pizza layers and mascot go here -->
                <div class="sunpepe-landing__pizza-placeholder">
                    <div class="sunpepe-landing__pizza-circle"></div>
                    <p class="sunpepe-landing__placeholder-label">Phase 6 — אנימציית הפיצה</p>
                </div>
            </div>

            <!-- Copy panels — scroll past the pinned stage in Phase 6 -->
            <div class="sunpepe-landing__animation-panels">

                <div class="sunpepe-landing__animation-panel" data-beat="1">
                    <p class="sunpepe-landing__animation-copy">מתחילים בבצק טרי</p>
                </div>

                <div class="sunpepe-landing__animation-panel" data-beat="2">
                    <p class="sunpepe-landing__animation-copy">SUN PEPE נכנס לעניינים</p>
                </div>

                <div class="sunpepe-landing__animation-panel" data-beat="3">
                    <p class="sunpepe-landing__animation-copy">רוטב עשיר נמרח בדיוק כמו שצריך</p>
                </div>

                <div class="sunpepe-landing__animation-panel" data-beat="4">
                    <p class="sunpepe-landing__animation-copy">מוצרלה נמסה מעל הכול</p>
                </div>

                <div class="sunpepe-landing__animation-panel" data-beat="5">
                    <p class="sunpepe-landing__animation-copy">תוספות ירקות צבעוניות בלבד</p>
                </div>

                <div class="sunpepe-landing__animation-panel" data-beat="6">
                    <p class="sunpepe-landing__animation-copy">הפיצה מוכנה — עכשיו רק להתקשר</p>
                    <a href="tel:+972509077774" class="sunpepe-landing__cta-primary">
                        התקשרו להזמין כעת
                    </a>
                </div>

            </div><!-- /.animation-panels -->

        </div><!-- /.animation-scene -->
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════════
         SECTION 3 — MENU HIGHLIGHTS
         Static placeholder. Phase 4 will wire this to ACF / CPT data.
         All prices are 0 until staff update them in WordPress admin.
         ═══════════════════════════════════════════════════════════════════════ -->
    <section class="sunpepe-landing__menu" id="sunpepe-menu" aria-label="תפריט">
        <div class="sunpepe-landing__container">

            <h2 class="sunpepe-landing__section-title">התפריט שלנו</h2>
            <p class="sunpepe-landing__section-note">המחירים יעודכנו בקרוב</p>

            <div class="sunpepe-landing__menu-categories">

                <!-- פיצות -->
                <div class="sunpepe-landing__menu-category">
                    <h3 class="sunpepe-landing__menu-category-title">פיצות</h3>
                    <ul class="sunpepe-landing__menu-items" role="list">
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">פיצה קלאסית</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">פיצה מוצרלה</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">פיצה שמנת / אלפרדו</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">פיצה פסטו</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                    </ul>
                </div>

                <!-- סלטים -->
                <div class="sunpepe-landing__menu-category">
                    <h3 class="sunpepe-landing__menu-category-title">סלטים</h3>
                    <ul class="sunpepe-landing__menu-items" role="list">
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">סלט יווני</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">סלט טונה</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">סלט סאן פפה</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                    </ul>
                </div>

                <!-- מאפים -->
                <div class="sunpepe-landing__menu-category">
                    <h3 class="sunpepe-landing__menu-category-title">מאפים</h3>
                    <ul class="sunpepe-landing__menu-items" role="list">
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">פוקצ׳ה</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">לחם שום</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">מלוואח פיצה</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                    </ul>
                </div>

                <!-- פסטות -->
                <div class="sunpepe-landing__menu-category">
                    <h3 class="sunpepe-landing__menu-category-title">פסטות</h3>
                    <ul class="sunpepe-landing__menu-items" role="list">
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">פסטה שמנת ופטריות</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">פסטה רוזה</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">פסטה פסטו</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                    </ul>
                </div>

                <!-- שתייה -->
                <div class="sunpepe-landing__menu-category">
                    <h3 class="sunpepe-landing__menu-category-title">שתייה</h3>
                    <ul class="sunpepe-landing__menu-items" role="list">
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">בקבוק שתייה</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                    </ul>
                </div>

                <!-- תוספות -->
                <div class="sunpepe-landing__menu-category">
                    <h3 class="sunpepe-landing__menu-category-title">תוספות</h3>
                    <ul class="sunpepe-landing__menu-items" role="list">
                        <li class="sunpepe-landing__menu-item">
                            <span class="sunpepe-landing__menu-item-name">תוספת לפיצה</span>
                            <span class="sunpepe-landing__menu-item-price" dir="ltr">₪0</span>
                        </li>
                    </ul>
                </div>

            </div><!-- /.menu-categories -->
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════════════
         SECTION 4 — WHY SUN PEPE
         ═══════════════════════════════════════════════════════════════════════ -->
    <section class="sunpepe-landing__why" aria-label="למה SUN PEPE">
        <div class="sunpepe-landing__container">
            <h2 class="sunpepe-landing__section-title">למה SUN PEPE?</h2>
            <div class="sunpepe-landing__why-grid">

                <div class="sunpepe-landing__why-card">
                    <span class="sunpepe-landing__why-icon" aria-hidden="true">✡</span>
                    <h3>כשר</h3>
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
                    <p>הרצל 71, קרוב ונגיש למרכז ישראל</p>
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
                הרצל 71, רמת גן
            </address>

            <dl class="sunpepe-landing__hours">
                <dt>ראשון–חמישי</dt>
                <dd>10:00–00:00</dd>
                <dt>שישי</dt>
                <dd>10:00–15:00</dd>
            </dl>

            <div class="sunpepe-landing__location-ctas">
                <a href="https://waze.com/ul?ll=32.086202,34.814943&navigate=yes&zoom=16"
                   class="sunpepe-landing__nav-btn sunpepe-landing__nav-btn--waze"
                   target="_blank" rel="noopener noreferrer">
                    נווטו עם Waze
                </a>
                <a href="https://www.google.com/maps?q=32.086202,34.814943"
                   class="sunpepe-landing__nav-btn sunpepe-landing__nav-btn--maps"
                   target="_blank" rel="noopener noreferrer">
                    פתחו ב-Google Maps
                </a>
                <a href="tel:+972509077774"
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
                הפיצה מוכנה. אתם רק צריכים להתקשר.
            </h2>

            <a href="tel:+972509077774"
               class="sunpepe-landing__cta-primary sunpepe-landing__cta-large">
                התקשרו להזמין כעת
            </a>

            <p class="sunpepe-landing__phone-display" dir="ltr">050-907-7774</p>

            <p class="sunpepe-landing__final-cta-details">
                SUN PEPE — הרצל 71, רמת גן | כשר | איסוף עצמי וישיבה במקום
            </p>

        </div>
    </section>

</div><!-- /.sunpepe-landing -->

<?php wp_footer(); ?>
</body>
</html>
