# Artifact 1 — SUN_PEPE_SPEC.md

# SUN PEPE — WordPress Landing Page Specification

## 1. Project Summary

Build a high-performance, static-code WordPress landing page for **SUN PEPE**, a premium, kosher, dine-in and pickup pizzeria in central Israel.

The landing page must be written in Hebrew, use full RTL layout behavior, and deliver a cinematic scroll-driven pizza-making experience.

The page must not include forms, calendars, ordering systems, carts, payment flows, analytics, tracking scripts, or booking functionality.

The only interactive actions allowed are:

- Phone call links using `tel:`
- Directions links to Waze and Google Maps
- Anchor navigation to the menu section

The central visual experience is a pinned pizza-making animation. As the user scrolls, a pizza is assembled while the SUN PEPE red pepper mascot acts as the main character. Hebrew content appears around the pinned visual as part of the scroll experience.

--

## 2. Business Details

- Business name: SUN PEPE
- Address: הרצל 71, רמת גן
- Phone: 0509077774
- Primary CTA: התקשרו להזמין כעת
- Sticky mobile CTA label: התקשרו כעת
- Kosher wording: כשר
- Service model: dine-in and pickup only
- Delivery: not offered; do not mention delivery
- Target area: מרכז ישראל, especially תל אביב, רמת גן, גבעתיים, אזור, יהוד
- Tone: premium but playful
- Positioning: premium, kosher, dine-in and pickup pizzeria in central Israel with a cinematic animated brand experience

---

## 3. Opening Hours

Display the hours in Hebrew:

- ראשון–חמישי: 10:00–00:00
- שישי: 10:00–15:00

Do not invent Saturday hours unless supplied later.

---

## 4. Main User Goals

The page must optimize for:

1. Immediate phone calls
2. Brand awareness
3. Simple discovery of menu items
4. Easy navigation to the restaurant

No conversion path should require a form submission.

---

## 5. Required CTAs

### 5.1 Call CTA

Use either:

```text
tel:+972509077774
```

or:

```text
tel:0509077774
```

Preferred value in code:

```text
tel:+972509077774
```

Visible phone number may be displayed as:

```text
050-907-7774
```

or:

```text
0509077774
```

CTA labels:

- Hero CTA: התקשרו להזמין כעת
- Sticky mobile CTA: התקשרו כעת
- Final CTA: בא לכם פיצה? התקשרו עכשיו

---

### 5.2 Directions CTA

Include directions buttons for:

- Waze
- Google Maps

On mobile, Waze should be visually prioritized.

Google Maps destination link:

```text
https://www.google.com/maps?sca_esv=e62593e6e2b014e2&rlz=1C1CHBD_iwIL1036IL1036&sxsrf=ANbL-n4waqUIu8j-S41PsxtYh9w9R0z0uA:1777540186092&biw=1178&bih=784&uact=5&gs_lp=Egxnd3Mtd2l6LXNlcnAiDdeh15DXnyDXpNek15QyDBAjGIAEGIoFGBMYJzIOEC4YrwEYxwEYywEYgAQyBxAAGIAEGA0yDRAuGIAEGA0YxwEYrwEyBhAAGB4YDTIGEAAYHhgNMgYQABgeGA0yBhAAGB4YDTIGEAAYHhgNMgYQABgeGA0yHRAuGK8BGMcBGMsBGIAEGJcFGNwEGN4EGOAE2AEBSMQgUN0DWMgfcAZ4AZABAJgBzgGgAYcNqgEGMC4xMC4yuAEDyAEA-AEBmAISoALIDcICChAAGEcY1gQYsAPCAgUQABiABMICCxAuGMcBGNEDGIAEwgILEC4YgAQYxwEY0QPCAgsQLhiABBjHARivAcICDhAuGIAEGMcBGK8BGI4FwgIFEC4YgATCAgcQABiABBgKwgIEEAAYHsICDhAuGIAEGMsBGMcBGK8BwgIIEAAYgAQYywHCAgYQABgWGB7CAh0QLhiABBjLARjHARivARiXBRjcBBjeBBjgBNgBAcICCRAAGIAEGBMYCsICCBAAGAUYHhgTwgIFEAAY7wXCAggQABiABBiiBMICCBAuGIAEGMsBwgIIEC4YywEYgATCAgoQLhiABBjLARgKwgIIEAAYFhgeGAqYAwCIBgGQBgi6BgYIARABGBSSBwY2LjEwLjKgB-mpAbIHBjAuMTAuMrgHsQ3CBwYwLjEyLjbIBzOACAE&um=1&ie=UTF-8&fb=1&gl=il&sa=X&geocode=KRvJSl4dSx0VMeWnP_4GRKW2&daddr=Herzl+St+71,+Ramat+Gan,+5244341
```

