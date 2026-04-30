/**
 * SUN PEPE Landing Page — sunpepe-landing.js
 *
 * Phase 6: GSAP ScrollTrigger scroll animation.
 *
 * Desktop  — scrubbed timeline; CSS-sticky stage; pizza layers animate in.
 * Mobile   — all layers shown immediately; panels fade in on scroll.
 * Reduced  — GSAP never runs; CSS opacity:1 !important shows everything.
 * No-JS    — <noscript> style in <head> makes all layers visible.
 *
 * Isolation: only SUN PEPE's own ScrollTrigger instances are ever killed.
 * ScrollTrigger.killAll() is never called.
 */
( function () {
    'use strict';

    /* ── Guard: page must contain the landing wrapper ───────────────────── */
    var root = document.querySelector( '.sunpepe-landing' );
    if ( ! root ) { return; }

    /* ── Guard: GSAP must be loaded ─────────────────────────────────────── */
    if ( typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined' ) {
        return;
    }

    gsap.registerPlugin( ScrollTrigger );

    /* ── Reduced-motion: CSS handles it; JS exits immediately ───────────── */
    if ( window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
        return;
    }

    /* ── Collect elements ────────────────────────────────────────────────── */
    var stage    = root.querySelector( '.sunpepe-landing__animation-stage' );
    var scene    = root.querySelector( '.sunpepe-landing__animation' );
    var panels   = root.querySelector( '.sunpepe-landing__animation-panels' );
    var panelEls = root.querySelectorAll( '.sunpepe-landing__animation-panel' );

    var layers = {
        dough   : root.querySelector( '.sp-layer--dough' ),
        mascot  : root.querySelector( '.sp-layer--mascot' ),
        sauce   : root.querySelector( '.sp-layer--sauce' ),
        mozz    : root.querySelector( '.sp-layer--mozz' ),
        toppings: root.querySelector( '.sp-layer--toppings' ),
        glow    : root.querySelector( '.sp-layer--glow' ),
    };
    var ctaReveal = root.querySelector( '.sp-cta-reveal' );

    /* ── SUN PEPE's own GSAP instances ──────────────────────────────────── */
    /*
     * spTriggers: standalone ScrollTrigger instances (pin, panel highlights,
     *             mobile panel tweens' embedded STs).
     * spTimeline: the desktop scrubbed timeline. Calling .kill() on a GSAP
     *             timeline also kills its embedded ScrollTrigger automatically.
     *
     * killOwnTriggers() replaces ScrollTrigger.killAll() — it only tears down
     * what this script created, leaving any other plugin's instances untouched.
     */
    var spTriggers = [];
    var spTimeline = null;

    function killOwnTriggers() {
        spTriggers.forEach( function ( st ) {
            if ( st && typeof st.kill === 'function' ) {
                st.kill();
            }
        } );
        spTriggers = [];

        if ( spTimeline ) {
            spTimeline.kill(); // also kills its embedded ScrollTrigger
            spTimeline = null;
        }
    }

    /* ── Desktop vs mobile breakpoint ───────────────────────────────────── */
    var DESKTOP_BP = 900;

    function isMobile() {
        return window.innerWidth < DESKTOP_BP;
    }

    /* ── Initialise correct mode ─────────────────────────────────────────── */
    if ( isMobile() ) {
        initMobile();
    } else {
        initDesktop();
    }

    /* Reinitialise on resize crossing the breakpoint (debounced).
       Only SUN PEPE's own triggers are killed — no global cleanup. */
    var lastMode    = isMobile() ? 'mobile' : 'desktop';
    var resizeTimer;
    window.addEventListener( 'resize', function () {
        clearTimeout( resizeTimer );
        resizeTimer = setTimeout( function () {
            var nowMobile = isMobile();
            var newMode   = nowMobile ? 'mobile' : 'desktop';
            if ( newMode !== lastMode ) {
                lastMode = newMode;
                killOwnTriggers();
                if ( nowMobile ) {
                    showAllLayers();
                    initMobile();
                } else {
                    hideAnimatedLayers();
                    initDesktop();
                }
            }
        }, 200 );
    } );

    /* ════════════════════════════════════════════════════════════════════════
       DESKTOP ANIMATION
       Scrubbed timeline: pizza layers reveal as user scrolls through panels.
       CSS position:sticky keeps the stage visible throughout.
       ════════════════════════════════════════════════════════════════════════ */
    function initDesktop() {
        if ( ! scene || ! panels ) { return; }

        hideAnimatedLayers();

        /* Pin stage — stored so we can kill it on breakpoint switch */
        var pinST = ScrollTrigger.create( {
            trigger   : scene,
            start     : 'top top',
            end       : 'bottom bottom',
            pin       : stage,
            pinSpacing: false,
        } );
        spTriggers.push( pinST );

        /* Scrubbed timeline — killing spTimeline also kills its embedded ST */
        spTimeline = gsap.timeline( {
            scrollTrigger: {
                trigger: scene,
                start  : 'top top',
                end    : 'bottom bottom',
                scrub  : 1.2,
            },
        } );

        /* Beat 1 — Dough appears */
        spTimeline.to( layers.dough, {
            opacity : 1,
            scale   : 1,
            duration: 1,
            ease    : 'power2.out',
        }, 0 );

        /* Beat 2 — Mascot drops in from above */
        spTimeline.fromTo( layers.mascot,
            { opacity: 0, y: -36 },
            { opacity: 1, y: 0, duration: 1, ease: 'back.out(1.4)' },
        1 );

        /* Beat 3 — Sauce spreads */
        spTimeline.to( layers.sauce, {
            opacity : 1,
            duration: 1,
            ease    : 'power1.inOut',
        }, 2 );

        /* Beat 4 — Mozzarella falls */
        spTimeline.fromTo( layers.mozz,
            { opacity: 0, y: 18 },
            { opacity: 1, y: 0, duration: 1, ease: 'power2.out' },
        3 );

        /* Beat 5 — Vegan toppings land */
        spTimeline.to( layers.toppings, {
            opacity : 1,
            scale   : 1,
            duration: 1,
            ease    : 'back.out(1.2)',
        }, 4 );

        /* Beat 6 — Glow ring: pizza complete */
        spTimeline.to( layers.glow, {
            opacity : 1,
            duration: 0.8,
            ease    : 'power1.out',
        }, 5 );

        /* Beat 7 — CTA reveal */
        if ( ctaReveal ) {
            spTimeline.fromTo( ctaReveal,
                { opacity: 0, y: 16 },
                { opacity: 1, y: 0, duration: 0.7, ease: 'power2.out' },
            5.4 );
        }

        /* Active-panel highlight — each instance stored for scoped cleanup */
        panelEls.forEach( function ( panel ) {
            var st = ScrollTrigger.create( {
                trigger    : panel,
                start      : 'top 55%',
                end        : 'bottom 45%',
                toggleClass: { targets: panel, className: 'is-active' },
            } );
            spTriggers.push( st );
        } );
    }

    /* ════════════════════════════════════════════════════════════════════════
       MOBILE ANIMATION
       All pizza layers shown immediately.
       Panels fade up as they enter the viewport (no pinning).
       ════════════════════════════════════════════════════════════════════════ */
    function initMobile() {
        showAllLayers();

        panelEls.forEach( function ( panel ) {
            var tween = gsap.from( panel, {
                opacity : 0,
                y       : 22,
                duration: 0.55,
                ease    : 'power2.out',
                scrollTrigger: {
                    trigger      : panel,
                    start        : 'top 88%',
                    toggleActions: 'play none none none',
                },
            } );
            /* Store the embedded ST so it's killed on breakpoint switch */
            if ( tween && tween.scrollTrigger ) {
                spTriggers.push( tween.scrollTrigger );
            }
        } );
    }

    /* ════════════════════════════════════════════════════════════════════════
       HELPERS
       ════════════════════════════════════════════════════════════════════════ */

    function showAllLayers() {
        var all = root.querySelectorAll( '.sp-layer' );
        gsap.set( all, { opacity: 1, y: 0, scale: 1 } );
        if ( ctaReveal ) {
            gsap.set( ctaReveal, { opacity: 1, y: 0 } );
        }
    }

    function hideAnimatedLayers() {
        gsap.set( layers.dough,    { opacity: 0, scale: 0.82 } );
        gsap.set( layers.mascot,   { opacity: 0, y: -36 } );
        gsap.set( layers.sauce,    { opacity: 0 } );
        gsap.set( layers.mozz,     { opacity: 0, y: 18 } );
        gsap.set( layers.toppings, { opacity: 0, scale: 0.88 } );
        gsap.set( layers.glow,     { opacity: 0 } );
        if ( ctaReveal ) {
            gsap.set( ctaReveal, { opacity: 0, y: 16 } );
        }
    }

}() );
