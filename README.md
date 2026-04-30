# SUN PEPE — Landing Page Plugin

WordPress plugin providing a Hebrew RTL landing page for **SUN PEPE**, a premium kosher pizzeria at הרצל 71, רמת גן.

## Installation

1. Copy this folder to `wp-content/plugins/sunpepe-landing/`
2. Activate **SUN PEPE Landing Page** in WordPress Admin → Plugins
3. Create a new Page and assign its template to **SUN PEPE Landing Page**
4. Install [Advanced Custom Fields (Free)](https://wordpress.org/plugins/advanced-custom-fields/) — required for Phase 4

## Development Phases

| Phase | Description | Status |
|-------|-------------|--------|
| 1 | Plugin scaffold | ✅ Complete |
| 2 | Full HTML structure + RTL layout | ⏳ Pending |
| 3 | CSS styling | ⏳ Pending |
| 4 | ACF fields + Menu CPT | ⏳ Pending |
| 5 | CTA + navigation links (tel, Waze, Maps) | ⏳ Pending |
| 6 | GSAP ScrollTrigger animation | ⏳ Pending |
| 7 | Polish + cross-browser testing | ⏳ Pending |

## Requirements

- WordPress 6.x
- PHP 8.1+
- Advanced Custom Fields Free (Phase 4+)

## Constraints

- Hebrew / RTL only
- No forms, no analytics, no tracking, no delivery messaging
- Phone CTA: `tel:+972509077774`
- All CSS scoped under `.sunpepe-landing`
- All JS scoped to this landing page only
