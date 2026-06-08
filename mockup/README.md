# Herco Mockup = WordPress Theme Preview

The mockup uses the **same CSS, copy, and HTML structure** as the WordPress theme you upload. What you see in `mockup/index.html` is what you get on the live site (before you upload custom photos).

## Single source of truth

| What | File |
|------|------|
| All page copy (Who We Are, Mission, Vision, dist cards, hero text) | `content/site-content.json` |
| Styles | `style.css` (theme root) |
| Homepage layout | `front-page.php` ↔ `mockup/homepage.html` |
| About layout | `page-about.php` ↔ `mockup/about.html` |
| Header | `header.php` ↔ `mockup/header.html` |
| Footer | `footer.php` ↔ `mockup/footer.html` |
| Image placeholders | `assets/images/placeholders/` (same in theme & mockup) |

Edit copy once in **`content/site-content.json`** — WordPress reads it automatically. The mockup loads the same file via `mockup/js/site-content.js`.

## Preview locally

| File | What it shows |
|------|----------------|
| **`wireframe.html`** | Full site wireframe — every page, section, image slot, WP template file |
| **`index.html`** | Live styled preview (header → homepage → about → footer) |

Open **`mockup/wireframe.html`** for the structural blueprint, or **`mockup/index.html`** for the visual mockup.

## Replace images

**In mockup (local preview):** drop files in `mockup/assets/images/`  
**On WordPress:** **Appearance → Customize → Herco Homepage / Herco About Page / Site Identity**

| File | WordPress Customizer |
|------|----------------------|
| `hero.jpg` | Herco Homepage → Hero background |
| `dist-1` … `dist-4` | Herco Homepage → Distribution photos |
| `about.jpg` | Herco About Page → About photo |
| `affiliate-1` … `3` | Herco About Page → Affiliate logos |
| `logo.png` | Site Identity → Logo |

Until uploaded, both mockup and WordPress show the grey placeholders from `assets/images/placeholders/`.

## WordPress after upload

1. Activate theme → About page created at `/about/`
2. Set a static homepage if needed (**Settings → Reading**)
3. Upload images in Customizer
4. Add brand logos via **Brands** post type (homepage scroll)

No Elementor required — the theme renders everything natively.