Waze coordinates:

```text
32.086202,34.814943
```

Recommended Waze link:

```text
https://waze.com/ul?ll=32.086202,34.814943&navigate=yes&zoom=16
```

Use normal external links instead of embedded maps by default to preserve performance.

---

### 5.3 View Menu CTA

The “View Menu” CTA should scroll to the menu section using an anchor link:

```text
#sunpepe-menu
```

Do not implement modal menus unless requested later.

---

## 6. Visual Identity and Art Direction

### 6.1 Existing Visual Reference

Use the provided menu/logo photos as reference for:

- Dark blue background
- Orange/yellow/red gradient logo styling
- White/light text contrast
- Graffiti/playful SUN PEPE brand feeling
- Red pepper mascot holding pizza
- Premium neon-like food-board atmosphere

---

### 6.2 Brand Style

The page should feel:

- Premium
- Cinematic
- Warm
- Playful
- Food-focused
- Modern but not sterile

Avoid making the page look like a generic pizza template.

---

### 6.3 Suggested Palette

Use colors inspired by the uploaded materials:

- Deep navy: `#07122f`
- Midnight blue: `#0b1f4d`
- Warm orange: `#ff9f1c`
- Pepper red: `#e43d30`
- Cheese yellow: `#ffd166`
- Cream text: `#fff4d6`
- Soft white: `#f9fafb`

Final color values can be adjusted for contrast and design quality.

---

### 6.4 Typography

Must support Hebrew cleanly.

Recommended font direction:

- Hebrew UI/body: Assistant, Heebo, Rubik, or system sans-serif
- Display headings: bold rounded Hebrew-compatible font, or use image/SVG logo where appropriate

Do not load excessive font weights.

---

## 7. Page Structure

### Section 1 — Hero

Purpose: immediate brand impression and CTA.

Content requirements:

- Logo or brand mark
- Premium playful headline in Hebrew
- Short subheadline mentioning kosher, dine-in, pickup, Ramat Gan / central Israel
- Primary CTA: התקשרו להזמין כעת
- Secondary CTA: ניווט / הגעה
- Secondary CTA: צפייה בתפריט
- Desktop: phone number visibly displayed
- Mobile: sticky call button visible after initial hero or immediately at bottom

Suggested Hebrew headline:

```text
פיצה חמה, כשרה, עם אופי של SUN PEPE
```

Suggested Hebrew subheadline:

```text
פיצרייה פרימיום ברמת גן — לאכילה במקום ולאיסוף עצמי, עם בצק, גבינה ותוספות שעושות חשק להתקשר עכשיו.
```

Hero badges:

- כשר
- איסוף עצמי
- ישיבה במקום
- הרצל 71, רמת גן

---

### Section 2 — Scroll Pizza-Making Animation

Purpose: immersive brand storytelling.

This should be the main signature section of the page.

The pizza animation remains pinned/sticky in the center while content panels scroll around it.

Recommended surrounding copy beats:

1. מתחילים בבצק טרי
2. SUN PEPE נכנס לעניינים
3. רוטב עשיר נמרח בדיוק כמו שצריך
4. מוצרלה נמסה מעל הכול
5. תוספות ירקות צבעוניות בלבד
6. הפיצה מוכנה — עכשיו רק להתקשר

---

### Section 3 — Menu Highlights

Purpose: allow users to understand the menu without requiring a PDF or image-only content.

Important:

- Use uploaded menu images as visual reference only.
- Do not attempt full OCR extraction.
- Client will manually edit menu details later.
- All menu prices should initially be set to `0`.

Menu content must be editable in WordPress.

Recommended default editable categories:

