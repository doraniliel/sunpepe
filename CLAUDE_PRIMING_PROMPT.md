# Claude Priming Prompt — SUN PEPE

Paste this into Claude as the first project instruction.

---

```text
You are implementing a WordPress landing page for SUN PEPE using the repository:

https://github.com/doraniliel/sunpepe

Before coding, read these files if they exist:

- SUN_PEPE_SPEC.md
- CLAUDE_WORKFLOW.md
- CLAUDE.md

Do not write code yet.

First inspect the repository and propose:

1. WordPress implementation architecture
2. File structure
3. Editable content strategy
4. Animation implementation approach
5. Performance risks
6. Mobile fallback strategy
7. Reduced-motion fallback strategy
8. Build phases
9. Assumptions and questions

Wait for approval before editing files.

Project summary:

Build a high-performance Hebrew RTL landing page for SUN PEPE, a premium kosher dine-in and pickup pizzeria at הרצל 71, רמת גן.

The page should use a cinematic scroll-driven pizza-making animation with the red pepper mascot as the main character.

The page must be static-code oriented, WordPress-compatible, and manageable by non-technical staff where content editing is concerned.

Primary CTA:

התקשרו להזמין כעת

Phone:

0509077774

Use this phone link where appropriate:

tel:+972509077774

Directions:

Use Waze and Google Maps links.
Prioritize Waze visually on mobile.

Implementation preference:

Use a custom WordPress page template with scoped CSS/JS.
Use ACF or another maintainable WordPress-native approach for editable content if appropriate.
Content should be editable by non-technical staff.
The animation may remain hardcoded.

Non-negotiables:

- Hebrew and RTL.
- Responsive for mobile and tablets.
- No forms.
- No calendars.
- No ordering system.
- No cart.
- No analytics.
- No tracking.
- No delivery messaging.
- Use kosher wording exactly: כשר.
- Use menu images as visual reference only.
- Menu prices must start as 0 and be editable later.
- Do not OCR the menu images into final content.
- Animation must use only vegan vegetable toppings plus regular mozzarella cheese.
- Avoid heavy video files.
- Avoid GIF-based animation.
- Respect reduced-motion users.
- Scope all CSS under .sunpepe-landing.
- Scope all JavaScript to this landing page only.

Animation beats:

1. Dough appears.
2. Red pepper mascot appears.
3. Sauce spreads.
4. Mozzarella falls.
5. Vegan vegetable toppings land.
6. Finished pizza appears.
7. CTA appears: התקשרו להזמין כעת.

Allowed toppings:

- Tomato
- Olives
- Mushrooms
- Onion
- Corn
- Bell peppers
- Basil

Forbidden toppings:

- Pepperoni
- Salami
- Ham
- Bacon
- Meat
- Fish
- Shrimp
- Any visually non-kosher topping

Do not start with the animation.
First build the WordPress structure, editable content model, RTL page layout, and CTA behavior.
Only after the static landing page works should you implement the scroll animation.
