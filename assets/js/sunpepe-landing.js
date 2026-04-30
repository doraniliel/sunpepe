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
        if ( ! scene || ! panels || ! stage ) { return; }

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

        /* Beat 1 — Dough spins up from small, slight counter-clockwise rotation */
        spTimeline.fromTo( layers.dough,
            { opacity: 0, scale: 0.80, rotation: -6 },
            { opacity: 1, scale: 1, rotation: 0, duration: 1.3, ease: 'back.out(1.4)' },
        0 );

        /* Beat 2 — Mascot drops in from above with a strong bounce */
        spTimeline.fromTo( layers.mascot,
            { opacity: 0, y: -52 },
            { opacity: 1, y: 0, duration: 1.1, ease: 'back.out(2.0)' },
        1.3 );

        /* Beat 3 — Sauce spreads from small */
        spTimeline.fromTo( layers.sauce,
            { opacity: 0, scale: 0.88 },
            { opacity: 1, scale: 1, duration: 1.1, ease: 'power2.out' },
        2.4 );

        /* Beat 4 — Mozzarella drifts down */
        spTimeline.fromTo( layers.mozz,
            { opacity: 0, y: 24 },
            { opacity: 1, y: 0, duration: 1.1, ease: 'power2.out' },
        3.5 );

        /* Beat 5 — Toppings scale up from near-zero */
        spTimeline.fromTo( layers.toppings,
            { opacity: 0, scale: 0.60 },
            { opacity: 1, scale: 1, duration: 1.2, ease: 'back.out(1.5)' },
        4.6 );

        /* Beat 6 — Glow halo expands in */
        spTimeline.fromTo( layers.glow,
            { opacity: 0, scale: 0.85 },
            { opacity: 1, scale: 1, duration: 1.0, ease: 'power2.out' },
        5.7 );

        /* Beat 7 — CTA reveal; restore pointer-events so it becomes clickable */
        if ( ctaReveal ) {
            spTimeline.fromTo( ctaReveal,
                { opacity: 0, y: 20, pointerEvents: 'none' },
                { opacity: 1, y: 0, pointerEvents: 'auto', duration: 0.85, ease: 'power2.out' },
            6.2 );
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
            gsap.set( ctaReveal, { opacity: 1, y: 0, pointerEvents: 'auto' } );
        }
    }

    function hideAnimatedLayers() {
        gsap.set( layers.dough,    { opacity: 0, scale: 0.80, rotation: -6 } );
        gsap.set( layers.mascot,   { opacity: 0, y: -52 } );
        gsap.set( layers.sauce,    { opacity: 0, scale: 0.88 } );
        gsap.set( layers.mozz,     { opacity: 0, y: 24 } );
        gsap.set( layers.toppings, { opacity: 0, scale: 0.60 } );
        gsap.set( layers.glow,     { opacity: 0, scale: 0.85 } );
        if ( ctaReveal ) {
            gsap.set( ctaReveal, { opacity: 0, y: 20 } );
        }
    }

}() );
