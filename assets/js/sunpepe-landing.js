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
        sauce   : root.querySelector( '.sp-layer--sauce' ),
        mozz    : root.querySelector( '.sp-layer--mozz' ),
        toppings: root.querySelector( '.sp-layer--toppings' ),
        complete: root.querySelector( '.sp-layer--complete' ),
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

        /* Beat 1 — Dough: fade + gentle scale (no rotation for photos) */
        spTimeline.fromTo( layers.dough,
            { opacity: 0, scale: 0.92 },
            { opacity: 1, scale: 1, duration: 1.2, ease: 'power2.out' },
        0 );

        /* Beat 2 — Sauce: cross-fade (cumulative image) */
        spTimeline.fromTo( layers.sauce,
            { opacity: 0 },
            { opacity: 1, duration: 1.1, ease: 'power2.inOut' },
        2.3 );

        /* Beat 4 — Mozzarella: cross-fade (cumulative image) */
        spTimeline.fromTo( layers.mozz,
            { opacity: 0 },
            { opacity: 1, duration: 1.1, ease: 'power2.inOut' },
        3.4 );

        /* Beat 5 — Toppings: subtle scale-in cross-fade */
        spTimeline.fromTo( layers.toppings,
            { opacity: 0, scale: 0.96 },
            { opacity: 1, scale: 1, duration: 1.1, ease: 'power2.out' },
        4.5 );

        /* Beat 6 — Complete baked pizza: cinematic zoom-out reveal */
        spTimeline.fromTo( layers.complete,
            { opacity: 0, scale: 1.06 },
            { opacity: 1, scale: 1, duration: 1.3, ease: 'power2.out' },
        5.6 );

        /* Beat 7 — CTA reveal; restore pointer-events so it becomes clickable */
        if ( ctaReveal ) {
            spTimeline.fromTo( ctaReveal,
                { opacity: 0, y: 20, pointerEvents: 'none' },
                { opacity: 1, y: 0, pointerEvents: 'auto', duration: 0.85, ease: 'power2.out' },
            6.7 );
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
        gsap.set( layers.dough,    { opacity: 0, scale: 0.92 } );
        gsap.set( layers.sauce,    { opacity: 0 } );
        gsap.set( layers.mozz,     { opacity: 0 } );
        gsap.set( layers.toppings, { opacity: 0, scale: 0.96 } );
        gsap.set( layers.complete, { opacity: 0, scale: 1.06 } );
        if ( ctaReveal ) {
            gsap.set( ctaReveal, { opacity: 0, y: 20 } );
        }
    }

}() );