- פיצות
- סלטים
- מאפים
- פסטות
- קינוחים
- שתייה
- תוספות

Sample placeholder menu items:

- פיצה קלאסית — ₪0
- פיצה מוצרלה — ₪0
- פיצה שמנת / אלפרדו — ₪0
- פיצה פסטו — ₪0
- סלט יווני — ₪0
- סלט טונה — ₪0
- סלט סאן פפה — ₪0
- פסטה שמנת ופטריות — ₪0
- פסטה רוזה — ₪0
- פסטה פסטו — ₪0
- פוקצ׳ה — ₪0
- לחם שום — ₪0
- מלוואח פיצה — ₪0
- בקבוק שתייה — ₪0

Menu UI should avoid tiny text and should be easy to edit.

---

### Section 4 — Why SUN PEPE

Purpose: brand reinforcement.

Suggested cards:

- כשר — פיצה כשרה, חמה ומדויקת
- לאיסוף וישיבה במקום — בלי סיבוכים, פשוט מגיעים או מתקשרים
- במרכז רמת גן — הרצל 71, קרוב ונגיש
- תוספות ירקות טריות — צבע, טעם ואופי בכל מגש

Do not mention delivery.

---

### Section 5 — Location and Hours

Show:

- Address: הרצל 71, רמת גן
- Hours:
  - ראשון–חמישי: 10:00–00:00
  - שישי: 10:00–15:00

CTA buttons:

- נווטו עם Waze
- פתחו ב-Google Maps
- התקשרו להזמין

Do not embed a heavy map by default.

---

### Section 6 — Final CTA

Purpose: close the page with a call prompt.

Suggested headline:

```text
הפיצה מוכנה. אתם רק צריכים להתקשר.
```

CTA:

```text
התקשרו להזמין כעת
```

Supporting detail:

```text
SUN PEPE — הרצל 71, רמת גן | כשר | איסוף עצמי וישיבה במקום
```

---

## 8. Scroll Animation Specification

### 8.1 Overall Behavior

Create one continuous scroll scene.

The scene should run across a long scroll area, for example `400vh–600vh`, with a sticky stage positioned near the viewport center.

The pizza and mascot should remain visually pinned while scroll progress controls the animation timeline.

Content panels should fade/slide in and out around the animation, respecting RTL layout.

---

### 8.2 Animation Style

Preferred feel:

- Cinematic
- Realistic food rendering where feasible
- Theatrical but performant
- Mascot-driven
- Dark premium background with glowing highlights

The implementation may use SVG, Canvas, CSS, GSAP, Lottie, or a hybrid approach. The coder should choose the best substrate after evaluating maintainability and performance.

Guidance:

- If using GSAP ScrollTrigger, keep implementation scoped and lightweight.
- If using Canvas, provide static fallback imagery.
- If using SVG/CSS, optimize paths and layer count.
- Avoid video files as the main animation substrate.
- Avoid large GIFs.

---

### 8.3 Animation Beats

#### 0–10%: Intro

- Dark premium background appears.
- Soft light reveals empty stage.
- Subtle particles/flour dust may appear.
- Hero content transitions toward animation section.

#### 10–20%: Dough appears

- Dough base scales/fades into view.
- Flour dust or countertop shadow appears.
- Copy: מתחילים בבצק טרי

#### 20–32%: Mascot enters

- Red pepper mascot enters from side or bottom.
- Mascot gives a playful premium-feeling motion.
- Copy: SUN PEPE נכנס לעניינים

#### 32–45%: Sauce spreads

- Sauce expands from center outward in a circular motion.
- Mascot appears to spread the sauce.
- Use transform, clip-path, or mask techniques where possible.
- Copy: רוטב עשיר נמרח בדיוק כמו שצריך

#### 45–58%: Cheese falls

- Mozzarella falls from above in small pieces or flowing strands.
- Cheese accumulates on pizza.
- Copy: מוצרלה נמסה מעל הכול

#### 58–73%: Vegan toppings land

Show only vegan vegetable toppings, such as:

- Tomato
- Olives
- Mushrooms
- Onion
- Corn
- Bell peppers
- Basil

Do not show meat, fish, pepperoni, salami, ham, bacon, shrimp, or anything visually non-kosher/non-vegan as a topping.

