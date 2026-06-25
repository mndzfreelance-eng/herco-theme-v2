/* HERCO redesign — progressive-enhancement script (no dependencies) */
(function () {
  "use strict";

  /* --- Mobile nav toggle --- */
  var toggle = document.querySelector("#navToggle");
  var menu = document.querySelector("#mobileMenu");
  if (toggle && menu) {
    toggle.addEventListener("click", function () {
      var open = menu.classList.toggle("hidden") === false;
      toggle.setAttribute("aria-expanded", String(open));
      var icon = toggle.querySelector(".material-symbols-outlined");
      if (icon) { icon.textContent = open ? "close" : "menu"; }
    });
    menu.querySelectorAll("a").forEach(function (a) {
      a.addEventListener("click", function () {
        menu.classList.add("hidden");
        toggle.setAttribute("aria-expanded", "false");
        var icon = toggle.querySelector(".material-symbols-outlined");
        if (icon) { icon.textContent = "menu"; }
      });
    });
  }

  /* --- Header shadow on scroll --- */
  var header = document.querySelector("[data-header]");
  if (header) {
    var onScroll = function () {
      header.classList.toggle("shadow-md", window.scrollY > 8);
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  }

  /* --- Brand filter (brands page) --- */
  var chips = document.querySelectorAll("[data-filter]");
  var tiles = document.querySelectorAll(".brand-tile[data-cat]");
  if (chips.length && tiles.length) {
    chips.forEach(function (chip) {
      chip.addEventListener("click", function () {
        var cat = chip.getAttribute("data-filter");
        chips.forEach(function (c) {
          c.setAttribute("aria-pressed", "false");
          c.classList.remove("bg-heritage-navy", "text-white", "border-heritage-navy");
          c.classList.add("bg-surface-container-lowest", "text-on-surface-variant", "border-border-gray");
        });
        chip.setAttribute("aria-pressed", "true");
        chip.classList.add("bg-heritage-navy", "text-white", "border-heritage-navy");
        chip.classList.remove("bg-surface-container-lowest", "text-on-surface-variant", "border-border-gray");
        tiles.forEach(function (t) {
          var show = cat === "all" || t.getAttribute("data-cat").indexOf(cat) !== -1;
          t.classList.toggle("is-hidden", !show);
        });
      });
    });
  }

  /* --- Scroll reveal --- */
  var reveal = document.querySelectorAll("[data-reveal]");
  if (reveal.length && "IntersectionObserver" in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add("in"); io.unobserve(e.target); }
      });
    }, { threshold: 0.12, rootMargin: "0px 0px -40px 0px" });
    reveal.forEach(function (el) { io.observe(el); });
  } else {
    reveal.forEach(function (el) { el.classList.add("in"); });
  }

  /* --- Contact form (demo only) --- */
  var form = document.querySelector("#contact-form");
  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      var note = form.querySelector(".form-note");
      if (note) { note.hidden = false; }
      form.reset();
    });
  }

  /* --- Footer year --- */
  var yr = document.querySelector("[data-year]");
  if (yr) { yr.textContent = new Date().getFullYear(); }
})();
