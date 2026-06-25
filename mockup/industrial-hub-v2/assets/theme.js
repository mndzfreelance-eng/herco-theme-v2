/* HERCO — shared Tailwind theme config (Premium Industrial Hub design system) */
tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        "heritage-navy": "#25276B",
        "industrial-gold": "#F7941E",
        "slate-black": "#222222",
        "stucco-white": "#F9F9F9",
        "border-gray": "#E2E8F0",
        "primary": "#1A1B4B",
        "primary-container": "#25276B",
        "on-primary": "#ffffff",
        "on-primary-container": "#9799c4",
        "on-primary-fixed-variant": "#ADAFD0",
        "secondary": "#8c4f00",
        "secondary-container": "#ff9c2c",
        "tertiary": "#0e0f0f",
        "tertiary-container": "#242424",
        "background": "#f9f9f9",
        "on-background": "#1a1c1c",
        "surface": "#f9f9f9",
        "surface-bright": "#f9f9f9",
        "surface-dim": "#dadada",
        "surface-container-lowest": "#ffffff",
        "surface-container-low": "#f3f3f3",
        "surface-container": "#eeeeee",
        "surface-container-high": "#e8e8e8",
        "surface-container-highest": "#e2e2e2",
        "surface-variant": "#e2e2e2",
        "on-surface": "#1a1c1c",
        "on-surface-variant": "#444650",
        "inverse-surface": "#2f3131",
        "inverse-on-surface": "#f1f1f1",
        "outline": "#757681",
        "outline-variant": "#c5c6d2",
        "error": "#ba1a1a",
        "on-error": "#ffffff"
      },
      borderRadius: {
        "DEFAULT": "0.125rem",
        "lg": "0.25rem",
        "xl": "0.5rem",
        "full": "9999px"
      },
      spacing: {
        "unit": "8px",
        "gutter": "24px",
        "margin-desktop": "64px",
        "margin-mobile": "20px",
        "section-gap": "120px",
        "container-max": "1280px"
      },
      maxWidth: {
        "container-max": "1280px"
      },
      fontFamily: {
        "display-lg": ["EB Garamond", "serif"],
        "headline-lg": ["EB Garamond", "serif"],
        "headline-lg-mobile": ["EB Garamond", "serif"],
        "subheading": ["Hanken Grotesk", "sans-serif"],
        "body-lg": ["Hanken Grotesk", "sans-serif"],
        "body-md": ["Hanken Grotesk", "sans-serif"],
        "label-md": ["Hanken Grotesk", "sans-serif"],
        "technical-caps": ["Hanken Grotesk", "sans-serif"]
      },
      fontSize: {
        "display-lg": ["48px", { lineHeight: "56px", letterSpacing: "-0.02em", fontWeight: "500" }],
        "headline-lg": ["32px", { lineHeight: "40px", fontWeight: "500" }],
        "headline-lg-mobile": ["28px", { lineHeight: "34px", fontWeight: "500" }],
        "subheading": ["18px", { lineHeight: "24px", letterSpacing: "0.05em", fontWeight: "600" }],
        "body-lg": ["18px", { lineHeight: "28px", fontWeight: "400" }],
        "body-md": ["16px", { lineHeight: "24px", fontWeight: "400" }],
        "label-md": ["14px", { lineHeight: "20px", letterSpacing: "0.02em", fontWeight: "600" }],
        "technical-caps": ["12px", { lineHeight: "16px", letterSpacing: "0.1em", fontWeight: "700" }]
      },
      backgroundImage: {
        "grid-pattern": "url(\"data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0h40v40H0V0zm39 39V1H1v38h38z' fill='%23E2E8F0' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E\")"
      }
    }
  }
};