Mascot should toss/spread toppings.

Copy:

```text
תוספות ירקות צבעוניות בלבד
```

#### 73–88%: Finished pizza reveal

- Pizza becomes golden, hot, and finished.
- Cheese glows subtly.
- Steam or heat shimmer may appear.
- Mascot celebrates or presents the pizza.
- Copy: פיצה חמה, כשרה ומוכנה להזמנה

#### 88–100%: CTA reveal

- Pizza settles into final composition.
- CTA appears prominently.
- Copy: התקשרו להזמין כעת
- Phone CTA becomes main visual action.

---

### 8.4 Mobile Animation Behavior

On mobile:

- Keep animation simplified.
- Reduce particles.
- Reduce number of animated objects.
- Avoid heavy pinned behavior if it causes jank.
- Use shorter timeline if needed.
- Keep sticky mobile call CTA accessible.
- Ensure content remains readable and not hidden behind pinned visuals.

Mobile fallback is acceptable if full animation is too heavy.

---

### 8.5 Reduced Motion

Respect `prefers-reduced-motion: reduce`.

For reduced-motion users:

- Disable scroll-scrubbed animation.
- Show a static final pizza/mascot composition.
- Preserve all content and CTAs.
- Avoid essential information being locked behind animation progress.

---

## 9. WordPress Implementation Requirements

### 9.1 Preferred Architecture

Recommended implementation:

- Custom WordPress page template
- Scoped CSS file
- Scoped JavaScript file
- Optional ACF fields for editable content
- Hardcoded animation logic
- Editable business/menu/content fields

The coder may choose another approach if justified, but should default to performance and maintainability.

---

### 9.2 Editability Requirement

The following should be editable by non-technical staff, preferably through ACF or native WordPress fields:

- Business name
- Phone number
- Address
- Opening hours
- Kosher text
- Hero headline
- Hero subheadline
- CTA labels
- Google Maps link
- Waze link
- Menu categories
- Menu items
- Menu item descriptions
- Menu item prices
- Location text
- Final CTA copy

The animation itself may remain hardcoded.

---

### 9.3 Suggested Field Structure

Create a field group named:

```text
SUN PEPE Landing Page
```

Recommended fields:

- `business_name` text
- `phone_display` text
- `phone_tel` text
- `address` text
- `kosher_label` text
- `hero_headline` text
- `hero_subheadline` textarea
- `primary_cta_label` text
- `sticky_mobile_cta_label` text
- `google_maps_url` url
- `waze_url` url
- `hours` repeater
  - `day_label` text
  - `time_label` text
- `menu_categories` repeater
  - `category_name` text
  - `items` repeater
    - `item_name` text
    - `item_description` textarea
    - `item_price` number/text
- `why_cards` repeater
  - `card_title` text
  - `card_text` textarea

---

### 9.4 Template Naming

Suggested template file:

```text
page-sunpepe-landing.php
```

Suggested assets:

```text
assets/css/sunpepe-landing.css
assets/js/sunpepe-landing.js
assets/img/sunpepe-logo.svg
assets/img/sunpepe-mascot.svg
assets/img/sunpepe-pizza-static.webp
```

---

### 9.5 CSS Scope

All CSS should be scoped under:

```css
.sunpepe-landing
```

Do not use broad selectors like `h1`, `button`, `.container`, or `section` globally unless nested under `.sunpepe-landing`.

---

### 9.6 JavaScript Scope

All JavaScript should initialize only when the landing page wrapper exists.

Example:

```js
const root = document.querySelector('.sunpepe-landing');
if (!root) return;
```

Do not pollute global scope.

Do not add analytics or tracking.

---

## 10. Performance Rules

- No heavy video background as primary animation
- No large GIF animation
- Use CSS transforms and opacity whenever possible
- Lazy-load non-critical images where appropriate
- Use optimized SVG/WebP/AVIF assets
- Minimize third-party libraries
- If GSAP is used, load only required modules
- Keep animation assets compressed
- Avoid layout thrashing during scroll
- Use `requestAnimationFrame` or animation library best practices for scroll updates
- Do not block rendering with unnecessary scripts
- Ensure page remains usable if JavaScript fails

---

