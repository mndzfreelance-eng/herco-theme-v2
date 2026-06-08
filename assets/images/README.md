# Theme content & images

## Page copy (Who We Are, Mission, Vision, etc.)

Edit **`content/site-content.json`** at the theme root.  
WordPress and the local mockup both read this file — one edit updates both.

## Placeholders (bundled)

SVG placeholders live in `placeholders/`. They show on the site until real photos are uploaded in the Customizer.

## Replace images in WordPress

**Appearance → Customize**

| Section | Controls |
|---------|----------|
| **Herco Homepage** | Hero background, Distribution cards 1–4 |
| **Herco About Page** | About photo, Affiliate logos 1–3 |
| **Herco Site Images** | Default inner-page banner |
| **Site Identity** | Site logo (header & footer) |

After upload, click **Publish**. No code changes needed.

## Local mockup preview

Open `mockup/index.html` — uses the same `style.css`, `content/site-content.json`, and `assets/images/placeholders/` as WordPress.

Optional: drop preview photos in `mockup/assets/images/` (see `mockup/assets/images/README.md`).

## Brand logos (homepage scroll)

Add **Brands** in WP admin → set **Featured Image** on each brand → mark as featured (`brand_featured` meta / ACF) for the homepage strip.
