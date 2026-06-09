# Herco Trading Inc. — Website (herco-theme-v2)

A coded, responsive site for **Herco Trading Inc.** — the Philippines' hardware and
houseware distribution partner since 1908, built for a **B2B trade & retail partner**
audience.

> Front-end prototype (static HTML/JS + Tailwind CDN, no build step) intended as a
> **design + UX reference for the WordPress rebuild**. Drop `index.html` in any browser.

This version (`v2`) is built on the **"Premium Industrial Hub"** design system exported
from the Stitch mockups (`Herco/*.zip`), while keeping all real Herco content.

---

## How to view

```bash
open ~/Downloads/Herco-Redesign/index.html        # macOS quick open
# or serve it (recommended — map embed + relative paths behave best):
cd ~/Downloads/Herco-Redesign && python3 -m http.server 8080
# then visit http://localhost:8080
```

## Pages

| File | Page | Highlights |
|---|---|---|
| `index.html` | Home | Hero, overlapping stat band, value split, 4 channels, brand marquee, why-Herco, CTA |
| `about.html` | About | Heritage timeline (1908→today), mission/vision, values, affiliates |
| `distribution.html` | Distribution | All 4 channels in depth + named retail partners (anchored sections) |
| `brands.html` | Brands | **Filterable** brand grid by category + "become a principal" CTA |
| `contact.html` | Contact | Info, demo form, embedded Google Map |
| `assets/theme.js` | Tailwind config | Colors, spacing, fonts, font sizes, grid pattern — single source of truth |
| `assets/theme.css` | Custom layer | Material symbols, grid motifs, scroll-reveal, marquee, brand-filter |
| `assets/app.js` | Behavior | Mobile nav, header shadow, brand filter, scroll-reveal, demo form, footer year |

---

## Design system — "Premium Industrial Hub"

Institutional prestige meets industrial reliability: navy/gold "quiet luxury" with a
technical, assembled feel (1px borders, hairline grids, mechanical corner accents).

| Token | Value | Use |
|---|---|---|
| `heritage-navy` | `#001E60` | Hero / dark sections / headings / primary buttons |
| `industrial-gold` | `#F39221` | Accents, eyebrows, secondary CTA, hover state |
| `stucco-white` | `#F9F9F9` | Page background |
| `border-gray` | `#E2E8F0` | 1px component borders / hairline grids |
| `primary` | `#000B31` | Footer / deepest navy |

- **Type** — `EB Garamond` (display & headings — institutional serif) + `Hanken Grotesk`
  (body, labels, technical caps). Loaded from Google Fonts; self-host for the WP build.
- **Icons** — Material Symbols Outlined.
- **Shape** — 4px radius (precision-engineered), no pills, no soft ambient shadows —
  depth comes from tonal layers and 1px borders.
- **Tailwind** is loaded via CDN and configured in `assets/theme.js`. For production,
  compile Tailwind to a static stylesheet and drop the CDN `<script>`.

---

## Notes for the WordPress / production build (hand-off to dev)

- **Brand logos** are styled text placeholders. Replace with real logo SVGs/PNGs in the
  brand grid + marquee.
- **Imagery** currently uses the Stitch-hosted mockup photos and a few gray
  `Photo: …` placeholders. Swap in real Herco photography (Herco Center, warehouse/fleet,
  retail aisles, jobsites) — biggest single uplift to perceived quality.
- **Contact form** is a front-end demo (no backend). Wire to email/CRM (e.g. WPForms / n8n).
- **Map** uses a keyless Google Maps embed — fine as-is; swap to an API-keyed embed if desired.
- **Accessibility** — skip link, focus-visible rings, ARIA on nav/breadcrumbs/filters,
  `prefers-reduced-motion` respected.

---

*Content sourced from the current herco.com.ph. Verify all figures (117 years, 200+
locations) with Herco before launch.*