## 11. Accessibility Requirements

- Full RTL support: `dir="rtl"` and `lang="he"`
- Sufficient contrast between text and background
- Large readable CTA buttons
- Keyboard-focusable CTAs
- Reduced-motion fallback
- Animated decorative elements should be hidden from screen readers where appropriate using `aria-hidden="true"`
- Meaningful content must exist as text outside the animation
- Phone link should be understandable from visible surrounding text
- Avoid flashing effects

---

## 12. SEO / Structured Data

The client does not require meta title or meta description work in this spec.

Structured data is requested for opening hours, address, phone, price range, and cuisine.

Add Restaurant schema JSON-LD if feasible, using supplied details only.

Use:

- `@type`: `Restaurant`
- `name`: `SUN PEPE`
- `telephone`: `+972509077774`
- `address`: הרצל 71, רמת גן
- `servesCuisine`: Pizza
- `priceRange`: ₪₪
- `openingHoursSpecification`:
  - Sunday–Thursday 10:00–00:00
  - Friday 10:00–15:00

Do not invent social links, ratings, reviews, delivery availability, or Saturday hours.

---

## 13. Menu Handling

The uploaded menu images are visual reference only.

Do not rely on OCR.

Create editable menu fields with placeholder prices of `0`.

Do not permanently encode the photographed prices into the implementation.

The client will manually update menu names and prices later.

---

## 14. Acceptance Criteria

### Content

- Page is fully Hebrew and RTL.
- Business name appears as SUN PEPE.
- Address appears as הרצל 71, רמת גן.
- Phone number appears and links correctly.
- Kosher wording appears exactly as כשר.
- No delivery messaging exists.
- Dine-in and pickup are mentioned.
- Hours are displayed correctly.
- Menu section exists with editable categories/items/prices.
- Initial prices are 0.

### CTA

- Primary CTA calls the business.
- Sticky mobile CTA exists and says התקשרו כעת.
- Google Maps CTA works.
- Waze CTA works.
- View Menu CTA scrolls to menu section.

### Animation

- Pizza remains pinned/sticky during the main scroll scene on desktop.
- Animation is one continuous scene.
- Dough appears.
- Mascot appears as main character.
- Sauce spreads.
- Cheese falls.
- Vegan vegetable toppings appear.
- Finished pizza appears.
- CTA reveal appears at the end.
- Mobile animation is simplified if needed.
- Reduced-motion fallback works.

### WordPress

- Implemented as a maintainable WordPress page/template solution.
- CSS is scoped.
- JS is scoped.
- Content fields are editable by non-technical staff where feasible.
- Animation is allowed to be hardcoded.
- No global theme conflicts.

### Performance

- No heavy video files.
- No large GIFs.
- Optimized images/assets.
- Smooth scroll behavior on modern mobile and desktop devices.
- Page remains usable if JavaScript fails.

### Accessibility

- RTL and Hebrew language attributes are correct.
- CTAs are keyboard accessible.
- Sufficient contrast.
- Decorative animation is not required for comprehension.
- Reduced-motion users are respected.

---

## 15. Test Checklist

### Desktop

- Chrome latest
- Safari latest if available
- Firefox latest if available
- Hero loads quickly
- CTA visible above the fold
- Scroll animation does not stutter severely
- Menu readable
- Directions links open correctly

### Mobile

- iPhone Safari
- Android Chrome
- Sticky call button visible and not intrusive
- Animation does not block content
- Text does not overflow
- RTL alignment feels natural
- Waze link works
- Tel link opens dialer

### WordPress Admin

- Staff can edit phone number
- Staff can edit address
- Staff can edit hours
- Staff can edit menu items and prices
- Staff can edit CTA labels
- Changes appear on front end

### Regression

- No form added
- No analytics added
- No delivery language added
- No non-vegan toppings in animation
- No menu prices copied from photos unless manually entered later

---

## 16. Final Build Recommendation

Use a custom WordPress page template with ACF-powered editable content and a hardcoded, scoped scroll animation.

Keep the animation in its own section/component and keep business content separate from animation logic.

This gives the best balance of:

- Performance
- Visual control
- WordPress maintainability
- Non-technical staff editability
- Compatibility with agentic coding workflows

