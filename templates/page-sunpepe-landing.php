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
    <?php wp_head(); ?>
</head>
<body class="sunpepe-landing-page">

<div class="sunpepe-landing" dir="rtl" lang="he">

    <!-- ── 1. Hero ────────────────────────────────────────────────────────── -->
    <section class="sunpepe-landing__hero" aria-label="דף הבית">
        <div class="sunpepe-landing__container">

            <div class="sunpepe-landing__logo" aria-label="לוגו SUN PEPE">
                <span class="sunpepe-landing__logo-text">SUN PEPE</span>
            </div>

            <h1 class="sunpepe-landing__headline">
                פיצה כשרה אמיתית, רמת גן
            </h1>

            <p class="sunpepe-landing__subheadline">
                טרי, טעים, כשר — אצלנו או לאיסוף
            </p>

            <div class="sunpepe-landing__badges" role="list">
                <span class="sunpepe-landing__badge" role="listitem">כשר</span>
                <span class="sunpepe-landing__badge" role="listitem">אוכל במקום</span>
                <span class="sunpepe-landing__badge" role="listitem">איסוף עצמי</span>
            </div>

            <a href="tel:+972509077774"
               class="sunpepe-landing__cta-primary"
               aria-label="חייגו אלינו: 050-907-7774">
                התקשרו להזמין כעת
            </a>

            <div class="sunpepe-landing__nav-links">
                <a href="https://waze.com/ul?ll=32.086202,34.814943&navigate=yes&zoom=16"
                   class="sunpepe-landing__nav-btn sunpepe-landing__nav-btn--waze"
                   target="_blank" rel="noopener noreferrer"
                   aria-label="נווט אלינו ב-Waze">
                    Waze
                </a>
                <a href="https://www.google.com/maps?q=32.086202,34.814943"
                   class="sunpepe-landing__nav-btn sunpepe-landing__nav-btn--maps"
                   target="_blank" rel="noopener noreferrer"
                   aria-label="נווט אלינו ב-Google Maps">
                    Google Maps
                </a>
            </div>

        </div>
    </section>

    <!-- ── 2. Scroll Animation — placeholder until Phase 6 ───────────────── -->
    <section class="sunpepe-landing__animation" aria-hidden="true">
        <div class="sunpepe-landing__container">
            <div class="sunpepe-landing__placeholder-box">
                <p>אנימציית פיצה — Phase 6</p>
            </div>
        </div>
    </section>

    <!-- ── 3. Menu Highlights — placeholder until Phase 4 ────────────────── -->
    <section class="sunpepe-landing__menu" aria-label="תפריט">
        <div class="sunpepe-landing__container">
            <h2 class="sunpepe-landing__section-title">התפריט שלנו</h2>
            <div class="sunpepe-landing__placeholder-box">
                <p>פריטי תפריט — Phase 4</p>
            </div>
        </div>
    </section>

    <!-- ── 4. Why SUN PEPE ────────────────────────────────────────────────── -->
    <section class="sunpepe-landing__why" aria-label="למה SUN PEPE">
        <div class="sunpepe-landing__container">
            <h2 class="sunpepe-landing__section-title">למה SUN PEPE?</h2>
            <div class="sunpepe-landing__why-grid">
                <div class="sunpepe-landing__why-card">
                    <span class="sunpepe-landing__why-icon" aria-hidden="true">✡</span>
                    <h3>כשר בהכשר מהדרין</h3>
                    <p>מחוייבים לכשרות ללא פשרות</p>
                </div>
                <div class="sunpepe-landing__why-card">
                    <span class="sunpepe-landing__why-icon" aria-hidden="true">★</span>
                    <h3>חומרי גלם טריים</h3>
                    <p>ירקות טריים, בצק יומי</p>
                </div>
                <div class="sunpepe-landing__why-card">
                    <span class="sunpepe-landing__why-icon" aria-hidden="true">◎</span>
                    <h3>לב רמת גן</h3>
                    <p>הרצל 71, נגיש ממרכז ישראל</p>
                </div>
                <div class="sunpepe-landing__why-card">
                    <span class="sunpepe-landing__why-icon" aria-hidden="true">⌂</span>
                    <h3>אוכל במקום ואיסוף</h3>
                    <p>חוויה מלאה — אצלנו או שתיקחו הביתה</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ── 5. Location & Hours ─────────────────────────────────────────────── -->
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

            <div class="sunpepe-landing__nav-links">
                <a href="https://waze.com/ul?ll=32.086202,34.814943&navigate=yes&zoom=16"
                   class="sunpepe-landing__nav-btn sunpepe-landing__nav-btn--waze"
                   target="_blank" rel="noopener noreferrer">
                    נווט ב-Waze
                </a>
                <a href="https://www.google.com/maps?q=32.086202,34.814943"
                   class="sunpepe-landing__nav-btn sunpepe-landing__nav-btn--maps"
                   target="_blank" rel="noopener noreferrer">
                    Google Maps
                </a>
            </div>
        </div>
    </section>

    <!-- ── 6. Final CTA ───────────────────────────────────────────────────── -->
    <section class="sunpepe-landing__final-cta" aria-label="צרו קשר">
        <div class="sunpepe-landing__container">
            <p class="sunpepe-landing__final-cta-text">מוכנים להזמין?</p>
            <a href="tel:+972509077774"
               class="sunpepe-landing__cta-primary sunpepe-landing__cta-large">
                התקשרו להזמין כעת
            </a>
            <p class="sunpepe-landing__phone-display" dir="ltr">050-907-7774</p>
        </div>
    </section>

</div><!-- /.sunpepe-landing -->

<?php wp_footer(); ?>
</body>
</html>
